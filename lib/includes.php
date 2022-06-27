<?php
    session_start();
    if($_SERVER['SCRIPT_FILENAME'] == '/var/www/html/sis/index.php'){
        if(!$_SESSION['QrAtivosLogin']){
            $_SESSION = [];
            echo "<script>window.location.href='./'</script>";
            exit();
        }
    }
    include("/appinc/connect.php");
    $con = AppConnect();
    $md5 = md5(date("YmdHis"));
