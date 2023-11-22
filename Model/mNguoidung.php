<?php
include_once('ketnoi.php'); 
    //Cập nhật thông tin cá nhân
    function uTT($username,$TenND,$Pass,$SDT,$Email, $DiaChi, $NgaySinh){
        $object = new conDB();
        $connection = $object->connectDB($conn);
            $p = new conDB();
            if ($connection) {
                $string = "update nguoidung ";
                $string .= "set tenNguoiDung = '$TenND' ";
                $string .= ", matKhau = '$Pass' ";
                $string .= ", soDT = '$SDT' ";
                $string .= ", email = '$Email' ";
                $string .= ", diaChi = '$DiaChi' ";
                $string .= ", ngaySinh = '$NgaySinh'";
                $string .= "where username = '$username'";
                $ThongTin = mysqli_query($conn,$string);
                $p->disconnect($conn);
                return $ThongTin;
            } else {
                return false;
            }
        }
        //Cập nhật thời gian nhắc nhở
        function uTG($username,$ThoiGian,$GhiChu){
            $object = new conDB();
            $connection = $object->connectDB($conn);
                $p = new conDB();
                if ($connection) {
                    $string = "insert into thoigiannhacnho(thoiGian,ghiChu,username) values(\'NaN\',\'NaN\',\'$username\');\n";
                    $string .= "UPDATE\n"

    . "    thoigiannhacnho\n"

    . "SET\n"

    . "    thoiGian = \'01:00\',\n"

    . "    ghiChu = \'di ngu \'\n"

    . "WHERE\n"

    . "    username = \'thuanson\';";
                    var_dump($string);
                    $ThoiGian = mysqli_query($conn,$string);
                    $p->disconnect($conn);
                    
                    return $ThoiGian;
                } else {
                    return false;
                }
    
            }
