<?php
include 'auth_check.php';
global $firestore;
include 'firestore_init.php'; // Include tệp cấu hình Firestore

// Lấy danh sách tất cả truyện
$stories_ref = $firestore->collection('stories');
$stories = $stories_ref->documents();

$selected_story_id = isset($_GET['story_id']) ? $_GET['story_id'] : '';

if (isset($_POST['add_chapter'])) {
    $story_id = $_POST['story_id'];
    $chapter_title = $_POST['chapter_title']; // Lưu giá trị của title
    $chapter_content = $_POST['chapter_content'];

    // Lấy giá trị hiện tại của chapter_count từ collection stories
    $story_document = $firestore->collection('stories')->document($story_id)->snapshot();
    $chapter_count = $story_document->data()['chapter_count'];

    // Tăng giá trị chapter_count lên 1
    $chapter_count++;

    // Cập nhật giá trị chapter_count mới vào collection stories
    $firestore->collection('stories')->document($story_id)->update([
        ['path' => 'chapter_count', 'value' => $chapter_count],
    ]);

    // Thêm chương mới vào Firestore
    $created_at_timestamp = time();
    $created_at_string = date('Y-m-d H:i:s', $created_at_timestamp);

    // Lưu trường thutu với giá trị của chapter_count
    $chapter_data = [
        'title' => $chapter_title, // Sử dụng giá trị đã lưu trước đó
        'content' => $chapter_content,
        'created_at' => $created_at_string,
        'thutu' => $chapter_count, // Thêm trường thutu với giá trị của chapter_count
        // Các trường dữ liệu khác của chương nếu cần
    ];

    $chapters_ref = $firestore->collection('stories')->document($story_id)->collection('chapters');
    $chapters_ref->document("Chương $chapter_count")->set($chapter_data);

    // Redirect hoặc thực hiện các bước cần thiết khác sau khi thêm chương
    header("Location: list_chapter.php?story_id=$story_id");
    exit;
}
?>


<?php include 'header.php'; // Include the header?>
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-book"></i><span>Quản lý truyện</span
                    ><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="index.php">
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
                <a class="nav-link" href="add_chapter.php">
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
            <h1>Thêm chương mới</h1>
        </div>
        <section class="section dashboard">
            <!-- Form thêm chương mới -->
            <form method="post" action="add_chapter.php">
                <div class="mb-3">
                    <label for="story_select" class="form-label">Chọn truyện</label>
                    <select class="form-select" id="story_select" name="story_id" required>
                        <option value="" disabled selected>-- Chọn truyện --</option>
                        <?php foreach ($stories as $story) : ?>
                            <?php $story_data = $story->data(); ?>
                            <option value="<?= $story->id(); ?>" <?= ($selected_story_id == $story->id()) ? 'selected' : ''; ?>>
                                <?= $story_data['ten_truyen']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="chapter_title" class="form-label">Tiêu đề chương:</label>
                    <input type="text" class="form-control" id="chapter_title" name="chapter_title" required>
                </div>
                <div class="mb-3">
                    <label for="chapter_content" class="form-label">Nội dung chương:</label>
                    <textarea class="form-control" id="chapter_content" name="chapter_content" rows="15" required></textarea>
                </div>
                <button type="submit" name="add_chapter" class="btn btn-primary">Thêm Chương Mới</button>
            </form>
            <!-- Kết thúc Form -->
        </section>
    </main>

<?php include 'footer.php'; // Include the footer?>