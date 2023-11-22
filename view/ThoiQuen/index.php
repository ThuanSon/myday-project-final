<?php
if (!isset($_SESSION['username']) || $_SESSION['login'] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: index.php?login");
}
?>
<?php
$servername = "localhost";
$database = "id21546223_pheonixiuh";
$username = "id21546223_pheonix";
$password = "18112002Pheonix@gmail.com";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
 $currentUserName = $_SESSION['username'];
 if (!isset($_SESSION['username'])){
     // echo "<script>window.location.href = './view/DangNhap_DangKy/login.php';</script>";

 }
 $sql = "SELECT tenThoiQuen,TQThang,UserName FROM thoiquen WHERE UserName = '$currentUserName' ORDER BY TQThang ASC";

//  $result = $conn->query($sql);

//  $sukien = $result->fetch_all(MYSQLI_ASSOC);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 mysqli_close($conn);
?>
<div>
    <h4>
        Những thói quen tôi muốn có
    </h4>
    <h6>Hãy cho bản thân 21 ngày để phát triển</h6>
    <a href="index.php?createThoiQuen"
    >
    <button>Add</button>
</a>
<?php
    include_once 'controller/cThoiQuen.php';
    $username = $_SESSION['username'];
    $data = getThoiQuen($username);
    echo "<table id='products-table' style='overflow-y:scroll'><thead><tr><td class='dataTableTitle'>Thói quen\Ngày</td>";
        for ($i=1; $i <= 31; $i++) { 
            echo "<td class='dataTableTitle'>$i</td>";
        }
    echo "</tr></thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr><td class='dataTableTitle'>";
        echo $row['tenThoiQuen']."</td>";
        for ($i=1; $i <= $row['soNgayThucHien']; $i++) { 
            echo "<td class='dataTableTitle'><input class='checkHabit' checked type='checkbox' value=$i></td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table>";
?>
</div> 