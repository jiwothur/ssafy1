<?php
  include 'session.php';
  include 'checkSignSession.php';
  include 'connection.php';


    if(isset($_GET['board_id'])){
        $sql = "SELECT * FROM board WHERE board_id = {$_GET['board_id']}";
        $result = $dbConnect->query($sql);

        if( $result ) {
              $contentInfo = $result->fetch_array(MYSQLI_ASSOC);
          }
      }
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="sign.css">
    </head>
        <body>
            <div class="part">
                <form method="post" action="updateBoard.php">
                    제목<br><br>
                    <input type="text" name="title" value = <?="{$contentInfo['title']}";?>>
                    <input type="hidden" name="boardID" value = <?="{$contentInfo['board_id']}";?>><br><br>
                    내용<br><br>
                    <textarea name="content" cols="80" rows="10"><?="{$contentInfo['content']}";?></textarea><br><br>
                    타입<br><input type="radio" name=check value="1">매일
                        <input type="radio" name=check value = "2">매주
                        <input type="radio" name=check  value = "3">매월
                        <input type="radio" name=check  value = "4">월,수,금
                        <input type="radio" name=check  value = "5">화,목,토
                        <br><br>
                    <input type="submit" value="저장">
                </form>
            </div>
        </body>
    </html>
