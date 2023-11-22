<?php
    include_once 'ketnoi.php';
    function selectThoiQuen($ten){
        $object = new conDB();
        $connection = $object->connectDB($conn);
        if ($connection) {
            $queryCommand="SELECT * FROM thoiquen WHERE username = '$ten'";
            $data = mysqli_query($conn,$queryCommand);
            $object->disconnect($conn);
            return $data;
        } else {
            return false;
        }
    }
?>