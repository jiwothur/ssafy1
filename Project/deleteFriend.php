<?php
    include 'session.php';
    include 'checkSignSession.php';
    include 'connection.php';

    $friend_email = $_POST['friend_email'];
    $mem_id = $_SESSION['member_id'];

    $sql = "SELECT username,member_id FROM user ";
    $sql .= "WHERE username = '{$friend_email}'";
    $result = $dbConnect->query($sql);

        if($result) {
                $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                $friend_id =  $memberInfo['member_id'];
                    }
        else {
                echo"오류";
                echo "<a href='list.php'>게시글 목록으로 이동</a>";
             }

    $sql = "DELETE FROM friend WHERE friend_id = {$friend_id} and mem_id = $mem_id";
    $result = $dbConnect->query($sql);

        if($result){
            Header("Location:list.php");
            exit;
        } else {
              echo "삭제 실패";
              echo "<a href='list.php'>게시글 목록으로 이동</a>";
              exit;
        }


?>
