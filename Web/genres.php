<?php
include 'auth_check.php';
global $firestore;
require 'vendor/autoload.php'; // Sử dụng Firebase PHP SDK

// Include file cấu hình Firestore
include 'firestore_init.php';

// Xử lý khi người dùng thêm thể loại mới
// Xử lý khi người dùng thêm thể loại mới
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_genre"])) {
    // Lấy giá trị hiện tại của dãy số từ Firestore
    $genre_counter = $firestore->collection('system')->document('genres_counter')->snapshot();
    $current_count = intval($genre_counter['count']);

    // Tăng giá trị dãy số lên một
    $current_count++;

    // Chuyển giá trị mới về dạng chuỗi với độ dài cố định
    $new_count = sprintf("%06d", $current_count);

    // Cập nhật giá trị dãy số mới vào Firestore
    $firestore->collection('system')->document('genres_counter')->set(['count' => $new_count]);

    // Tạo khóa chính dựa trên giá trị mới của dãy số
    $genre_id = 'genres' . $new_count;

    $ten_the_loai = $_POST["ten_the_loai"];
    $mo_ta = $_POST["mo_ta"];

    // Thêm thể loại vào Firestore
    $firestore->collection('genres')->document($genre_id)->set([
        'ten_the_loai' => $ten_the_loai,
        'mo_ta' => $mo_ta,
    ]);

    // Redirect để tránh gửi lại dữ liệu khi người dùng làm mới trang
    header("Location: genres.php");
}

// Xử lý cập nhật thể loại
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_genre"])) {
    $genre_id = $_POST["id"];
    $ten_the_loai = $_POST["ten_the_loai"];
    $mo_ta = $_POST["mo_ta"];

    // Cập nhật thông tin thể loại vào Firestore
    $firestore->collection('genres')->document($genre_id)->update([
        ['path' => 'ten_the_loai', 'value' => $ten_the_loai],
        ['path' => 'mo_ta', 'value' => $mo_ta],
    ]);

    // Redirect để tránh gửi lại dữ liệu khi người dùng làm mới trang
    header("Location: genres.php");
}

// Xử lý xoá thể loại
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_genre"])) {
    $genre_id = $_POST["delete_genre_id"];
    // Xoá thể loại khỏi Firestore
    $firestore->collection('genres')->document($genre_id)->delete();
    // Redirect để tránh gửi lại dữ liệu khi người dùng làm mới trang
    header("Location: genres.php");
}

// Xử lý phân trang
$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$genres_ref = $firestore->collection('genres');
$query = $genres_ref->orderBy('ten_the_loai')->limit($per_page)->offset(($page - 1) * $per_page);
$genres = $query->documents();

$genre_count = $genres_ref->documents()->size();
?>

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
            <a class="nav-link collapsed" href="add_chapter.php">
                <i class="bi bi-folder-plus"></i>
                <span>Thêm chương mới</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="genres.php">
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
        <h1>Quản lý Thể Loại Truyện</h1>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
    <h4>Thêm Thể Loại Mới</h4>
    <form method="post">
        <div class="form-group">
            <label for="ten_the_loai">Tên Thể Loại:</label>
            <input type="text" class="form-control" name="ten_the_loai" required>
        </div>
        <div class="form-group">
            <label for="mo_ta">Mô Tả:</label>
            <textarea class="form-control" name="mo_ta" rows="3"></textarea>
        </div>
        <button type="submit" name="add_genre" class="btn btn-primary">Thêm Thể Loại</button>
    </form>

    <h4>Danh Sách Thể Loại</h4>
    <table class="table table-bordered" id="genre-table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên Thể Loại</th>
            <th>Mô Tả</th>
            <th>Thao Tác</th>
        </tr>
        </thead>
        <tbody>
        <?php $index = ($page - 1) * $per_page + 1; ?>
        <?php foreach ($genres as $genre) : ?>
            <?php $data = $genre->data(); ?>
            <tr>
                <td><?= $index++; ?></td>
                <td><?= $data['ten_the_loai']; ?></td>
                <td><?= substr($data['mo_ta'], 0, 120); ?>...</td>
                <td>
                    <a href="#" class="btn btn-primary edit-btn" data-id="<?= $genre->id(); ?>">Sửa</a>
                    <a href="#" class="btn btn-danger delete-btn" data-id="<?= $genre->id(); ?>">Xoá</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if ($page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="genres.php?page=<?= $page - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= ceil($genre_count / $per_page); $i++) : ?>
                <li class="page-item <?= $page == $i ? 'active' : ''; ?>">
                    <a class="page-link" href="genres.php?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if ($page < ceil($genre_count / $per_page)) : ?>
                <li class="page-item">
                    <a class="page-link" href="genres.php?page=<?= $page + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <div id="edit-form" style="display: none;">
        <h4>Sửa Thể Loại</h4>
        <form method="post">
            <input type="hidden" name="id" id="edit-id">
            <div class="form-group">
                <label for="edit-ten_the_loai">Tên Thể Loại:</label>
                <input type="text" class="form-control" name="ten_the_loai" id="edit-ten_the_loai" required>
            </div>
            <div class="form-group">
                <label for="edit-mo_ta">Mô Tả:</label>
                <textarea class="form-control" name="mo_ta" id="edit-mo_ta" rows="3"></textarea>
            </div>
            <button type="submit" name="update_genre" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
</section>
</main>
<!-- Modal xác nhận xoá -->
<div id="confirm-delete-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Xác nhận xoá</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc muốn xoá thể loại này?</p>
            </div>
            <div class="modal-footer">
                <form id="delete-form" method="post">
                    <input type="hidden" name="delete_genre_id" id="delete-genre-id">
                    <button type="submit" name="delete_genre" class="btn btn-danger">Xoá</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        // Xử lý nút sửa
        $(".edit-btn").click(function () {
            var id = $(this).data("id");
            var row = $(this).closest("tr");
            var ten_the_loai = row.find("td:eq(1)").text();
            var mo_ta = row.find("td:eq(2)").text().replace("...", ""); // Lấy mô tả gốc

            $("#edit-id").val(id);
            $("#edit-ten_the_loai").val(ten_the_loai);
            $("#edit-mo_ta").val(mo_ta);

            // Hiển thị form sửa và ẩn thông tin thể loại
            $("#edit-form").show();
            $("#genre-table").hide();
        });

        // Xử lý nút xoá
        $(".delete-btn").click(function () {
            var id = $(this).data("id");
            $("#delete-genre-id").val(id);
            $("#confirm-delete-modal").modal("show");
        });
    });
</script>
<?php include 'footer.php'; // Include the footer?>
