<?php
include 'auth_check.php';
global $firestore;
require 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

include 'firestore_init.php';

$success_message = '';
$story_id = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $ten_truyen = $_POST["ten_truyen"];
    $tac_gia = $_POST["tac_gia"];
    $the_loai = $_POST["the_loai"];
    $nguon = $_POST["nguon"];
    $trang_thai = $_POST["trang_thai"];
    $danh_gia = floatval($_POST["danh_gia"]);
    $tom_tat = $_POST["tom_tat"];
    $so_chuong = intval($_POST["so_chuong"]);

    $use_url = isset($_POST["anh_bia_url_option"]) && $_POST["anh_bia_url_option"] === "yes";
    $file_extension = '';

    if (!$use_url && isset($_FILES["anh_bia"]) && $_FILES["anh_bia"]["error"] == 0) {
        $file_extension = pathinfo($_FILES["anh_bia"]["name"], PATHINFO_EXTENSION);

        $allowed_formats = ['jpg', 'jpeg', 'png'];
        if (!in_array($file_extension, $allowed_formats)) {
            die("Định dạng ảnh không được hỗ trợ. Chỉ hỗ trợ 'jpg', 'jpeg' và 'png'.");
        }

        if ($_FILES["anh_bia"]["size"] > 1024000) { // 1MB
            die("Kích thước ảnh quá lớn. Hãy tải lên ảnh có kích thước nhỏ hơn 1MB.");
        }
    }

    if ($use_url) {
        $anh_bia = $_POST["anh_bia_url"];
    } else {
        $storage = new StorageClient([
            'keyFilePath' => 'key/me-doc-truyen-f45c8-232ccd40e190.json',
        ]);

        $bucket = $storage->bucket('me-doc-truyen-f45c8.appspot.com');

        $file_name = uniqid() . 'metruyen' . '.' . $file_extension;

        $file = fopen($_FILES["anh_bia"]["tmp_name"], 'r');

        $object = $bucket->upload($file, [
            'name' => 'images/' . $file_name,
        ]);

        $anh_bia = $object->signedUrl(new \DateTime('2050-01-01'));
    }

    // Đặt giá trị cho $story_id từ POST hoặc để giá trị trống nếu không tồn tại
    $story_id = isset($_POST["story_id"]) ? $_POST["story_id"] : '';

    $story_ref = $firestore->collection('stories')->document($story_id);

    $story_ref->set([
        'ten_truyen' => $ten_truyen,
        'tac_gia' => $tac_gia,
        'the_loai' => $the_loai,
        'nguon' => $nguon,
        'trang_thai' => $trang_thai,
        'danh_gia' => $danh_gia,
        'tom_tat' => $tom_tat,
        'so_chuong' => $so_chuong,
        'anh_bia' => $anh_bia,
    ]);

    // Đoạn mã xử lý khi thêm truyện thành công
    $success_message = 'Thông tin truyện đã được cập nhật thành công!';
    echo '<script>
    alert("Thông tin truyện đã được cập nhật thành công!");
    window.location.href = "index.php";
    </script>';
}

if (isset($_GET['story_id'])) {
    $story_id = $_GET['story_id'];
    $story_ref = $firestore->collection('stories')->document($story_id);
    $story = $story_ref->snapshot();

    if ($story->exists()) {
        $data = $story->data();
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
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
        <h1>Sửa Thông Tin Truyện: <?= isset($data['ten_truyen']) ? $data['ten_truyen'] : '' ?></h1>
    </div>

    <section class="section dashboard">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="story_id" value="<?= $story_id ?>">

            <div class="form-group">
                <label for="ten_truyen">Tên truyện:</label>
                <input type="text" class="form-control" name="ten_truyen" value="<?= isset($data['ten_truyen']) ? $data['ten_truyen'] : '' ?>" required>

            </div>

            <div class="form-group">
                <label for="tac_gia">Tác giả:</label>
                <input type="text" class="form-control" name="tac_gia" value="<?= isset($data['tac_gia']) ? $data['tac_gia'] : '' ?>" required>

            </div>

            <div class="form-group">
                <label for="anh_bia">Ảnh bìa:</label>
                <div class="input-group">
                    <input type="file" class="form-control-file" name="anh_bia" accept="image/*">
                    <div class="input-group-append">
                        <label class="input-group-text">
                            <input type="checkbox" name="anh_bia_url_option" value="yes" <?= (isset($data['anh_bia']) && !empty($data['anh_bia'])) ? 'checked' : '' ?>> Sử dụng URL ảnh
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="anh_bia_url">URL ảnh bìa:</label>
                <input type="text" class="form-control" name="anh_bia_url" value="<?= isset($data['anh_bia']) ? $data['anh_bia'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="the_loai_input">Thể loại:</label>
                <label for="selectGenres"></label><select id="selectGenres" class="form-select">
                    <?php
                    $genresQuery = $firestore->collection('genres')->orderBy('ten_the_loai', 'asc');
                    $genres = $genresQuery->documents();

                    foreach ($genres as $genre) {
                        $genreData = $genre->data();
                        $tenTheLoai = $genreData['ten_the_loai'];
                        $selected = isset($data['the_loai']) && $data['the_loai'] == $tenTheLoai ? 'selected' : '';
                        echo '<option value="' . $tenTheLoai . '" ' . $selected . '>' . $tenTheLoai . '</option>';
                    }
                    ?>
                </select>
                <input type="text" class="form-control" id="the_loai_input" name="the_loai" value="<?= isset($data['the_loai']) ? $data['the_loai'] : '' ?>" readonly>
            </div>

            <div class="form-group">
                <label for="nguon">Nguồn:</label>
                <input type="text" class="form-control" name="nguon" value="<?= isset($data['nguon']) ? $data['nguon'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label for="trang_thai">Trạng thái:</label>
                    <select class="form-select" name="trang_thai">
                        <option value="Mới" <?= isset($data['trang_thai']) && $data['trang_thai'] === 'Mới' ? 'selected' : '' ?>>Mới</option>
                        <option value="Đang cập nhật" <?= isset($data['trang_thai']) && $data['trang_thai'] === 'Đang cập nhật' ? 'selected' : '' ?>>Đang cập nhật</option>
                        <option value="Đã hoàn thành" <?= isset($data['trang_thai']) && $data['trang_thai'] === 'Đã hoàn thành' ? 'selected' : '' ?>>Đã hoàn thành</option>
                    </select>
            </div>

            <div class="form-group">
                <label for="danh_gia">Đánh giá:</label>
                <input type="number" class="form-control" name="danh_gia" step="0.1" value="<?= isset($data['danh_gia']) ? $data['danh_gia'] : '' ?>" required>

            </div>

            <div class="form-group">
                <label for="tom_tat">Tóm tắt:</label>
                <textarea class="form-control" name="tom_tat" rows="10" required><?= isset($data['tom_tat']) ? $data['tom_tat'] : '' ?></textarea>
            </div>

            <div class="form-group">
                <label for="so_chuong">Số chương:</label>
                <input type="number" class="form-control" name="so_chuong" value="<?= isset($data['so_chuong']) ? $data['so_chuong'] : '' ?>" required>
            </div>

            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Cập Nhật Thông Tin Truyện</button>
            </div>

            <div class="alert <?php echo empty($success_message) ? 'alert-not-success' : 'alert-success'; ?> text-center mt-3">
                <?php echo $success_message; ?>
            </div>
        </form>
    </section>
</main>
<?php include 'footer.php'; // Include the footer?>
