<?php
global $firestore;
include 'auth_check.php';
include 'firestore_init.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['story_id']) && isset($_GET['chapter_id'])) {
    $story_id = $_GET['story_id'];
    $chapter_id = $_GET['chapter_id'];

    $db = $firestore;

    // Lấy dữ liệu chương từ Firestore
    $chapterRef = $db->collection('stories')->document($story_id)->collection('chapters')->document($chapter_id);
    $chapterDoc = $chapterRef->snapshot();

    if ($chapterDoc->exists()) {
        $chapter_data = $chapterDoc->data();
        $storyRef = $db->collection('stories')->document($story_id);
        $storyDoc = $storyRef->snapshot();
        if ($storyDoc->exists()) {
            $story_data = $storyDoc->data();
        } else {
            echo '<p>Truyện không tồn tại.</p>';
        }
    } else {
        echo '<p>Chương không tồn tại.</p>';
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_chapter'])) {
    // Xử lý dữ liệu được gửi từ biểu mẫu và cập nhật chương
    $story_id = $_GET['story_id'];
    $chapter_id = $_GET['chapter_id'];
    $updated_title = $_POST['chapter_title'];
    $updated_content = $_POST['chapter_content'];

    $db = $firestore;


    // Cập nhật dữ liệu chương vào Firestore
    $updateChapterRef = $db->collection('stories')->document($story_id)->collection('chapters')->document($chapter_id);
    $updateChapterRef->set([
        'title' => $updated_title,
        'content' => $updated_content,
    ], ['merge' => true]);

    echo '<script>
    alert("Chương đã được cập nhật.");
    window.location.href = "list_chapter.php?story_id=' . $story_id . '";
    </script>';

} else {
    echo '<p>Invalid request.</p>';
}
?>
<?php include 'header.php'; // Include the header ?>
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
        <h1>Sửa <?php echo $chapter_data['title']; ?></h1>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <form action="" method="post">
            <div class="mb-3">
                <label for="chapter_title" class="form-label">Tên chương:</label>
                <input type="text" class="form-control" id="chapter_title" name="chapter_title" value="<?php echo $chapter_data['title']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="chapter_content" class="form-label">Nội dung chương:</label>
                <textarea class="form-control" id="chapter_content" name="chapter_content" rows="15" required><?php echo $chapter_data['content']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="update_chapter">Cập nhật</button>
        </form>
    </section>
</main>
<?php include 'footer.php'; // Include the footer ?>