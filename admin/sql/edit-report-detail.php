<?php
	session_start();
	require('../../dbcon.php');
	$detail_name=$_POST["detail_name"];
	$report_score=$_POST["detail_score"];
	$report_note=$_POST["report_note"];
	$id_report=$_POST["id_report"];
	$id_report_detail=$_POST['id_report_detail'];
	
	$url="../admin-add-report-detail.php?id=".$id_report;

	$sql="UPDATE report_detail SET detail_name ='$detail_name' , report_score ='$report_score' , report_note ='$report_note'  WHERE report_detail.id_report_detail ='$id_report_detail' ";
	$result=mysqli_query($conn,$sql);
	if($result){
		$_SESSION['ok']="แก้ไขหัวข้อย่อยสำเร็จ";
		header("location: $url");
		exit();
	}else{
		echo mysqli_error($conn);
	}

?>