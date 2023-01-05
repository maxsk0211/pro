<?php
	session_start();
	require('../../dbcon.php');
	$id_user=$_SESSION["id_user"];
	$report_topic=$_POST["report_topic"];
	$report_detail=$_POST["report_detail"];
	$sql="INSERT INTO report (report_topic, report_detail, id_user) VALUES ('$report_topic','$report_detail','$id_user')";
	$result=mysqli_query($conn,$sql);
	if($result){
		$_SESSION['ok']="เพิ่มหัวข้อแบบสอบถามสำเร็จ";
		header("location: ../admin-add-report.php");
		exit();
	}


?>