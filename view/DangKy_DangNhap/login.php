<!-- <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/login.css">

</head>

<body>
<?php 
// include '../../model/loginModel.php';
?>
    <form action="login.php" method="post">
        <div class="container">
            <h1>Xin Chào! Vui Lòng Đăng Nhập</h1>
            <hr>

            <label for="username"><b></b></label>
            <input type="text" placeholder="Tên Đăng Nhập" name="username" id="username">
            <div class="error-message">
              <span><?php echo (isset($err['username']))?$err['username']:'' ?></span>
            </div>

            <label for="psw"><b></b></label>
            <input type="password" placeholder="Mật Khẩu" name="psw" id="psw">
            <div class="error-message">
              <span><?php echo (isset($err['psw']))?$err['psw']:'' ?></span>
            </div>

            <span class="psw"><a href="forgot_password.php">Quên Mật Khẩu?</a></span>
            <hr>
            <button type="submit" class="registerbtn" name="dangnhap">Đăng Nhập</button>
        </div>

        <div class="container signin">
            <p>Bạn Chưa Có Tài Khoản? <a href="register.php">Đăng Ký</a>.</p>
        </div>
    </form>


<?php
$conn = mysqli_connect("localhost", "root", "", "mydayhandbook");
mysqli_set_charset($conn,'utf8');
$err = [];
session_start();
if (isset($_POST['dangnhap'])) {
    $username = $_POST['username'];
    $password = $_POST['psw'];

    if (empty($username)) {
        $err['username'] = "Vui lòng nhập tên đăng nhập";
      }
      if (empty($password)) {
        $err['psw'] = "Vui lòng nhập mật khẩu";
      }else{
    $sql = "SELECT * FROM nguoidung WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkusers = mysqli_num_rows($query);
    if($checkusers==1){
        // $pass = password_hash($password, PASSWORD_BCRYPT); 
        $checkusers = ($password == $data['matKhau'])? True : false;
        // var_dump($pass);
        // echo '@pass';
        // var_dump($data['matKhau']);
        if($checkusers){
            // lưu vào session
            $_SESSION['nguoidung'] = $data['username'];
            $_SESSION['matKhau'] = $data['matKhau'];
            // header('Location: /index.php');
            // http://localhost:8080/myday/index.php?menuNgayCuaToi#
            echo header("refresh: 0; url = '../../index.php'");
            // echo header('Location: ..');
            // include '';
        }else{
            $err['psw'] = "Sai mật khẩu";
        }

    }else{
        $err['username'] = "Tên đăng nhập không tồn tại";
    }
  }
}
?>


</body>

</html> -->