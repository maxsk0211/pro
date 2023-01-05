<?php 
	session_start();
	if (isset($_POST['webboard']) && ($_POST['webboard']==1)) {
		$search_webboard=$_POST['search'];
		$_SESSION['search_webboard']=$search_webboard;
		header("location: ../users-add-webboard.php");
		
	}elseif (isset($_POST['search_chart_room']) && ($_POST['search_chart_room']==1)) {
		echo $search_chart_room=$_POST['search_chart_room'];
		$_SESSION['search_chart_room']=$search_chart_room;
		//header("location: ../users-chart-room.php");
		
	}

 ?>
