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