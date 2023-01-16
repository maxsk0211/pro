<?php 
	session_start();
	require '../../dbcon.php';

	$type_name=$_POST['type_name'];
	$sql="INSERT INTO chat_room_type (type_name) VALUES ('$type_name')";
	$result=mysqli_query($conn,$sql);

	if ($result) {
		$_SESSION['ok']="บันทึกประเภทห้องสนทนาสำเร็จ";
		header("location: ../admin-add-chat-room-type.php");
		exit();
	}else{
		echo mysqli_error($conn);
	}


 ?>