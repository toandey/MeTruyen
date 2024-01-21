package com.vantoan.medoctruyen.adapter.fragment.profile;// import các thư viện cần thiết
import android.content.Intent;
import android.graphics.Color;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import com.bumptech.glide.Glide;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.auth.UserProfileChangeRequest;
import com.google.firebase.storage.FirebaseStorage;
import com.google.firebase.storage.StorageReference;
import com.google.firebase.storage.UploadTask;
import com.vantoan.medoctruyen.R;

import de.hdodenhof.circleimageview.CircleImageView;

public class EditAccountActivity extends AppCompatActivity {

    // khai báo các biến
    private CircleImageView profileImage;
    private EditText profileName, profileEmail;
    private Button saveButton;
    private FirebaseAuth firebaseAuth;
    private FirebaseUser firebaseUser;
    private FirebaseStorage firebaseStorage;
    private StorageReference storageReference;
    private static int PICK_IMAGE = 123;
    private Uri imagePath;

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        // kiểm tra kết quả trả về khi chọn ảnh
        if (requestCode == PICK_IMAGE && resultCode == RESULT_OK && data.getData() != null) {
            // lấy uri của ảnh
            imagePath = data.getData();
            // hiển thị ảnh lên CircleImageView
            Glide.with(this).load(imagePath).into(profileImage);
        }
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_account);
        Window window = getWindow();
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        window.setStatusBarColor(Color.WHITE);

        // ánh xạ các view
        profileImage = findViewById(R.id.profile_image);
        profileName = findViewById(R.id.profile_name);
        profileEmail = findViewById(R.id.profile_email);
        saveButton = findViewById(R.id.save_button);
        ImageView backButton = findViewById(R.id.backButton);

        // lấy đối tượng firebase auth, user và storage
        firebaseAuth = FirebaseAuth.getInstance();
        firebaseUser = firebaseAuth.getCurrentUser();
        firebaseStorage = FirebaseStorage.getInstance();
        storageReference = firebaseStorage.getReference();

        // lấy thông tin hồ sơ người dùng
        profileName.setText(firebaseUser.getDisplayName());
        profileEmail.setText(firebaseUser.getEmail());
        // sử dụng glide để tải và hiển thị ảnh của người dùng
        Glide.with(this).load(firebaseUser.getPhotoUrl()).placeholder(R.drawable.profile).into(profileImage);

        backButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Xử lý sự kiện khi ImageView nút back được nhấn
                finish(); // Đóng activity UserManual và quay lại trang trước
            }
        });

        // thiết lập sự kiện click cho CircleImageView
        profileImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // tạo intent để chọn ảnh từ thư viện máy
                Intent intent = new Intent();
                intent.setType("image/*");
                intent.setAction(Intent.ACTION_GET_CONTENT);
                startActivityForResult(Intent.createChooser(intent, "Select Image"), PICK_IMAGE);
            }
        });

        // thiết lập sự kiện click cho Button
        saveButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // lấy tên và email từ EditText
                String name = profileName.getText().toString();
                String email = profileEmail.getText().toString();
                // kiểm tra tính hợp lệ của tên và email
                if (name.isEmpty() || email.isEmpty()) {
                    Toast.makeText(EditAccountActivity.this, "Please enter your name and email", Toast.LENGTH_SHORT).show();
                    return;
                }
                // tạo đối tượng UserProfileChangeRequest để cập nhật thông tin người dùng
                UserProfileChangeRequest userProfileChangeRequest = new UserProfileChangeRequest.Builder()
                        .setDisplayName(name)
                        .build();
                // gọi phương thức updateProfile để cập nhật thông tin người dùng
                firebaseUser.updateProfile(userProfileChangeRequest)
                        .addOnCompleteListener(new OnCompleteListener<Void>() {
                            @Override
                            public void onComplete(@NonNull Task<Void> task) {
                                // kiểm tra kết quả cập nhật
                                if (task.isSuccessful()) {
                                    Toast.makeText(EditAccountActivity.this, "Profile updated", Toast.LENGTH_SHORT).show();
                                } else {
                                    Toast.makeText(EditAccountActivity.this, "Profile update failed", Toast.LENGTH_SHORT).show();
                                }
                            }
                        });
                // gọi phương thức updateEmail để cập nhật email người dùng
                firebaseUser.updateEmail(email)
                        .addOnCompleteListener(new OnCompleteListener<Void>() {
                            @Override
                            public void onComplete(@NonNull Task<Void> task) {
                                // kiểm tra kết quả cập nhật
                                if (task.isSuccessful()) {
                                    Toast.makeText(EditAccountActivity.this, "Email updated", Toast.LENGTH_SHORT).show();
                                } else {
                                    Toast.makeText(EditAccountActivity.this, "Email update failed", Toast.LENGTH_SHORT).show();
                                }
                            }
                        });
                // kiểm tra nếu người dùng chọn ảnh mới
                if (imagePath != null) {
                    // tạo đối tượng StorageReference để lưu trữ ảnh lên firebase storage
                    StorageReference imageReference = storageReference.child(firebaseUser.getUid()).child("Images").child("Profile Picture");
                    // gọi phương thức putFile để tải ảnh lên firebase storage
                    imageReference.putFile(imagePath)
                            .addOnCompleteListener(new OnCompleteListener<UploadTask.TaskSnapshot>() {
                                @Override
                                public void onComplete(@NonNull Task<UploadTask.TaskSnapshot> task) {
                                    // kiểm tra kết quả tải ảnh
                                    if (task.isSuccessful()) {
                                        // lấy uri của ảnh đã tải lên
                                        imageReference.getDownloadUrl().addOnCompleteListener(new OnCompleteListener<Uri>() {
                                            @Override
                                            public void onComplete(@NonNull Task<Uri> task) {
                                                // kiểm tra kết quả lấy uri
                                                if (task.isSuccessful()) {
                                                    // tạo đối tượng UserProfileChangeRequest để cập nhật ảnh người dùng
                                                    UserProfileChangeRequest userProfileChangeRequest = new UserProfileChangeRequest.Builder()
                                                            .setPhotoUri(task.getResult())
                                                            .build();
                                                    // gọi phương thức updateProfile để cập nhật ảnh người dùng
                                                    firebaseUser.updateProfile(userProfileChangeRequest)
                                                            .addOnCompleteListener(new OnCompleteListener<Void>() {
                                                                @Override
                                                                public void onComplete(@NonNull Task<Void> task) {
                                                                    // kiểm tra kết quả cập nhật
                                                                    if (task.isSuccessful()) {
                                                                        Toast.makeText(EditAccountActivity.this, "Image updated", Toast.LENGTH_SHORT).show();
                                                                    } else {
                                                                        Toast.makeText(EditAccountActivity.this, "Image update failed", Toast.LENGTH_SHORT).show();
                                                                    }
                                                                }
                                                            });
                                                } else {
                                                    Toast.makeText(EditAccountActivity.this, "Failed to get image uri", Toast.LENGTH_SHORT).show();
                                                }
                                            }
                                        });
                                    } else {
                                        Toast.makeText(EditAccountActivity.this, "Failed to upload image", Toast.LENGTH_SHORT).show();
                                    }
                                }
                            });
                }
            }
        });
    }
}
