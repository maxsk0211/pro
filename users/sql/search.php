<?php 
	session_start();
	if (isset($_POST['webboard']) && ($_POST['webboard']==1)) {
		$search_webboard=$_POST['search'];
		$_SESSION['search_webboard']=$search_webboard;
		header("location: ../users-add-webboard.php");
		
	}elseif (isset($_POST['search_chat_room']) && ($_POST['search_chat_room']==1)) {
		$search_chat_room=$_POST['search'];
		$_SESSION['search_chat_room']=$search_chat_room;
		header("location: ../users-add-chat-room.php");
		
	}elseif(isset($_POST['news']) && ($_POST['news']==1)){
		$search_news=$_POST['search'];
		$_SESSION['search_news']=$search_news;
		header("location: ../users-add-news.php");

	}

 ?>
