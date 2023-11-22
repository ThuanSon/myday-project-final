<?php
    include_once("Model/mMucTieu.php");
    function addCD($ten, $Chude){
        return InsertCD($ten, $Chude);
    }
    function addMucTieu($ten,$TenMT1, $TenMT2,$TenMT3){
        return InsertMT($ten, $TenMT1, $TenMT2, $TenMT3);
    }
?>