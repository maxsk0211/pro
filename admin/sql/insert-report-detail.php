<?php
	session_start();
	require('../../dbcon.php');
	$report_name=$_POST["detail_name"];
	$report_score=$_POST["detail_score"];
	$report_note=$_POST["report_note"];
	$id_report=$_POST["id_report"];
	$id_user=$_POST["id_user"];
	//exit();

	$sql="INSERT INTO report_detail (id_report, detail_name, report_score, report_note, id_user) VALUES ('$id_report','$report_name','$report_score','$report_note','$id_user')";
	$result=mysqli_query($conn,$sql);
	$url="../admin-add-report-detail.php?id=".$id_report;
	if($result){
		$_SESSION['ok']="เพิ่มหัวข้อย่อยสำเร็จ";
		header("location: $url");
		exit();
	}

?>