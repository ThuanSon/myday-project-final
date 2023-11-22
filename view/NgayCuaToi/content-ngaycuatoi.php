<?php
if (!isset($_SESSION['username']) || $_SESSION['login'] !== true) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("Location: index.php?login");
}
?>
<?php
    include_once("controller/cNgayCuaToi.php");
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    $userName = $_SESSION['username'];
    
    $timeNow = date("Y-m-d");
    $controlNCT = new controlNgayCuaToi();
    $tblWork = $controlNCT ->getWorkByUserName_Day($userName, $timeNow);
 
    
    if($tblWork){
        $WorkName1 = '' ;
        $WorkName2 = '' ;
        $WorkName3 = '' ;
        $WorkName4 = '' ;
        $WorkName5 = '' ;
        $WorkName6 = '' ;
        if(mysqli_num_rows($tblWork) >= 3){
        
            $allRows = array();
            while ($row = mysqli_fetch_assoc($tblWork)) {
                $allRows[] = $row;
            }

            if (count($allRows) >= 3) { // Kiểm tra để đảm bảo mảng có ít nhất 2 phần tử
                $WorkName1 = $allRows[0]['tenCongViec'];
                $WorkName2 = $allRows[1]['tenCongViec'];
                $WorkName3 = $allRows[2]['tenCongViec'];
                
                if (isset($allRows[3]['tenCongViec']) && !empty($allRows[3]['tenCongViec'])) {
                    $WorkName4 = $allRows[3]['tenCongViec'];
                } 
                if (isset($allRows[4]['tenCongViec']) && !empty($allRows[4]['tenCongViec'])) {
                    $WorkName5 = $allRows[4]['tenCongViec'];
                }
                if (isset($allRows[5]['tenCongViec']) && !empty($allRows[5]['tenCongViec'])) {
                    $WorkName6 = $allRows[5]['tenCongViec'];

                }                    
            }         
            
        }

    }else{
        echo "error";
    }
?>

