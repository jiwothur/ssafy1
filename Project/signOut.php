
<link rel="stylesheet" href="sign.css">
<?php
    include 'session.php';
    unset($_SESSION['member_id']);
    unset($_SESSION['Type_id']);
    unset($_SESSION['board_id']);
    echo "로그아웃 되었습니다.";
    echo "<br>";
    Header("Location:index.php");
?>
