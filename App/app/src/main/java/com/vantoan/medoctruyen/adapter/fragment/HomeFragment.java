package com.vantoan.medoctruyen.adapter.fragment;

import static androidx.constraintlayout.helper.widget.MotionEffect.TAG;

import static com.firebase.ui.auth.AuthUI.getApplicationContext;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.graphics.drawable.Drawable;
import android.os.Bundle;
import android.os.Handler;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.activity.OnBackPressedCallback;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import com.bumptech.glide.Glide;
import com.bumptech.glide.request.target.CustomTarget;
import com.bumptech.glide.request.transition.Transition;
import com.denzcoskun.imageslider.ImageSlider;
import com.denzcoskun.imageslider.constants.ScaleTypes;
import com.denzcoskun.imageslider.models.SlideModel;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.FirebaseFirestoreException;
import com.google.firebase.firestore.QueryDocumentSnapshot;
import com.google.firebase.firestore.QuerySnapshot;
import com.vantoan.medoctruyen.R;
import com.vantoan.medoctruyen.adapter.fragment.profile.ActivityAllStory;
import com.vantoan.medoctruyen.adapter.fragment.profile.ActivitySearchStory;
import com.vantoan.medoctruyen.adapter.fragment.profile.ActivityStory;
import com.bumptech.glide.load.MultiTransformation;
import com.bumptech.glide.load.resource.bitmap.CenterCrop;
import com.bumptech.glide.load.resource.bitmap.RoundedCorners;

import com.google.firebase.firestore.EventListener;

import java.util.ArrayList;

import java.util.List;

public class HomeFragment extends Fragment {

    private TextView[] tentruyenRanking = new TextView[9];
    private TextView[] theloaiRanking = new TextView[9];
    private ImageView[] imageRanking = new ImageView[9];
    private TextView[] tentruyenChonloc = new TextView[8];
    private TextView[] theloaiChonloc = new TextView[8];
    private ImageView[] imageChonloc = new ImageView[8];
    private TextView[] tentruyenMoi = new TextView[8];
    private TextView[] theloaiMoi = new TextView[8];
    private ImageView[] imageMoi = new ImageView[8];
    private TextView[] tentruyenDahoanthanh = new TextView[8];
    private TextView[] theloaiDahoanthanh = new TextView[8];
    private ImageView[] imageDahoanthanh = new ImageView[8];
    private ImageView banner1ImageView;
    private LinearLayout truyenDaHoanThanh, truyenMoiNhat;
    private ImageView banner2ImageView, iconSearch;
    private FirebaseFirestore db;

    private List<String> storyDocs = new ArrayList<>();
    private boolean doubleBackToExitPressedOnce = false;
    private List<String> storyChonloc = new ArrayList<>();


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        View view = inflater.inflate(R.layout.fragment_home, container, false);

        db = FirebaseFirestore.getInstance();

        banner1ImageView = view.findViewById(R.id.banner1);
        banner2ImageView = view.findViewById(R.id.banner2);
        iconSearch = view.findViewById(R.id.searchIcon);

        tentruyenRanking[0] = view.findViewById(R.id.tentruyenRanking1);
        tentruyenRanking[1] = view.findViewById(R.id.tentruyenRanking2);
        tentruyenRanking[2] = view.findViewById(R.id.tentruyenRanking3);
        tentruyenRanking[3] = view.findViewById(R.id.tentruyenRanking4);
        tentruyenRanking[4] = view.findViewById(R.id.tentruyenRanking5);
        tentruyenRanking[5] = view.findViewById(R.id.tentruyenRanking6);
        tentruyenRanking[6] = view.findViewById(R.id.tentruyenRanking7);
        tentruyenRanking[7] = view.findViewById(R.id.tentruyenRanking8);
        tentruyenRanking[8] = view.findViewById(R.id.tentruyenRanking9);

