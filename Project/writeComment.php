<?php

	include 'connection.php';
	include 'session.php';

	$Content = $_POST['Content'];

	$sql = "INSERT into comment(work_id,content,author_id)";
	$sql .= "VALUES('{$_SESSION['board_id']}', '{$Content}', '{$_SESSION['member_id']}')";

	$result = $dbConnect->query($sql);

	if($result){
		Header("Location:view.php?board_id={$_SESSION['board_id']}");
	}

?>
