<h1>Trang Chủ</h1>
<?php
if(isset($_SESSION['username']) && isset($_SESSION['matKhau']))
{
    echo 'Chao mung';
    header('Location: index.php');
}
else
{
    header('location', 'login.php');
}
?>