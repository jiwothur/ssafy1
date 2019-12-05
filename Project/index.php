<?php
    include 'session.php';
?>

<!doctype html>
<html>
    <link rel="stylesheet" href="main1.css">
        <body>
            <?php
                if(!isset($_SESSION['member_id'])){
            ?>

            <h2>sharing page service
                <a href="signUpForm.php">회원가입</a>
                <a href="signInForm.php">로그인</a>
            </h2>

            <?php
                }
                else{
            ?>

            <h2>sharing page service
                <a href="list.php?=<?php "{$_SESSION['member_id']}"?>">게시판</a>
                <a href="signOut.php">로그아웃</a>
            </h2>

            <?php
                }
            ?>
        </body>
    </html>
