<?php
include 'auth_check.php';
global $firestore;
include 'firestore_init.php';
require 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;



// Lấy danh sách truyện từ collection stories
$db = $firestore;
$stories = $db->collection('stories')->documents();

// Lấy danh sách slider từ collection slider
$sliders = $db->collection('slider')->documents();

// Kiểm tra nếu có yêu cầu cập nhật slider
if (isset($_POST['update'])) {
    // Lấy id của slider cần cập nhật
    $slider_id = $_POST['slider_id'];

    // Lấy ảnh được tải lên từ thiết bị
    $image = $_FILES['image'];

    // Lấy tên truyện được chọn từ selection
    $story = $_POST['story'];

    // Kiểm tra nếu ảnh hợp lệ
    if ($image['error'] == 0 && $image['size'] > 0) {
        // Lấy tên file ảnh
        $image_name = $image['name'];

        // Lấy đường dẫn tạm thời của ảnh
        $image_tmp = $image['tmp_name'];

        // Tạo đường dẫn lưu trữ ảnh trên firebase storage
        $image_path = 'slider/' . $image_name;

        // Tải ảnh lên firebase storage
        $storage = new StorageClient([
            'keyFilePath' => 'key/me-doc-truyen-f45c8-232ccd40e190.json',
        ]);
        $bucket = $storage->bucket('me-doc-truyen-f45c8.appspot.com');
        $bucket->upload(
            fopen($image_tmp, 'r'),
            [
                'name' => $image_path
            ]
        );

        // Lấy link ảnh từ firebase storage
        $image_link = $bucket->object($image_path)->signedUrl(
            new \DateTime('tomorrow')
        );
    }

    // Cập nhật dữ liệu cho slider trên firestore
    $db->collection('slider')->document($slider_id)->set([
        'image' => $image_link,
        'storyid' => $story
    ]);

    // Chuyển hướng về trang slider.php
    header('Location: slider.php');
    exit();
}
?>
<?php include 'header.php'; // Include the header?>

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
            <a class="nav-link" href="slider.php">
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
        <h1>Quản lý Slider</h1>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">

        <form id="update-form" method="post" enctype="multipart/form-data" hidden>
            <div class="form-group">
                <input type="hidden" name="slider_id" id="slider_id">
                <label for="image">Chọn ảnh mới:</label>
                <input type="file" name="image" id="image" accept="image/*" class="form-control">
            </div>

            <div class="form-group">
                <label for="story">Chọn truyện mới:</label>
                <select name="story" id="story" class="form-control">
                    <?php
                    foreach ($stories as $story) {
                        // Lấy id của truyện
                        $story_id = $story->id();

                        // Lấy tên truyện
                        $story_name = $story['ten_truyen'];

                        // Hiển thị tên truyện trong selection
                        echo "<option value='$story_id'>$story_name</option>";
                    }
                    ?>
                </select>
            </div>

            <input type="submit" name="update" value="Cập nhật" class="btn btn-success" onclick="scrollToForm()">

        </form>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Slider</th>
                <th>Ảnh</th>
                <th>Truyện</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Duyệt qua danh sách slider
            foreach ($sliders as $slider) {
                // Lấy dữ liệu của slider
                $slider_data = $slider->data();

                // Lấy id của slider
                $slider_id = $slider->id();

                // Lấy link ảnh của slider
                $slider_image = $slider_data['image'];

                // Lấy id của truyện của slider
                $slider_storyid = $slider_data['storyid'];

                // Tìm truyện có id trùng với slider_storyid
                $story = $db->collection('stories')->document($slider_storyid)->snapshot();

                // Lấy tên truyện nếu 'ten_truyen' tồn tại, ngược lại sẽ là một giá trị mặc định (ví dụ: 'N/A')
                $story_name = isset($story['ten_truyen']) ? $story['ten_truyen'] : 'N/A';

                // Hiển thị dữ liệu của slider trong bảng
                echo "<tr>";
                echo "<td>$slider_id</td>";
                echo "<td><img src='$slider_image' width='200'></td>";
                echo "<td>$story_name</td>";
                echo "<td><button onclick='updateSlider(\"$slider_id\")' class='btn btn-primary'>Cập nhật</button></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>

    </section>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    // Hàm để hiển thị form cập nhật slider và cuộn xuống form
    function updateSlider(slider_id) {
        // Lấy phần tử form
        var form = document.getElementById('update-form');

        // Lấy phần tử input slider_id
        var input_slider_id = document.getElementById('slider_id');

        // Gán giá trị cho input slider_id
        input_slider_id.value = slider_id;

        // Hiển thị form
        form.hidden = false;

        // Cuộn xuống phần form
        scrollToForm();
    }

    // Hàm để cuộn xuống phần form
    function scrollToForm() {
        var form = document.getElementById('update-form');
        form.scrollIntoView({ behavior: 'smooth' });
    }
</script>

<?php include 'footer.php'; // Include the footer?>
