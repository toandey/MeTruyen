<?php
include 'auth_check.php';
global $firestore;
include 'firestore_init.php'; // Include tệp cấu hình Firestore

$per_page = 7;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$stories_ref = $firestore->collection('stories');
$query = $stories_ref->limit($per_page)->offset(($page - 1) * $per_page);
$stories = $query->documents();

// Tính toán tổng số truyện
$story_count = $stories_ref->documents()->size();


if (isset($_POST['delete_story'])) {
    $story_id = $_POST['delete_story_id'];

    // Xoá truyện trong Firestore
    $story_ref = $firestore->collection('stories')->document($story_id);
    $story_ref->delete();

    // Redirect để load lại trang
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
        <h1>Danh Sách Truyện</h1>
    </div>
    <p>
        <a href="add_story.php" class="btn btn-dark">Thêm truyện mới</a>
    </p>
    <!-- End Page Title -->
    <section class="section dashboard">
        <table class="table table-bordered" id="genre-table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Ảnh bìa</th>
                <th>Tên truyện</th>
                <th>Trạng thái</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $index = ($page - 1) * $per_page + 1; ?>
            <?php foreach ($stories as $doc) : ?>
                <?php $data = $doc->data(); ?>
                <tr>
                    <td ><?= $index++; ?></td>
                    <td ><img src="<?= $data['anh_bia'] ?>" style="max-width: 50px; max-height: 70px;" alt="anhbia"></td>
                    <td><?= $data['ten_truyen']; ?></td>
                    <td><?= $data['trang_thai']; ?></td>
                    <td>
                        <a href="edit_story.php?story_id=<?= $doc->id(); ?>" class="btn btn-primary">Sửa</a>
                        <a href="#" class="btn btn-danger delete-btn" data-id="<?= $doc->id(); ?>">Xoá</a>
                        <a href="list_chapter.php?story_id=<?= $doc->id(); ?>" class="btn btn-info">Danh sách chương</a>
                        <a href="add_chapter.php?story_id=<?= $doc->id(); ?>" class="btn btn-success">Thêm chương mới</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Phân trang -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                // Tính toán tổng số trang
                $total_pages = ceil($story_count / $per_page);

                // Tạo nút Previous
                if ($page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page - 1) . '">Previous</a></li>';
                }

                // Tạo các nút trang
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                }

                // Tạo nút Next
                if ($page < $total_pages) {
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($page + 1) . '">Next</a></li>';
                }
                ?>
            </ul>
        </nav>
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
                <p>Bạn có chắc muốn xoá truyện này?</p>
            </div>
            <div class="modal-footer">
                <form id="delete-form" method="post">
                    <input type="hidden" name="delete_story_id" id="delete-story-id">
                    <button type="submit" name="delete_story" class="btn btn-danger">Xoá</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" >Hủy</button>
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
        $('.delete-btn').on('click', function () {
            var storyId = $(this).data('id');
            $('#delete-story-id').val(storyId);
            $('#confirm-delete-modal').modal('show');
        });

        $('#confirm-delete-modal').on('hidden.bs.modal', function () {
            $('#delete-story-id').val('');
        });

        // Thêm sự kiện khi nhấn nút "Hủy" trong modal
        $('#confirm-delete-modal').on('click', '[data-dismiss="modal"]', function () {
            $('#delete-story-id').val('');
        });
    });
</script>


<?php include 'footer.php'; // Include the footer?>
