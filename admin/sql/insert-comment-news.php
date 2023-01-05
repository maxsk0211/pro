<?php 
      session_start(); 


	require("../../dbcon.php");
	$id_user=$_SESSION['id_user'];
	$id_news=$_POST['id_news'];
	$comment=$_POST['comment'];
	$comment_datetime=date('Y-m-d H:i:s');
	//exit();
	$sql="INSERT INTO comment_news (id_user,id_news, comment, comment_datetime) 
	VALUES ('$id_user','$id_news','$comment','$comment_datetime')";
	$result=mysqli_query($conn,$sql);
	//$url="../show-webboard.php?id_webboard=".$_POST['id_news'];

	if ($result) {
		$_SESSION['ok']="เพิ่มความติดเห็นสำเร็จ";
		header("location: ../admin-show-news-detail.php?id_news=$id_news");
		exit();
	}else{
		echo mysqli_error($conn);
	}
 ?>