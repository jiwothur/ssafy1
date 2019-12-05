<?php
    include 'session.php';
    include 'checkSignSession.php';
    include 'connection.php';

     $friend_email = $_POST['friend_email'];

    if($friend_email != null && $friend_email != ''){
        $friend_email = $dbConnect->real_escape_string($friend_email);
    }
    else {
          echo "제목을 입력하세요.";
          echo "<a href='writeFriend.php'>작성 페이지로 이동</a>";
          exit;
    }
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

      $sql = "INSERT INTO friend(mem_id,friend_id)";
      $sql .= "VALUES('{$mem_id}','{$friend_id }')";
      $result = $dbConnect->query($sql);

      if($result){
          Header("Location:list.php");
          exit;
      }
      else {
            echo "저장 실패";
            echo "<a href='list.php'>게시글 목록으로 이동</a>";
            exit;
      }

?>
