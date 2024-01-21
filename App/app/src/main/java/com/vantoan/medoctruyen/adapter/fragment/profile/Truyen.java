package com.vantoan.medoctruyen.adapter.fragment.profile;

public class Truyen {
    private String anh_bia;
    private String ten_truyen;
    private String the_loai;
    private long view_story;
    private String trang_thai;

    public Truyen(String anh_bia, String ten_truyen, String the_loai, long view_story, String trang_thai) {
        this.anh_bia = anh_bia;
        this.ten_truyen = ten_truyen;
        this.the_loai = the_loai;
        this.view_story = view_story;
        this.trang_thai = trang_thai;
    }

    // Getter và setter cho các thuộc tính

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

    public long getView_story() {
        return view_story;
    }

    public void setView_story(long view_story) {
        this.view_story = view_story;
    }

    public String getTrang_thai() {
        return trang_thai;
    }

    public void setTrang_thai(String trang_thai) {
        this.trang_thai = trang_thai;
    }
}
