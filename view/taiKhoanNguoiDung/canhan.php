<?php
if (!isset($_SESSION['username']) || $_SESSION['login'] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: index.php?login");
}
?>
<?php
    include_once("controller/cUser.php");
    include_once("controller/cNguoidung.php");
    if(isset($_REQUEST["luuTG"])){
        $username = $_SESSION['username'];
        $ThoiGian = $_REQUEST['thoiGian'];
        $GhiChu = $_REQUEST['ghiChu'];
        $Luu = uTG($username, $ThoiGian,$GhiChu);
        if($Luu){
            echo "<script>arlert('Cập nhật thành công!');</script>";
        } else{
            echo "<script>arlert('Không thể cập nhật!');</script>";
        }
    }
    
    if(isset($_REQUEST["luuTT"])){
        $username = $_SESSION['username'];
        $TenND = $_REQUEST['fullname'];
        $Pass = $_REQUEST['password'];
        $SDT = $_REQUEST['phone'];
        $Email = $_REQUEST['email'];
        $DiaChi = $_REQUEST['diachi'];
        $NgaySinh = $_REQUEST['ngaysinh'];
        // $Thongtin = $_REQUEST['thongtin'];
        $Luu = uTT($username,$TenND, $Pass, $SDT, $Email, $DiaChi, $NgaySinh);
        if($Luu){
            echo "<script>arlert('Cập nhật thành công!');</script>";
        } else{
            echo "<script>arlert('Không thể cập nhật!');</script>";
        }
    }
?> 
    <div class="container">
        <h1>Thông tin người dùng</h1>
        <form class="content-goals" method="post">
            <table>
                <tr>
                    <td>
                        <label for="fullname">Họ và tên:</label>
                    </td>
                    <td colspan = "3">
                        <input type="text" id="fullname" name="fullname" 
                        value=" <?php echo getthongtin($_SESSION['username'],'fullname');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Mật khẩu:</label>
                    </td>
                    <td colspan="3">
                        <input type="password" id="password" name="password" 
                        value="<?php echo getthongtin($_SESSION['username'],'password');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email:</label>
                    </td>
                    <td colspan="3">
                        <input type="email" id="email" name="email" 
                        value="<?php echo getthongtin($_SESSION['username'],'email');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone">Số điện thoại:</label>
                    </td>
                    <td colspan="3">
                        <input type="text" id="phone" name="phone" 
                        value="<?php echo getthongtin($_SESSION['username'],'phone');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="ngaysinh">Ngày sinh:</label>
                    </td>
                    <td colspan="3">
                        <input type="text" id="ngaysinh" name="ngaysinh" 
                        value="<?php echo getthongtin($_SESSION['username'],'ngaysinh');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="diachi">Địa chỉ:</label>
                    </td>
                    <td colspan="3">
                        <input type="text" id="diachi" name="diachi" 
                        value="<?php echo getthongtin($_SESSION['username'],'diachi');?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" name="luuTT" value="Lưu" id="luuTT">
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <h1>Thiết lập nhắc nhở</h1>
        <form class="content-goals" method="post">
            <table>
                <tr>
                    <td>
                        <label for="thoiGian">Thời gian nhắc nhở:</label>
                    </td>
                    <td>
                        <input type="time" id="thoiGian" name="thoiGian" 
                        value="<?php echo getthoigian($_SESSION['username'],'thoiGian');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="reminder_message">Nội dung nhắc nhở:</label>
                    </td>
                    <td>
                        <input type="text" id="ghiChu" name="ghiChu" 
                        value="<?php echo getthoigian($_SESSION['username'],'ghiChu');?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="luuTG" value="Lưu" id="luuTG">
                    </td>
                </tr>
            </table>
            <br>
    <br>
            
            <br>
    <br>
            
        </form>
    </div>

