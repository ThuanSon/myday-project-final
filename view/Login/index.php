<!-- <form class="loginForm" action="#" method="post">
    <input type="text" class="info" name="ten" placeholder="Vui lòng nhập tên đăng nhập">
    <input type="text" class="info" name="pass" placeholder="Nhập mật khẩu">

    <div>
    <input type="reset" class="btn" value="reset">
    <input type="submit" class="btn" name="submit" value="submit">
    </div>
    <div>
    <a href="index.php">Bạn chưa có tài khoản</a>
    &nbsp;
    <a href="view/DangNhap_DangKy/forgot_password.php">Quên mật khẩu</a>
    </div>
</form> -->
<form class="loginForm content-mid" action="#" method="post">
<input type="text" id="username" class="info" name="ten" placeholder="Vui lòng nhập tên đăng nhập">
    <span id="usernameError" style="color: red; display: none;">Vui lòng điền tên đăng nhập!</span>

    <input type="password" id="password" class="info" name="pass" placeholder="Nhập mật khẩu">
    <span id="passwordError" style="color: red; display: none;">Vui lòng điền mật khẩu!</span>

    <div>
    <input type="reset" class="btn" value="reset">
    <input type="submit" class="btn" name="submit" value="submit" onclick="return validateForm()">
    </div>
    <div>
    <a href="index.php">Bạn chưa có tài khoản</a>
    &nbsp;
    <a href="index.php?forgot_password">Quên mật khẩu</a>
    </div>
</form>
<!-- <form action="process_login.php" method="post">
    <input type="text" id="username" name="ten" placeholder="Vui lòng nhập tên đăng nhập">
    <span id="usernameError" style="color: red; display: none;">Vui lòng điền tên đăng nhập!</span>

    <input type="password" id="password" name="pass" placeholder="Nhập mật khẩu">
    <span id="passwordError" style="color: red; display: none;">Vui lòng điền mật khẩu!</span>

    <input type="submit" value="Đăng nhập" onclick="return validateForm()">
</form> -->

<script>
    function validateForm() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (username === "" || password === "") {
            if (username === "") {
                document.getElementById('usernameError').style.display = 'block';
            } else {
                document.getElementById('usernameError').style.display = 'none';
            }

            if (password === "") {
                document.getElementById('passwordError').style.display = 'block';
            } else {
                document.getElementById('passwordError').style.display = 'none';
            }

            return false; // Prevent form submission
        }
    }
</script>

<style>
    a {
    margin-right: 50px; 
}
    .loginForm{
        /* align-items: center;
        display: grid;
        justify-content: space-around; */
        /* background-color: ; */


    }
    .loginForm input{
        width: 80%;
        height: 5%;
        line-height: 10px;
        margin: 20px;
        border-radius: 10px;
        border: 0.2px solid gray;
    }
    .loginForm div{
        display: flex;
        justify-content: center;
        width: 80%;
    }
    div .btn{
        width: 40%;
        height: 40px;
    }
</style>
<?php

    if (isset($_SESSION['username']) && $_SESSION['login'] == true) {
        header("Location: index.php?sukien");
    }

    if (isset($_REQUEST['submit'])) {
        $ten = $_REQUEST['ten'];
        $pass = $_REQUEST['pass'];
        $hashedPass = md5($pass);
        // include_once 'controller/cLogin.php';
        // $kq=login($ten,$pass);
        // if(!$kq){
        //     echo "<script>alert('Tài khoản không tồn tại');</script>";
        // }else{
        //     echo header("Location: index.php?sukien");
        //     while ($row = mysqli_fetch_assoc($kq)) {
        //         $_SESSION['username'] = $row['username'];
        //         $_SESSION['login'] = true;
        //     }
        // }
        if (empty($ten) || empty($pass)) {
            echo '<span style="color: red;">Vui lòng điền đầy đủ thông tin!</span>';
        } else {
            include_once 'controller/cLogin.php';
            $kq=login($ten,$hashedPass);
            if (!$kq) {
                echo '<span style="color: red;">Tài khoản không tồn tại!</span>';
            }else {
                // Nếu tìm thấy người dùng, bạn có thể xử lý đăng nhập ở đây.
                // Ví dụ: đặt session và chuyển hướng đến trang sự kiện.
                while ($row = mysqli_fetch_assoc($kq)) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['login'] = true;
                    header("Location: index.php?sukien");
                }
            }
            
        }
    }
?>