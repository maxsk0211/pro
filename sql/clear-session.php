<?php 
	session_start();
	// clear_session
	if(isset($_GET['search_package']) && ($_GET['search_package']==1)){
		unset($_SESSION['search_package']);
		header("location: ../show-all-package.php");

	}
	
	
 ?>