<?php 
	session_start();
	if (isset($_POST['webboard']) && ($_POST['webboard']==1)) {
		$search_webboard=$_POST['search'];
		$_SESSION['search_webboard']=$search_webboard;
		header("location: ../users-add-webboard.php");
		
	}elseif (isset($_POST['search_chat_room']) && ($_POST['search_chat_room']==1)) {
		$_SESSION['type_name']=$_POST['type_name'];
		$_SESSION['search_chat_room']=$_POST['search'];
		header("location: ../users-add-chat-room.php");
		
	}elseif(isset($_POST['news']) && ($_POST['news']==1)){
		$search_news=$_POST['search'];
		$_SESSION['search_news']=$search_news;
		header("location: ../users-add-news.php");

	}elseif (isset($_POST['package']) && ($_POST['package']==1)) {
		$search_package=$_POST['search'];
		$_SESSION['search_package']=$search_package;
		header("location: ../users-show-package.php");

	}

 ?>
