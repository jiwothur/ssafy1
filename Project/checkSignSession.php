<?php
    //로그인 하지 않은 경우
    if(!isset($_SESSION['member_id'])){
        //회원가입 또는 로그인 필요.
        Header("Location:main.php");
        exit;
    }
?>
