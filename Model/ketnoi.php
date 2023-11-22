<?php
    class conDB{
        function connectDB(& $conn){
            $conn = mysqli_connect("localhost","id21546223_pheonix","18112002Pheonix@gmail.com","id21546223_pheonixiuh");
            mysqli_set_charset($conn, "utf8");
            if ($conn){
                return mysqli_select_db($conn, "id21546223_pheonixiuh");
            } else {
                return false;
            }
        }
        function disconnect($conn){
            mysqli_close($conn);
        }
    }
?>