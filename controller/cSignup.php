<?php
include_once 'Model/mSignup.php';

function signup($ten, $mail, $phone, $pass) {
    // Kiểm tra xem tên người dùng đã tồn tại trong cơ sở dữ liệu hay chưa
    $isUsernameExists = checkUsernameExists($ten);

    if ($isUsernameExists) {
        // Nếu tên người dùng đã tồn tại, hiển thị cảnh báo
        echo "<script>alert('Tên người dùng đã tồn tại. Vui lòng chọn tên khác.');</script>";
        return false;
    } else {
        // Nếu tên người dùng chưa tồn tại, thực hiện việc tạo tài khoản mới
        $insertResult = insertUser($ten, $mail, $phone, $pass);

        if (!$insertResult) {
            // echo "<script>alert('Không thể tạo tài khoản');</script>";
            return false;
        } else {
            // Chuyển hướng đến trang đăng nhập hoặc thực hiện hành động khác sau khi tạo tài khoản thành công
            header("Location: index.php?login");
            return true;
        }
    }
}
?>
