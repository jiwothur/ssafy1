<?php
    include 'session.php';
    include 'checkSignSession.php';
?>

<!doctype html>
<html>
    <link rel="stylesheet" href="sign.css">
        <body>
            <div class="part">
                <form action="saveBoard.php" method="post">
                    제목<br><input type="text" name="title"><br><br>
                    내용<br><textarea name="content" cols="80" rows="10"></textarea><br><br>
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
