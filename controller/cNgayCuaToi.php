<?php
include_once("./Model/mNgayCuaToi.php");

class controlNgayCuaToi
{

    function getAllNgayCuaToi()
    {
        $modelNCT = new modelNgayCuaToi();
        $tblNgayCuaToi = $modelNCT->selectAllWorkName();
        return $tblNgayCuaToi;
    }

    function getWorkByUserName_Day($userName, $timeQuery)
    {
        $modelNCT = new modelNgayCuaToi();
        $tblNgayCuaToi = $modelNCT ->selectWork($userName, $timeQuery);
        return $tblNgayCuaToi;
    }

    function updateWorkByUserName_Day($userName, $date, $amountWater, $statusCheck, $emotionDay)
    {
        $modelNCT = new modelNgayCuaToi();
        $tblNgayCuaToi = $modelNCT ->updateStatusWork($userName, $date, $amountWater, $statusCheck, $emotionDay);
        return $tblNgayCuaToi;
    }

    function addWork($WorkArray, $timeLine, $maDSCV)
    {

        $modelNCT = new modelNgayCuaToi();
        $tasks = [];

        for ($i = 1; $i <= 6; $i++) {
            if (!empty($_REQUEST[$WorkArray . $i])) {
                $tasks[] = $_REQUEST[$WorkArray . $i];
            }
        }

        foreach ($tasks as $taskWork) {
            $result = $modelNCT->insertWork($taskWork, $timeLine, $maDSCV);
        }

        if ($result) {
            return 1;
        } else {
            return 0; // khong insert duoc
        }
    }

    function getValue($nameInput)
    {
        $selectedId = 0; // Khởi tạo ID với giá trị mặc định là 0

        for ($i = 1; $i <= 5; $i++) {
            if ($_POST[$nameInput . $i] == "1") {
                $selectedId = $i;

                break;
            } else {
                $selectedId = 0;
            }
        }
        return $selectedId;
    }

    function getCountChecked($checked)
    {
        $checkedCount = 0; // Biến đếm số lượng checkbox được check

        if (isset($_POST[$checked])) { // Kiểm tra xem có checkbox nào được check không
            foreach ($_POST[$checked] as $checkbox) {
                $checkedCount++; // Tăng biến đếm với mỗi checkbox được check
            }
        }
        return $checkedCount;
    }

    function addWorkMyDay($valueEmoji, $valueWater, $checkWorkCount, $note, $timeNow, $userName, $maDSCV)
    {
        // define 
        $modelNCT = new modelNgayCuaToi();
        $result = $modelNCT->insertWorkMyDay($timeNow, $valueWater, $checkWorkCount, $valueEmoji, $note, $userName, $maDSCV);
        if ($result) {
            return 1;
        } else {
            return 0; // khong insert duoc
        }
    }

    function addEmotinsDay($emotionDay, $date, $userName)
    {
        // define 
        $modelNCT = new modelNgayCuaToi();
        $result = $modelNCT->insertEmotionstable ($emotionDay, $date, $userName);
        if ($result) {
            return 1;
        } else {
            return 0; // khong insert duoc
        }
    }
}