<div class="content-todo">
    <div class="header-content-todo">
        <span class="check-icon"><i class="fa-solid fa-check"></i></span>
        <h2 class="title-header">Hoạt động mỗi ngày</h2>
    </div>

    <div class="todo-all-input">
        <div class="todo-all-work">
            <div class="todo-task-work-label">
                <div class="todo-work-label todo-label">
                    <b>Việc cần làm</b>
                </div>

                <div class="add-todo-work">
                    <span class=""><i id="btn-plus-work" class="fa-solid fa-square-plus"></i></span>

                </div>
            </div>



            <form action="#" id="myForm" method="POST" class="input-form input-form-work" enctype="multipart/form-data">
                <div id="input-task" class="text-input ">
                    <input type="checkbox" class="check_test" name="checkboxes[]" value="value1" id="">
                    <input type="text" class="text_test" name="input-work1" placeholder="nhập công việc" require id="" <?php echo "value= '$WorkName1'";  ?>>
                </div>

                <div id="input-task" class="text-input ">
                    <input type="checkbox" class="check_test" name="checkboxes[]" value="value2" id="">
                    <input type="text" class="text_test" name="input-work2" placeholder="nhập công việc" id="" require <?php echo "value= '$WorkName2'";  ?>>
                </div>

                <div id="input-task" class="text-input ">
                    <input type="checkbox" class="check_test" name="checkboxes[]" value="value3" id="">
                    <input type="text" class="text_test" name="input-work3" placeholder="nhập công việc" id="" require <?php echo "value= '$WorkName3'";  ?>>
                </div>

                <div id="input-task" class="text-input ">
                    <input type="checkbox" class="check_test" name="checkboxes[]" value="value4" id="">
                    <input type="text" class="text_test" name="input-work4" placeholder="nhập công việc" id="" require <?php echo "value= '$WorkName4'";  ?>>
                </div>

                <div id="input-task" class="text-input ">
                    <input type="checkbox" class="check_test" name="checkboxes[]" value="value5" id="">
                    <input type="text" class="text_test" name="input-work5" placeholder="nhập công việc" id="" require <?php echo "value= '$WorkName5'";  ?>>
                </div>

                <div id="input-task" class="text-input ">
                    <input type="checkbox" class="check_test" name="checkboxes[]" value="value6" id="">
                    <input type="text" class="text_test" name="input-work6" placeholder="nhập công việc" id="" require <?php echo "value= '$WorkName6'";  ?>>
                </div>

        </div>

        <div class="todo-all-emoji">
            <div class="todo-emoji-label todo-label">
                <b>Cảm xúc</b>
            </div>

            <div class="input-form input-form-emoji">
                <button type="button" class="btn-emoji" name="happy" onclick="setEmojiValue(1); changeColorPink(this)">
                    <input type="hidden" name="emoji1" value="0" id="emoji1">
                    <span class="icon-happy">
                        <i class="fa-regular fa-face-laugh-beam"></i>
                    </span>
                    <b>Hạnh phúc</b>
                </button>
                <button type="button" class="btn-emoji" onclick="setEmojiValue(2); changeColorPink(this)"><input type="hidden" name="emoji2" value="0" id="emoji2"> <span class="icon-happy"><i class="fa-regular fa-face-smile-beam"></i></span><b>Vui vẻ</b></button>
                <button type="button" class="btn-emoji" onclick="setEmojiValue(3); changeColorPink(this)"><input type="hidden" name="emoji3" value="0" id="emoji3"> <span class="icon-happy"><i class="fa-regular fa-face-meh"></i></span><b>Bình thường</b></button>
                <button type="button" class="btn-emoji" onclick="setEmojiValue(4); changeColorPink(this)"><input type="hidden" name="emoji4" value="0" id="emoji4"> <span class="icon-happy"><i class="fa-regular fa-face-frown-open"></i></span><b>Buồn</b></button>
                <button type="button" class="btn-emoji" onclick="setEmojiValue(5); changeColorPink(this)"><input type="hidden" name="emoji5" value="0" id="emoji5"> <span class="icon-happy"><i class="fa-regular fa-face-sad-tear"></i></span><b>Rất buồn</b></button>
            </div>


        </div>

        <div class="todo-all-water">
            <div class="todo-water-label todo-label">
                <b>Lượng nước uống</b>
            </div>

            <div class="input-form input-form-water">
                <button type="button" class="btn-water" onclick="setWaterValue(1); changeColorBlue(this)"> <input type="hidden" name="water1" value="0" id="water1"> <span class="icon-happy"><i class="fa-solid fa-glass-water-droplet"></i></span><b>0.5 Lit</b></button>
                <button type="button" class="btn-water" onclick="setWaterValue(2); changeColorBlue(this)"> <input type="hidden" name="water2" value="0" id="water2"> <span class="icon-happy"><i class="fa-solid fa-glass-water-droplet"></i></span><b>1 Lit</b></button>
                <button type="button" class="btn-water" onclick="setWaterValue(3); changeColorBlue(this)"> <input type="hidden" name="water3" value="0" id="water3"> <span class="icon-happy"><i class="fa-solid fa-glass-water-droplet"></i></span><b>1.5 Lit</b></button>
                <button type="button" class="btn-water" onclick="setWaterValue(4); changeColorBlue(this)"> <input type="hidden" name="water4" value="0" id="water4"> <span class="icon-happy"><i class="fa-solid fa-glass-water-droplet"></i></span><b>2 Lit</b></button>
                <button type="button" class="btn-water" onclick="setWaterValue(5); changeColorBlue(this)"> <input type="hidden" name="water5" value="0" id="water5"> <span class="icon-happy"><i class="fa-solid fa-glass-water-droplet"></i></span><b>2.5 Lit</b></button>

            </div>

        </div>
    </div>

    <div class="todo-note">
        <div class="todo-note-label ">
            <b>Ghi chú :</b>
        </div>


        <textarea class="todo-note-content" rows="3" cols="30" placeholder="Nhập ghi chú vào đây    "></textarea>

    </div>

    <input type="submit" value="Lưu" name="btnSubmit" id="saveButton">
    </form>

</div>


<?php

