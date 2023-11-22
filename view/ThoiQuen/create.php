   
    
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $database = "id21546223_pheonixiuh";
    $username = "id21546223_pheonix";
    $password = "18112002Pheonix@gmail.com";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
     
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }
       // Check connection
          
       $currentUserName = $_SESSION['username'];
       //  if (!isset($_SESSION['username'])){
       //      echo "<script>window.location.href = '../DangNhap_DangKy/login.php';</script>";
        
       //  }
       $tenThoiQuen = $_POST['tenThoiQuen'];
       $TQThang = $_POST['TQThang'];
       $moTa = $_POST['moTa'];
    $sql = "INSERT INTO thoiquen (tenThoiQuen,moTa,TQThang,Username) VALUES ('$tenThoiQuen','$moTa', '$TQThang','$currentUserName')";
   
    if ($conn->query($sql) === TRUE) {
       echo "<script>window.location.href = 'index.php?ThoiQuen';</script>";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
     mysqli_close($conn);
     
   

}
        
        
    ?>
<div class="">
<h4>Bạn muốn tập thói quen gì</h4> <br>
<form class="content-mid loginForm"  method="post">
    <input type="text" class="txtThoiQuen" name ="tenThoiQuen" placeholder = "Hãy nhập thói quen muốn có"><br>
    <input type="text" class="txtThoiQuen" name ="moTa" placeholder = "Mô tả"> <br>
    <input type="datetime-local"  name ="TQThang" > <br>
    <input class="btn" type="submit" value="Submit" name = "btnSubmit">
    <input class="btn" type="reset" value="Reset" name = "reset">
</form>
</div>
