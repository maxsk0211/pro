<?php 
	session_start();
	if (isset($_POST['webboard']) && ($_POST['webboard']==1)) {
		$search_webboard=$_POST['search'];
		$_SESSION['search_webboard']=$search_webboard;
		header("location: ../users-add-webboard.php");
		
	}

 ?>
