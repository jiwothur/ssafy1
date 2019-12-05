

<?php
    include 'session.php';
    include 'checkSignSession.php';
    include 'connection.php';
    include 'comment_view.php';

    $sql = "DELETE FROM board
    WHERE
    board_id = {$_GET['board_id']}";

    for($i = 0; $i < $dataCount; $i++){
    $sql1 = "DELETE FROM comment
    WHERE
    id = {$memberInfo3[$i]}"; //댓글 모두 제거
      $result1 = $dbConnect->query($sql1);
  }

    $result = $dbConnect->query($sql);


    if($result&$result1){
        Header("Location:list.php");
        exit;
    } else {
          echo "삭제 실패";
          echo "<a href='list.php'>게시글 목록으로 이동</a>";
          exit;
    }
?>
</html>
