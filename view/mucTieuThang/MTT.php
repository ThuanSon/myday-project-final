<?php
if (!isset($_SESSION['username']) || $_SESSION['login'] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: index.php?login");
}
?>
<?php
    include_once("controller/cMucTieu.php");
    if(isset($_REQUEST["Luu"])){
        $username = $_SESSION['username'];
        $Chude = $_REQUEST['chude'];
        $MT1 = $_REQUEST['mt1'];
        $MT2 = $_REQUEST['mt2'];
        $MT3 = $_REQUEST['mt3'];
        $kq = addCD($username, $Chude);
        $Luu = addMucTieu($username,$MT1, $MT2, $MT3);
        if($Luu && $kq){
            echo "<script>alert('Thêm thành công!');</script>";
        } else{
            echo "<script>alert('Không thể thêm!');</script>";
        }
    }
?> 
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <style>
        .inputT{
            width: 300px;
            height: 40px;
            border: 0;
            border-bottom: 2px solid black;
        }
        button{
            border-radius: 50% 50% 50% 50%;
            font-size: 20px;
            text-align: center;
        }
        #err{
            color: red;
        }
    </style>
    <div class="container content-goals">
        <form method="post" action="#"> <!-- Thay đổi action để trỏ đến trang xử lý dữ liệu -->
            <table>
                <tr>
                    <td colspan="2"><h1>
                        <?php
                        $month = getdate();
                            echo "Tháng: ".$month = date('m');
                        ?>
                    </h1></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h3>Chủ đề tháng: </h3>
                        <textarea 
                            name="chude" 
                            cols="50" rows="5" 
                            placeholder=" Chủ đề tháng này . . ." 
                            id="Chude" 
                            onchange="checkFields"
                            ></textarea>
                        <script>
                            const checkFields = () =>{
                                let Chude = $("#Chude").val();
                                let btcq = /^([A-Za-z_-\s]{1,})$/;

                                if(Chude === ""){
                                    $("#tbChude").html("Vui lòng không bỏ trống!");
                                    return false;
                                }
                                else if(!btcq.test($("#Chude").val())){
                                    $("#tbChude").html("Vui lòng nhập đúng định dạng");
                                    return false;
                                }
                                else{
                                    $("#tbChude").html("");
                                    return true;
                                }
                            }
                        </script>
                    </td>
                </tr>
                <tr> 
                    <td>
                        <span id="tbChude" class="announce text-danger"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center">
                        <h3>MỤC TIÊU THÁNG</h3>
                        <input type="checkbox" class="inputCheckbox" name="check1"> &nbsp;
                        <input type="text" name="mt1" class="inputT" placeholder="Mục tiêu 1" width="400px" id="mt1" onchange="kiemTraMT1()"> 
                        <script>
                            const kiemTraMT1 = () =>{
                                let mt1 = $("#mt1").val();
                                let btcq = /^([A-Za-z_-]{1,})$/;

                                if(mt1 === ""){
                                    $("#tbmt1").html("Vui lòng không bỏ trống!");
                                    return false;
                                }
                                else if(!btcq.test($("#mt1").val())){
                                    $("#tbmt1").html("Vui lòng nhập đúng định dạng");
                                    return false;
                                }else if(mt1.length >7){
                                    $("#tbmt1").html("Vui lòng nhập từ có nghĩa");
                                    return false;
                                }
                                else{
                                    $("#tbmt1").html("");
                                    return true;
                                }
                            }
                        </script>
                        <br>
                        <span id="tbmt1" class="announce text-danger"></span> <br>
                        <input type="checkbox" class="inputCheckbox" name="check2"> &nbsp; 
                        <input type="text" name="mt2" class="inputT" placeholder="Mục tiêu 2" width="200px" id="mt2" onchange="kiemTraMT2()"> 
                        <script>
                            const kiemTraMT2 = () =>{
                                let mt2 = $("#mt2").val();
                                let btcq = /^([A-Za-z_-]{1,})$/;

                                if(mt2 === ""){
                                    $("#tbmt2").html("Vui lòng không bỏ trống!");
                                    return false;
                                }
                                else if(!btcq.test($("#mt2").val())){
                                    $("#tbmt2").html("Vui lòng nhập đúng định dạng");
                                    return false;
                                }else if(mt2.length >7){
                                    $("#tbmt2").html("Vui lòng nhập từ có nghĩa");
                                    return false;
                                }
                                else{
                                    $("#tbmt2").html("");
                                    return true;
                                }
                            }
                        </script>
                        <br>
                        <span id="tbmt2" class="announce text-danger"></span> <br>
                        <input type="checkbox" class="inputCheckbox" name="check3"> &nbsp; 
                        <input type="text" name="mt3" class="inputT" placeholder="Mục tiêu 3" id="mt3" onchange="kiemTraMT3()">
                        <script>
                            const kiemTraMT3 = () =>{
                                let mt3 = $("#mt3").val();
                                let btcq = /^([0-9A-Za-z_-]{1,})$/;

                                if(mt3 === ""){
                                    $("#tbmt3").html("Vui lòng không bỏ trống!");
                                    return false;
                                }
                                else if(!btcq.test($("#mt3").val())){
                                    $("#tbmt3").html("Vui lòng nhập đúng định dạng");
                                    return false;
                                }else if(mt3.length >7){
                                    $("#tbmt3").html("Vui lòng nhập từ có nghĩa");
                                    return false;
                                }
                                else{
                                    $("#tbmt3").html("");
                                    return true;
                                }
                            }
                        </script>
                        <br> 
                        <span id="tbmt3" class="announce text-danger"></span>
                    </td>
                </tr> <br>
                <tr>
                    <td>&nbsp;</td> <br>
                    <td>
                        <button type="submit" name="Luu">Lưu</button> <!-- Gọi hàm luu() khi nhấn nút -->
                        <button type="reset">Hủy</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script src="assets/jquery-3.6.1.min.js"></script>
