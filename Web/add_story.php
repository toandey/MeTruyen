<?php
include 'auth_check.php';
global $firestore;
require 'vendor/autoload.php'; // Sử dụng Firebase PHP SDK
use Google\Cloud\Storage\StorageClient;

// Include file cấu hình Firestore
include 'firestore_init.php';

$success_message = '';

$created_at_timestamp = time();
$created_at_string = date('Y-m-d H:i:s', $created_at_timestamp);

// Xử lý khi người dùng nhấn nút "Thêm truyện"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $ten_truyen = $_POST["ten_truyen"];
    $tac_gia = $_POST["tac_gia"];
    $the_loai = $_POST["the_loai"];
    $nguon = $_POST["nguon"];
    $trang_thai = $_POST["trang_thai"];
    $danh_gia = floatval($_POST["danh_gia"]);
    $tom_tat = $_POST["tom_tat"];
    $so_chuong = intval($_POST["so_chuong"]);

    // Kiểm tra tùy chọn cho phép sử dụng URL ảnh
    $use_url = isset($_POST["anh_bia_url_option"]) && $_POST["anh_bia_url_option"] === "yes";
    $file_extension = '';

    if (!$use_url && isset($_FILES["anh_bia"]) && $_FILES["anh_bia"]["error"] == 0) {
        $file_extension = pathinfo($_FILES["anh_bia"]["name"], PATHINFO_EXTENSION);

        // Kiểm tra định dạng tệp hợp lệ
        $allowed_formats = ['jpg', 'jpeg', 'png'];
        if (!in_array($file_extension, $allowed_formats)) {
            die("Định dạng ảnh không được hỗ trợ. Chỉ hỗ trợ 'jpg', 'jpeg' và 'png'.");
        }

        // Kiểm tra kích thước tệp
        if ($_FILES["anh_bia"]["size"] > 1024000) { // 1MB
            die("Kích thước ảnh quá lớn. Hãy tải lên ảnh có kích thước nhỏ hơn 1MB.");
        }
    }

    // Nếu sử dụng URL ảnh, lấy URL từ trường nhập liệu
    if ($use_url) {
        $anh_bia = $_POST["anh_bia_url"];
    } else {
        // Nếu không sử dụng URL, tải ảnh lên Firebase Storage
        $storage = new StorageClient([
            'keyFilePath' => 'key/me-doc-truyen-f45c8-232ccd40e190.json',
        ]);

        $bucket = $storage->bucket('me-doc-truyen-f45c8.appspot.com');

        // Đặt tên tệp lưu trữ trong Firebase Storage
        $file_name = uniqid() . 'metruyen' . '.' . $file_extension;

        // Tạo đối tượng tệp
        $file = fopen($_FILES["anh_bia"]["tmp_name"], 'r');

        // Tải lên tệp lên Firebase Storage
        $object = $bucket->upload($file, [
            'name' => 'images/' . $file_name,
        ]);

        // Lấy URL ảnh bìa từ Firebase Storage
        $anh_bia = $object->signedUrl(new \DateTime('2050-01-01'));
    }

    // Lấy giá trị hiện tại của dãy số từ Firestore
    $story_counter = $firestore->collection('system')->document('story_counter')->snapshot();
    $current_count = intval($story_counter['count']);

    // Tăng giá trị dãy số lên một
    $current_count++;

    // Chuyển giá trị mới về dạng chuỗi với độ dài cố định
    $new_count = sprintf("%06d", $current_count);

    // Cập nhật giá trị dãy số mới vào Firestore
    $firestore->collection('system')->document('story_counter')->set(['count' => $new_count]);

    // Tạo khóa chính dựa trên giá trị mới của dãy số
    $story_id = 'story' . $new_count;

    // Thêm truyện vào Firestore
    $firestore->collection('stories')->document($story_id)->set([
        'ten_truyen' => $ten_truyen,
        'tac_gia' => $tac_gia,
        'the_loai' => $the_loai,
        'nguon' => $nguon,
        'trang_thai' => $trang_thai,
        'danh_gia' => $danh_gia,
        'tom_tat' => $tom_tat,
        'so_chuong' => $so_chuong,
        'anh_bia' => $anh_bia,
        'chapter_count' => 0,
        'view_story' => 0,
        'created_at' => $created_at_string
    ]);

    // Redirect hoặc thông báo thành công
    $success_message = 'Truyện đã được thêm thành công!';
}
?>
<?php include 'header.php'; // Include the header?>
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi bi-book"></i><span>Quản lý truyện</span
                    ><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="index.php">
                            <i class="bi bi-circle"></i><span>Danh sách truyện</span>
                        </a>
                    </li>
                    <li>
                        <a href="add_story.php" class="active">
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
            <h1>Thêm Truyện Mới</h1>
        </div>
        <!-- End Page Title -->
        <section class="section dashboard">
            <form method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <div class="alert <?php echo empty($success_message) ? 'alert-not-success' : 'alert-success'; ?> text-center mt-3">
                        <?php echo $success_message; ?>
                    </div>
                    <label for="ten_truyen">Tên truyện:</label>
                    <label>
                        <input type="text" class="form-control" name="ten_truyen" id="ten_truyen_input" required>
                    </label>
                    <div class="text-center mt-2">
                        <button type="button" id="capitalizeAllWords" class="btn btn-secondary">Viết hoa từng chữ cái đầu</button>
                        <button type="button" id="capitalizeFirstWord" class="btn btn-secondary">Viết hoa chữ cái đầu tiên</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tac_gia">Tác giả:</label>
                    <label>
                        <input type="text" class="form-control" name="tac_gia" required>
                    </label>
                </div>

                <!-- Thêm trường để điền URL ảnh bìa -->
                <div class="form-group">
                    <label for="anh_bia">Ảnh bìa:</label>
                    <div class="input-group">
                        <input type="file" class="form-control-file" name="anh_bia" accept="image/*">
                        <div class="input-group-append">
                            <label class="input-group-text">
                                <input type="checkbox" name="anh_bia_url_option" value="yes"> Sử dụng URL ảnh
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Thêm trường để nhập URL ảnh nếu người dùng chọn sử dụng URL -->
                <div class="form-group">
                    <label for="anh_bia_url">URL ảnh bìa:</label>
                    <label>
                        <input type="text" class="form-control" name="anh_bia_url">
                    </label>
                </div>



                <div class="form-group">
                    <label for="the_loai_input">Thể loại:</label>
                    <label for="selectGenres"></label><select id="selectGenres" class="form-select">
                        <?php
                        // Sử dụng truy vấn Firestore để lấy danh sách thể loại và sắp xếp theo tên thể loại (tăng dần)
                        $genresQuery = $firestore->collection('genres')->orderBy('ten_the_loai', 'asc');
                        $genres = $genresQuery->documents();

                        // Duyệt qua danh sách thể loại và tạo tùy chọn cho mỗi thể loại
                        foreach ($genres as $genre) {
                            $genreData = $genre->data();
                            $tenTheLoai = $genreData['ten_the_loai'];
                            echo '<option value="' . $tenTheLoai . '">' . $tenTheLoai . '</option>';
                        }
                        ?>
                    </select>
                    <input type="text" class="form-control" id="the_loai_input" name="the_loai" readonly>
                </div>

                <div class="form-group">
                    <label for="nguon">Nguồn:</label>
                    <label>
                        <input type="text" class="form-control" name="nguon" required>
                    </label>
                </div>

                <div class="form-group">
                    <label for="trang_thai">Trạng thái:</label>
                    <label>
                        <select class="form-select" name="trang_thai">
                            <option value="Mới">Mới</option>
                            <option value="Đang cập nhật">Đang cập nhật</option>
                            <option value="Đã hoàn thành">Đã hoàn thành</option>
                        </select>
                    </label>
                </div>

                <div class="form-group">
                    <label for="danh_gia">Đánh giá:</label>
                    <label>
                        <input type="number" class="form-control" name="danh_gia" step="0.1" required>
                    </label>
                </div>

                <div class="form-group">
                    <label for="tom_tat">Tóm tắt:</label>
                    <label>
                        <textarea class="form-control" name="tom_tat" rows="4" required></textarea>
                    </label>
                </div>

                <div class="form-group">
                    <label for="so_chuong">Số chương:</label>
                    <label>
                        <input type="number" class="form-control" name="so_chuong" required>
                    </label>
                </div>
                <!-- Nút thêm truyện -->
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Thêm Truyện</button>
                </div>
                
                <div class="alert alert-not-success text-center mt-3">
                    Truyện chưa được thêm thành công.
                </div>
            </form>
        </section>
    </main>
    <script>
        var successMessage = '<?php echo $success_message; ?>';
        if (successMessage !== '') {
            $('.alert-success').text(successMessage).show();
            $('.alert-not-success').hide();
        } else {
            $('.alert-success').hide();
            $('.alert-not-success').show();
        }
    </script>
    <script>
        const selectGenres = document.getElementById('selectGenres');
        const theLoaiInput = document.getElementById('the_loai_input');

        // Lắng nghe sự kiện khi người dùng chọn thể loại từ select
        selectGenres.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const selectedValue = selectedOption.value;
            const currentInputValue = theLoaiInput.value;

            // Kiểm tra xem thể loại đã được chọn và chưa trùng với bất kỳ thể loại nào trong trường input
            if (selectedValue && currentInputValue.indexOf(selectedValue) === -1) {
                // Thêm thể loại vào trường input, phân cách bằng dấu phẩy
                if (currentInputValue) {
                    theLoaiInput.value = currentInputValue + ', ' + selectedValue;
                } else {
                    theLoaiInput.value = selectedValue;
                }
            }

            // Đặt lại select
            this.selectedIndex = 0;
        });

        document.addEventListener('DOMContentLoaded', function() {
            const tenTruyenInput = document.querySelector('input[name="ten_truyen"]');

            document.getElementById('capitalizeAllWords').addEventListener('click', function() {
                tenTruyenInput.value = capitalizeAllWords(tenTruyenInput.value);
            });

            document.getElementById('capitalizeFirstWord').addEventListener('click', function() {
                tenTruyenInput.value = capitalizeFirstWord(tenTruyenInput.value);
            });

            function capitalizeAllWords(str) {
                return str.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
                    return a.toUpperCase();
                });
            }

            function capitalizeFirstWord(str) {
                return str.toLowerCase().replace(/(?:^|\s)\S/, function(a) {
                    return a.toUpperCase();
                });
            }
        });
    </script>
    <style>
        .form-group {
            width: 100%;
        }

        .form-group label {
            display: block;
        }

        .form-group textarea {
            resize: vertical;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-not-success {
            display: none;
        }
    </style>
<?php include 'footer.php'; // Include the footer?>