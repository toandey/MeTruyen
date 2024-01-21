<?php
include 'auth_check.php';
global $firestore;
include 'firestore_init.php';

// Kiểm tra xem story_id có tồn tại không
if (isset($_GET['story_id'])) {
    $story_id = $_GET['story_id'];

    // Lấy tên truyện từ Firestore sử dụng $story_id
    $db = $firestore;
    $storyRef = $db->collection('stories')->document($story_id);
    $storyDoc = $storyRef->snapshot();
    $story_data = $storyDoc->data();
    $story_name = $story_data['ten_truyen'];
} else {
    // Nếu story_id không tồn tại, hiển thị thông báo lỗi hoặc chuyển hướng về trang khác
    echo '<p>Không tìm thấy truyện.</p>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem story_id và chapter_id có tồn tại không
    if (isset($_POST['story_id']) && isset($_POST['chapter_id'])) {
        $story_id = $_POST['story_id'];
        $chapter_id = $_POST['chapter_id'];

        // Xoá chương từ Firestore
        $db->collection('stories')->document($story_id)->collection('chapters')->document($chapter_id)->delete();

        // Chuyển hướng về trang danh sách chương
        header('Location: list_chapters.php?story_id=' . $story_id);
        exit();
    } else {
        // Gửi phản hồi lỗi nếu thiếu thông tin
        echo 'error';
        exit();
    }
}
?>

<?php include 'header.php'; // Include the header?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Quản lý truyện</span
                ><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="index.php" class="active">
                        <i class="bi bi-circle"></i><span>Danh sách truyện</span>
                    </a>
                </li>
                <li>
                    <a href="add_story.php">
                        <i class="bi bi-circle" ></i><span>Thêm truyện mới</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="add_chapter.php">
                <i class="bi bi-folder-plus"></i>
                <span>Thêm chương mới</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="genres.php">
                <i class="bi bi-menu-button-wide"></i>
                <span>Thể loại</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="slider.php">
                <i class="bi bi-images"></i>
                <span>Slider</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="banner.php">
                <i class="bi bi-card-image"></i>
                <span>Banner</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="account.php">
                <i class="bi bi-person"></i>
                <span>Tài Khoản</span>
            </a>
        </li>

    </ul>
</aside>
<!-- End Sidebar-->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Danh sách chương của truyện: <?php echo $story_name; ?></h1>
        <br>
        <p>
            <a href="add_chapter.php?story_id=<?php echo $story_id; ?>" class="btn btn-success">Thêm chương mới</a>
        </p>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên chương</th>
                <th>Ngày thêm</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Lấy danh sách chương từ Firestore
            $chaptersRef = $db->collection('stories')->document($story_id)->collection('chapters');
            $chapters = $chaptersRef->documents();
            $index = 1;

            foreach ($chapters as $chapter) {
                // Đọc dữ liệu của chương từ Firestore
                $chapter_data = $chapter->data();

                // Hiển thị thông tin chương trong bảng
                echo '
        <tr>
            <td>' . $index++ . '</td>
            <td>' . $chapter_data['title'] . '</td>
            <td>' . $chapter_data['created_at'] . '</td>
            <td>          
                <a href="edit_chapter.php?story_id=' . $story_id . '&chapter_id=' . $chapter->id() . '" class="btn btn-warning">Sửa</a>
            </td>
        </tr>';
            }
            ?>
            </tbody>
        </table>
    </section>
</main>
<div class="modal" id="confirmDeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận xoá chương</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xoá chương này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-danger" id="deleteChapterBtn">Xoá</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php include 'footer.php'; // Include the footer?>
