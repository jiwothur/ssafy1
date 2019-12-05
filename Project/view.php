<link rel="stylesheet" href="sign.css">
<?php
      include 'session.php';
      include 'checkSignSession.php';
      include 'connection.php';

      if(isset($_GET['board_id'])){
          $boardID = $_GET['board_id'];
          $_SESSION['board_id']=$_GET['board_id'];
          $sql = "SELECT b.content FROM board b ";
          $sql .= "WHERE b.board_id = {$boardID}";
          $result = $dbConnect->query($sql);

        if($result) {
              $contentInfo = $result->fetch_array(MYSQLI_ASSOC);

              echo "<내용><br><br>";
              echo $contentInfo['content'].'<br><br>';
              echo "<a href='updateForm.php?board_id={$boardID}'>글수정하기 </a>";
              echo "<a href='writeDelete.php?board_id={$boardID}'>글삭제하기 </a>";
              echo "<a href='list.php'>목록으로 이동</a>";
              echo "<br><br>";
              include 'comment_view.php';
              echo "<br><br>";
              echo "<br><br>";
              include 'commentForm.php';
          }
        else {
                echo "잘못된 접근입니다.";
                exit;
              }
             }
    else {
            echo "잘못된 접근입니다.";
            exit;
         }
?>
