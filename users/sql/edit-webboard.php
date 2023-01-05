<?php 
	session_start(); 
	require('../../dbcon.php');
	$id_webboard=$_POST['id_webboard'];
	$topic_webboard=$_POST['topic_webboard'];
	$detail_webboard=$_POST['detail_webboard'];

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

	$sql="UPDATE webboard SET topic_webboard ='$topic_webboard' , detail_webboard ='$detail_webboard' , pic_webboard ='$name_file_pic'  WHERE webboard.id_webboard ='$id_webboard' ";

	$result=mysqli_query($conn,$sql);
	if ($result) {
		$_SESSION['ok']="แก้ไขกระดานสนทนาสำเร็จ";
		header("location: ../users-add-webboard.php");
		exit();
	}else{
		mysqli_error($conn);
	}
 ?>