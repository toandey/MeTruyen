package com.vantoan.medoctruyen.adapter.fragment.profile;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.MultiTransformation;
import com.bumptech.glide.load.resource.bitmap.CenterCrop;
import com.bumptech.glide.load.resource.bitmap.RoundedCorners;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.firestore.CollectionReference;
import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.QueryDocumentSnapshot;
import com.google.firebase.firestore.QuerySnapshot;
import com.squareup.picasso.Picasso;
import com.vantoan.medoctruyen.R;

import java.util.ArrayList;
import java.util.List;

public class ActivityAllStory extends AppCompatActivity {

    private TextView nameScreen;
    private RecyclerView recyclerviewListStory;
    private String storyType;
    private String userEmail;
    private ArrayList<Story> stories;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_all_story);

        // Get the views
        nameScreen = findViewById(R.id.nameScreen);
        recyclerviewListStory = findViewById(R.id.recyclerviewListStory);
        ImageView backButton = findViewById(R.id.backButton);
        backButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Xử lý sự kiện khi ImageView nút back được nhấn
                finish(); // Đóng activity UserManual và quay lại trang trước
            }
        });

        // Get the story type from the intent
        Intent intent = getIntent();
        storyType = intent.getStringExtra("storyType");

        // Set the name screen according to the story type
        switch (storyType) {
            case "dangDoc":
                nameScreen.setText("Truyện Đang Đọc");
                break;
            case "daThich":
                nameScreen.setText("Truyện Đã Thích");
                break;
            case "daXem":
                nameScreen.setText("Truyện Đã Xem");
                break;
            case "truyenMoi":
                nameScreen.setText("Truyện Mới");
                break;
            case "truyenFull":
                nameScreen.setText("Truyện Đã Hoàn Thành");
                break;
        }

        // Get the user email from firebase
        FirebaseUser user = FirebaseAuth.getInstance().getCurrentUser();
        if (user != null) {
            userEmail = user.getEmail();
        } else {
            // Handle the case when the user is not logged in
        }

        // Initialize the stories array list
        stories = new ArrayList<>();

        // Get the stories from firebase according to the story type
        FirebaseFirestore db = FirebaseFirestore.getInstance();
        CollectionReference collectionRef = null;
        switch (storyType) {
            case "dangDoc":
                collectionRef = db.collection("truyendadoc").document(userEmail).collection("stories");
                break;
            case "daThich":
                collectionRef = db.collection("truyenyeuthich").document(userEmail).collection("stories");
                break;
            case "daXem":
                collectionRef = db.collection("truyendaxem").document(userEmail).collection("stories");
                break;
        }
        if (collectionRef != null) {
            collectionRef.get().addOnCompleteListener(task -> {
                if (task.isSuccessful()) {
                    for (QueryDocumentSnapshot document : task.getResult()) {
                        // Get the doc_id from the document
                        String doc_id = document.getString("doc_id");
                        // Get the chapter_document if the story type is dangDoc
                        String chapter_document = null;
                        if (storyType.equals("dangDoc")) {
                            chapter_document = document.getString("chapter_document");
                        }
                        // Get the story details from the stories collection using the doc_id
                        String finalChapter_document = chapter_document;
                        db.collection("stories").document(doc_id).get().addOnSuccessListener(snapshot -> {
                            // Get the story fields from the snapshot
                            String anh_bia = snapshot.getString("anh_bia");
                            String ten_truyen = snapshot.getString("ten_truyen");
                            String the_loai = snapshot.getString("the_loai");
                            String trang_thai = snapshot.getString("trang_thai");
                            // Create a new Story object and add it to the stories array list
                            Story story = new Story(doc_id, anh_bia, ten_truyen, the_loai, trang_thai, finalChapter_document);
                            stories.add(story);
                            // Update the recycler view with the stories array list
                            recyclerviewListStory.setLayoutManager(new LinearLayoutManager(this));
                            recyclerviewListStory.setAdapter(new StoryAdapter(stories, storyType, this));
                        });
                    }
                } else {
                    // Handle the case when the task is not successful
                }
            });
        } else {
            // Handle the case when the collection reference is null
        }
    }

    public static class StoryAdapter extends RecyclerView.Adapter<StoryAdapter.StoryViewHolder> {

        private List<Story> stories;
        private String storyType;
        private Context context;

        public StoryAdapter(List<Story> stories, String storyType, Context context) {
            this.stories = stories;
            this.storyType = storyType;
            this.context = context;
        }

        @NonNull
        @Override
        public StoryViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item, parent, false);
            return new StoryViewHolder(view);
        }

        @Override
        public void onBindViewHolder(@NonNull StoryViewHolder holder, int position) {
            Story story = stories.get(position);
            holder.bind(story);
            holder.itemView.setOnClickListener(v -> {
                if (storyType.equals("dangDoc")) {
                    // Open ActivityReading with the story document and chapter document
                    Intent intent = new Intent(context, ActivityReading.class);
                    intent.putExtra("story_document", story.getDocId());
                    intent.putExtra("chapter_document", story.getChapterDocument());
                    context.startActivity(intent);

                } else {
                    Intent intent = new Intent(context, ActivityStory.class);
                    intent.putExtra("doc_id", story.getDocId());
                    context.startActivity(intent);
                }
            });
        }

        @Override
        public int getItemCount() {
            return stories.size();
        }

        static class StoryViewHolder extends RecyclerView.ViewHolder {
            private ImageView imageView;
            private TextView titleTextView;
            private TextView genreTextView;
            private TextView statusTextView;

            public StoryViewHolder(@NonNull View itemView) {
                super(itemView);
                imageView = itemView.findViewById(R.id.ivAnhBia);
                titleTextView = itemView.findViewById(R.id.tvTenTruyen);
                genreTextView = itemView.findViewById(R.id.tvTheLoai);
                statusTextView = itemView.findViewById(R.id.tvTrangThai);
            }

            public void bind(Story story) {
                Glide.with(itemView)
                        .load(story.getImageUrl())
                        .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                        .into(imageView);

                titleTextView.setText(story.getTitle());
                genreTextView.setText(story.getGenre());
                statusTextView.setText(story.getStatus());
            }
        }
    }

    public class Story {

        private String docId;
        private String imageUrl; // URL of the story cover image
        private String title;
        private String genre;
        private String status;
        private String chapterDocument; // Only for "dangDoc" story type

        public Story(String docId, String imageUrl, String title, String genre, String status, String chapterDocument) {
            this.docId = docId;
            this.imageUrl = imageUrl;
            this.title = title;
            this.genre = genre;
            this.status = status;
            this.chapterDocument = chapterDocument;
        }

        public String getDocId() {
            return docId;
        }

        public String getImageUrl() {
            return imageUrl;
        }

        public String getTitle() {
            return title;
        }

        public String getGenre() {
            return genre;
        }

        public String getStatus() {
            return status;
        }

        public String getChapterDocument() {
            return chapterDocument;
        }
    }
}

