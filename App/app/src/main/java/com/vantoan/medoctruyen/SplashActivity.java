package com.vantoan.medoctruyen;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ActivityOptions;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.ImageView;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class SplashActivity extends AppCompatActivity {
    private static final int SPLASH_DELAY = 2000;
    private ImageView imageView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash);
        imageView = findViewById(R.id.splash_image);

        SharedPreferences preferences = getSharedPreferences("my_preferences", MODE_PRIVATE);
        boolean firstRun = preferences.getBoolean("firstRun", true);

        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                if (firstRun) {
                    // Đây là lần đầu chạy ứng dụng
                    SharedPreferences.Editor editor = preferences.edit();
                    editor.putBoolean("firstRun", false);
                    editor.apply();

                    // Chuyển đến Onboarding Screens Activity (NavigationActivity)
                    Intent intent = new Intent(SplashActivity.this, NavigationActivity.class);
                    startActivity(intent);
                } else {
                    // Kiểm tra đăng nhập bằng Firebase
                    FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
                    if (user != null) {
                        // Người dùng đã đăng nhập, chuyển đến màn hình chính (MainActivity)
                        Intent intent = new Intent(SplashActivity.this, MainActivity.class);
                        // Tạo transition animation
                        ActivityOptions options = ActivityOptions.makeSceneTransitionAnimation(SplashActivity.this, imageView, "splash_transition");
                        // Chuyển đến màn hình chính với hiệu ứng bung ra
                        startActivity(intent, options.toBundle());
                    } else {
                        // Người dùng chưa đăng nhập, chuyển đến LoginActivity
                        Intent intent = new Intent(SplashActivity.this, GetStarted.class);
                        startActivity(intent);
                    }
                }

                finish();
            }
        }, SPLASH_DELAY);
    }
}