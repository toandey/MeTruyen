<?php
include 'auth_check.php';
global $firestore;
include 'firestore_init.php';

// Xử lý thêm tài khoản vào Firestore nếu có yêu cầu POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Thêm tài khoản vào Firestore với trường ngày tạo
    $currentDate = new DateTime();
    $currentDate->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh'));
    $timestamp = $currentDate->getTimestamp(); // Chuyển đổi thành timestamp

    $collection = $firestore->collection('usersAdmin');
    $document = $collection->document($email);
    $document->set([
        'email' => $email,
        'password' => $password,
        'created_at' => $timestamp // Thêm trường ngày tạo
    ]);

    // Hiển thị modal thông báo
    echo "<script>
            alert('Tài khoản đã được thêm thành công!');
            window.location.href='account.php'; // Điều hướng về trang chính hoặc trang bạn muốn
          </script>";
}

// Xử lý xoá tài khoản
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_account"])) {
    $email = $_POST["delete_account_email"];

    // Xoá tài khoản khỏi Firestore
    $firestore->collection('usersAdmin')->document($email)->delete();

    // Tránh gửi lại dữ liệu khi người dùng làm mới trang
    header("Location: account.php?page=1");
    exit;
}

// Xử lý phân trang
$per_page = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$accounts_ref = $firestore->collection('usersAdmin');
$query = $accounts_ref->orderBy('email')->limit($per_page)->offset(($page - 1) * $per_page);
$accounts = $query->documents();

$account_count = $accounts_ref->documents()->size();
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
            <a class="nav-link" href="account.php">
                <i class="bi bi-person"></i>
                <span>Tài Khoản</span>
            </a>
        </li>

    </ul>
</aside>
<!-- End Sidebar-->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Quản lý Tài Khoản</h1>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
    <h5>Thêm tài khoản mới</h5>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mật Khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Tài Khoản</button>
    </form>

    <br>
    <h5>Danh Sách Tài Khoản</h5>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Ngày Tạo</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $index = ($page - 1) * $per_page + 1; ?>
        <?php foreach ($accounts as $account) : ?>
            <?php $data = $account->data(); ?>
            <tr>
                <td><?= $index++; ?></td>
                <td><?= $data['email']; ?></td>
                <td><?= date('H:i:s Y-m-d', $data['created_at']); ?></td>
                <td>
                    <form method="post" class="delete-form">
                        <input type="hidden" name="delete_account_email" value="<?= $data['email']; ?>">
                        <button type="button" class="btn btn-danger delete-btn">Xoá</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if ($page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="account.php?page=<?= $page - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= ceil($account_count / $per_page); $i++) : ?>
                <li class="page-item <?= $page == $i ? 'active' : ''; ?>">
                    <a class="page-link" href="account.php?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if ($page < ceil($account_count / $per_page)) : ?>
                <li class="page-item">
                    <a class="page-link" href="account.php?page=<?= $page + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
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
                <p>Bạn có chắc muốn xoá tài khoản này?</p>
            </div>
            <div class="modal-footer">
                <form id="delete-form" method="post">
                    <input type="hidden" name="delete_account_email" id="delete-account-email">
                    <button type="submit" name="delete_account" class="btn btn-danger">Xoá</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        // Xử lý nút xoá
        $(".delete-btn").click(function () {
            const email = $(this).closest('form').find('input[name="delete_account_email"]').val();
            $("#delete-account-email").val(email);
            $("#confirm-delete-modal").modal("show");
        });
    });
</script>
<?php include 'footer.php'; // Include the footer?>