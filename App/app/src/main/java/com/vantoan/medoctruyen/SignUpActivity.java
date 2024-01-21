package com.vantoan.medoctruyen;

import android.app.DatePickerDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.Timestamp;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseAuthUserCollisionException;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.auth.UserProfileChangeRequest;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.MutableData;
import com.google.firebase.database.Transaction;
import com.google.firebase.firestore.CollectionReference;
import com.google.firebase.firestore.FirebaseFirestore;
import com.vantoan.medoctruyen.LoginActivity;
import com.vantoan.medoctruyen.R;

import java.util.Calendar;

public class SignUpActivity extends AppCompatActivity {
    private EditText nameEditText, emailEditText, birthdayEditText, passwordEditText, rePasswordEditText;
    private ImageView showHidePasswordButton;
    private TextView loginRedirectText;
    private Button signupButton;
    private FirebaseAuth mAuth;
    private boolean passwordVisible = false;
    private CheckBox acceptTermsCheckbox;
    private FirebaseFirestore db;
    private CollectionReference usersRef;


    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);

        nameEditText = findViewById(R.id.signup_name);
        emailEditText = findViewById(R.id.signup_email);
        passwordEditText = findViewById(R.id.signup_password);
        rePasswordEditText = findViewById(R.id.signup_re_password);
        showHidePasswordButton = findViewById(R.id.showHidePasswordButton);
        signupButton = findViewById(R.id.signup_button);

        acceptTermsCheckbox = findViewById(R.id.acceptTermsCheckbox);


        loginRedirectText = findViewById(R.id.loginRedirectText);

        mAuth = FirebaseAuth.getInstance();
        db = FirebaseFirestore.getInstance();
        usersRef = db.collection("users");


        // Toggle password visibility when the show/hide button is clicked
        showHidePasswordButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                togglePasswordVisibility();
            }
        });

        // Enable or disable the Sign Up button based on password match
        rePasswordEditText.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {
            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {
            }

            @Override
            public void afterTextChanged(Editable s) {
                checkPasswordMatch();
            }
        });

        // Handle Sign Up button click
        signupButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final String name = nameEditText.getText().toString();
                final String email = emailEditText.getText().toString();
                final String password = passwordEditText.getText().toString();
                final String rePassword = rePasswordEditText.getText().toString();

                if (!password.equals(rePassword)) {
                    Toast.makeText(SignUpActivity.this, "Mật khẩu không khớp!", Toast.LENGTH_SHORT).show();
                    return;
                }

                if (name.isEmpty()) {
                    Toast.makeText(SignUpActivity.this, "Vui lòng nhập tên!", Toast.LENGTH_SHORT).show();
                    return;
                }

                if (email.isEmpty()) {
                    Toast.makeText(SignUpActivity.this, "Vui lòng nhập email!", Toast.LENGTH_SHORT).show();
                    return;
                }

                if (password.isEmpty()) {
                    Toast.makeText(SignUpActivity.this, "Vui lòng nhập mật khẩu!", Toast.LENGTH_SHORT).show();
                    return;
                }

                if (!acceptTermsCheckbox.isChecked()) {
                    Toast.makeText(SignUpActivity.this, "Bạn phải đồng ý với Điều Khoản Sử Dụng trước khi đăng ký.", Toast.LENGTH_SHORT).show();
                    return;
                }

                mAuth.createUserWithEmailAndPassword(email, password).addOnCompleteListener(SignUpActivity.this, new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {
                        if (task.isSuccessful()) {
                            // Đăng ký người dùng thành công
                            FirebaseUser user = mAuth.getCurrentUser();

                            // Lưu tên người dùng vào hồ sơ của người dùng
                            UserProfileChangeRequest profileUpdates = new UserProfileChangeRequest.Builder()
                                    .setDisplayName(name)
                                    .build();

                            user.updateProfile(profileUpdates)
                                    .addOnCompleteListener(new OnCompleteListener<Void>() {
                                        @Override
                                        public void onComplete(@NonNull Task<Void> task) {
                                            if (task.isSuccessful()) {
                                                // Hồ sơ đã được cập nhật thành công
                                                MyUser userModel = new MyUser(name, email, Timestamp.now());
                                                usersRef.document(email).set(userModel)
                                                        .addOnSuccessListener(new OnSuccessListener<Void>() {
                                                            @Override
                                                            public void onSuccess(Void aVoid) {
                                                                Intent intent = new Intent(SignUpActivity.this, LoginActivity.class);
                                                                startActivity(intent);
                                                                finish();
                                                                Toast.makeText(SignUpActivity.this, "Đăng ký thành công!", Toast.LENGTH_SHORT).show();
                                                            }
                                                        })
                                                        .addOnFailureListener(new OnFailureListener() {
                                                            @Override
                                                            public void onFailure(@NonNull Exception e) {
                                                                Toast.makeText(SignUpActivity.this, "Lỗi khi lưu dữ liệu vào Firestore. Vui lòng thử lại.", Toast.LENGTH_SHORT).show();
                                                            }
                                                        });
                                            } else {
                                                // Cập nhật hồ sơ thất bại
                                                Toast.makeText(SignUpActivity.this, "Lỗi khi cập nhật hồ sơ. Vui lòng thử lại.", Toast.LENGTH_SHORT).show();
                                            }
                                        }
                                    });
                        } else {
                            // Handle the case of registration failure
                            if (task.getException() instanceof FirebaseAuthUserCollisionException) {
                                // Case where the email already exists
                                Toast.makeText(SignUpActivity.this, "Email đã tồn tại. Vui lòng sử dụng email khác.", Toast.LENGTH_SHORT).show();
                            } else {
                                // Other cases
                                Toast.makeText(SignUpActivity.this, "Đăng ký thất bại. Vui lòng thử lại.", Toast.LENGTH_SHORT).show();
                            }
                        }
                    }
                });
            }
        });


        acceptTermsCheckbox.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (acceptTermsCheckbox.isChecked()) {
                    // Hiển thị AlertDialog với nội dung điều khoản sử dụng
                    showTermsAndConditionsDialog();
                }
            }
        });

        loginRedirectText.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent loginIntent = new Intent(SignUpActivity.this, LoginActivity.class);
                startActivity(loginIntent);
                finish();
            }
        });
    }


    private void togglePasswordVisibility() {
        if (passwordVisible) {
            passwordVisible = false;
            passwordEditText.setInputType(129); // Hide password
            rePasswordEditText.setInputType(129); // Hide password
            showHidePasswordButton.setImageResource(R.drawable.baseline_visibility_24);
        } else {
            passwordVisible = true;
            passwordEditText.setInputType(144); // Show password
            rePasswordEditText.setInputType(144); // Show password
            showHidePasswordButton.setImageResource(R.drawable.baseline_visibility_off_24);
        }
    }

    private void checkPasswordMatch() {
        String password = passwordEditText.getText().toString();
        String rePassword = rePasswordEditText.getText().toString();

        if (!password.equals(rePassword)) {
            rePasswordEditText.setError("Mật khẩu không trùng khớp");
        }
    }


    private void showTermsAndConditionsDialog() {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("Điều Khoản Sử Dụng");

        // Thêm nội dung điều khoản sử dụng vào AlertDialog
        builder.setMessage("Ứng dụng mê đọc truyện (sau đây gọi là ứng dụng) là một ứng dụng cho phép người dùng đọc các truyện ngắn, truyện tranh, tiểu thuyết và các thể loại khác trên điện thoại thông minh hoặc máy tính bảng. Bằng việc tải xuống, cài đặt và sử dụng ứng dụng, bạn đồng ý tuân thủ các điều khoản sử dụng sau đây:\n" +
                "1. Bạn phải có ít nhất 13 tuổi để sử dụng ứng dụng. Nếu bạn chưa đủ 13 tuổi, bạn phải có sự cho phép của cha mẹ hoặc người giám hộ hợp pháp để sử dụng ứng dụng.\n" +
                "2. Bạn không được phép sao chép, phân phối, bán, cho thuê, chuyển nhượng, sửa đổi, thay đổi, hack hoặc tạo các sản phẩm phát sinh từ ứng dụng hoặc bất kỳ nội dung nào được cung cấp bởi ứng dụng mà không có sự cho phép bằng văn bản của chúng tôi.\n" +
                "3. Bạn không được phép sử dụng ứng dụng để gửi hoặc nhận bất kỳ nội dung nào vi phạm luật pháp, xâm phạm quyền riêng tư, quyền sở hữu trí tuệ hoặc quyền khác của bất kỳ bên thứ ba nào, hoặc nội dung có tính xúc phạm, khiêu dâm, bạo lực, gây hiểu lầm hoặc gây hại cho người khác.\n" +
                "4. Bạn không được phép sử dụng ứng dụng để gây ra hoặc tham gia vào bất kỳ hành vi nào làm ảnh hưởng xấu đến hoạt động bình thường của ứng dụng hoặc an ninh của ứng dụng, chẳng hạn như truy cập trái phép vào hệ thống của chúng tôi, truyền virus hoặc mã độc hại, gửi thư rác hoặc tấn công từ chối dịch vụ.\n" +
                "5. Bạn không được phép sử dụng ứng dụng cho mục đích thương mại mà không có sự cho phép bằng văn bản của chúng tôi.\n" +
                "6. Bạn chịu trách nhiệm về việc bảo mật tài khoản và mật khẩu của bạn và không được tiết lộ chúng cho bất kỳ ai khác. Bạn cũng chịu trách nhiệm về mọi hoạt động xảy ra trên tài khoản của bạn và phải thông báo cho chúng tôi ngay lập tức nếu bạn nhận thấy bất kỳ việc sử dụng trái phép nào.\n" +
                "7. Chúng tôi có quyền xóa tài khoản của bạn hoặc hạn chế quyền truy cập vào ứng dụng của bạn nếu bạn vi phạm bất kỳ điều khoản nào trong điều khoản sử dụng này.\n" +
                "8. Chúng tôi cung cấp ứng dụng cho bạn miễn phí nhưng không đảm bảo rằng ứng dụng sẽ luôn hoạt động một cách liên tục, an toàn, chính xác và không có lỗi. Bạn sử dụng ứng dụng hoàn toàn tự chịu rủi ro và chúng tôi không chịu trách nhiệm về bất kỳ thiệt hại nào phát sinh từ việc sử dụng ứng dụng của bạn.\n" +
                "9. Chúng tôi có quyền thay đổi, cập nhật, tạm ngừng hoặc ngừng cung cấp ứng dụng hoặc bất kỳ nội dung nào của ứng dụng mà không cần thông báo trước cho bạn.\n" +
                "10. Chúng tôi có quyền sửa đổi điều khoản sử dụng này bất cứ lúc nào và sẽ thông báo cho bạn về những thay đổi đó qua ứng dụng hoặc qua email. Việc bạn tiếp tục sử dụng ứng dụng sau khi nhận được thông báo sẽ được coi là bạn đã chấp nhận những thay đổi đó.\n" +
                "Nếu bạn có bất kỳ câu hỏi nào về điều khoản sử dụng này, vui lòng liên hệ với chúng tôi qua email: support@readstoryapp.com");

        builder.setPositiveButton("Tôi đồng ý", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                // Đặt trạng thái CheckBox về true khi người dùng đồng ý
                acceptTermsCheckbox.setChecked(true);
                dialog.dismiss();
            }
        });

        builder.create().show();
    }


}