        theloaiRanking[0] = view.findViewById(R.id.theloaiRanking1);
        theloaiRanking[1] = view.findViewById(R.id.theloaiRanking2);
        theloaiRanking[2] = view.findViewById(R.id.theloaiRanking3);
        theloaiRanking[3] = view.findViewById(R.id.theloaiRanking4);
        theloaiRanking[4] = view.findViewById(R.id.theloaiRanking5);
        theloaiRanking[5] = view.findViewById(R.id.theloaiRanking6);
        theloaiRanking[6] = view.findViewById(R.id.theloaiRanking7);
        theloaiRanking[7] = view.findViewById(R.id.theloaiRanking8);
        theloaiRanking[8] = view.findViewById(R.id.theloaiRanking9);

        imageRanking[0] = view.findViewById(R.id.imageRanking1);
        imageRanking[1] = view.findViewById(R.id.imageRanking2);
        imageRanking[2] = view.findViewById(R.id.imageRanking3);
        imageRanking[3] = view.findViewById(R.id.imageRanking4);
        imageRanking[4] = view.findViewById(R.id.imageRanking5);
        imageRanking[5] = view.findViewById(R.id.imageRanking6);
        imageRanking[6] = view.findViewById(R.id.imageRanking7);
        imageRanking[7] = view.findViewById(R.id.imageRanking8);
        imageRanking[8] = view.findViewById(R.id.imageRanking9);

        tentruyenChonloc[0] = view.findViewById(R.id.tentruyenChonloc1);
        tentruyenChonloc[1] = view.findViewById(R.id.tentruyenChonloc2);
        tentruyenChonloc[2] = view.findViewById(R.id.tentruyenChonloc3);
        tentruyenChonloc[3] = view.findViewById(R.id.tentruyenChonloc4);
        tentruyenChonloc[4] = view.findViewById(R.id.tentruyenChonloc5);
        tentruyenChonloc[5] = view.findViewById(R.id.tentruyenChonloc6);
        tentruyenChonloc[6] = view.findViewById(R.id.tentruyenChonloc7);
        tentruyenChonloc[7] = view.findViewById(R.id.tentruyenChonloc8);

        theloaiChonloc[0] = view.findViewById(R.id.theloaiChonloc1);
        theloaiChonloc[1] = view.findViewById(R.id.theloaiChonloc2);
        theloaiChonloc[2] = view.findViewById(R.id.theloaiChonloc3);
        theloaiChonloc[3] = view.findViewById(R.id.theloaiChonloc4);
        theloaiChonloc[4] = view.findViewById(R.id.theloaiChonloc5);
        theloaiChonloc[5] = view.findViewById(R.id.theloaiChonloc6);
        theloaiChonloc[6] = view.findViewById(R.id.theloaiChonloc7);
        theloaiChonloc[7] = view.findViewById(R.id.theloaiChonloc8);

        imageChonloc[0] = view.findViewById(R.id.imageChonloc1);
        imageChonloc[1] = view.findViewById(R.id.imageChonloc2);
        imageChonloc[2] = view.findViewById(R.id.imageChonloc3);
        imageChonloc[3] = view.findViewById(R.id.imageChonloc4);
        imageChonloc[4] = view.findViewById(R.id.imageChonloc5);
        imageChonloc[5] = view.findViewById(R.id.imageChonloc6);
        imageChonloc[6] = view.findViewById(R.id.imageChonloc7);
        imageChonloc[7] = view.findViewById(R.id.imageChonloc8);

        tentruyenMoi[0] = view.findViewById(R.id.tentruyenMoi1);
        tentruyenMoi[1] = view.findViewById(R.id.tentruyenMoi2);
        tentruyenMoi[2] = view.findViewById(R.id.tentruyenMoi3);
        tentruyenMoi[3] = view.findViewById(R.id.tentruyenMoi4);
        tentruyenMoi[4] = view.findViewById(R.id.tentruyenMoi5);
        tentruyenMoi[5] = view.findViewById(R.id.tentruyenMoi6);
        tentruyenMoi[6] = view.findViewById(R.id.tentruyenMoi7);
        tentruyenMoi[7] = view.findViewById(R.id.tentruyenMoi8);

