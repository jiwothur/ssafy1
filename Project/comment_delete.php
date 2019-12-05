<link rel="stylesheet" href="sign.css">
<?php
    include 'session.php';
    include 'checkSignSession.php';
    include 'connection.php';
    include 'comment_view.php';


    $sql = "DELETE FROM comment
    WHERE
    id = {$_GET['id']}";


    $result = $dbConnect->query($sql);


    if($result){
        echo "삭제 완료";
        Header("Location:view.php?board_id={$_SESSION['board_id']}");
        exit;
    } else {
          echo "삭제 실패";
          echo "<a href='list.php'>게시글 목록으로 이동</a>";
          exit;
    }
?>
