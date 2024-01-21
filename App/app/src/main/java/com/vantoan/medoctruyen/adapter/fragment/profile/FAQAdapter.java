package com.vantoan.medoctruyen.adapter.fragment.profile;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.vantoan.medoctruyen.R;

import java.util.List;

public class FAQAdapter extends RecyclerView.Adapter<FAQAdapter.FAQViewHolder> {

    private List<FAQItem> faqItemList;

    public FAQAdapter(List<FAQItem> faqItemList) {
        this.faqItemList = faqItemList;
    }

    @NonNull
    @Override
    public FAQViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.faq_item, parent, false);
        return new FAQViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull FAQViewHolder holder, int position) {
        FAQItem faqItem = faqItemList.get(position);

        holder.questionTextView.setText(faqItem.getQuestion());
        holder.answerTextView.setText(faqItem.getAnswer());

        // Đặt biểu tượng tùy thuộc vào trạng thái mở hoặc đóng
        if (faqItem.isOpen()) {
            holder.iconStatus.setImageResource(R.drawable.minus);
        } else {
            holder.iconStatus.setImageResource(R.drawable.plus);
        }

        holder.question.setOnClickListener(v -> {
            if (faqItem.isOpen()) {
                holder.answerLayout.setVisibility(View.GONE);
                holder.iconStatus.setImageResource(R.drawable.plus);
            } else {
                holder.answerLayout.setVisibility(View.VISIBLE);
                holder.iconStatus.setImageResource(R.drawable.minus);
            }
            // Cập nhật trạng thái mở hoặc đóng
            faqItem.setOpen(!faqItem.isOpen());
        });
    }

    @Override
    public int getItemCount() {
        return faqItemList.size();
    }

    public static class FAQViewHolder extends RecyclerView.ViewHolder {
        TextView questionTextView;
        TextView answerTextView;
        LinearLayout answerLayout, question;
        ImageView iconStatus;

        public FAQViewHolder(@NonNull View itemView) {
            super(itemView);
            questionTextView = itemView.findViewById(R.id.questionTextView);
            answerTextView = itemView.findViewById(R.id.answerTextView);
            answerLayout = itemView.findViewById(R.id.answerLayout);
            question = itemView.findViewById(R.id.question);
            iconStatus = itemView.findViewById(R.id.iconStatus);
        }
    }
}

