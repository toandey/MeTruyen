<!--<?php include 'auth_check.php';?>   -->

<!DOCTYPE html>,
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard - Mê đọc truyện</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="https://s.toan.top/medoctruyen-notext.png" rel="icon" />
    <link href="https://s.toan.top/medoctruyen-notext.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"/>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"/>
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />

    <!-- CDN CSS Files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <div style="margin-right: 2rem;"><i class="bi bi-list toggle-sidebar-btn"></i></div>
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="https://s.toan.top/medoctruyen-notext.png" alt="" style="margin-right: 1rem;"/>
            <span class="d-none d-lg-block">Mê đọc truyện</span>
        </a>
    </div>
    <!-- End Logo -->

    <div class="search-bar-1">
    </div>
    <!-- End Search Bar -->
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" >
                    <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"/>
                    <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span> </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>Admin</h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#" id="changePasswordButton">
                            <i class="bi bi-gear"></i>
                            <span>Đổi mật khẩu</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#" id="logoutButton">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Đăng xuất</span>
                        </a>
                    </li>
                </ul>
                <!-- End Profile Dropdown Items -->
            </li>
            <!-- End Profile Nav -->
        </ul>
    </nav>
    <!-- End Icons Navigation -->
</header>
<!-- End Header -->
<!-- Modal đổi mật khẩu -->
<div id="changePasswordModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đổi mật khẩu</h5>
                <button type="button" class="close" id="closeChangePasswordModal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="changePasswordForm" method="post" action="process_change_password.php">
                    <div class="form-group">
                        <label for="currentPassword">Mật khẩu hiện tại:</label>
                        <input type="password" class="form-control" name="currentPassword" id="currentPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Mật khẩu mới:</label>
                        <input type="password" class="form-control" name="newPassword" id="newPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal đăng xuất-->
<div id="logoutModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận đăng xuất</h5>
                <button type="button" class="close" id="closeModalButton">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn đăng xuất?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelLogoutButton">Hủy</button>
                <a href="login.php" class="btn btn-primary">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">&copy; Copyright <strong><span>Mê đọc truyện</span></strong>. All Rights Reserved</div>
</footer>
<!-- End Footer -->

<!-- Đoạn mã JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var changePasswordModal = document.getElementById("changePasswordModal");
        var modalOverlay = document.createElement("div");
        modalOverlay.className = "modal-overlay";

        function showModal(modal) {
            modal.style.display = "block";
            document.body.appendChild(modalOverlay);
            document.body.classList.add("modal-open");
        }

        function hideModal(modal) {
            modal.style.display = "none";
            document.body.removeChild(modalOverlay);
            document.body.classList.remove("modal-open");
        }

        var changePasswordButton = document.getElementById("changePasswordButton");
        var closeChangePasswordModalButton = document.getElementById("closeChangePasswordModal");

        changePasswordButton.addEventListener("click", function () {
            showModal(changePasswordModal);
        });

        closeChangePasswordModalButton.addEventListener("click", function () {
            hideModal(changePasswordModal);
        });

        var logoutModal = document.getElementById("logoutModal");
        var logoutButton = document.getElementById("logoutButton");
        var cancelLogoutButton = document.getElementById("cancelLogoutButton");
        var closeModalButton = document.getElementById("closeModalButton");

        logoutButton.addEventListener("click", function () {
            showModal(logoutModal);
        });

        cancelLogoutButton.addEventListener("click", function () {
            hideModal(logoutModal);
        });

        closeModalButton.addEventListener("click", function () {
            hideModal(logoutModal);
        });

        // Đóng modal khi bấm ra ngoài
        window.addEventListener("click", function (event) {
            if (event.target === modalOverlay) {
                hideModal(changePasswordModal);
                hideModal(logoutModal);
            }
        });
    });
</script>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>