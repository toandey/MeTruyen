package com.vantoan.medoctruyen.adapter.fragment;// Import các thư viện cần thiết
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.FrameLayout;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.view.menu.BaseMenuPresenter;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.MultiTransformation;
import com.bumptech.glide.load.resource.bitmap.CenterCrop;
import com.bumptech.glide.load.resource.bitmap.RoundedCorners;
import com.google.firebase.firestore.CollectionReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.EventListener;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.FirebaseFirestoreException;
import com.google.firebase.firestore.Query;
import com.google.firebase.firestore.QuerySnapshot;
import com.vantoan.medoctruyen.R;
import com.vantoan.medoctruyen.adapter.fragment.profile.ActivityStory;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

// Tạo một lớp CategoryFragment kế thừa từ Fragment
public class CategoryFragment extends Fragment {
    // Khai báo các biến thành viên
    private TextView tvTruyenHot, tvTruyenMoi, tvLoaiTruyen, tvTruyenFull, tvTheLoai1, tvTheLoai2, tvTheLoai3;
    private RecyclerView recyclerViewTruyen;
    private FrameLayout truyenHot, truyenMoi;
    private TruyenAdapter truyenAdapter;
    private List<Truyen> truyenList;
    private FirebaseFirestore db;
    private CollectionReference storiesRef;

    // Phương thức khởi tạo mặc định
    public CategoryFragment() {
        // Required empty public constructor
    }

