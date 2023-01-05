<?php
	session_start();

	require('../dbcon.php');
	$email=$_POST['email'];
	$passwords=$_POST['passwords'];

	$sql="SELECT * FROM users WHERE email = '$email' AND passwords = '$passwords'";
	$result=mysqli_query($conn,$sql);
	
	$chk_login=mysqli_fetch_object($result);
	//echo $chk_login->user_level;
	//exit();
	$chk_login->id_user;
	if($chk_login->user_level=='1'){
		$_SESSION['id_user']=$chk_login->id_user;
		$_SESSION['user_lv']=$chk_login->user_level;
		header("location: ../admin/admin-add-news.php");
		exit();
	}elseif($chk_login->user_level=='0'){
		$_SESSION['id_user']=$chk_login->id_user;
		$_SESSION['user_lv']=$chk_login->user_level;
		header("location: ../users/users-add-webboard.php");
		exit();
	}else{
		header("location: ../index.php");
		exit();
	}

?>