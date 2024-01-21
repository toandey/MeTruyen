package com.vantoan.medoctruyen.adapter.fragment.profile;

import static androidx.constraintlayout.helper.widget.MotionEffect.TAG;

import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import com.bumptech.glide.Glide;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.Timestamp;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.firestore.CollectionReference;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.FieldValue;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.FirebaseFirestoreException;
import com.google.firebase.firestore.QuerySnapshot;
import com.vantoan.medoctruyen.R;

import com.bumptech.glide.load.MultiTransformation;
import com.bumptech.glide.load.resource.bitmap.CenterCrop;
import com.bumptech.glide.load.resource.bitmap.RoundedCorners;

import java.util.Date;
import com.google.firebase.firestore.EventListener;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class ActivityStory extends AppCompatActivity {

    private ImageView imgStory, btnReadMore;
    private TextView tvStoryName, tvAuthor, tvGenre, tvStatus, tvDesShort, tvDesFull, tvDes, tvViewStory, statusReading;
    private TextView[] chuongTextViews = new TextView[5];
    private LinearLayout xemThem;
    private String storyDocument;
    private TextView fullChapter;
    private ImageView back;
    private ImageView img_favorite;
    private FirebaseFirestore db = FirebaseFirestore.getInstance();
    private FirebaseAuth auth = FirebaseAuth.getInstance();
    private String userEmail;
    private String docId;

    private boolean isExpanded = false;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_story);

        Window window = getWindow();
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        window.setStatusBarColor(Color.WHITE);

        img_favorite = findViewById(R.id.img_favorite);
        userEmail = auth.getCurrentUser().getEmail();

        // Ánh xạ các thành phần giao diện
        imgStory = findViewById(R.id.img_story);
        tvStoryName = findViewById(R.id.tv_story_name);
        tvAuthor = findViewById(R.id.tv_author);
        tvViewStory  = findViewById(R.id.tv_view_story);
        tvGenre = findViewById(R.id.tv_genre);
        tvStatus = findViewById(R.id.tv_status);
        tvDesShort = findViewById(R.id.tv_des_short);
        tvDesFull = findViewById(R.id.tv_des_full);
        btnReadMore = findViewById(R.id.read_more);
        tvDes = findViewById(R.id.tv_des);
        xemThem = findViewById(R.id.xemthem);
        fullChapter = findViewById(R.id.fullChapter);
        chuongTextViews[0] = findViewById(R.id.chuong1);
        chuongTextViews[1] = findViewById(R.id.chuong2);
        chuongTextViews[2] = findViewById(R.id.chuong3);
        chuongTextViews[3] = findViewById(R.id.chuong4);
        chuongTextViews[4] = findViewById(R.id.chuong5);

        LinearLayout btnReading = findViewById(R.id.btn_reading);
        LinearLayout favorite = findViewById(R.id.favorite);
        statusReading = findViewById(R.id.statusReading);

        ImageView backButton = findViewById(R.id.backButton);

        backButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Xử lý sự kiện khi ImageView nút back được nhấn
                finish(); // Đóng activity UserManual và quay lại trang trước
            }
        });


        // Nhận thông tin từ Intent
        Bundle extras = getIntent().getExtras();
        if (extras != null) {
            docId = extras.getString("doc_id");
            String description = extras.getString("description");

            // Lấy thông tin từ Firestore dựa trên docId
            loadStoryInfoFromFirestore(docId);
            // Cập nhật giao diện với một phần nội dung mô tả
            updateDescription(description);
            increaseAndViewStory(docId);
            loadFirst5Chapters(docId);
            checkFavoriteStatus(docId);
            saveStoryToFirestore(userEmail, docId);

        }

        favorite.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                toggleFavorite(docId);
            }
        });

        xemThem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Khi nhấn "Xem thêm", kiểm tra trạng thái và mở rộng hoặc thu gọn nội dung
                isExpanded = !isExpanded;
                updateDescriptionState();
            }
        });

        fullChapter.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(ActivityStory.this, ActivityAllChapter.class);
                intent.putExtra("doc_id", docId);
                startActivity(intent);
            }
        });

        String userEmail = FirebaseAuth.getInstance().getCurrentUser().getEmail();
        DocumentReference userDocRef = db.collection("truyendadoc").document(userEmail)
                .collection("stories").document(storyDocument);

        userDocRef.addSnapshotListener(new EventListener<DocumentSnapshot>() {
            @Override
            public void onEvent(@Nullable DocumentSnapshot snapshot,
                                @Nullable FirebaseFirestoreException e) {
                if (e != null) {
                    Log.w("ActivityStory", "Listen failed.", e);
                    return;
                }

                if (snapshot != null && snapshot.exists()) {
                    // Người dùng đã đọc, lấy chapter_document gần nhất
                    String lastReadChapter = snapshot.getString("chapter_document");
                    statusReading.setText("Đọc tiếp");
                    btnReading.setOnClickListener(v -> {
                        // Chuyển hướng đến ActivityReading với chapter_document gần nhất
                        Intent intent = new Intent(ActivityStory.this, ActivityReading.class);
                        intent.putExtra("chapter_document", lastReadChapter);
                        intent.putExtra("story_document", storyDocument);
                        startActivity(intent);
                    });
                } else {
                    // Người dùng chưa đọc, đặt text là "Đọc truyện"
                    statusReading.setText("Bắt đầu đọc");
                    btnReading.setOnClickListener(v -> {
                        // Chuyển hướng đến ActivityReading với Chương 1
                        Intent intent = new Intent(ActivityStory.this, ActivityReading.class);
                        intent.putExtra("chapter_document", "Chương 1");
                        intent.putExtra("story_document", storyDocument);
                        startActivity(intent);
                    });
                }
            }
        });
    }

    private void loadStoryInfoFromFirestore(String docId) {
        FirebaseFirestore db = FirebaseFirestore.getInstance();
        storyDocument = docId;
        db.collection("stories").document(docId)
                .get()
                .addOnCompleteListener(new OnCompleteListener<DocumentSnapshot>() {
                    @Override
                    public void onComplete(@NonNull Task<DocumentSnapshot> task) {
                        if (task.isSuccessful()) {
                            DocumentSnapshot document = task.getResult();
                            if (document.exists()) {
                                // Lấy thông tin từ DocumentSnapshot
                                String storyName = document.getString("ten_truyen");
                                String author = document.getString("tac_gia");
                                String genre = document.getString("the_loai");
                                String status = document.getString("trang_thai");
                                String description = document.getString("tom_tat");
                                String imageUrl = document.getString("anh_bia");
                                Long viewStory = document.getLong("view_story");

                                // Cập nhật giao diện với thông tin truyện
                                updateUIWithStoryInfo(storyName, author, genre, status, description, imageUrl, viewStory);

                                ImageView imgShare = findViewById(R.id.img_share);
                                Intent shareIntent = new Intent(Intent.ACTION_SEND);
                                shareIntent.setType("text/plain");
                                String shareText = "Đọc truyện " + storyName + " của tác giả " + author + " ngay hôm nay tại ứng dụng Mê Truyện! Tải ngay tại: https://bit.ly/MeTruyen";
                                shareIntent.putExtra(Intent.EXTRA_TEXT, shareText);
                                imgShare.setOnClickListener(new View.OnClickListener() {
                                    @Override
                                    public void onClick(View v) {
                                        // Mở một menu để chọn ứng dụng để chia sẻ
                                        startActivity(Intent.createChooser(shareIntent, "Chia sẻ truyện"));
                                    }
                                });
                            }
                        }
                    }
                });
    }

    private void updateUIWithStoryInfo(String storyName, String author, String genre, String status, String description, String imageUrl, Long viewStory) {
        String capitalizedStoryName = capitalizeEachWord(storyName);
        tvStoryName.setText(capitalizedStoryName);
        tvAuthor.setText(author);
        tvGenre.setText(genre);
        tvStatus.setText(status);
        tvViewStory.setText("Lượt xem: " + String.valueOf(viewStory));

        // Sử dụng thư viện Glide để tải ảnh bìa
        Glide.with(this)
                .load(imageUrl)
                .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                .into(imgStory);

        updateDescription(description);
    }

    private void updateDescription(String description) {
        if (description != null) {
            // Giới hạn số ký tự hiển thị ban đầu (ví dụ: 100)
            int maxLength = 100;
            if (description.length() > maxLength) {
                // Hiển thị một phần nội dung mô tả ban đầu
                String shortDescription = description.substring(0, maxLength);
                tvDesShort.setText(shortDescription + "...");
                tvDesFull.setText(description);
                btnReadMore.setVisibility(View.VISIBLE); // Hiển thị nút "Xem thêm"
            } else {
                // Hiển thị toàn bộ nội dung mô tả
                tvDesShort.setText(description);
                tvDesFull.setVisibility(View.GONE); // Ẩn TextView hiển thị toàn bộ nội dung
                btnReadMore.setVisibility(View.GONE); // Ẩn nút "Xem thêm"
            }
        } else {
            // Nếu description là null, xử lý tùy thuộc vào yêu cầu của bạn,
            // có thể hiển thị một giá trị mặc định hoặc ẩn các thành phần liên quan đến mô tả.
        }

        // Cập nhật trạng thái của nội dung mô tả (đã mở rộng hay chưa)
        isExpanded = false;
        updateDescriptionState();
    }

    private void updateDescriptionState() {
        // Nếu đang mở rộng, hiển thị toàn bộ nội dung
        if (isExpanded) {
            tvDesShort.setVisibility(View.GONE); // Ẩn TextView hiển thị một phần nội dung
            tvDesFull.setVisibility(View.VISIBLE); // Hiển thị TextView hiển thị toàn bộ nội dung
            tvDes.setText("Thu gọn");
            // Đặt biểu tượng lên
            btnReadMore.setImageResource(R.drawable.up);
        } else {
            // Ngược lại, giới hạn số dòng hiển thị
            tvDesShort.setVisibility(View.VISIBLE); // Hiển thị TextView hiển thị một phần nội dung
            tvDesFull.setVisibility(View.GONE); // Ẩn TextView hiển thị toàn bộ nội dung
            tvDes.setText("Xem thêm");
            // Đặt biểu tượng xuống
            btnReadMore.setImageResource(R.drawable.down);
        }
    }

    private void loadFirst5Chapters(String docId) {
        FirebaseFirestore db = FirebaseFirestore.getInstance();
        CollectionReference chaptersRef = db.collection("stories").document(docId).collection("chapters");

        // Lấy 5 chương đầu tiên
        chaptersRef.limit(5).get().addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {
            @Override
            public void onComplete(@NonNull Task<QuerySnapshot> task) {
                if (task.isSuccessful()) {
                    List<DocumentSnapshot> chapters = task.getResult().getDocuments();

                    // Hiển thị chương trên giao diện
                    displayChapters(chapters);
                } else {
                    // Xử lý khi không thành công
                }
            }
        });
    }

    private void displayChapters(List<DocumentSnapshot> chapters) {
        // Lặp qua mảng TextView để cập nhật nội dung và thiết lập sự kiện
        for (int i = 0; i < chuongTextViews.length; i++) {
            if (i < chapters.size()) {
                final int index = i;
                chuongTextViews[i].setText(chapters.get(i).getString("title"));
                chuongTextViews[i].setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        // Xử lý chuyển hướng đến ReadingActivity với document của chương và document của truyện
                        Intent intent = new Intent(ActivityStory.this, ActivityReading.class);
                        intent.putExtra("chapter_document", chapters.get(index).getId());
                        intent.putExtra("story_document", storyDocument); // Truyền document của collection "stories"
                        startActivity(intent);

                        saveStoryToFirestore(userEmail, docId, chapters.get(index).getId());
                    }
                });
            } else {
                // Nếu chương ít hơn 5, hiển thị "Đang cập nhật"
                chuongTextViews[i].setText("Đang cập nhật");
                chuongTextViews[i].setOnClickListener(null); // Vô hiệu hóa sự kiện click
            }
        }
    }

    private void increaseAndViewStory(String docId) {
        // Lấy reference đến document trong Firestore
        DocumentReference storyRef = FirebaseFirestore.getInstance().collection("stories").document(docId);

        // Tăng giá trị view_story lên 1 bằng cách sử dụng FieldValue.increment(1)
        storyRef.update("view_story", FieldValue.increment(1))
                .addOnSuccessListener(new OnSuccessListener<Void>() {
                    @Override
                    public void onSuccess(Void unused) {
                        // Cập nhật thành công
                        Log.d(TAG, "View_story incremented successfully!");
                    }
                })
                .addOnFailureListener(new OnFailureListener() {
                    @Override
                    public void onFailure(@NonNull Exception e) {
                        // Xử lý khi có lỗi xảy ra
                        Log.e(TAG, "Error incrementing view_story", e);
                    }
                });
    }

    private void toggleFavorite(String docId) {
        DocumentReference favoriteRef = db.collection("truyenyeuthich").document(userEmail);
        favoriteRef.collection("stories").document(docId).get().addOnCompleteListener(new OnCompleteListener<DocumentSnapshot>() {
            @Override
            public void onComplete(@NonNull Task<DocumentSnapshot> task) {
                if (task.isSuccessful()) {
                    DocumentSnapshot document = task.getResult();
                    if (document.exists()) {
                        // Truyện đã được yêu thích, xoá khỏi Firestore và cập nhật biểu tượng
                        favoriteRef.collection("stories").document(docId).delete();
                        img_favorite.setImageResource(R.drawable.favorite_off);
                        Toast.makeText(ActivityStory.this, "Đã xoá truyện yêu thích!", Toast.LENGTH_SHORT).show();
                    } else {
                        // Truyện chưa được yêu thích, thêm vào Firestore và cập nhật biểu tượng
                        Map<String, Object> storyData = new HashMap<>();
                        storyData.put("doc_id", docId);
                        favoriteRef.collection("stories").document(docId).set(storyData);
                        img_favorite.setImageResource(R.drawable.favorite);
                        Toast.makeText(ActivityStory.this, "Đã thêm truyện yêu thích!", Toast.LENGTH_SHORT).show();
                    }
                } else {
                    Log.d("ActivityStory", "Failed with: ", task.getException());
                }
            }
        });
    }

    private void checkFavoriteStatus(String docId) {
        db.collection("truyenyeuthich").document(userEmail).collection("stories").document(docId).get().addOnCompleteListener(new OnCompleteListener<DocumentSnapshot>() {
            @Override
            public void onComplete(@NonNull Task<DocumentSnapshot> task) {
                if (task.isSuccessful()) {
                    DocumentSnapshot document = task.getResult();
                    if (document.exists()) {
                        img_favorite.setImageResource(R.drawable.favorite);
                    } else {
                        img_favorite.setImageResource(R.drawable.favorite_off);
                    }
                } else {
                    Log.d("ActivityStory", "Failed with: ", task.getException());
                }
            }
        });
    }

    private void saveStoryToFirestore(String userEmail, String docId) {
        Map<String, Object> storyData = new HashMap<>();
        storyData.put("doc_id", docId);
        storyData.put("timestamp", new Timestamp(new Date()));

        db.collection("truyendaxem")
                .document(userEmail)
                .collection("stories")
                .document(docId)
                .set(storyData)
                .addOnSuccessListener(aVoid -> {
                    Log.d("Firestore", "Story successfully saved!");
                })
                .addOnFailureListener(e -> {
                    Log.w("Firestore", "Error saving story", e);
                });
    }

    private void saveStoryToFirestore(String userEmail, String docId, String chapterDocument) {
        Map<String, Object> storyData = new HashMap<>();
        storyData.put("doc_id", docId);
        storyData.put("timestamp", new Timestamp(new Date()));
        storyData.put("chapter_document", chapterDocument); // Thêm thông tin về chương đọc

        db.collection("truyendadoc")
                .document(userEmail)
                .collection("stories")
                .document(docId)
                .set(storyData)
                .addOnSuccessListener(aVoid -> {
                    Log.d("Firestore", "Story successfully saved!");
                })
                .addOnFailureListener(e -> {
                    Log.w("Firestore", "Error saving story", e);
                });
    }

    private String capitalizeEachWord(String input) {
        if (input == null || input.isEmpty()) {
            return "";
        }

        // Chia chuỗi thành các từ
        String[] words = input.split("\\s+");

        // Chuyển đổi chữ cái đầu tiên của mỗi từ thành chữ hoa
        StringBuilder result = new StringBuilder();
        for (String word : words) {
            if (word.length() > 1) {
                result.append(Character.toUpperCase(word.charAt(0)))
                        .append(word.substring(1)).append(" ");
            } else {
                result.append(Character.toUpperCase(word.charAt(0))).append(" ");
            }
        }

        // Loại bỏ dấu cách thừa ở cuối
        return result.toString().trim();
    }


}
