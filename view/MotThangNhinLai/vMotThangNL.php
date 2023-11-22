<?php
if (!isset($_SESSION['username']) || $_SESSION['login'] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: index.php?login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 20px;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .bg-gradient-primary {
            background: linear-gradient(to right, #4e73df, #224abe);
            color: #fff;
        }

        .btn-flat {
            box-shadow: none;
        }

        .card-footer {
            border-top: 1px solid #ddd;
            margin-top: 20px;
            padding-top: 20px;
        }
    </style>
    <title>MOT THANG NHIN LAI</title>
</head>
<body>
<?php
    include_once("controller/cMotThangNL.php");
    function showMTNLByMonth() {
        $p = new controlMTNL();
        include_once("Model/ketnoi.php");
        $a = new conDB();
        $connection = $a->connectDB($conn);
        $user = $_SESSION['username'];
        if($connection){
            $str = "SELECT distinct month(thangNam) as thangnam FROM motthangnhinlai WHERE username = '$user'";
            $tbl = mysqli_query($conn, $str);
            $result = mysqli_num_rows($tbl);
            $a->disconnect($conn);
            echo ('<form class="form-select-mon" action="#" method="post"><select name="thang" id="thang">');
                if($result>0){
                    while($row = mysqli_fetch_assoc($tbl)){
                        $thang = $row['thangnam'];
                    If ($_REQUEST['thang'] == $thang)
                    {
                        echo "<option selected value='$thang'>$thang</option>";
                    } else {
                        echo "<option value='$thang'>$thang</option>";
                    }
                                }
                }else{
                    echo "0 result";
                }
                echo '</select><input type="submit" name="submit" value="submit"></form>';
                echo "<b><h2>Nhìn lại tháng đã qua</h2></b>";
                if (isset($_REQUEST['submit'])) {
                    $month = $_POST['thang'];
                    $tblMTNL = $p->getAllMTNLByMonth($month, 2023, $_SESSION['username']);
                    displayMTNL($tblMTNL);
                }
            }return false;
    }

    function showMTNL($tblMTNL){
        if ($tblMTNL) {
            // kiêm tra kết quả có trả về dữ liệu
            if (mysql_num_rows($tblMTNL) > 0) {
                // tạo biến đếm để kiểm tra dữ liệu
                $dem = 0;
                // tạo table để hiện thị dữ liệu
                echo '<table>';
                // đuyệt từng dòng dữ liệu
                echo "</table>";
            } else {
                echo "0 result";
            }
        } else {
            echo "Không có giá trị";
        }
    }

    function displayMTNL($tblMTNL){
        if ($tblMTNL) {
            if (mysqli_num_rows($tblMTNL) > 0){
                echo "<table style='width: 100%' border='1px solid' margin='auto' text-align: 'center'>";
                echo "<tr><th style='text-align: center'>Tháng năm</th><th style='text-align: center'>Thân</th><th style='text-align: center'>Tâm</th><th style='text-align: center'>Trí</th></tr>";

                // duyệt từng dòng dữ liệu trong kết quả nhận được sau khi truy vấn
                while ($row = mysqli_fetch_assoc($tblMTNL)) {
                    echo "<tr>";
                    echo '<td style ="width: 25%; height: 100px">';
                    echo $row['thangnam']."</td><td>".$row['than']."</td><td>".$row['tam']."</td><td>".$row['tri']."</td>"; 
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 result";
            }
        } else {
            echo "Khong co gia tri";
        }
    }
    
?>
    
</body>
</html>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" method="post" id="vAddMTNL">
            <b><h2>Một tháng nhìn lại</h2></b>
            <b><h5>Chúc mừng bạn đã hoàn tất một tháng trọn vẹn.</h5></b>
            <b><h5>Hãy tự thưởng cho mình nhé!!!</h5></b>
            <br></br>

		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="" class="control-label"><b>Những điều bạn đã làm để THÂN khỏe và đẹp</b></label>
					<textarea class="form-control form-control-sm" name="than" rows="4" cols="50" placeholder="Hãy nhập việc bạn đã làm để tốt cho THÂN......" require></textarea>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="" class="control-label"><b>Những điều bạn đã làm để nuôi dưỡng TÂM hồn</b></label>
                    <textarea class="form-control form-control-sm" name="tam" rows="4" cols="50" placeholder="Hãy nhập việc bạn đã làm để nuôi TÂM......" require></textarea>
				</div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="" class="control-label"><b>Những điều bạn đã làm để phát triển TRÍ tuệ</b></label>
                    <textarea class="form-control form-control-sm" name="tri" rows="4" cols="50" placeholder="Hãy nhập việc bạn đã làm để phát triển TRÍ......" require></textarea>
				</div>
			</div>
		</div>
        <div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
            <input class="btn btn-flat  bg-gradient-primary mx-2" type="submit" id="btn" name="addMTNL" value="Save">
            <input class="btn btn-flat  bg-gradient-primary mx-2" type="reset" id="btn" value="Cancle">
    		</div>
    	</div>
        </form>
    	</div>
	</div>

    <?php
    showMTNLByMonth();
    include_once("controller/cMotThangNL.php");
    if(isset($_REQUEST["addMTNL"])){
        $than = $_REQUEST["than"];
        $tam = $_REQUEST["tam"];
        $tri = $_REQUEST["tri"];
        $username = $_SESSION['username'];
        $p = new controlMTNL();
        $kq = $p->addMTNL($username, $than, $tam, $tri);
        if($kq){
            echo "<script>alert('Thêm thành công')</script>";
            echo header("refresh:0; url='index.php?motthangnhinlai'");
        }else{
            echo "<script>alert('Thêm dữ liệu thành công')</script>";
            echo header("refresh:0; url='index.php?motthangnhinlai'");
        }
    }
    ?>

</div>
</body>
</html>
