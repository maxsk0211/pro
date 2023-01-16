<?php 
	session_start();
	require("../../dbcon.php");
	$chat_room_name=$_POST['chat_room_name'];
	$id_chat_room_type=$_POST['id_chat_room_type'];
	$id_user=$_POST['id_user'];
	$sql="INSERT INTO chat_room (chat_room_name, user_general,id_chat_room_type) VALUES ('$chat_room_name','$id_user','$id_chat_room_type')";
	$result=mysqli_query($conn,$sql);

	if ($result) {
		$_SESSION['ok']="สร้างห้องแชทสำเร็จ";
		header("location: ../users-add-chat-room.php");
	}else{
		echo mysqli_error($conn);
	}
 ?>