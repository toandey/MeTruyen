package com.vantoan.medoctruyen.adapter.fragment.profile;// Import các thư viện cần thiết
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import androidx.appcompat.app.AppCompatActivity;
import com.bumptech.glide.Glide;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.vantoan.medoctruyen.R;

import de.hdodenhof.circleimageview.CircleImageView;

public class AccountManagerActivity extends AppCompatActivity {

    private CircleImageView profileImage;
    private TextView profileName, profileEmail;
    private Button changePasswordButton, editProfileButton;
    private FirebaseAuth firebaseAuth;
    private FirebaseUser firebaseUser;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_account_manager);

        Window window = getWindow();
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        window.setStatusBarColor(Color.WHITE);

        // Ánh xạ các view từ layout
        profileImage = findViewById(R.id.profile_image);
        profileName = findViewById(R.id.profile_name);
        profileEmail = findViewById(R.id.profile_email);
        changePasswordButton = findViewById(R.id.change_password_button);
        editProfileButton = findViewById(R.id.edit_profile_button);
        ImageView backButton = findViewById(R.id.backButton);

        // Lấy đối tượng FirebaseAuth và FirebaseUser
        firebaseAuth = FirebaseAuth.getInstance();
        firebaseUser = firebaseAuth.getCurrentUser();

        if (firebaseUser != null) {
            String name = firebaseUser.getDisplayName();
            String email = firebaseUser.getEmail();

            // Check if photoUrl is not null before calling toString()
            String photoUrl = (firebaseUser.getPhotoUrl() != null) ? firebaseUser.getPhotoUrl().toString() : "";

            profileName.setText("Username: " + name);
            profileEmail.setText("Email: " + email);

            Glide.with(this)
                    .load(photoUrl)
                    .placeholder(R.drawable.profile)
                    .into(profileImage);
        }

        backButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Xử lý sự kiện khi ImageView nút back được nhấn
                finish(); // Đóng activity UserManual và quay lại trang trước
            }
        });


        changePasswordButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(AccountManagerActivity.this, ChangePasswordActivity.class));

            }
        });

        editProfileButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(AccountManagerActivity.this, EditAccountActivity.class));
            }
        });
    }
}