    // Phương thức onCreateView để tạo giao diện cho fragment
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_category, container, false);

        // Ánh xạ các view từ layout
        tvTruyenHot = view.findViewById(R.id.tvTruyenHot);
        tvTruyenMoi = view.findViewById(R.id.tvTruyenMoi);
        tvLoaiTruyen = view.findViewById(R.id.tvLoaiTruyen);
        tvTruyenFull = view.findViewById(R.id.tvTruyenFull);
        tvTheLoai1 = view.findViewById(R.id.tvTheLoai1);
        tvTheLoai2 = view.findViewById(R.id.tvTheLoai2);
        tvTheLoai3 = view.findViewById(R.id.tvTheLoai3);
        recyclerViewTruyen = view.findViewById(R.id.recyclerViewTruyen);
        truyenHot = view.findViewById(R.id.truyenHot);
        truyenMoi = view.findViewById(R.id.truyenMoi);

        // Khởi tạo danh sách truyện và adapter
        truyenList = new ArrayList<>();
        truyenAdapter = new TruyenAdapter(truyenList, getContext());

        // Khởi tạo firebase database và collection reference
        db = FirebaseFirestore.getInstance();
        storiesRef = db.collection("stories");

        // Thiết lập layout manager và adapter cho recycler view
        recyclerViewTruyen.setLayoutManager(new LinearLayoutManager(getContext()));
        recyclerViewTruyen.setAdapter(truyenAdapter);

        tvTheLoai1.setText("Ngôn Tình");
        tvTheLoai2.setText("Đô Thị");
        tvTheLoai3.setText("Tiên Hiệp");

        truyenHot.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                truyenHot.setBackgroundColor(getResources().getColor(android.R.color.white));
                tvTruyenFull.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                truyenMoi.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai3.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai1.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai2.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvLoaiTruyen.setText("Truyện Hot");
                getTruyenByViewStory();
            }
        });

        tvTruyenFull.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                tvTruyenFull.setBackgroundColor(getResources().getColor(android.R.color.white));
                truyenHot.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                truyenMoi.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai3.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai1.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai2.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvLoaiTruyen.setText("Truyện Full");
                getTruyenByTrangThai("Đã hoàn thành");
            }
        });

        truyenMoi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                truyenMoi.setBackgroundColor(getResources().getColor(android.R.color.white));
                truyenHot.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTruyenFull.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai3.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai1.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai2.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvLoaiTruyen.setText("Truyện Mới");
                getTruyenByTrangThai("Mới");
            }
        });

        tvTheLoai1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                tvTheLoai1.setBackgroundColor(getResources().getColor(android.R.color.white));
                truyenHot.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTruyenFull.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                truyenMoi.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai2.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai3.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvLoaiTruyen.setText("Truyện Ngôn Tình");
                getTruyenByTheLoai("Ngôn tình");
            }
        });

        tvTheLoai2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                tvTheLoai2.setBackgroundColor(getResources().getColor(android.R.color.white));
                truyenHot.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTruyenFull.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                truyenMoi.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai1.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai3.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvLoaiTruyen.setText("Truyện Đô Thị");
                getTruyenByTheLoai("Đô thị");
            }
        });

        tvTheLoai3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                tvTheLoai3.setBackgroundColor(getResources().getColor(android.R.color.white));
                truyenHot.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTruyenFull.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                truyenMoi.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai1.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvTheLoai2.setBackgroundColor(getResources().getColor(android.R.color.transparent));
                tvLoaiTruyen.setText("Truyện Tiên Hiệp");
                getTruyenByTheLoai("Tiên hiệp");
            }
        });

        truyenHot.performClick();

        // Trả về view
        return view;
    }

    private void getTruyenByViewStory() {
        truyenList.clear();
        Query query = storiesRef.orderBy("view_story", Query.Direction.DESCENDING);
        query.addSnapshotListener((value, error) -> {
            if (error != null) {
                error.printStackTrace();
                return;
            }
            for (DocumentSnapshot doc : value) {
                Truyen truyen = new Truyen();
                truyen.setAnhBia(doc.getString("anh_bia"));
                truyen.setTenTruyen(doc.getString("ten_truyen"));
                truyen.setTheLoai(doc.getString("the_loai"));
                truyen.setViewStory(doc.getLong("view_story"));
                truyen.setTrangThai(doc.getString("trang_thai"));
                truyen.setDocId(doc.getId());
                truyenList.add(truyen);
            }
            truyenAdapter.notifyDataSetChanged();
        });
    }

    private void getTruyenByTrangThai(String trangThai) {
        truyenList.clear();
        Query query = storiesRef.whereEqualTo("trang_thai", trangThai);
        query.addSnapshotListener((value, error) -> {
            if (error != null) {
                error.printStackTrace();
                return;
            }
            for (DocumentSnapshot doc : value) {
                Truyen truyen = new Truyen();
                truyen.setAnhBia(doc.getString("anh_bia"));
                truyen.setTenTruyen(doc.getString("ten_truyen"));
                truyen.setTheLoai(doc.getString("the_loai"));
                truyen.setViewStory(doc.getLong("view_story"));
                truyen.setTrangThai(doc.getString("trang_thai"));
                truyen.setDocId(doc.getId());
                truyenList.add(truyen);
            }
            truyenAdapter.notifyDataSetChanged();
        });
    }

    private void getTruyenByTheLoai(String theLoai) {
        truyenList.clear();
        Query query = storiesRef;
        query.addSnapshotListener((value, error) -> {
            if (error != null) {
                error.printStackTrace();
                return;
            }
            for (DocumentSnapshot doc : value) {
                // tách chuỗi the_loai theo dấu phẩy và khoảng trắng
                String[] theLoaiArray = doc.getString("the_loai").split("\\s*,\\s*");
                // kiểm tra xem thể loại có nằm trong mảng hay không
                boolean match = false;
                for (String tl : theLoaiArray) {
                    if (tl.equals(theLoai)) {
                        match = true;
                        break;
                    }
                }
                // nếu có, thêm truyện vào danh sách
                if (match) {
                    Truyen truyen = new Truyen();
                    truyen.setAnhBia(doc.getString("anh_bia"));
                    truyen.setTenTruyen(doc.getString("ten_truyen"));
                    truyen.setTheLoai(doc.getString("the_loai"));
                    truyen.setViewStory(doc.getLong("view_story"));
                    truyen.setTrangThai(doc.getString("trang_thai"));
                    truyen.setDocId(doc.getId());
                    truyenList.add(truyen);
                }
            }
            truyenAdapter.notifyDataSetChanged();
        });
    }


    public class TruyenAdapter extends RecyclerView.Adapter<TruyenAdapter.TruyenViewHolder> {

        private List<Truyen> truyenList;
        private Context context;

        public TruyenAdapter(List<Truyen> truyenList, Context context) {
            this.truyenList = truyenList;
            this.context = context;
        }

        @NonNull
        @Override
        public TruyenViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item, parent, false);
            return new TruyenViewHolder(view);
        }

        @Override
        public void onBindViewHolder(@NonNull TruyenViewHolder holder, int position) {
            Truyen truyen = truyenList.get(position);

            holder.tvTenTruyen.setText(truyen.getTenTruyen());
            holder.tvTheLoai.setText(truyen.getTheLoai());
            holder.tvViewStory.setText("Lượt xem: "+String.valueOf(truyen.getViewStory()));
            holder.tvTrangThai.setText(truyen.getTrangThai());

            Glide.with(context)
                    .load(truyen.getAnhBia())
                    .transform(new MultiTransformation<>(new CenterCrop(), new RoundedCorners(30)))
                    .into(holder.ivAnhBia);

            holder.itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    // Chuyển hướng đến ActivityStory và truyền vào doc_id
                    Intent intent = new Intent(context, ActivityStory.class);
                    intent.putExtra("doc_id", truyen.getDocId());
                    context.startActivity(intent);
                }
            });
        }

        @Override
        public int getItemCount() {
            return truyenList.size();
        }

        public void setTruyenList(List<Truyen> truyenList) {
            this.truyenList = truyenList;
            notifyDataSetChanged();
        }

        public class TruyenViewHolder extends RecyclerView.ViewHolder {
            private ImageView ivAnhBia;
            private TextView tvTenTruyen, tvTheLoai, tvViewStory, tvTrangThai;

            public TruyenViewHolder(@NonNull View itemView) {
                super(itemView);

                ivAnhBia = itemView.findViewById(R.id.ivAnhBia);
                tvTenTruyen = itemView.findViewById(R.id.tvTenTruyen);
                tvTheLoai = itemView.findViewById(R.id.tvTheLoai);
                tvViewStory = itemView.findViewById(R.id.tvViewStory);
                tvTrangThai = itemView.findViewById(R.id.tvTrangThai);
            }
        }
    }

    public class Truyen {
        private String anhBia;
        private String tenTruyen;
        private String theLoai;
        private Long viewStory;
        private String trangThai;
        private String docId;

        public String getAnhBia() {
            return anhBia;
        }

        public void setAnhBia(String anhBia) {
            this.anhBia = anhBia;
        }

        public String getTenTruyen() {
            return tenTruyen;
        }

        public void setTenTruyen(String tenTruyen) {
            this.tenTruyen = tenTruyen;
        }

        public String getTheLoai() {
            return theLoai;
        }

        public void setTheLoai(String theLoai) {
            this.theLoai = theLoai;
        }

        public Long getViewStory() {
            return viewStory;
        }

        public void setViewStory(Long viewStory) {
            this.viewStory = viewStory;
        }

        public String getTrangThai() {
            return trangThai;
        }

        public void setTrangThai(String trangThai) {
            this.trangThai = trangThai;
        }

        // Thêm phương thức để lấy docId
        public String getDocId() {
            return docId;
        }

        public void setDocId(String docId) {
            this.docId = docId;
        }
    }
}
