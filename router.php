<?php
    // include_once 'view/Signup/index.php';
    $display = 0;
    if(array_key_exists('index.php', $_GET)) {
        $display = 0;
        $_SESSION['position'] = "Trang chủ";
    }elseif(array_key_exists('menuNgayCuaToi', $_GET)) {
        $display = 1;
        $_SESSION['position'] = "Ngày của tôi";
    }elseif(array_key_exists('sukien', $_GET)){
        $_SESSION['position'] = "Sự kiện";
        $display = 2;
    }elseif(array_key_exists('motThangNhinLai', $_GET)){
        $_SESSION['position'] = "Một tháng nhìn lại";
        $display = 3;
    }elseif(array_key_exists('ThoiQuen', $_GET)){
        $_SESSION['position'] = "Thói quen";
        $display = 4 ;
    }elseif(array_key_exists('login', $_GET)){
        $_SESSION['position'] = "Đăng nhập";
        $display = 5 ;
    }elseif(array_key_exists('logout', $_GET)){
        $_SESSION['position'] = "Đăng xuất";
        $display = -5 ;
    }elseif(array_key_exists('themMoi', $_GET)){
        $_SESSION['position'] = "Thêm mới";
        $display = 6 ;
    }elseif(array_key_exists('bieuDoCamXuc', $_GET)){
        $_SESSION['position'] = "Biểu đồ cảm xúc";
        $display = 7 ;
    }elseif(array_key_exists('createThoiQuen', $_GET)){
        $_SESSION['position'] = "Tạo thói quen";
        $display = 8 ;
    }elseif(array_key_exists('dieutoibieton', $_GET)){
        $_SESSION['position'] = "Điều tôi biết ơn";
        $display = 9 ;
    }elseif(array_key_exists('taiKhoan', $_GET)){
        $_SESSION['position'] = "Tài khoản";
        $display = 10;
    }elseif(array_key_exists('forgot_password', $_GET)){
        $_SESSION['position'] = "Quên mật khẩu";
        $display = 11 ;
    }elseif(array_key_exists('mucTieuThang', $_GET)){
        $_SESSION['position'] = "Mục tiêu tháng";
        $display = 12 ;
    }elseif(array_key_exists('aboutUs', $_GET)){
        $_SESSION['position'] = "Thành viên nhóm";
        $display = 13 ;
    }

    switch ($display) {
        case 0:
            // include_once("view/Sukien/index.php");
            include_once 'view/Signup/index.php';
            break;
        case 1:
            include_once("view/NgayCuaToi/content-ngaycuatoi.php");
            break;
        case 2:
            include_once("view/SuKien/index.php");
            break;
        case 3:
            include_once("view/MotThangNhinLai/vMotThangNL.php");
            break;
        case 4:
            include_once("view/ThoiQuen/index.php");
            break;
        case 5:
            include_once("view/Login/index.php");
            break;
        case -5:
            include_once("controller/logout.php");
            break;
        case 6:
            include_once("view/SuKien/themmoi.php");
            break;
        case 7:
            include_once("view/BieuDoCamXuc/index.php");
            break;
        case 8:
            include_once("view/ThoiQuen/create.php");
            break;
        case 9:
            include_once("view/DieuBietOn/vDieuBietOn.php");
            break;
        case 10:
            include_once("view/taiKhoanNguoiDung/canhan.php");
            break;     
        case 11:
            include_once("view/DangKy_DangNhap/forgot_password.php");
            break;
        case 12:
            include_once("view/mucTieuThang/MTT.php");
            break;  
        case 13:
            include_once("view/about/about.php");
            break;   
        default:
            echo "page not found 404!";
            break;        
    }
    
?>