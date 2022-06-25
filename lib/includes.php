<?php
    session_start();
    include("/appinc/connect.php");
    $conn = AppConnect();
    $md5 = md5(data("YmdHis"));
