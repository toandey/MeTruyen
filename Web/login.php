<?php
session_start();
global $firestore;
include 'firestore_init.php'; // Sử dụng tệp cấu hình Firestore

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Truy vấn Firestore để lấy thông tin đăng nhập dựa trên email
    $collectionRef = $firestore->collection('usersAdmin');
    $query = $collectionRef->where('email', '=', $email);
    $documents = $query->documents();

    // Check if any documents were found
    if (!$documents->isEmpty()) {
        // Iterate over the documents to find the user
        foreach ($documents as $document) {
            $user = $document->data();

            // Check if the password matches
            if ($user['password'] === $password) {
                $_SESSION['user'] = $email;
                header("Location: index.php");
                exit();
            }
        }

        // If the loop didn't break, it means no matching user was found.
        echo "Mật khẩu không chính xác. Vui lòng kiểm tra lại.";
    } else {
        // Đăng nhập thất bại vì email không tồn tại trong Firestore
        echo "Email không tồn tại. Vui lòng kiểm tra lại.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Đăng nhập - Mê truyện</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="https://s.toan.top/medoctruyen-notext.png" rel="icon" />
    <link href="https://s.toan.top/medoctruyen-notext.png" rel="apple-touch-icon" />

    <!-- Sử dụng Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            border-radius: 4px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Giảm chiều ngang của form */
            width: 100%;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }
        .text-center{
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container login-container">
    <div class="header">
        <div>
            <img src="assets/img/logo.png" alt="Logo Mê Truyện" style="max-width: 100px;">
        </div>
        <div>
            <h2>Đăng Nhập</h2>
        </div>
    </div>
    <form method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
        </div>
        <div class="text-center"> <!-- Thêm lớp "text-center" để căn giữa nút -->
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </div>
    </form>
    <div class="footer">
        &copy; 2023 Bản quyền thuộc về Mê Truyện Teams
    </div>
</div>
<!-- Sử dụng Bootstrap JS và Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
