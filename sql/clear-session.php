<?php 
	session_start();
	// clear_session
	if(isset($_GET['search_package']) && ($_GET['search_package']==1)){
		unset($_SESSION['search_package']);
		header("location: ../show-all-package.php");

	}elseif(isset($_GET['search_news']) && ($_GET['search_news']==1)){
		unset($_SESSION['search_news']);
		header("location: ../show-all-news.php");

	}elseif(isset($_GET['search_webboard']) && ($_GET['search_webboard']==1)){
		unset($_SESSION['search_webboard']);
		header("location: ../show-all-webboard.php");
	
	}elseif(isset($_GET['search_report']) && ($_GET['search_report']==1)){
		unset($_SESSION['search_report']);
		header("location: ../show-all-report.php");
	
	}
	
	
 ?>