<?php
    include_once("Model/mNguoidung.php");
    function updateTT($username,$TenND,$Pass,$SDT,$Email, $DiaChi, $NgaySinh){
        $TenND = $_REQUEST['fullname'];
        $Pass = $_REQUEST['password'];
        $SDT = $_REQUEST['phone'];
        $Email = $_REQUEST['email'];
        $DiaChi = $_REQUEST['diachi'];
        $NgaySinh = $_REQUEST['ngaysinh'];
    }
    
    function updateTG($username,$ThoiGian,$GhiChu){
        $ThoiGian = $_REQUEST['thoiGian'];
        $GhiChu = $_REQUEST['ghiChu'];
    }
?>