        theloaiMoi[0] = view.findViewById(R.id.theloaiMoi1);
        theloaiMoi[1] = view.findViewById(R.id.theloaiMoi2);
        theloaiMoi[2] = view.findViewById(R.id.theloaiMoi3);
        theloaiMoi[3] = view.findViewById(R.id.theloaiMoi4);
        theloaiMoi[4] = view.findViewById(R.id.theloaiMoi5);
        theloaiMoi[5] = view.findViewById(R.id.theloaiMoi6);
        theloaiMoi[6] = view.findViewById(R.id.theloaiMoi7);
        theloaiMoi[7] = view.findViewById(R.id.theloaiMoi8);

        imageMoi[0] = view.findViewById(R.id.imageMoi1);
        imageMoi[1] = view.findViewById(R.id.imageMoi2);
        imageMoi[2] = view.findViewById(R.id.imageMoi3);
        imageMoi[3] = view.findViewById(R.id.imageMoi4);
        imageMoi[4] = view.findViewById(R.id.imageMoi5);
        imageMoi[5] = view.findViewById(R.id.imageMoi6);
        imageMoi[6] = view.findViewById(R.id.imageMoi7);
        imageMoi[7] = view.findViewById(R.id.imageMoi8);

        tentruyenDahoanthanh[0] = view.findViewById(R.id.tentruyenDahoanthanh1);
        tentruyenDahoanthanh[1] = view.findViewById(R.id.tentruyenDahoanthanh2);
        tentruyenDahoanthanh[2] = view.findViewById(R.id.tentruyenDahoanthanh3);
        tentruyenDahoanthanh[3] = view.findViewById(R.id.tentruyenDahoanthanh4);
        tentruyenDahoanthanh[4] = view.findViewById(R.id.tentruyenDahoanthanh5);
        tentruyenDahoanthanh[5] = view.findViewById(R.id.tentruyenDahoanthanh6);
        tentruyenDahoanthanh[6] = view.findViewById(R.id.tentruyenDahoanthanh7);
        tentruyenDahoanthanh[7] = view.findViewById(R.id.tentruyenDahoanthanh8);

        theloaiDahoanthanh[0] = view.findViewById(R.id.theloaiDahoanthanh1);
        theloaiDahoanthanh[1] = view.findViewById(R.id.theloaiDahoanthanh2);
        theloaiDahoanthanh[2] = view.findViewById(R.id.theloaiDahoanthanh3);
        theloaiDahoanthanh[3] = view.findViewById(R.id.theloaiDahoanthanh4);
        theloaiDahoanthanh[4] = view.findViewById(R.id.theloaiDahoanthanh5);
        theloaiDahoanthanh[5] = view.findViewById(R.id.theloaiDahoanthanh6);
        theloaiDahoanthanh[6] = view.findViewById(R.id.theloaiDahoanthanh7);
        theloaiDahoanthanh[7] = view.findViewById(R.id.theloaiDahoanthanh8);

        imageDahoanthanh[0] = view.findViewById(R.id.imageDahoanthanh1);
        imageDahoanthanh[1] = view.findViewById(R.id.imageDahoanthanh2);
        imageDahoanthanh[2] = view.findViewById(R.id.imageDahoanthanh3);
        imageDahoanthanh[3] = view.findViewById(R.id.imageDahoanthanh4);
        imageDahoanthanh[4] = view.findViewById(R.id.imageDahoanthanh5);
        imageDahoanthanh[5] = view.findViewById(R.id.imageDahoanthanh6);
        imageDahoanthanh[6] = view.findViewById(R.id.imageDahoanthanh7);
        imageDahoanthanh[7] = view.findViewById(R.id.imageDahoanthanh8);

