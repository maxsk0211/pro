<?php 
	session_start();
	require '../../dbcon.php';
	$id_chat_room_type=$_GET['id_chat_room_type'];
	$sql="DELETE FROM chat_room_type WHERE id_chat_room_type = '$id_chat_room_type'";
	$result=mysqli_query($conn,$sql);
	if ($result) {
		$_SESSION['ok']="ลบประเภทห้องสนทนาสำเร็จ";
		header("location: ../admin-add-chat-room-type.php");
		exit();
	}else{
		echo mysqli_error($conn);
	}

 ?>