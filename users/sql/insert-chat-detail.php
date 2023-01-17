<?php 
	session_start();
	require '../../dbcon.php';
	$id_user=$_POST['id_user'];
	$id_chat_room=$_POST['id_chat_room'];
	$chat_text=$_POST['chat_text'];
	$chat_datetime=date('Y-m-d H:i:s');
	//exit();
	$sql="INSERT INTO chat_detail (id_chat_room, id_user, chat_text,chat_datetime ) VALUES ('$id_chat_room','$id_user','$chat_text','$chat_datetime')";

	$result=mysqli_query($conn,$sql);
	if($result){
		header("location: ../users-chat-room.php?id_chat_room=".$id_chat_room);
	}else{
		echo mysqli_error($conn);
	}
 ?>