        truyenDaHoanThanh = view.findViewById(R.id.truyenDaHoanThanh);
        truyenMoiNhat = view.findViewById(R.id.truyenMoiNhat);


        truyenDaHoanThanh.setOnClickListener(v -> {
            Intent intent = new Intent(getContext(), ActivityAllStory.class);
            intent.putExtra("storyType", "truyenFull");
            startActivity(intent);
        });

        truyenMoiNhat.setOnClickListener(v -> {
            Intent intent = new Intent(getContext(), ActivityAllStory.class);
            intent.putExtra("storyType", "truyenMoi");
            startActivity(intent);
        });

        loadBanner("banner1", banner1ImageView);
        loadBanner("banner2", banner2ImageView);

        ImageSlider imageSlider = view.findViewById(R.id.image_slider);

        List<SlideModel> slideModels = new ArrayList<>();

        db.collection("slider").addSnapshotListener(new EventListener<QuerySnapshot>() {
            @Override
            public void onEvent(@Nullable QuerySnapshot value, @Nullable FirebaseFirestoreException error) {
                if (error != null) {
                    // Xử lý lỗi nếu có
                    Log.w("Error", "Listen failed.", error);
                    return;
                }
                // Xóa danh sách ảnh cũ
                slideModels.clear();
                // Duyệt qua các document trong snapshot
                for (QueryDocumentSnapshot document : value) {
                    // Lấy link ảnh và storyid từ trường image và storyid
                    String imageUrl = document.getString("image");
                    String storyId = document.getString("storyid");
                    // Thêm một SlideModel mới vào danh sách với link ảnh và storyid
                    slideModels.add(new SlideModel(imageUrl, ScaleTypes.FIT));
                }
                // Đặt danh sách ảnh mới cho ImageSlider
                imageSlider.setImageList(slideModels);
            }
        });

