<?php
	session_start();
	require('../../dbcon.php');
	$id_report=$_GET["id_report"];
	$id_report_detail=$_GET["id_report_detail"];

	$sql="DELETE FROM report_detail WHERE report_detail.id_report_detail = '$id_report_detail'";
	$result=mysqli_query($conn,$sql);
	$url="../admin-add-report-detail.php?id=".$id_report;
	if($result){
		$_SESSION['ok']="ลบหัวข้อย่อยสำเร็จ";
		header("location: $url");
		exit();
	}else{
		echo mysqli_error($conn);
	}
?>