<?php
    include_once 'Model/mUser.php';
    function getthongtin($ten,$loaiTT){
        $kq= selectUser($ten);
        while($row = mysqli_fetch_assoc($kq)){
            if($loaiTT == 'password'){
                return $row['matKhau'];
            }elseif($loaiTT == 'fullname'){
                return $row['tenNguoiDung'];
            } elseif ($loaiTT == 'email'){
                return $row['email'];
            }elseif($loaiTT == 'phone'){
                return $row['soDT'];
            }elseif($loaiTT == 'ngaysinh'){
                return $row['ngaySinh'];
            }elseif($loaiTT == 'diachi'){
                return $row['diaChi'];
            }
        }
    }
    
    function getthoigian($ten,$kieuHT){
        $kq= selectTime($ten);
        while($row = mysqli_fetch_assoc($kq)){
            if($kieuHT == 'thoiGian'){
                return $row['thoiGian'];
            }elseif($kieuHT == 'ghiChu'){
                return $row['ghiChu'];
            }
        }
    }
?>