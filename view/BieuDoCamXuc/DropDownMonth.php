<?php
    function DropDownMonth() {
        include_once("Model/ketnoi.php");
            $object = new conDB();
            $connection = $object->connectDB($conn);
            if ($connection) {
                $queryCommand = 'SELECT distinct month(ThoiGian) as ThoiGian, TrangThai FROM CAMXUC WHERE USERNAME = "nguyenvana"';
                $tbl = mysqli_query($conn, $queryCommand);
                $result = mysqli_num_rows($tbl);
                $object->disconnect($conn);
                echo ('<form action="#" method="post"><select name="thang" id="thang">');
                if($result>0){
                    while($row = mysqli_fetch_assoc($tbl)){
                        $thang = $row['ThoiGian'];
                        echo "<option value=$thang>$thang</option>";
                    }
                }else{
                    echo "0 result";
                }
                echo '</select><input type="submit" name="btnfilter" value="filter"></form>';
                
            } else {
                return false;
            }
    };
    function getMonth() {
        if(isset($_REQUEST['btnfilter'])){
            $m = $_REQUEST['thang'];
            return $m;
        }
    }
?>


