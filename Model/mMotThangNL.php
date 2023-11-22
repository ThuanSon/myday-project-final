<?php
    include_once("ketnoi.php");
    class modelMTNL{
        function SelectAllMTNL(){
            $p = new conDB();
            if($p->connectDB($conn)){
                $str = "SELECT * FROM motthangnhinlai";
                $tbl = mysqli_query($str);
                $p->disconnect($conn);
                return $tbl;
            }return false;
        }
        function SelectAllMTNLByMonth($month,$year, $username){
            $p = new conDB();
            if($p->connectDB($conn)){
                $str = "SELECT * FROM motthangnhinlai where month(thangNam)= $month and year(thangNam)= $year and username ='$username'";
                $tbl = mysqli_query($conn,$str);
                $p->disconnect($conn);
                return $tbl;
            }return false;
        }
        function insertMTNL($user, $than, $tam, $tri){
            $p = new conDB();
            if ($p->connectDB($conn)) {
                $uT = getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'].'-'.$user;
                $string = "INSERT INTO motthangnhinlai(usernamethangnam ,username, than, tam, tri)";
                $string .= " VALUES('$uT', N'" . $user . "', N'" . $than . "', N'" . $tam . "', N'" . $tri . "')";
                $table = mysqli_query($conn,$string);
                $p->disconnect($conn);
                return $table;
            } else {
                return false;
            }
        }
        
    }
?>