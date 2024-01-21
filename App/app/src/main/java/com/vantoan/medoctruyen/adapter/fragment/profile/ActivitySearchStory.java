package com.vantoan.medoctruyen.adapter.fragment.profile;
import android.content.Intent;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.widget.EditText;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.QueryDocumentSnapshot;
import com.google.firebase.firestore.QuerySnapshot;
import com.vantoan.medoctruyen.R;

import java.util.ArrayList;
import java.util.List;

public class ActivitySearchStory extends AppCompatActivity {

    // Declare the views and variables
    private EditText edtSearch;
    private RecyclerView recyclerviewListStory;
    private StoryAdapter storyAdapter;
    private List<Story> storyList;
    private FirebaseFirestore db;

    // Override the onCreate method
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search_story);

        // Initialize the views and variables
        edtSearch = findViewById(R.id.edtSearch);
        recyclerviewListStory = findViewById(R.id.recyclerviewListStory);
        storyList = new ArrayList<>();
        storyAdapter = new StoryAdapter(this, storyList, new StoryAdapter.OnItemClickListener() {
            @Override
            public void onItemClick(Story story) {
                // When the user clicks on a story, start the ActivityStory and pass the doc_id as an extra
                Intent intent = new Intent(ActivitySearchStory.this, ActivityStory.class);
                intent.putExtra("doc_id", story.getDoc_id());
                startActivity(intent);
            }
        });
        recyclerviewListStory.setLayoutManager(new LinearLayoutManager(this));
        recyclerviewListStory.setAdapter(storyAdapter);
        db = FirebaseFirestore.getInstance();

        // Add a text watcher to the edtSearch to listen for changes in the input
        edtSearch.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {
                // Do nothing
            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {
                // Do nothing
            }

            @Override
            public void afterTextChanged(Editable s) {
                String input = s.toString().trim().toLowerCase();


                // Clear the story list
                storyList.clear();
                if (!input.isEmpty()) {
                    db.collection("stories")
                            .get()
                            .addOnCompleteListener(new OnCompleteListener<QuerySnapshot>() {
                                @Override
                                public void onComplete(@NonNull Task<QuerySnapshot> task) {
                                    if (task.isSuccessful()) {
                                        // Loop through the query results and add them to the story list
                                        for (QueryDocumentSnapshot document : task.getResult()) {
                                            Story story = new Story();
                                            story.setDoc_id(document.getId());
                                            story.setAnh_bia(document.getString("anh_bia"));
                                            story.setTen_truyen(document.getString("ten_truyen").toLowerCase());
                                            story.setThe_loai(document.getString("the_loai"));
                                            story.setView_story(document.getLong("view_story"));
                                            story.setTrang_thai(document.getString("trang_thai"));
                                            // Check if the story name contains the input
                                            if (story.getTen_truyen().contains(input)) {
                                                storyList.add(story);
                                            }
                                        }
                                        // Notify the story adapter of the data change
                                        storyAdapter.notifyDataSetChanged();
                                    }
                                }
                            });
                }

            }
        });
    }

}
