<?php
	session_start();
	require('../../dbcon.php');
	$id=$_GET["id"];
	$sql="DELETE FROM report WHERE report.id_report = '$id'";
	$result=mysqli_query($conn,$sql);
	
	if($result){
		$_SESSION['ok']="ลบหัวข้อแบบสอบถามสำเร็จ";
		header("location: ../admin-add-report.php");
		exit();
	}else{
		echo mysqli_error($conn);
	}

?>