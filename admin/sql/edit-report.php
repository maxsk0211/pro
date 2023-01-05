<?php 
	session_start();
	require('../../dbcon.php');
	$id_report=$_POST['id_report'];
	$report_topic=$_POST['report_topic'];
	$report_detail=$_POST['report_detail'];
	$sql="UPDATE report SET report_topic = '$report_topic', report_detail = '$report_detail' WHERE report.id_report = '$id_report'";

	$result=mysqli_query($conn,$sql);
	if($result){
		$_SESSION['ok']="แก้ไขหัวข้อแบบสอบถามสำเร็จ";
		header("location: ../admin-add-report.php");
		exit();
	}else{
		echo mysqli_error($conn);
	}




 ?>