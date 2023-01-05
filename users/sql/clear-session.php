<?php 
	session_start();
	// clear_session
	if(isset($_GET['search_webboard']) && ($_GET['search_webboard']==1)){
		unset($_SESSION['search_webboard']);
		header("location: ../users-add-webboard.php");
	
	}elseif (isset($_GET['search_chart_room']) && ($_GET['search_chart_room']==1)){
		unset($_SESSION['search_chart_room']);
		header("location: ../users-chart-room.php");
	}
	
	
 ?>