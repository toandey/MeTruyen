package com.vantoan.medoctruyen.adapter.fragment.profile;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;

import com.vantoan.medoctruyen.R;
import java.util.ArrayList;
import java.util.List;

public class ActivityFAQ extends AppCompatActivity {

    RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_faq);

        Window window = getWindow();
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.getDecorView().setSystemUiVisibility(View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
        window.setStatusBarColor(Color.WHITE);

        recyclerView = findViewById(R.id.recyclerViewFAQ);

        List<FAQItem> faqItemList = new ArrayList<>();
        faqItemList.add(new FAQItem("Mê truyện có những tính năng gì?", "Mê truyện là ứng dụng đọc truyện miễn phí trên điện thoại android, có kho truyện khổng lồ với nhiều thể loại như truyện tranh, tiểu thuyết, ngôn tình, đam mỹ, kiếm hiệp, tiên hiệp, v.v. Bạn có thể đọc truyện online hoặc tải truyện về máy để đọc offline, nghe truyện audio, làm nhiệm vụ kiếm tiền, kiếm phiếu tặng tác giả và người dịch, đánh giá và bình luận truyện, chia sẻ nội dung và phát hành tác phẩm của mình."));
        faqItemList.add(new FAQItem("Làm thế nào để cài đặt ứng dụng?", "Bạn có thể tải ứng dụng mê truyện từ [CH Play] hoặc từ các trang web khác như Appmtc, Aapp, Softonic, APKCombo, v.v. Sau khi tải về, bạn cần cho phép ứng dụng truy cập vào bộ nhớ, âm thanh và mạng của điện thoại để hoạt động tốt nhất."));
        faqItemList.add(new FAQItem("Làm thế nào để tạo tài khoản?", "Bạn có thể đăng nhập và đăng ký tài khoản trên ứng dụng mê truyện bằng cách sử dụng số điện thoại, email hoặc tài khoản mạng xã hội như Facebook, Google, Zalo, v.v. Bạn cần xác nhận mã OTP hoặc đường dẫn kích hoạt để hoàn tất quá trình đăng ký. Khi có tài khoản, bạn sẽ được lưu lại lịch sử đọc truyện, nhận được thông báo cập nhật truyện, tham gia cộng đồng người dùng và nhận được nhiều ưu đãi khác."));
        faqItemList.add(new FAQItem("Làm thế nào để đọc truyện?", "Bạn có thể tìm kiếm truyện trên ứng dụng mê truyện bằng cách nhập tên truyện, tên tác giả, tên nhóm dịch hoặc từ khóa liên quan vào thanh công cụ tìm kiếm. Bạn cũng có thể lựa chọn truyện theo các chuyên mục, thể loại, bảng xếp hạng, truyện mới, truyện đề cử, truyện đang hot, truyện hoàn thành, v.v. Bạn có thể xem thông tin chi tiết, mục lục, đánh giá và bình luận của mỗi truyện trước khi quyết định đọc."));
        faqItemList.add(new FAQItem("Làm thế nào để tìm kiếm truyện?", "Bạn có thể tìm kiếm truyện trên Mê Truyện bằng cách nhập từ khóa vào thanh tìm kiếm ở trên cùng của màn hình, sau đó nhấn vào nút \"Tìm kiếm\". Bạn cũng có thể lọc truyện theo thể loại, tình trạng, năm xuất bản, số lượt xem, số lượt thích và nhiều tiêu chí khác bằng cách nhấn vào nút \"Lọc truyện\" ở bên phải của thanh tìm kiếm."));

        FAQAdapter faqAdapter = new FAQAdapter(faqItemList);
        recyclerView.setAdapter(faqAdapter);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
    }
}
