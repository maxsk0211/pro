<?php
	session_start();
	require('../dbcon.php');
	$usernames=$_POST['usernames'];
	$passwords=$_POST['passwords'];

	$sql="SELECT * FROM users WHERE (usernames = '$usernames' or tel = '$usernames') AND passwords = '$passwords'";
	$result=mysqli_query($conn,$sql);
	
	$chk_login=mysqli_fetch_object($result);
	if(isset($chk_login->user_level)){
		
		// update log
		$detatime_log=date('Y-m-d H:i:s');
		$id_user=$chk_login->id_user;
		$ip=$_SERVER["REMOTE_ADDR"];
		$sql="INSERT INTO log_login ( id_user, detatime_log, ip) VALUES ('$id_user','$detatime_log','$ip')";
		mysqli_query($conn,$sql);
		// end updeta log

		$_SESSION['ok']="ยินดีต้อนรับ คุณ".$chk_login->fname." ".$chk_login->lname;
		$_SESSION['id_user']=$chk_login->id_user;
		$_SESSION['user_lv']=$chk_login->user_level;

		//chk
		if($chk_login->user_level=='1'){
			header("location: ../admin/index.php");
			exit();
		}elseif($chk_login->user_level=='0'){
			header("location: ../users/users-add-news.php");
			exit();
		}

	}else{
		$_SESSION['error_login']="ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง";
		header("location: ../index.php");
		exit();
	}
?>