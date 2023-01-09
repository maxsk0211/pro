<?php 
	session_start();
	require '../../dbcon.php';
	$id_chat_room=$_GET['id_chat_room'];
	$sql="DELETE FROM chat_room WHERE id_chat_room = '$id_chat_room'";
	$result=mysqli_query($conn,$sql);
	if ($result) {
		$_SESSION['ok']="ลบห้องสนทนาสำเร็จ";
		header("location: ../users-add-chat-room.php");
	}


 ?>