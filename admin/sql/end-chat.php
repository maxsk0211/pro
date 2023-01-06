<?php 
	session_start();
	require '../../dbcon.php';
	$id_chat_room=$_GET['id_chat_room'];
	
	$sql="UPDATE chat_room SET char_room_status = '0' WHERE chat_room.id_chat_room = '$id_chat_room'";
	$result=mysqli_query($conn,$sql);

	if ($result) {
		$_SESSION['ok']="จบการสนทนา";
		$url="../".$_GET['url']."?id_chat_room=".$id_chat_room;
		header("location: $url");

	}
 ?>