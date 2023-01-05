<?php
	session_start();
	require('../../dbcon.php');
	
	$id_user = $_GET['id'];
	
	$sql="DELETE FROM users WHERE users.id_user = '$id_user'";
	
	$result = mysqli_query($conn,$sql);

	if($result){
		$_SESSION['ok']="ลบผู้ใช้งานสำเร็จ";
		header("location: ../admin-add-admin.php");
		exit();
	}
	
?>