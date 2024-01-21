package com.vantoan.medoctruyen.adapter.fragment.profile;

public class Story {

    private String doc_id;
    private String anh_bia;
    private String ten_truyen;
    private String the_loai;
    private Long view_story;
    private String trang_thai;

    // Constructors, getters, and setters

    // Constructor
    public Story() {
        // Default constructor required for Firestore
    }

    // Getters and setters

    public String getDoc_id() {
        return doc_id;
    }

    public void setDoc_id(String doc_id) {
        this.doc_id = doc_id;
    }

    public String getAnh_bia() {
        return anh_bia;
    }

    public void setAnh_bia(String anh_bia) {
        this.anh_bia = anh_bia;
    }

    public String getTen_truyen() {
        return ten_truyen;
    }

    public void setTen_truyen(String ten_truyen) {
        this.ten_truyen = ten_truyen;
    }

    public String getThe_loai() {
        return the_loai;
    }

    public void setThe_loai(String the_loai) {
        this.the_loai = the_loai;
    }

    public Long getView_story() {
        return view_story;
    }

    public void setView_story(Long view_story) {
        this.view_story = view_story;
    }

    public String getTrang_thai() {
        return trang_thai;
    }

    public void setTrang_thai(String trang_thai) {
        this.trang_thai = trang_thai;
    }

    public void setTen(String ten_truyen) {this.ten_truyen = ten_truyen;}

    public String getTen() {
        return ten_truyen;
    }

}
