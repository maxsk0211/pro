<?php 
    session_start(); 

    
	require('../../dbcon.php');
	//$_SESSION["id_user"]=1;
	$id_user=$_POST["id_user"]; 
	$topic=$_POST["topic"];
	$detail=$_POST["detail"];
	//$id_user=$_POST["id_user"];

	$datetime= date("yymdhis");
	$target_dir = "../../uploads/";
	$name_file_pic = $target_dir . $datetime.basename($_FILES["file_pic"]["name"]);
	move_uploaded_file($_FILES["file_pic"]["tmp_name"], $name_file_pic);

	$name_file_pic =  $datetime.basename($_FILES["file_pic"]["name"]);

	$sql="INSERT INTO news (news_topic, news_topic_detail, news_pic, id_user) VALUES ('$topic','$detail','$name_file_pic','$id_user')";
	
	$result = mysqli_query($conn,$sql);

	if($result){
		$_SESSION['ok']="บันทึกข่าวสารสำเร็จ";
		header("location:../admin-add-news.php");
		exit(0);
	}else{
		echo mysqli_error($conn);

	}
	




 ?>