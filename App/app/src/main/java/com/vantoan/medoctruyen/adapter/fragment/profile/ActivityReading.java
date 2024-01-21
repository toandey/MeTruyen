package com.vantoan.medoctruyen.adapter.fragment.profile;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.speech.tts.TextToSpeech;
import android.speech.tts.UtteranceProgressListener;
import android.view.GestureDetector;
import android.view.MotionEvent;
import android.view.View;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.SeekBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.firestore.CollectionReference;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.FirebaseFirestoreException;
import com.google.firebase.firestore.QuerySnapshot;
import com.vantoan.medoctruyen.R;

import com.google.firebase.firestore.EventListener;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;
import java.util.Locale;

public class ActivityReading extends AppCompatActivity {
    private TextView tenChuong, tenChuong1, noiDungChuong;
    GestureDetector gestureDetector;
    private String chapterDocument, storyDocument;
    private FirebaseFirestore db;
    ArrayList<String> chapterList;
    int currentChapter;
    private static final int SWIPE_THRESHOLD_VELOCITY = 50;
    private static final int SWIPE_MIN_DISTANCE = 50;
    private static final int SWIPE_MAX_OFF_PATH = 50;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reading);

        Intent intent = getIntent();
        chapterDocument = intent.getStringExtra("chapter_document");
        storyDocument = intent.getStringExtra("story_document");

        tenChuong = findViewById(R.id.tenChuong);
        tenChuong1 = findViewById(R.id.tenChuong1);
        noiDungChuong = findViewById(R.id.noiDungChuong);
        LinearLayout back = findViewById(R.id.back);


        db = FirebaseFirestore.getInstance();

        getChapterData();

        chapterList = new ArrayList<>();
        currentChapter = -1;

        gestureDetector = new GestureDetector(this, new GestureDetector.OnGestureListener() {
            @Override
            public boolean onDown(MotionEvent e) {
                return true;
            }

            @Override
            public void onShowPress(MotionEvent e) {

            }

            @Override
            public boolean onSingleTapUp(MotionEvent e) {
                return false;
            }

            @Override
            public boolean onScroll(MotionEvent e1, MotionEvent e2, float distanceX, float distanceY) {
                return false;
            }

            @Override
            public void onLongPress(MotionEvent e) {

            }

            @Override
            public boolean onFling(MotionEvent e1, MotionEvent e2, float velocityX, float velocityY) {
                try {
                    // Nếu cử chỉ vuốt quá độ lệch cho phép, bỏ qua
                    if (Math.abs(e1.getY() - e2.getY()) > SWIPE_MAX_OFF_PATH) {
                        return false;
                    }

                    // Nếu cử chỉ vuốt sang trái
                    if (e1.getX() - e2.getX() > SWIPE_MIN_DISTANCE && Math.abs(velocityX) > SWIPE_THRESHOLD_VELOCITY) {
                        // Nếu chương hiện tại không phải là chương cuối cùng
                        if (currentChapter < chapterList.size() - 1) {
                            // Tăng vị trí currentChapter lên 1
                            currentChapter++;
                            // Lấy document của chương tiếp theo
                            chapterDocument = chapterList.get(currentChapter);
                            // Hiển thị nội dung của chương tiếp theo
                            getChapterData();
                        } else {
                            // Thông báo đã đến chương cuối cùng
                            Toast.makeText(ActivityReading.this, "Đây là chương cuối cùng của truyện", Toast.LENGTH_SHORT).show();
                        }
                    }

                    // Nếu cử chỉ vuốt sang phải
                    else if (e2.getX() - e1.getX() > SWIPE_MIN_DISTANCE && Math.abs(velocityX) > SWIPE_THRESHOLD_VELOCITY) {
                        // Nếu chương hiện tại không phải là chương đầu tiên
                        if (currentChapter > 0) {
                            // Giảm vị trí currentChapter xuống 1
                            currentChapter--;
                            // Lấy document của chương trước đó
                            chapterDocument = chapterList.get(currentChapter);
                            // Hiển thị nội dung của chương trước đó
                            getChapterData();
                        } else {
                            // Thông báo đã đến chương đầu tiên
                            Toast.makeText(ActivityReading.this, "Đây là chương đầu tiên của truyện", Toast.LENGTH_SHORT).show();
                        }
                    }
                } catch (Exception e) {
                    // Xử lý ngoại lệ
                    e.printStackTrace();
                }
                return false;
            }
        });

        CollectionReference chaptersRef = db.collection("stories").document(storyDocument).collection("chapters");

        chaptersRef.get().addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {
            @Override
            public void onComplete(@NonNull Task<QuerySnapshot> task) {
                if (task.isSuccessful()) {
                    List<DocumentSnapshot> sortedList = task.getResult().getDocuments();
                    Collections.sort(sortedList, new Comparator<DocumentSnapshot>() {
                        @Override
                        public int compare(DocumentSnapshot o1, DocumentSnapshot o2) {
                            Object thutu1Obj = o1.get("thutu");
                            Object thutu2Obj = o2.get("thutu");

                            if (thutu1Obj instanceof Number && thutu2Obj instanceof Number) {
                                // Both values are numbers, compare them
                                long thutu1 = ((Number) thutu1Obj).longValue();
                                long thutu2 = ((Number) thutu2Obj).longValue();
                                return Long.compare(thutu1, thutu2);
                            } else {
                                return 0;
                            }
                        }
                    });

                    for (DocumentSnapshot document : sortedList) {
                        chapterList.add(document.getId());
                        if (document.getId().equals(chapterDocument)) {
                            currentChapter = chapterList.size() - 1;
                        }
                    }
                } else {
                    // Xử lý lỗi
                    Toast.makeText(ActivityReading.this, "Lỗi: " + task.getException().getMessage(), Toast.LENGTH_SHORT).show();
                }
            }
        });

        noiDungChuong.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View v, MotionEvent event) {
                // Gọi phương thức onTouchEvent của gestureDetector
                return gestureDetector.onTouchEvent(event);
            }
        });

        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

    }

    private void getChapterData() {
        DocumentReference chapterRef = db.collection("stories").document(storyDocument).collection("chapters").document(chapterDocument);
        chapterRef.addSnapshotListener(new EventListener<DocumentSnapshot>() {
            @Override
            public void onEvent(@Nullable DocumentSnapshot snapshot, @Nullable FirebaseFirestoreException e) {
                if (e != null) {
                    Toast.makeText(ActivityReading.this, "Lỗi: " + e.getMessage(), Toast.LENGTH_SHORT).show();
                    return;
                }

                if (snapshot != null && snapshot.exists()) {
                    String title = snapshot.getString("title");
                    String content = snapshot.getString("content");

                    // Hiển thị dữ liệu lên các TextView
                    tenChuong.setText(title);
                    tenChuong1.setText(title);
                    noiDungChuong.setText(content);

                }
            }
        });
    }



}