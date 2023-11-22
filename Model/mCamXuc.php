<?php
    include_once('ketnoi.php');
    function selectCamXucByMonth($username, $month){
        $object = new conDB();
        $connection = $object->connectDB($conn);
        if ($connection) {
            $queryCommand = 'SELECT day(ThoiGian) as ThoiGian, TrangThai FROM camxuc
                            WHERE UserName = "'.$username.'" and month(ThoiGian) = '.$month;
            $data = mysqli_query($conn,$queryCommand);
            $object->disconnect($conn);
            return $data;
        } else {
            return false;
        }
        
    }
?>