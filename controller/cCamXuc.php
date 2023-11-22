<?php
    include_once 'Model/mCamXuc.php';
    function getCamXucByMonth($username,$month){
        return selectCamXucByMonth($username, $month);
    }
?>