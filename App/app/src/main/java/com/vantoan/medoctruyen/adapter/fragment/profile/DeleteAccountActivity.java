package com.vantoan.medoctruyen.adapter.fragment.profile;

import android.annotation.SuppressLint;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;
import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.FirebaseFirestore;
import com.vantoan.medoctruyen.LoginActivity;
import com.vantoan.medoctruyen.MyUser;
import com.vantoan.medoctruyen.R;

public class DeleteAccountActivity extends AppCompatActivity {
    // Your member variables
    private ImageView imageView;
    private TextView profileName, profileEmail, profileDate;
    private Button deleteAccountButton, cancelDeleteButton;
    private FirebaseAuth auth;
    private FirebaseFirestore db;

    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_delete_account);

        // Initialize your FirebaseAuth and FirebaseFirestore
        auth = FirebaseAuth.getInstance();
        db = FirebaseFirestore.getInstance();

        // Find your UI elements in the view
        imageView = findViewById(R.id.imageView);
        profileName = findViewById(R.id.profile_name);
        profileEmail = findViewById(R.id.profile_email);
        profileDate = findViewById(R.id.profile_date);
        deleteAccountButton = findViewById(R.id.delete_account);
        cancelDeleteButton = findViewById(R.id.delete_account_cancel);

        ImageView backButton = findViewById(R.id.backButton);
        backButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Xử lý sự kiện khi ImageView nút back được nhấn
                finish(); // Đóng activity UserManual và quay lại trang trước
            }
        });

        // Set click listeners and other functionality
        deleteAccountButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                new AlertDialog.Builder(DeleteAccountActivity.this)
                        .setTitle("Xác nhận xoá tài khoản")
                        .setMessage("Bạn có chắc chắn muốn xoá tài khoản?")
                        .setPositiveButton("Đồng ý", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                deleteAccount();
                            }
                        })
                        .setNegativeButton("Hủy", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                dialog.dismiss();
                            }
                        })
                        .show();
            }
        });

        // Handle the cancel button click event
        cancelDeleteButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                onBackPressed();
            }
        });

        // Display user information
        displayUserInfo();
    }

    // Display user information
    private void displayUserInfo() {
        String userEmail = auth.getCurrentUser().getEmail();
        db.collection("users").document(userEmail).get()
                .addOnCompleteListener(new OnCompleteListener<DocumentSnapshot>() {
                    @Override
                    public void onComplete(@NonNull com.google.android.gms.tasks.Task<DocumentSnapshot> task) {
                        if (task.isSuccessful()) {
                            DocumentSnapshot document = task.getResult();
                            if (document.exists()) {
                                MyUser user = document.toObject(MyUser.class);
                                if (user != null) {
                                    profileName.setText("Tên người dùng: " + user.getName());
                                    profileEmail.setText("Email: " + user.getEmail());
                                    profileDate.setText("Ngày tham gia: " + user.getCreatedAt().toDate().toString());

                                    RequestOptions requestOptions = new RequestOptions()
                                            .override(350, 350);

                                    if (document.contains("avatar")) {
                                        String imageURL = user.getAvatar();
                                        Glide.with(DeleteAccountActivity.this)
                                                .load(imageURL)
                                                .apply(requestOptions)
                                                .into(imageView);
                                    }
                                }
                            }
                        } else {
                            // Handle error when unable to fetch user information
                            Toast.makeText(DeleteAccountActivity.this, "Lỗi khi lấy thông tin người dùng.", Toast.LENGTH_SHORT).show();
                        }
                    }
                });
    }

    // Delete the user account
    private void deleteAccount() {
        // Delete user data in Firestore
        String userId = auth.getCurrentUser().getUid();
        db.collection("users").document(userId)
                .delete()
                .addOnCompleteListener(new OnCompleteListener<Void>() {
                    @Override
                    public void onComplete(@NonNull com.google.android.gms.tasks.Task<Void> task) {
                        if (task.isSuccessful()) {
                            // Delete the user account in Authentication
                            auth.getCurrentUser().delete()
                                    .addOnCompleteListener(new OnCompleteListener<Void>() {
                                        @Override
                                        public void onComplete(@NonNull com.google.android.gms.tasks.Task<Void> task) {
                                            if (task.isSuccessful()) {
                                                // Handle successful account deletion
                                                Intent intent = new Intent(DeleteAccountActivity.this, LoginActivity.class);
                                                startActivity(intent);
                                                finish();
                                            } else {
                                                // Handle error when deleting the account in Authentication
                                                Toast.makeText(DeleteAccountActivity.this, "Lỗi khi xóa tài khoản trong Authentication.", Toast.LENGTH_SHORT).show();
                                            }
                                        }
                                    });
                        } else {
                            // Handle error when deleting the account in Firestore
                            Toast.makeText(DeleteAccountActivity.this, "Lỗi khi xóa tài khoản trong Firestore.", Toast.LENGTH_SHORT).show();
                        }
                    }
                });
    }
}
