package com.vantoan.medoctruyen;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

public class GetStarted extends AppCompatActivity {

    private boolean backPressedOnce = false;

    @Override
    public void onBackPressed() {
        if (backPressedOnce) {
            // Nếu đã bấm quay lại lần thứ hai, đóng ứng dụng
            super.onBackPressed();
            return;
        }

        // Nếu chưa bấm quay lại lần thứ nhất, hiển thị thông báo
        Toast.makeText(this, "Chạm lần nữa để thoát", Toast.LENGTH_SHORT).show();

        // Đặt cờ là đã bấm quay lại lần đầu tiên
        backPressedOnce = true;

        // Reset cờ sau một khoảng thời gian (ví dụ: 2 giây)
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                backPressedOnce = false;
            }
        }, 2000); // 2000 milliseconds = 2 seconds
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_get_started);

        Button loginButton = findViewById(R.id.login);
        Button signupButton = findViewById(R.id.signup);

        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Chuyển hướng đến LoginActivity
                Intent intent = new Intent(GetStarted.this, LoginActivity.class);
                startActivity(intent);
            }
        });

        signupButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Chuyển hướng đến SignUpActivity
                Intent intent = new Intent(GetStarted.this, SignUpActivity.class);
                startActivity(intent);
            }
        });
    }
}
