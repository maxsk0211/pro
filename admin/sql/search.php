<?php 
	session_start();
	if(isset($_POST['news']) && ($_POST['news']==1)){
		$search_news=$_POST['search'];
		$_SESSION['search_news']=$search_news;
		header("location: ../admin-add-news.php");

	}elseif (isset($_POST['package']) && ($_POST['package']==1)) {
		$search_package=$_POST['search'];
		$_SESSION['search_package']=$search_package;
		header("location: ../admin-add-package.php");

	}elseif (isset($_POST['webboard']) && ($_POST['webboard']==1)) {
		$search_webboard=$_POST['search'];
		$_SESSION['search_webboard']=$search_webboard;
		header("location: ../admin-add-webboard.php");
		
	}elseif (isset($_POST['admin']) && ($_POST['admin']==1)) {
		$search_admin=$_POST['search'];
		$_SESSION['search_admin']=$search_admin;
		header("location: ../admin-add-admin.php");

	}elseif (isset($_POST['report']) && ($_POST['report']==1)) {
		$search_report=$_POST['search'];
		$_SESSION['search_report']=$search_report;
		header("location: ../admin-add-report.php");

	}elseif (isset($_POST['report-detail']) && ($_POST['report-detail']==1)) {
		$search_report_detail=$_POST['search'];
		$_SESSION['search_report_detail']=$search_report_detail;
		$id_report=$_POST['id_report'];
		header("location: ../admin-add-report-detail.php?id=$id_report");

	}elseif (isset($_POST['search_chat_room']) && ($_POST['search_chat_room']==1)) {
		$_SESSION['type_name']=$_POST['type_name'];
		$_SESSION['search_chat_room']=$_POST['search'];
		header("location: ../admin-add-chat-room.php");
	}

 ?>
