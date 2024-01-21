package com.vantoan.medoctruyen.adapter.fragment.profile;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.MultiTransformation;
import com.bumptech.glide.load.resource.bitmap.CenterCrop;
import com.bumptech.glide.load.resource.bitmap.RoundedCorners;
import com.squareup.picasso.Picasso;
import com.vantoan.medoctruyen.R;

import java.util.List;

public class StoryAdapter extends RecyclerView.Adapter<StoryAdapter.ViewHolder> {

    private List<Story> storyList;
    private OnItemClickListener listener;

    // Constructor
    public StoryAdapter(ActivitySearchStory activitySearchStory, List<Story> storyList, OnItemClickListener listener) {
        this.storyList = storyList;
        this.listener = listener;
    }

    // Interface for item click listener
    public interface OnItemClickListener {
        void onItemClick(Story story);
    }

    // Inner ViewHolder class
    public static class ViewHolder extends RecyclerView.ViewHolder {
        public ImageView ivStoryCover;
        public TextView tvStoryName, tvStoryGenre, tvStoryStatus;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            ivStoryCover = itemView.findViewById(R.id.img_story);
            tvStoryName = itemView.findViewById(R.id.tv_story_name);
            tvStoryGenre = itemView.findViewById(R.id.tv_genre);
            tvStoryStatus = itemView.findViewById(R.id.tv_status);

        }
    }

    // Override onCreateViewHolder method
    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_search, parent, false);
        return new ViewHolder(view);
    }

    // Override onBindViewHolder method
    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        final Story story = storyList.get(position);

        Glide.with(holder.itemView.getContext())
                .load(story.getAnh_bia())
                .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                .into(holder.ivStoryCover);
        holder.tvStoryName.setText(story.getTen_truyen());
        holder.tvStoryGenre.setText(story.getThe_loai());
        holder.tvStoryStatus.setText(story.getTrang_thai());

        // Set click listener
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                listener.onItemClick(story);
            }
        });
    }

    @Override
    public int getItemCount() {
        return storyList.size();
    }
}
