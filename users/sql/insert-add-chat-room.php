<?php 
	session_start();
	require("../../dbcon.php");
	$chat_room_name=$_POST['chat_room_name'];
	$id_user=$_POST['id_user'];
	$sql="INSERT INTO chat_room (chat_room_name, user_general) VALUES ('$chat_room_name','$id_user')";
	$result=mysqli_query($conn,$sql);

	if ($result) {
		$_SESSION['ok']="สร้างห้องแชทสำเร็จ";
		header("location: ../users-add-chat-room.php");
	}else{
		echo mysqli_error($conn);
	}
 ?>