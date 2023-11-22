<?php
    include_once 'ketnoi.php';

    function checkUsernameExists($ten) {
        $object = new conDB();
        $connection = $object->connectDB($conn);
    
        if ($connection) {
            $queryCommand = "SELECT * FROM nguoidung WHERE username = '$ten'";
            $data = mysqli_query($conn, $queryCommand);
            $rowCount = mysqli_num_rows($data);
    
            $object->disconnect($conn);
    
            return $rowCount > 0; // Trả về true nếu tên người dùng đã tồn tại, ngược lại trả về false
        } else {
            return false;
        }
    }

    function insertUser($ten,$mail,$phone,$pass){
        $object = new conDB();
        $connection = $object->connectDB($conn);
        if ($connection) {
            // $queryCommand = "INSERT INTO NGUOIDUNG(USERNAME, EMAIL, MATKHAU, SODT)";
            // $queryCommand .= "values(N'".$ten."',".$mail.",N'".$pass."',N'".$phone.")";
            $queryCommand="INSERT INTO `nguoidung` (`username`, `tenNguoiDung`, `email`, `matKhau`, `soDT`, `gioitinh`, `ngaySinh`, `diaChi`) 
            VALUES ('$ten', '$ten', '$mail', '$pass', '$phone', '0', NULL, NULL)";
            $data = mysqli_query($conn,$queryCommand);
            $object->disconnect($conn);
            return $data;
        } else {
            return false;
        }
    }
?>