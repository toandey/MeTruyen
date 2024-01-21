package com.vantoan.medoctruyen.adapter.fragment;

import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.net.Uri;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AlertDialog;
import androidx.fragment.app.Fragment;

import com.bumptech.glide.Glide;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.FirebaseFirestore;
import com.vantoan.medoctruyen.GetStarted;
import com.vantoan.medoctruyen.R;
import com.vantoan.medoctruyen.adapter.fragment.profile.AccountManagerActivity;
import com.vantoan.medoctruyen.adapter.fragment.profile.ActivityAllStory;
import com.vantoan.medoctruyen.adapter.fragment.profile.ActivityFAQ;
import com.vantoan.medoctruyen.adapter.fragment.profile.ChangePasswordActivity;
import com.vantoan.medoctruyen.adapter.fragment.profile.DeleteAccountActivity;
import com.vantoan.medoctruyen.adapter.fragment.profile.EditAccountActivity;
import com.vantoan.medoctruyen.adapter.fragment.profile.InformationActivity;
import com.vantoan.medoctruyen.adapter.fragment.profile.UserManualActivity;

import de.hdodenhof.circleimageview.CircleImageView;

public class ProfileFragment extends Fragment {

    private CircleImageView imageView;
    private TextView profile_name;
    private LinearLayout storyReading, storyFavorite, changePassword, editInfo, deleteAccount, guide, question, infoApp, log_out, accManager;
    private FirebaseAuth firebaseAuth;
    private FirebaseUser firebaseUser;
    private FirebaseFirestore firebaseFirestore;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_profile, container, false);

        imageView = view.findViewById(R.id.imageView);
        profile_name = view.findViewById(R.id.profile_name);
        storyReading = view.findViewById(R.id.storyReading);
        storyFavorite = view.findViewById(R.id.storyFavorite);
        changePassword = view.findViewById(R.id.changePassword);
        editInfo = view.findViewById(R.id.editInfo);
        deleteAccount = view.findViewById(R.id.deleteAccount);
        guide = view.findViewById(R.id.guide);
        question = view.findViewById(R.id.question);
        infoApp = view.findViewById(R.id.infoApp);
        log_out = view.findViewById(R.id.log_out);
        accManager = view.findViewById(R.id.accManager);

        firebaseAuth = FirebaseAuth.getInstance();
        firebaseUser = firebaseAuth.getCurrentUser();
        firebaseFirestore = FirebaseFirestore.getInstance();

        Uri photoUrl = firebaseUser.getPhotoUrl();

        if (isAdded()) {
            Glide.with(this)
                    .load(photoUrl)
                    .placeholder(R.drawable.profile)
                    .into(imageView);
        }

        String name = firebaseUser.getDisplayName();

        if (name != null) {
            profile_name.setText(name);
        } else {
            profile_name.setText("Đang cập nhật");
        }

        accManager.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getContext(), AccountManagerActivity.class);
                startActivity(intent);
            }
        });

        storyReading.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getContext(), ActivityAllStory.class);
                intent.putExtra("storyType", "dangDoc");
                startActivity(intent);
            }
        });

        storyFavorite.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getContext(), ActivityAllStory.class);
                intent.putExtra("storyType", "daThich");
                startActivity(intent);
            }
        });

        changePassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getContext(), ChangePasswordActivity.class);
                startActivity(intent);
            }
        });

        editInfo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getContext(), EditAccountActivity.class);
                startActivity(intent);
            }
        });

        deleteAccount.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AlertDialog.Builder builder = new AlertDialog.Builder(getContext());
                builder.setTitle("Xoá tài khoản");
                builder.setMessage("Bạn có chắc chắn muốn xoá tài khoản của mình không?");
                builder.setPositiveButton("Đồng ý", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        firebaseUser.delete()
                                .addOnSuccessListener(new OnSuccessListener<Void>() {
                                    @Override
                                    public void onSuccess(Void aVoid) {
                                        Toast.makeText(getContext(), "Tài khoản của bạn đã được xoá", Toast.LENGTH_SHORT).show();
                                        firebaseAuth.signOut();
                                        // Đóng Activity hiện tại và khởi chạy GetStarted
                                        getActivity().finish();
                                        Intent intent = new Intent(getContext(), GetStarted.class);
                                        intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK | Intent.FLAG_ACTIVITY_CLEAR_TASK);
                                        startActivity(intent);
                                    }
                                })
                                .addOnFailureListener(new OnFailureListener() {
                                    @Override
                                    public void onFailure(@NonNull Exception e) {
                                        Toast.makeText(getContext(), "Xoá tài khoản thất bại: " + e.getMessage(), Toast.LENGTH_SHORT).show();
                                    }
                                });
                    }
                });
                builder.setNegativeButton("Huỷ bỏ", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.dismiss();
                    }
                });
                builder.create().show();
            }
        });

        guide.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getContext(), UserManualActivity.class);
                startActivity(intent);
            }
        });

        question.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getContext(), ActivityFAQ.class);
                startActivity(intent);
            }
        });

        infoApp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getContext(), InformationActivity.class);
                startActivity(intent);
            }
        });

        log_out.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showLogoutConfirmationDialog();
            }
        });

        return view;
    }

    private void showLogoutConfirmationDialog() {
        AlertDialog.Builder builder = new AlertDialog.Builder(getContext());
        builder.setTitle("Xác nhận đăng xuất");
        builder.setMessage("Bạn có chắc chắn muốn đăng xuất khỏi ứng dụng không?");
        builder.setPositiveButton("Đồng ý", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                firebaseAuth.signOut();
                getActivity().finish();
                Intent intent = new Intent(getContext(), GetStarted.class);
                intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK | Intent.FLAG_ACTIVITY_CLEAR_TASK);
                startActivity(intent);
            }
        });
        builder.setNegativeButton("Huỷ bỏ", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
            }
        });
        builder.create().show();
    }
}
