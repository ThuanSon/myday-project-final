<style>
    .signupForm{
        /* align-items: center;
        display: grid;
        justify-content: space-around; */
        /* background-color: ; */


    }
    .signupForm input{
        width: 80%;
        height: 5%;
        line-height: 10px;
        margin: 20px;
        border-radius: 10px;
        border: 0.2px solid gray;
    }
    .signupForm div{
        display: flex;
        justify-content: center;
        width: 80%;
    }
    div .btn{
        width: 40%;
        height: 40px;
    }
</style>
<!-- <form class="signupForm" action="#" method="post" >
    <input type="text" class="info" name="ten" placeholder="Vui lòng nhập tên cho lần đăng nhập tới">
    <input type="text" class="info" name="mail" placeholder="Nhập email của ban">
    <input type="text" class="info" name="phone" placeholder="Nhập số điện thoại của bạn">
    <input type="text" class="info" name="pass" placeholder="Hãy tạo mật khẩu">
    <input type="text" class="info" name="retypedPass" placeholder="Xác minh mật khẩu">
    <a href="index.php?login">Đăng nhập</a>
    <div>
    <input type="reset" class="btn">
    <input type="submit" class="btn" name="submit">

    </div>
</form> -->

<form class="signupForm loginForm content-mid" action="#" method="post" onsubmit="return validateForm()">
    <input type="text" class="info" id="ten" name="ten" placeholder="Vui lòng nhập tên cho lần đăng nhập tới">
    <span id="tenError" style="color: red; display: none;">Vui lòng điền tên đăng nhập!</span>

    <input type="text" class="info" id="mail" name="mail" placeholder="Nhập email của bạn">
    <span id="mailError" style="color: red; display: none;">Vui lòng điền email!</span>

    <input type="text" class="info" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn">
    <span id="phoneError" style="color: red; display: none;">Vui lòng điền số điện thoại!</span>

    <input type="password" class="info" id="pass" name="pass" placeholder="Hãy tạo mật khẩu">
    <span id="passError" style="color: red; display: none;">Vui lòng điền mật khẩu!</span>

    <input type="password" class="info" id="retypedPass" name="retypedPass" placeholder="Xác minh mật khẩu">
    <span id="retypedPassError" style="color: red; display: none;">Vui lòng điền lại mật khẩu!</span>
    <span id="passMatchError" style="color: red; display: none;">Mật khẩu không trùng khớp!</span>

    

    <div>
        <input type="reset" class="btn">
        <input type="submit" class="btn" name="submit">
    </div>
    <div>
    <a href="index.php?login">Đăng nhập</a>
    </div>
</form>

<script>
function validateForm() {
        var ten = document.getElementById('ten').value;
        var mail = document.getElementById('mail').value;
        var phone = document.getElementById('phone').value;
        var pass = document.getElementById('pass').value;
        var retypedPass = document.getElementById('retypedPass').value;

    if (ten === "" || mail === "" || phone === "" || pass === "" || retypedPass === "") {
        if (ten === "") {
            document.getElementById('tenError').style.display = 'block';
            return false;
        } else {
            document.getElementById('tenError').style.display = 'none';
        }

        if (mail === "") {
            document.getElementById('mailError').style.display = 'block';
            return false;
        } else {
            document.getElementById('mailError').style.display = 'none';
        }

        if (phone === "") {
            document.getElementById('phoneError').style.display = 'block';
            return false;
        } else {
            document.getElementById('phoneError').style.display = 'none';
        }

        if (pass === "") {
            document.getElementById('passError').style.display = 'block';
            return false;
        } else {
            document.getElementById('passError').style.display = 'none';
        }

        if (retypedPass === "") {
            document.getElementById('retypedPassError').style.display = 'block';
            return false;
        } else {
            document.getElementById('retypedPassError').style.display = 'none';
        }
        // Kiểm tra xác nhận mật khẩu
        if (pass !== retypedPass) {
            document.getElementById('passMatchError').style.display = 'block';
            return false;
        } else {
            document.getElementById('passMatchError').style.display = 'none';
        }
        // Kiểm tra các điều kiện khác cần thiết 

        return true;
    }
}


</script>


<?php

if (isset($_SESSION['username']) && $_SESSION['login'] == true) {
    header("Location: index.php?sukien");
}

    if (isset($_REQUEST['submit'])) {
        $ten = $_REQUEST['ten'];
        $mail = $_REQUEST['mail'];
        $phone = $_REQUEST['phone'];
        $pass = $_REQUEST['pass'];
        $retypedPass = $_REQUEST['retypedPass'];
        $hashedPass = md5($pass);
        include_once('controller/cSignup.php');
        // echo ($ten.$mail.$phone.$pass.$retypedPass);
        $kq=signup($ten,$mail,$phone,$hashedPass);
        if(!$kq){
            echo "<script>alert('Không thể tạo tài khoản!!!');</script>";
        }else{
            header("Location: index.php?login");
        }
    }
?>