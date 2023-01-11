<?php 
	session_start();
	if (isset($_POST['package']) && ($_POST['package']==1)) {
		$search_package=$_POST['search'];
		$_SESSION['search_package']=$search_package;
		header("location: ../show-all-package.php");

	}elseif (isset($_POST['news']) && ($_POST['news']==1)) {
		$search_package=$_POST['search'];
		$_SESSION['search_news']=$search_package;
		header("location: ../show-all-news.php");

	}elseif (isset($_POST['webboard']) && ($_POST['webboard']==1)) {
		$search_webboard=$_POST['search'];
		$_SESSION['search_webboard']=$search_webboard;
		header("location: ../show-all-webboard.php");
		
	}elseif (isset($_POST['report']) && ($_POST['report']==1)) {
		$search_webboard=$_POST['search'];
		$_SESSION['search_report']=$search_webboard;
		header("location: ../show-all-report.php");
		
	}

	
	// if (isset($_POST['webboard']) && ($_POST['webboard']==1)) {
	// 	$search_webboard=$_POST['search'];
	// 	$_SESSION['search_webboard']=$search_webboard;
	// 	header("location: ../users-add-webboard.php");
		
	// }elseif(isset($_POST['news']) && ($_POST['news']==1)){
	// 	$search_news=$_POST['search'];
	// 	$_SESSION['search_news']=$search_news;
	// 	header("location: ../users-add-news.php");

	// }elseif (isset($_POST['package']) && ($_POST['package']==1)) {
	// 	$search_package=$_POST['search'];
	// 	$_SESSION['search_package']=$search_package;
	// 	header("location: ../users-show-package.php");

	// }

 ?>
