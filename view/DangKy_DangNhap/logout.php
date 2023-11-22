<?php
session_start(); // Bắt đầu session

// Xóa tất cả các biến session
$_SESSION = array();

// Hủy session
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính không đăng nhập
header("Location: login.php "); // Điều hướng đến trang đăng nhập
// include "./login.php";
exit;
?>