if (isset($_REQUEST["btnSubmit"]) && empty($WorkName1)) {

    // start new
    // define avalible
    // $userName = $_SESSION['username'];
    // $controlNCT = new controlNgayCuaToi();
    // $timeNow = date("Y-m-d");
    $note = 'Default';
    $requestWorkArray = "input-work";
    $checked = "checkboxes";
    //khai báo biến chứa value
    $emojiPost = 'emoji';
    $waterPost = 'water';
    $valueEmoji = $controlNCT->getValue($emojiPost);
    $valueWater = $controlNCT->getValue($waterPost);
    $checkWorkCount = $controlNCT->getCountChecked($checked);
    $maDanhSachCongViec = $userName.'-'. $timeNow; 

    // call function
    $resultWorkMyDay = $controlNCT->addWorkMyDay($valueEmoji, $valueWater, $checkWorkCount, $maDanhSachCongViec, $timeNow, $userName, $maDanhSachCongViec);
    if ($resultWorkMyDay == 1) {
        $result = $controlNCT->addWork($requestWorkArray, $timeNow, $maDanhSachCongViec);
        $resultEmotionsTable = $controlNCT -> addEmotinsDay($valueEmoji, $timeNow, $userName );
        echo "<script> alert('them du lieu thanh cong my day! ') </script>";
        if ($result == 0) {
            echo "<script> alert('khong the insert cong viec hang ngay! ') </script>";
        }elseif ($resultEmotionsTable == 0) {
            echo "<script> alert('khong the ghi vào bảng cảm xúc! ') </script>";
        }
    } else if ($resultWorkMyDay == 0) {
        echo "<script> alert('khong the insert my day! ') </script>";
    }    
}

if (isset($_REQUEST["btnSubmit"]) && !empty($WorkName1) && !empty($WorkName2) && !empty($WorkName3)) {
    // $userName = $_SESSION['username'];
    // $controlNCT = new controlNgayCuaToi();
    // $timeNow = date("Y-m-d");
    
    $emojiPost = 'emoji';
    $waterPost = 'water';
    $valueEmoji = $controlNCT->getValue($emojiPost);
    $valueWater = $controlNCT->getValue($waterPost);
    $checked = "checkboxes";
    $checkWorkCount = $controlNCT->getCountChecked($checked);

    $resultUpdateWorkByUserName_Day = $controlNCT -> updateWorkByUserName_Day($userName,$timeNow, $valueWater, $checkWorkCount, $valueEmoji);
    
    if($resultUpdateWorkByUserName_Day){
        echo "<script> alert('Status successful update') </script>";
    }else {
        echo "<script> alert('Status failed update') </script>";
    }

}
?>
<script>
    
// Function to change the color of a clicked button and reset others
function changeColorPink(selectedButton) {
    // First, get all buttons with the class 'btn-emoji'
    var buttonsEmoji = document.getElementsByClassName('btn-emoji');

    // Loop through the NodeList object and reset the background color
    for (var i = 0; i < buttonsEmoji.length; i++) {
        buttonsEmoji[i].style.backgroundColor = ''; // Reset to default or any other color
    }

    // Now change the background color of the clicked button
    selectedButton.style.backgroundColor = 'rgba(252, 159, 159, 0.55)';
}

function changeColorBlue(selectedButton) {
    // First, get all buttons with the class 'btn-water'
    var buttonsWater = document.getElementsByClassName('btn-water');

    // Loop through the NodeList object and reset the background color
    for (var i = 0; i < buttonsWater.length; i++) {
        buttonsWater[i].style.backgroundColor = ''; // Reset to default or any other color
    }

    // Now change the background color of the clicked button
    selectedButton.style.backgroundColor = 'rgba(122, 248, 203, 0.77)';
}

function setEmojiValue(emojiNumber) {
    for (var i = 1; i <= 5; i++) {
        document.getElementById('emoji' + i).value = (i === emojiNumber) ? "1" : "0";
    }
}

function setWaterValue(waterNumber) {
    for (var i = 1; i <= 5; i++) {
        document.getElementById('water' + i).value = (i === waterNumber) ? "1" : "0";
    }
}
</script>