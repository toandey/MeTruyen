<?php
require 'vendor/autoload.php'; // Tải autoload.php để sử dụng Google Cloud Firestore

use Google\Cloud\Firestore\FirestoreClient;

// Đường dẫn đến tệp JSON chứa thông tin xác thực (Service Account Key)
$serviceAccountPath = 'key/me-doc-truyen-f45c8-232ccd40e190.json';

// Khởi tạo FirestoreClient
// Khởi tạo FirestoreClient
try {
    $firestore = new FirestoreClient([
        'keyFile' => json_decode(file_get_contents($serviceAccountPath), true)
    ]);
} catch (\Google\Cloud\Core\Exception\GoogleException $e) {
    // Xử lý lỗi ở đây (ví dụ: in ra thông báo lỗi)
    echo 'Lỗi khởi tạo FirestoreClient: ' . $e->getMessage();
}

?>