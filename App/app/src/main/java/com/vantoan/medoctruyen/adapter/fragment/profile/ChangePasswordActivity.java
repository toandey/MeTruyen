package com.vantoan.medoctruyen.adapter.fragment.profile;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthCredential;
import com.google.firebase.auth.EmailAuthProvider;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.vantoan.medoctruyen.LoginActivity;
import com.vantoan.medoctruyen.R;

public class ChangePasswordActivity extends AppCompatActivity {

    // Declare the views
    private TextView tvOldPassword, tvNewPassword, tvReNewPassword;
    private Button btnChangePassword;

    // Declare the Firebase auth
    private FirebaseAuth mAuth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_change_password);

        Window window = getWindow();
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        window.setStatusBarColor(Color.WHITE);

        // Initialize the views
        tvOldPassword = findViewById(R.id.tvOldPassword);
        tvNewPassword = findViewById(R.id.tvNewPassword);
        tvReNewPassword = findViewById(R.id.tvReNewPassword);
        btnChangePassword = findViewById(R.id.btnChangePassword);

        ImageView backButton = findViewById(R.id.backButton);
        backButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Xử lý sự kiện khi ImageView nút back được nhấn
                finish(); // Đóng activity UserManual và quay lại trang trước
            }
        });

        // Initialize the Firebase auth
        mAuth = FirebaseAuth.getInstance();

        // Set the click listener for the button
        btnChangePassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Get the input values
                String oldPassword = tvOldPassword.getText().toString().trim();
                String newPassword = tvNewPassword.getText().toString().trim();
                String reNewPassword = tvReNewPassword.getText().toString().trim();

                // Validate the input values
                if (oldPassword.isEmpty() || newPassword.isEmpty() || reNewPassword.isEmpty()) {
                    // Show a toast message if any field is empty
                    Toast.makeText(ChangePasswordActivity.this, "Vui lòng nhập đầy đủ thông tin", Toast.LENGTH_SHORT).show();
                } else if (!newPassword.equals(reNewPassword)) {
                    // Show a toast message if the new passwords do not match
                    Toast.makeText(ChangePasswordActivity.this, "Mật khẩu mới không khớp", Toast.LENGTH_SHORT).show();
                } else {
                    // Get the current user
                    FirebaseUser user = mAuth.getCurrentUser();

                    // Check if the user is not null
                    if (user != null) {
                        // Re-authenticate the user with the old password
                        AuthCredential credential = EmailAuthProvider.getCredential(user.getEmail(), oldPassword);
                        user.reauthenticate(credential).addOnCompleteListener(new OnCompleteListener<Void>() {
                            @Override
                            public void onComplete(@NonNull Task<Void> task) {
                                // Check if the re-authentication is successful
                                if (task.isSuccessful()) {
                                    // Update the user's password with the new password
                                    user.updatePassword(newPassword).addOnCompleteListener(new OnCompleteListener<Void>() {
                                        @Override
                                        public void onComplete(@NonNull Task<Void> task) {
                                            // Check if the update is successful
                                            if (task.isSuccessful()) {
                                                // Show a toast message and sign out the user
                                                Toast.makeText(ChangePasswordActivity.this, "Đổi mật khẩu thành công, vui lòng đăng nhập lại", Toast.LENGTH_SHORT).show();
                                                mAuth.signOut();
                                                // Start the login activity
                                                startActivity(new Intent(ChangePasswordActivity.this, LoginActivity.class));
                                                // Finish the current activity
                                                finish();
                                            } else {
                                                // Show a toast message with the error
                                                Toast.makeText(ChangePasswordActivity.this, "Lỗi: " + task.getException().getMessage(), Toast.LENGTH_SHORT).show();
                                            }
                                        }
                                    });
                                } else {
                                    // Show a toast message with the error
                                    Toast.makeText(ChangePasswordActivity.this, "Lỗi: " + task.getException().getMessage(), Toast.LENGTH_SHORT).show();
                                }
                            }
                        });
                    }
                }
            }
        });
    }
}
