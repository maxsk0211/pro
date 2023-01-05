<?php 
	session_start();
	require('../../dbcon.php');
	$id_news=$_POST['id_news'];
	$news_topic=$_POST['news_topic'];
	$news_detail=$_POST['news_detail'];
	$name_file_pic=$_FILES['file_pic']['name'];

// chk file pic
if ($name_file_pic==null) {
	$name_file_pic=$_POST['pic_db'];
}else{
	$datetime= date("yymdhis");
	$target_dir = "../../uploads/";
	$name_file_pic = $target_dir . $datetime.basename($_FILES["file_pic"]["name"]);
	move_uploaded_file($_FILES["file_pic"]["tmp_name"], $name_file_pic);

	$name_file_pic = $datetime.basename($_FILES["file_pic"]["name"]);
}

	$sql="UPDATE news SET news_topic ='$news_topic' , news_topic_detail = '$news_detail', news_pic ='$name_file_pic'  WHERE news.id_news ='$id_news'";

	$result=mysqli_query($conn,$sql);
	if ($result) {
		$_SESSION['ok']="แก้ไขข่าวสารสำเร็จ";
		header("location: ../admin-add-news.php");
		exit();
	}else{
		mysqli_error($conn);
	}
 ?>