        iconSearch.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getActivity(), ActivitySearchStory.class);
                startActivity(intent);
            }
        });

        DocumentReference docRef = db.collection("danhsach").document("bangxephang");
        docRef.addSnapshotListener(new EventListener<DocumentSnapshot>() {
            @Override
            public void onEvent(@Nullable DocumentSnapshot documentSnapshot, @Nullable FirebaseFirestoreException e) {
                if (e != null) {
                    Log.w(TAG, "Listen failed.", e);
                    return;
                }

                if (documentSnapshot != null && documentSnapshot.exists()) {
                    // Dữ liệu đã thay đổi, cập nhật danh sách storyDocs và hiển thị lại thông tin
                    storyDocs.clear();
                    for (int i = 1; i <= 9; i++) {
                        String doc = documentSnapshot.getString(String.valueOf(i));
                        storyDocs.add(doc);
                    }
                    showStoryInfo();
                } else {
                    Log.d(TAG, "Current data: null");
                }
            }
        });



        DocumentReference docRef2 = db.collection("danhsach").document("chonloc");
        docRef2.addSnapshotListener(new EventListener<DocumentSnapshot>() {
            @Override
            public void onEvent(@Nullable DocumentSnapshot documentSnapshot, @Nullable FirebaseFirestoreException e) {
                if (e != null) {
                    Log.w(TAG, "Listen failed.", e);
                    return;
                }

                if (documentSnapshot != null && documentSnapshot.exists()) {
                    // Dữ liệu đã thay đổi, cập nhật danh sách storyChonloc và hiển thị lại thông tin
                    storyChonloc.clear();
                    for (int i = 1; i <= 8; i++) {
                        String doc = documentSnapshot.getString(String.valueOf(i));
                        storyChonloc.add(doc);
                    }
                    showStoryChonloc();
                } else {
                    Log.d(TAG, "Current data: null");
                }
            }
        });


        db.collection("stories")
                .whereEqualTo("trang_thai", "Mới")
                .limit(8)
                .get()
                .addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {
                    @Override
                    public void onComplete(@NonNull Task<QuerySnapshot> task) {
                        if (task.isSuccessful()) {
                            int index = 0;  // Initialize index variable outside the loop
                            for (QueryDocumentSnapshot document : task.getResult()) {
                                // Use the 'index' variable directly
                                String ten_truyen = document.getString("ten_truyen");
                                String the_loai = document.getString("the_loai");
                                String anh_bia = document.getString("anh_bia");

                                tentruyenMoi[index].setText(ten_truyen);
                                theloaiMoi[index].setText(the_loai);


                                if (isAdded()) {
                                    Glide.with(getContext())
                                            .load(anh_bia)
                                            .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                                            .into(imageMoi[index]);
                                }

                                final int finalIndex = index;  // Create a final variable for the click listener
                                imageMoi[index].setOnClickListener(new View.OnClickListener() {
                                    @Override
                                    public void onClick(View v) {
                                        Intent intent = new Intent(getContext(), ActivityStory.class);
                                        intent.putExtra("doc_id", document.getId());
                                        startActivity(intent);
                                    }
                                });

                                // Increment the index
                                index++;
                            }
                        }
                    }
                });

        db.collection("stories")
                .whereEqualTo("trang_thai", "Đã hoàn thành")
                .limit(8)
                .get()
                .addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {
                    @Override
                    public void onComplete(@NonNull Task<QuerySnapshot> task) {
                        if (task.isSuccessful()) {
                            int index = 0;  // Initialize index variable outside the loop
                            for (QueryDocumentSnapshot document : task.getResult()) {
                                // Use the 'index' variable directly
                                String ten_truyen = document.getString("ten_truyen");
                                String the_loai = document.getString("the_loai");
                                String anh_bia = document.getString("anh_bia");

                                tentruyenDahoanthanh[index].setText(ten_truyen);
                                theloaiDahoanthanh[index].setText(the_loai);

                                if (isAdded()) {
                                    Glide.with(getContext())
                                            .load(anh_bia)
                                            .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                                            .into(imageDahoanthanh[index]);
                                }

                                final int finalIndex = index;  // Create a final variable for the click listener
                                imageDahoanthanh[index].setOnClickListener(new View.OnClickListener() {
                                    @Override
                                    public void onClick(View v) {
                                        Intent intent = new Intent(getContext(), ActivityStory.class);
                                        intent.putExtra("doc_id", document.getId());
                                        startActivity(intent);
                                    }
                                });

                                // Increment the index
                                index++;
                            }
                        }
                    }
                });



        return view;
    }

    private void showStoryInfo() {
        // Lấy tất cả các document trong bảng stories
        db.collection("stories").get().addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {
            @Override
            public void onComplete(@NonNull Task<QuerySnapshot> task) {
                // Nếu task thành công
                if (task.isSuccessful()) {
                    // Duyệt qua các document trong kết quả
                    for (QueryDocumentSnapshot document : task.getResult()) {
                        // Nếu document có trong danh sách storyDocs
                        if (storyDocs.contains(document.getId())) {
                            // Lấy vị trí của document trong danh sách storyDocs
                            int index = storyDocs.indexOf(document.getId());
                            // Lấy các trường cần thiết từ document
                            String ten_truyen = document.getString("ten_truyen");
                            String the_loai = document.getString("the_loai");
                            String anh_bia = document.getString("anh_bia");
                            // Hiển thị ten_truyen vào TextView tương ứng
                            tentruyenRanking[index].setText(ten_truyen);
                            // Hiển thị the_loai vào TextView tương ứng
                            theloaiRanking[index].setText(the_loai);

                            if (isAdded()) {
                                Glide.with(getContext())
                                        .load(anh_bia)
                                        .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                                        .into(imageRanking[index]);
                            }

                            // Thiết lập sự kiện click cho ImageView
                            imageRanking[index].setOnClickListener(new View.OnClickListener() {
                                @Override
                                public void onClick(View v) {
                                    // Chuyển hướng đến StoryActivity để hiển thị chi tiết truyện
                                    Intent intent = new Intent(getContext(), ActivityStory.class);
                                    // Truyền document id của truyện qua intent
                                    intent.putExtra("doc_id", document.getId());
                                    // Bắt đầu activity
                                    startActivity(intent);
                                }
                            });
                        }
                    }
                }
            }
        });
    }

    private void showStoryChonloc() {
        // Lấy tất cả các document trong bảng stories
        db.collection("stories").get().addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {
            @Override
            public void onComplete(@NonNull Task<QuerySnapshot> task) {
                // Nếu task thành công
                if (task.isSuccessful()) {
                    // Duyệt qua các document trong kết quả
                    for (QueryDocumentSnapshot document : task.getResult()) {
                        // Nếu document có trong danh sách storyChonloc
                        if (storyChonloc.contains(document.getId())) {
                            // Lấy vị trí của document trong danh sách storyChonloc
                            int index = storyChonloc.indexOf(document.getId());
                            // Lấy các trường cần thiết từ document
                            String ten_truyen = document.getString("ten_truyen");
                            String the_loai = document.getString("the_loai");
                            String anh_bia = document.getString("anh_bia");
                            // Hiển thị ten_truyen vào TextView tương ứng
                            tentruyenChonloc[index].setText(ten_truyen);
                            // Hiển thị the_loai vào TextView tương ứng
                            theloaiChonloc[index].setText(the_loai);

                            if (isAdded()) {
                                Glide.with(getContext())
                                        .load(anh_bia)
                                        .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                                        .into(imageChonloc[index]);
                            }

                            imageChonloc[index].setOnClickListener(new View.OnClickListener() {
                                @Override
                                public void onClick(View v) {
                                    // Chuyển hướng đến StoryActivity để hiển thị chi tiết truyện
                                    Intent intent = new Intent(getContext(), ActivityStory.class);
                                    // Truyền document id của truyện qua intent
                                    intent.putExtra("doc_id", document.getId());
                                    // Bắt đầu activity
                                    startActivity(intent);
                                }
                            });
                        }
                    }
                }
            }
        });
    }
    private void loadBanner(String bannerId, ImageView imageView) {
        db.collection("banner").document(bannerId)
                .addSnapshotListener((documentSnapshot, e) -> {
                    if (e != null) {
                        // Handle the error
                        return;
                    }

                    if (documentSnapshot != null && documentSnapshot.exists()) {
                        String imageUrl = documentSnapshot.getString("image");
                        String docId = documentSnapshot.getString("doc_id");

                        if (isAdded()) {
                            Glide.with(getContext())
                                    .load(imageUrl)
                                    .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                                    .into(imageView);
                        }

                        imageView.setOnClickListener(v -> {
                            Intent intent = new Intent(getActivity(), ActivityStory.class);
                            intent.putExtra("doc_id", docId);
                            startActivity(intent);
                        });
                    }
                });
    }

    @Override
    public void onResume() {
        super.onResume();

        // Reset the flag when the fragment is resumed
        doubleBackToExitPressedOnce = false;
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);

        // Attach OnBackPressedCallback to the fragment's requireActivity()
        requireActivity().getOnBackPressedDispatcher().addCallback(getViewLifecycleOwner(), new OnBackPressedCallback(true) {
            @Override
            public void handleOnBackPressed() {
                if (doubleBackToExitPressedOnce) {
                    // Perform the exit action or close the app
                    requireActivity().finish();
                } else {
                    // Inform the user to press back again to exit
                    Toast.makeText(requireContext(), "Chạm lần nữa để thoát", Toast.LENGTH_SHORT).show();
                    doubleBackToExitPressedOnce = true;

                    // Reset the flag after a certain duration
                    new Handler().postDelayed(() -> doubleBackToExitPressedOnce = false, 2000); // 2000 milliseconds (2 seconds)
                }
            }
        });
    }

}
