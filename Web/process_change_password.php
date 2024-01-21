<?php
global $firestore;
session_start();
include 'firestore_init.php'; // Đường dẫn đến tệp kết nối với Firestore

// Kiểm tra xác thực người dùng, nếu không xác thực thì chuyển hướng đến trang đăng nhập
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Lấy thông tin từ form
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$userEmail = $_SESSION['user'];

// Truy vấn Firestore để lấy thông tin người dùng dựa trên email
$usersRef = $firestore->collection('usersAdmin');
$query = $usersRef->where('email', '=', $userEmail);
$documents = $query->documents();

// Kiểm tra nếu có tài khoản người dùng
if (!$documents->isEmpty()) {
    foreach ($documents as $userDoc) {
        $userData = $userDoc->data();

        // Kiểm tra mật khẩu hiện tại
        if ($userData['password'] === $currentPassword) {
            // Lấy DocumentReference của tài liệu để có thể cập nhật
            $documentRef = $userDoc->reference();

            // Cập nhật mật khẩu mới vào Firestore
            $documentRef->update([
                ['path' => 'password', 'value' => $newPassword],
            ]);

            // Chuyển hướng đến trang đăng nhập sau khi đổi mật khẩu thành công
            header("Location: login.php");
            exit();
        } else {
            echo "Mật khẩu hiện tại không chính xác.";
        }
    }
} else {
    echo "Không tìm thấy tài khoản người dùng.";
}
?>
