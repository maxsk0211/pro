<?php 
	session_start();
	// clear_session
	if(isset($_GET['search_webboard']) && ($_GET['search_webboard']==1)){
		unset($_SESSION['search_webboard']);
		header("location: ../users-add-webboard.php");
	
	}elseif (isset($_GET['search_chat_room']) && ($_GET['search_chat_room']==1)){
		unset($_SESSION['search_chat_room']);
		header("location: ../users-add-chat-room.php");
		
	}elseif (isset($_GET['search_news']) && ($_GET['search_news']==1)) {
		unset($_SESSION['search_news']);
		header("location: ../users-add-news.php");

	}elseif(isset($_GET['search_package']) && ($_GET['search_package']==1)){
		unset($_SESSION['search_package']);
		header("location: ../users-show-package.php");

	}elseif(isset($_GET['search_chat_room']) && ($_GET['search_chat_room']==1)){
		unset($_SESSION['search_chat_room']);
		unset($_SESSION['type_name']);
		header("location: ../users-add-chat-room.php");

	}elseif(isset($_GET['search_report']) && ($_GET['search_report']==1)){
		unset($_SESSION['search_report']);
		header("location: ../users-add-report.php");

	}
	
	
 ?>