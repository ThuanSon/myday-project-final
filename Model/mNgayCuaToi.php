<?php
    include_once("ketnoi.php");
    

    class modelNgayCuaToi {
        function selectAllWorkName(){
            
            $connect = new conDB();
            $con;
            $result = $connect->connectDB ($con);
            if ($result) {
                $stringQuery = "select * from congviecquantrong";
                $table = mysqli_query($con, $stringQuery);
                $connect->disconnect($con);
                return $table;
            }
            else{
                return false;
            }
        }


        function insertWork ($nameWork, $timeLine, $maDSCV){
            
            $connect = new conDB();
            $con;
            $result = $connect->connectDB ($con);
            if( $result){
               
                $stringQuery = "INSERT INTO congviecquantrong VALUES ( NULL,'$nameWork', '$timeLine', '$maDSCV' )";
            
                $table = mysqli_query($con, $stringQuery);
                $connect->disconnect($con);
                return $table;
            }else{
                return false;
            }
        }

        function selectWork ($userName, $timeQuery){
            
            $connect = new conDB();
            $con;
            $result = $connect->connectDB ($con);
            if( $result){
               
                $stringQuery = "SELECT tenCongViec FROM congviecquantrong cv INNER JOIN motngaycuatoi mnct ON cv.maDSCongViec = mnct.maDSCongViec WHERE mnct.username = '$userName' and mnct.ngayThang = '$timeQuery'";
            
                $table = mysqli_query($con, $stringQuery);
                $connect->disconnect($con);
                return $table;
            }else{
                return false;
            }
        }

        function updateStatusWork ($userName, $date, $amountWater, $statusCheck, $emotionDay){
            
            $connect = new conDB();
            $con;
            $result = $connect->connectDB ($con);
            if( $result){
               
                $stringQuery = "UPDATE motngaycuatoi SET luongNuocDaUong = $amountWater, trangThai = $statusCheck, camXucCaNgay = $emotionDay WHERE ngayThang = '$date' AND username = '$userName'";
                
                $table = mysqli_query($con, $stringQuery);
                $connect->disconnect($con);
                return $table;
                // return $stringQuery;
            }else{
                return false;
            }
        }

        function insertWorkMyDay ($timeLineKey,$amountWater, $countChecked, $emotionDay,$note,$userName, $maDSCV){
            
            $connect = new conDB();
            $con;
            $result = $connect->connectDB ($con);
            if( $result){
               
                $stringQuery = "INSERT INTO motngaycuatoi VALUES ( '$timeLineKey','$amountWater', '$countChecked', '$emotionDay','$note','$userName','$maDSCV' )";
            
                $table = mysqli_query($con, $stringQuery);
                $connect->disconnect($con);   
                return $table;
            }else{
                return false;
            }
        }

        function insertEmotionstable ($emotionDay, $date, $userName){
            
            $connect = new conDB();
            $con;
            $result = $connect->connectDB ($con);
            if( $result){
                switch ($emotionDay) {
                    case '1':
                        $a = 'Tệ';
                        break;
                    case '2':
                        $a = 'Buồn';
                        break;
                    case '3':
                        $a = 'Bình thường';
                        break;
                    case '4':
                        $a = 'Vui';
                        break;
                    case '5':
                        $a = 'Hạnh phúc';
                        break;
                    default:
                        $a = "";
                        break;
                }
                $stringQuery = "INSERT INTO `camxuc` VALUES (NULL,'$a','$date','$userName')";
            
                $table = mysqli_query($con, $stringQuery);
                $connect->disconnect($con);
                return $table;
            }else{
                return false;
            }
        }

    }
?>