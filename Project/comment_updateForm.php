<?php
  include 'session.php';
  include 'checkSignSession.php';
  include 'connection.php';



        $sql = "SELECT * FROM comment WHERE id = {$_GET['id']}";
        $result = $dbConnect->query($sql);

        if( $result ) {
              $contentInfo = $result->fetch_array(MYSQLI_ASSOC);
          }
?>
  <link rel="stylesheet" href="sign.css">

      <form method="post" action="comment_update.php">
        <input type="hidden" name="id" value = <?="{$contentInfo['id']}";?>>
        <textarea name ="content"><?php echo $contentInfo['content']; ?></textarea>
          <input type="submit" value="수정">
      </form>
