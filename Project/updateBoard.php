<link rel="stylesheet" href="sign.css">
<?php
    include 'session.php';
    include 'checkSignSession.php';
    include 'connection.php';

    $title = $_POST['title'];
    $content = $_POST['content']; //입력한 제목과 내용을 각각의 변수에 대입
    $boardID = $_POST['boardID'];
    $type = $_POST['check'];
    $memberID = $_SESSION['member_id'];

    $sql = "UPDATE board SET

    title = '{$title}',
    content = '{$content}',
    type = '{$type}',
    regTime = NOW()
    WHERE
    board_id = {$boardID}";

    $result = $dbConnect->query($sql);

    if($result){
        echo "저장 완료";
        Header("Location:view.php?board_id={$_SESSION['board_id']}");
        exit;
    } else {
        echo "저장 실패 - 관리자에게 문의";
        echo "<a href='list.php'>게시글 목록으로 이동</a>";
        exit;
    }
?>
</html>
