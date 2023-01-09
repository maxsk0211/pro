<?php 
	session_start();
	$id_chat_room=$_POST['id_chat_room'];
	$sql="DELETE FROM `chat_room` WHERE `chat_room`.`id_chat_room` = 5";



 ?>