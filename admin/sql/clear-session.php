<?php 
	session_start();
	// clear_session
	if (isset($_GET['search_news']) && ($_GET['search_news']==1)) {
		unset($_SESSION['search_news']);
		header("location: ../admin-add-news.php");

	}elseif(isset($_GET['search_package']) && ($_GET['search_package']==1)){
		unset($_SESSION['search_package']);
		header("location: ../admin-add-package.php");

	}elseif(isset($_GET['search_webboard']) && ($_GET['search_webboard']==1)){
		unset($_SESSION['search_webboard']);
		header("location: ../admin-add-webboard.php");

	}elseif(isset($_GET['search_admin']) && ($_GET['search_admin']==1)){
		unset($_SESSION['search_admin']);
		header("location: ../admin-add-admin.php");

	}elseif(isset($_GET['search_report']) && ($_GET['search_report']==1)){
		unset($_SESSION['search_report']);
		header("location: ../admin-add-report.php");

	}elseif(isset($_GET['search_report_detail']) && ($_GET['search_report_detail']==1)){
		unset($_SESSION['search_report_detail']);
		$id_report=$_GET['id_report'];
		header("location: ../admin-add-report-detail.php?id=$id_report");

	}elseif(isset($_GET['search_chat_room']) && ($_GET['search_chat_room']==1)){
		unset($_SESSION['search_chat_room']);
		unset($_SESSION['type_name']);
		header("location: ../admin-add-chat-room.php");

	}
	
 ?>