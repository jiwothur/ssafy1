<link rel="stylesheet" href="sign.css">

<?php
    include 'session.php';
    include 'checkSignSession.php';
    include 'connection.php';

    $title = $_POST['title'];
    $content = $_POST['content'];
    $type = $_POST['check'];


    if($title != null && $title != ''){
        $title = $dbConnect->real_escape_string($title);
    } else {
          echo "제목을 입력하세요.";
          echo "<a href='writeForm.php'>작성 페이지로 이동</a>";
          exit;
    }

    if($content != null && $content != ''){
        $content = $dbConnect->real_escape_string($content);
    } else {
          echo "내용을 입력하세요.";
          echo "<a href='writeForm.php'>작성 페이지로 이동</a>";
          exit;
    }

    $memberID = $_SESSION['member_id'];

    $sql = "INSERT INTO Board(author, title,type, content, regtime)";
    $sql .= "VALUES('{$memberID}','{$title}','{$type}','{$content}',NOW())";
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
