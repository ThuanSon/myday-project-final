<?php
session_start();
    include_once('controller/cCamXuc.php');
    // include_once('view/BieuDoCamXuc/DropDownMonth.php');
    // $month = getMonth();
    $thang = $_REQUEST['thang'];

    // $th = 11;
    $data = getCamXucByMonth($_SESSION['username'],$thang);
    $array = array();
    while ($row = mysqli_fetch_assoc($data)) {
        $array[] = $row;
    }
    echo json_encode($array);
    // include_once ''
    // header("Location: index.php?motThangNhinLai");
?>