<?php
    include_once 'Model/mLogin.php';
    function login($ten,$pass){
        return selectUser($ten,$pass);
    }
?>