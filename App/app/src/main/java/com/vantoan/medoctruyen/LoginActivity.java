package com.vantoan.medoctruyen;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.method.PasswordTransformationMethod;
import android.util.Patterns;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

public class LoginActivity extends AppCompatActivity {

    private EditText loginEmail, loginPassword;
    private TextView signupRedirectText, forgotPassword;
    private Button loginButton;
    private FirebaseAuth auth; // Đối tượng FirebaseAuth

    private ImageView showHidePasswordButton1;

    private boolean isPasswordVisible = false;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        // Ánh xạ các phần tử giao diện
        loginEmail = findViewById(R.id.login_email);
        loginPassword = findViewById(R.id.login_password);
        loginButton = findViewById(R.id.login_button);
        signupRedirectText = findViewById(R.id.signUpRedirectText);
        forgotPassword = findViewById(R.id.forgot_password);

        showHidePasswordButton1 = findViewById(R.id.showHidePasswordButton1);

        // Khởi tạo FirebaseAuth
        auth = FirebaseAuth.getInstance();


        forgotPassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(LoginActivity.this, ForgotPasswordActivity.class);
                startActivity(intent);
            }
        });

        showHidePasswordButton1.setOnClickListener(new View.OnClickListener() {
                                                       @Override
                                                       public void onClick(View view) {
                                                           if (isPasswordVisible) {
                                                               loginPassword.setTransformationMethod(PasswordTransformationMethod.getInstance());
                                                               showHidePasswordButton1.setImageResource(R.drawable.baseline_visibility_24);
                                                               isPasswordVisible = false;
                                                           } else {
                                                               loginPassword.setTransformationMethod(null);
                                                               showHidePasswordButton1.setImageResource(R.drawable.baseline_visibility_off_24);
                                                               isPasswordVisible = true;
                                                           }
                                                           loginPassword.setSelection(loginPassword.getText().length());
                                                       }
                                                   });

                loginButton.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        String email = loginEmail.getText().toString();
                        String pass = loginPassword.getText().toString();

                        if (!email.isEmpty() && Patterns.EMAIL_ADDRESS.matcher(email).matches()) {
                            if (!pass.isEmpty()) {
                                // Thực hiện đăng nhập bằng email và mật khẩu
                                auth.signInWithEmailAndPassword(email, pass)
                                        .addOnSuccessListener(new OnSuccessListener<AuthResult>() {
                                            @Override
                                            public void onSuccess(AuthResult authResult) {
                                                Toast.makeText(LoginActivity.this, "Đăng nhập thành công!", Toast.LENGTH_SHORT).show();
                                                // Chuyển hướng đến MainActivity sau khi đăng nhập thành công
                                                startActivity(new Intent(LoginActivity.this, MainActivity.class));
                                                finish();
                                            }
                                        }).addOnFailureListener(new OnFailureListener() {
                                            @Override
                                            public void onFailure(@NonNull Exception e) {
                                                Toast.makeText(LoginActivity.this, "Tài khoản hoặc mật khẩu không đúng!", Toast.LENGTH_SHORT).show();
                                            }
                                        });
                            } else {
                                loginPassword.setError("Vui lòng nhập mật khẩu!");
                            }
                        } else if (email.isEmpty()) {
                            loginEmail.setError("Vui lòng nhập Email!");
                        } else {
                            loginEmail.setError("Vui lòng nhập đầy đủ thông tin!");
                        }
                    }
                });

        signupRedirectText.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Chuyển hướng đến màn hình đăng ký (SignUpActivity)
                startActivity(new Intent(LoginActivity.this, SignUpActivity.class));
            }
        });
    }
}
