<?php 
	session_start();
	// clear_session
	if(isset($_GET['search_webboard']) && ($_GET['search_webboard']==1)){
		unset($_SESSION['search_webboard']);
		header("location: ../users-add-webboard.php");
	}
	
	
 ?>