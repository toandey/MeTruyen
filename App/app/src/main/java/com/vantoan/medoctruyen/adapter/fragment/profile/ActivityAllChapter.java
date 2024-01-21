package com.vantoan.medoctruyen.adapter.fragment.profile;

import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.view.WindowManager;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.firestore.FieldPath;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.QueryDocumentSnapshot;
import com.google.firebase.firestore.QuerySnapshot;
import com.vantoan.medoctruyen.R;

import java.util.ArrayList;
import java.util.List;

public class ActivityAllChapter extends AppCompatActivity {

    private RecyclerView recyclerviewListChapter;
    private ChapterAdapter chapterAdapter;
    private String storyDocument;
    private TextView textViewNoChapters;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_all_chapter);

        Window window = getWindow();
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        window.setStatusBarColor(Color.WHITE);

        ImageView backButton = findViewById(R.id.backButton);
        backButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Xử lý sự kiện khi ImageView nút back được nhấn
                finish(); // Đóng activity UserManual và quay lại trang trước
            }
        });

        recyclerviewListChapter = findViewById(R.id.recyclerviewListChapter);
        textViewNoChapters = findViewById(R.id.textViewNoChapters);
        recyclerviewListChapter.setLayoutManager(new LinearLayoutManager(this));

        // Get doc_id from intent
        Intent intent = getIntent();
        if (intent != null) {
            storyDocument = intent.getStringExtra("doc_id");
            if (storyDocument != null && !storyDocument.isEmpty()) {
                loadChapters(storyDocument);
            }
        }
    }

    private void loadChapters(String docId) {
        FirebaseFirestore db = FirebaseFirestore.getInstance();

        // Replace "chapters" with the actual subcollection name in your Firestore database
        db.collection("stories").document(docId).collection("chapters")
                .orderBy("thutu")  // Order by 'thutu' field
                .get()
                .addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {
                    @Override
                    public void onComplete(@NonNull Task<QuerySnapshot> task) {
                        if (task.isSuccessful()) {
                            List<Chapter> chapters = new ArrayList<>();
                            for (QueryDocumentSnapshot document : task.getResult()) {
                                String title = document.getString("title");
                                String content = document.getString("content");
                                String createdAt = document.getString("created_at");

                                // Fix: Check if 'thutu' field exists and is a number
                                long thutu = 0; // Default value if 'thutu' is not present or not a number
                                Object thutuObject = document.get("thutu");
                                if (thutuObject instanceof Number) {
                                    thutu = ((Number) thutuObject).longValue();
                                }

                                // Create Chapter object and add it to the list
                                Chapter chapter = new Chapter(title, content, createdAt, thutu);
                                chapters.add(chapter);
                            }

                            // Update RecyclerView with the loaded chapters
                            updateRecyclerView(chapters);
                        } else {
                            // Handle errors
                        }
                    }
                });
    }

    private void updateRecyclerView(List<Chapter> chapters) {
        if (chapters.isEmpty()) {
            // Show "Đang cập nhật" message if there are no chapters
            textViewNoChapters.setVisibility(View.VISIBLE);
            recyclerviewListChapter.setVisibility(View.GONE);
        } else {
            textViewNoChapters.setVisibility(View.GONE);
            recyclerviewListChapter.setVisibility(View.VISIBLE);

            if (chapterAdapter == null) {
                // If adapter is not created yet, create it
                chapterAdapter = new ChapterAdapter(chapters, new ChapterAdapter.OnItemClickListener() {
                    @Override
                    public void onItemClick(Chapter chapter) {
                        // Handle item click, navigate to ActivityReading
                        Intent intent = new Intent(ActivityAllChapter.this, ActivityReading.class);
                        intent.putExtra("chapter_document", chapter.getTitle());
                        intent.putExtra("story_document", storyDocument);
                        startActivity(intent);
                    }
                });
                recyclerviewListChapter.setAdapter(chapterAdapter);
            } else {
                // If adapter is already created, update the data
                chapterAdapter.setChapters(chapters);
                chapterAdapter.notifyDataSetChanged();
            }
        }
    }

    public static class Chapter {
        private String title;
        private String content;
        private String createdAt;
        private long thutu;

        public Chapter(String title, String content, String createdAt, long thutu) {
            this.title = title;
            this.content = content;
            this.createdAt = createdAt;
            this.thutu = thutu;
        }

        public String getTitle() {
            return title;
        }

        // Add getters for other fields if needed
    }

    public static class ChapterAdapter extends RecyclerView.Adapter<ChapterAdapter.ViewHolder> {

        private List<Chapter> chapters;
        private OnItemClickListener listener;

        public interface OnItemClickListener {
            void onItemClick(Chapter chapter);
        }

        public ChapterAdapter(List<Chapter> chapters, OnItemClickListener listener) {
            this.chapters = chapters;
            this.listener = listener;
        }

        @NonNull
        @Override
        public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_chapter, parent, false);
            return new ViewHolder(view);
        }

        @Override
        public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
            Chapter chapter = chapters.get(position);
            holder.bind(chapter, listener);
        }

        @Override
        public int getItemCount() {
            return chapters.size();
        }

        public void setChapters(List<Chapter> chapters) {
            this.chapters = chapters;
        }

        public static class ViewHolder extends RecyclerView.ViewHolder {
            private TextView textViewChapterTitle;

            public ViewHolder(@NonNull View itemView) {
                super(itemView);
                textViewChapterTitle = itemView.findViewById(R.id.textViewChapterTitle);
            }

            public void bind(final Chapter chapter, final OnItemClickListener listener) {
                textViewChapterTitle.setText(chapter.getTitle());
                itemView.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        listener.onItemClick(chapter);
                    }
                });
            }
        }
    }
}

