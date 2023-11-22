<?php
    // session_start();
?>
<?php
    include_once 'ketnoi.php';
    function selectUser($ten){
        $object = new conDB();
        $connection = $object->connectDB($conn);
        if ($connection) {
            $queryCommand="SELECT * FROM nguoidung WHERE username = '$ten'";
            $data = mysqli_query($conn,$queryCommand);
            $object->disconnect($conn);
            return $data;
        } else {
            return false;
        }
    }
    
    function selectTime($ten){
        $object = new conDB();
        $connection = $object->connectDB($conn);
        if ($connection) {
            $queryCommand="SELECT * FROM thoigiannhacnho WHERE username = '$ten'";
            $data = mysqli_query($conn,$queryCommand);
            $object->disconnect($conn);
            return $data;
        } else {
            return false;
        }
    }
?>