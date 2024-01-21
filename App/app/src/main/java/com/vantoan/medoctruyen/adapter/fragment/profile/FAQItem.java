package com.vantoan.medoctruyen.adapter.fragment.profile;

public class FAQItem {
    private String question;
    private String answer;
    private boolean isOpen;

    public FAQItem(String question, String answer) {
        this.question = question;
        this.answer = answer;
        this.isOpen = false; // Mặc định là đóng
    }

    public boolean isOpen() {
        return isOpen;
    }

    public void setOpen(boolean open) {
        isOpen = open;
    }

    public String getQuestion() {
        return question;
    }

    public String getAnswer() {
        return answer;
    }
}

