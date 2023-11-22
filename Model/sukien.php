<?php

include 'connect.php';

$currentUserName = $_SESSION['nguoidung'];


// if (!isset($_SESSION['nguoidung'])) {
//     echo "<script>window.location.href = './view/DangNhap_DangKy/login.php';</script>";
//     exit();
// }

$sql = "SELECT TenSK,ThoiGian,UserName FROM sukien WHERE UserName = '$currentUserName' ORDER BY ThoiGian ASC";

$result = $conn->query($sql);

$sukien = $result->fetch_all(MYSQLI_ASSOC);

?>