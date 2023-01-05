<?php 
      session_start(); 
  if(!isset($_SESSION["id_user"])){
    header("location: ../index.php");
    exit();
  }

	require("../../dbcon.php");
	$id_user=$_SESSION['id_user'];
	$id_webboard=$_POST['id_webboard'];
	$comment=$_POST['comment'];
	$comment_datetime=date('Y-m-d H:i:s');
	echo $sql="INSERT INTO comment_webboard (id_user,id_webboard, comment, comment_datetime) VALUES ('$id_user','$id_webboard','$comment','$comment_datetime')";
	$result=mysqli_query($conn,$sql);
	$url="../show-webboard.php?id_webboard=".$_POST['id_webboard'];

	if ($result) {
		$_SESSION['ok']="เพิ่มคอมเม้นสำเร็จ";
		header("location: $url");
		exit();
	}else{
		echo mysqli_error($conn);
	}
 ?>