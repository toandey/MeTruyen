package com.vantoan.medoctruyen.adapter.fragment;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.GridLayout;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.MultiTransformation;
import com.bumptech.glide.load.resource.bitmap.CenterCrop;
import com.bumptech.glide.load.resource.bitmap.RoundedCorners;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.EventListener;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.FirebaseFirestoreException;
import com.google.firebase.firestore.Query;
import com.google.firebase.firestore.QueryDocumentSnapshot;
import com.google.firebase.firestore.QuerySnapshot;
import com.vantoan.medoctruyen.R;
import com.vantoan.medoctruyen.adapter.fragment.profile.ActivityAllStory;
import com.vantoan.medoctruyen.adapter.fragment.profile.ActivityListChapter;
import com.vantoan.medoctruyen.adapter.fragment.profile.ActivityReading;
import com.vantoan.medoctruyen.adapter.fragment.profile.ActivityStory;
public class LibraryFragment extends Fragment {
    // Khai báo các biến cho các view và Firebase Firestore
    private GridLayout gridReadStories, gridFavStories;
    private LinearLayout linearViewedStories;
    private FirebaseFirestore db;
    private FirebaseAuth auth;
    private ImageView banner3;
    private String docId;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_library, container, false);

        // Ánh xạ các view từ XML
        gridReadStories = view.findViewById(R.id.gridReadStories);
        gridFavStories = view.findViewById(R.id.gridFavStories);
        linearViewedStories = view.findViewById(R.id.linearViewedStories);
        banner3 = view.findViewById(R.id.banner3);

        // Khởi tạo Firestore
        db = FirebaseFirestore.getInstance();
        auth = FirebaseAuth.getInstance();

        LinearLayout truyenDangDoc = view.findViewById(R.id.truyenDangDoc);
        LinearLayout truyenDaThich = view.findViewById(R.id.truyenDaThich);
        LinearLayout truyenDaXem = view.findViewById(R.id.truyenDaXem);

        db.collection("banner").document("banner3").get().addOnCompleteListener(new OnCompleteListener<DocumentSnapshot>() {
            @Override
            public void onComplete(@NonNull Task<DocumentSnapshot> task) {
                if (task.isSuccessful()) {
                    DocumentSnapshot document = task.getResult();
                    if (document.exists()) {
                        // Lấy doc_id và image từ Firestore
                        docId = document.getString("doc_id");
                        String imageUrl = document.getString("image");

                        Glide.with(getContext())
                                .load(imageUrl)
                                .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                                .into(banner3);

                        // Thiết lập sự kiện click cho ImageView
                        banner3.setOnClickListener(new View.OnClickListener() {
                            @Override
                            public void onClick(View v) {
                                // Chuyển hướng đến ActivityStory và truyền doc_id
                                Intent intent = new Intent(getActivity(), ActivityStory.class);
                                intent.putExtra("doc_id", docId);
                                startActivity(intent);
                            }
                        });
                    } else {
                        Log.d("LibraryFragment", "Không tìm thấy tài liệu");
                    }
                } else {
                    Log.d("LibraryFragment", "Lấy tài liệu thất bại: ", task.getException());
                }
            }
        });

        truyenDangDoc.setOnClickListener(v -> {
            Intent intent = new Intent(getContext(), ActivityAllStory.class);
            intent.putExtra("storyType", "dangDoc");
            startActivity(intent);
        });

        truyenDaThich.setOnClickListener(v -> {
            Intent intent = new Intent(getContext(), ActivityAllStory.class);
            intent.putExtra("storyType", "daThich");
            startActivity(intent);
        });

        truyenDaXem.setOnClickListener(v -> {
            Intent intent = new Intent(getContext(), ActivityAllStory.class);
            intent.putExtra("storyType", "daXem");
            startActivity(intent);
        });


        // Gọi các phương thức để hiển thị danh sách truyện
        displayReadStories();
        displayFavStories();
        displayViewedStories();

        return view;
    }

    private void displayReadStories() {
        String userEmail = auth.getCurrentUser().getEmail();
        db.collection("truyendadoc").document(userEmail).collection("stories")
                .limit(6) // Giới hạn số lượng truyện hiển thị
                .addSnapshotListener(new EventListener<QuerySnapshot>() {
                    @Override
                    public void onEvent(@Nullable QuerySnapshot queryDocumentSnapshots, @Nullable FirebaseFirestoreException e) {
                        if (e != null) {
                            // Xử lý lỗi
                            Log.w("displayReadStories", "Listen failed.", e);
                            return;
                        }

                        // Xóa tất cả các view cũ trước khi thêm view mới
                        gridReadStories.removeAllViews();

                        for (QueryDocumentSnapshot documentSnapshot : queryDocumentSnapshots) {
                            String docId = documentSnapshot.getString("doc_id");
                            String chapterDocument = documentSnapshot.getString("chapter_document");
                            // Tiếp tục truy vấn thông tin truyện từ collection "stories" với docId
                            db.collection("stories").document(docId)
                                    .get()
                                    .addOnSuccessListener(documentSnapshot1 -> {
                                        // Tạo view mới và thiết lập dữ liệu
                                        View storyView = LayoutInflater.from(getContext()).inflate(R.layout.item_story, gridReadStories, false);
                                        ImageView imageTruyen = storyView.findViewById(R.id.imageTruyen);
                                        TextView tenTruyen = storyView.findViewById(R.id.tenTruyen);
                                        TextView theloaiTruyen = storyView.findViewById(R.id.theloaiTruyen);

                                        // Lấy dữ liệu từ document và thiết lập vào view
                                        String anhBia = documentSnapshot1.getString("anh_bia");
                                        String tenTruyenText = documentSnapshot1.getString("ten_truyen");
                                        String theLoai = documentSnapshot1.getString("the_loai");

                                        // Hiển thị dữ liệu lên giao diện
                                        Glide.with(getContext())
                                                .load(anhBia)
                                                .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                                                .into(imageTruyen);
                                        tenTruyen.setText(tenTruyenText);
                                        theloaiTruyen.setText(theLoai);

                                        // Xử lý sự kiện click
                                        storyView.setOnClickListener(v -> {
                                            // Chuyển hướng đến ActivityReading với các tham số cần thiết
                                            Intent intent = new Intent(getContext(), ActivityReading.class);
                                            intent.putExtra("story_document", docId);
                                            intent.putExtra("chapter_document", chapterDocument);
                                            startActivity(intent);
                                        });

                                        // Thêm view vào GridLayout
                                        gridReadStories.addView(storyView);
                                    })
                                    .addOnFailureListener(exception -> {
                                        // Xử lý lỗi
                                        Log.e("displayReadStories", "Error getting document", exception);
                                    });
                        }
                    }
                });
    }


    private void displayFavStories() {
        String userEmail = auth.getCurrentUser().getEmail();

        // Sử dụng SnapshotListener để lắng nghe các thay đổi trong thời gian thực
        db.collection("truyenyeuthich").document(userEmail).collection("stories")
                .limit(6) // Giới hạn số lượng truyện hiển thị
                .addSnapshotListener(new EventListener<QuerySnapshot>() {
                    @Override
                    public void onEvent(@Nullable QuerySnapshot queryDocumentSnapshots, @Nullable FirebaseFirestoreException e) {
                        if (e != null) {
                            // Xử lý lỗi
                            Log.e("displayFavStories", "Listen failed.", e);
                            return;
                        }

                        // Xóa tất cả các view cũ trước khi thêm view mới
                        gridFavStories.removeAllViews();

                        for (QueryDocumentSnapshot documentSnapshot : queryDocumentSnapshots) {
                            String docId = documentSnapshot.getString("doc_id");
                            // Truy vấn thông tin truyện từ collection "stories" với docId
                            db.collection("stories").document(docId)
                                    .get()
                                    .addOnSuccessListener(documentSnapshot1 -> {
                                        // Tạo view mới và thiết lập dữ liệu
                                        View storyView = LayoutInflater.from(getContext()).inflate(R.layout.item_story, gridFavStories, false);
                                        ImageView imageTruyen = storyView.findViewById(R.id.imageTruyen);
                                        TextView tenTruyen = storyView.findViewById(R.id.tenTruyen);
                                        TextView theloaiTruyen = storyView.findViewById(R.id.theloaiTruyen);

                                        // Lấy dữ liệu từ document và thiết lập vào view
                                        String anhBia = documentSnapshot1.getString("anh_bia");
                                        String tenTruyenText = documentSnapshot1.getString("ten_truyen");
                                        String theLoai = documentSnapshot1.getString("the_loai");

                                        // Hiển thị dữ liệu lên giao diện
                                        Glide.with(getContext())
                                                .load(anhBia)
                                                .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                                                .into(imageTruyen);
                                        tenTruyen.setText(tenTruyenText);
                                        theloaiTruyen.setText(theLoai);

                                        // Xử lý sự kiện click
                                        storyView.setOnClickListener(v -> {
                                            // Chuyển hướng đến ActivityStory với các tham số cần thiết
                                            Intent intent = new Intent(getContext(), ActivityStory.class);
                                            intent.putExtra("doc_id", docId);
                                            startActivity(intent);
                                        });

                                        // Thêm view vào GridLayout
                                        gridFavStories.addView(storyView);
                                    })
                                    .addOnFailureListener(exception -> {
                                        // Xử lý lỗi
                                        Log.e("displayFavStories", "Error getting document", exception);
                                    });
                        }
                    }
                });
    }

    private void displayViewedStories() {
        String userEmail = auth.getCurrentUser().getEmail();
        Context context = getContext();

        if (context == null) {
            // Handle the case where the context is null
            return;
        }

        db.collection("truyendaxem").document(userEmail).collection("stories")
                .orderBy("timestamp", Query.Direction.DESCENDING)
                .limit(8)
                .addSnapshotListener((queryDocumentSnapshots, e) -> {
                    if (e != null) {
                        // Xử lý lỗi
                        Log.e("displayViewedStories", "Listen failed.", e);
                        return;
                    }

                    // Kiểm tra xem có sự thay đổi nào không
                    if (queryDocumentSnapshots != null && !queryDocumentSnapshots.isEmpty()) {
                        // Xóa tất cả các view cũ trước khi thêm view mới
                        linearViewedStories.removeAllViews();

                        for (QueryDocumentSnapshot documentSnapshot : queryDocumentSnapshots) {
                            String docId = documentSnapshot.getString("doc_id");

                            db.collection("stories").document(docId)
                                    .get()
                                    .addOnSuccessListener(documentSnapshot1 -> {
                                        // Tạo view mới và thiết lập dữ liệu
                                        View storyView = LayoutInflater.from(context).inflate(R.layout.item_story, linearViewedStories, false);
                                        ImageView imageTruyen = storyView.findViewById(R.id.imageTruyen);
                                        TextView tenTruyen = storyView.findViewById(R.id.tenTruyen);
                                        TextView theloaiTruyen = storyView.findViewById(R.id.theloaiTruyen);

                                        // Lấy dữ liệu từ document và thiết lập vào view
                                        String anhBia = documentSnapshot1.getString("anh_bia");
                                        String tenTruyenText = documentSnapshot1.getString("ten_truyen");
                                        String theLoai = documentSnapshot1.getString("the_loai");

                                        // Hiển thị dữ liệu lên giao diện
                                        Glide.with(context)
                                                .load(anhBia)
                                                .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                                                .into(imageTruyen);
                                        tenTruyen.setText(tenTruyenText);
                                        theloaiTruyen.setText(theLoai);

                                        // Xử lý sự kiện click
                                        storyView.setOnClickListener(v -> {
                                            // Chuyển hướng đến ActivityStory với các tham số cần thiết
                                            Intent intent = new Intent(context, ActivityStory.class);
                                            intent.putExtra("doc_id", docId);
                                            startActivity(intent);
                                        });

                                        // Thêm view vào LinearLayout
                                        linearViewedStories.addView(storyView);
                                    })
                                    .addOnFailureListener(exception -> {
                                        // Xử lý lỗi
                                        Log.e("displayViewedStories", "Error getting document", exception);
                                    });
                        }
                    }
                });
    }




}

