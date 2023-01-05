<?php  
      session_start(); 
	if(!isset($_SESSION["id_user"])){
		header("location: ../../index.php");
		exit();
	}
	//echo date('Y-m-d H:i:s');exit();
	require('../../dbcon.php');
	$id_user=$_SESSION['id_user'];
	$topic_webboard=$_POST['topic_webboard'];
	$detail_webboard=$_POST['detail_webboard'];
	$name_file_pic=$_FILES['file_pic']['name'];
	$webboard_datetime=date('Y-m-d H:i:s');

	$datetime= date("yymdhis");
	$target_dir = "../../uploads/";
	$name_file_pic = $target_dir . $datetime.basename($_FILES["file_pic"]["name"]);
	move_uploaded_file($_FILES["file_pic"]["tmp_name"], $name_file_pic);

	$name_file_pic = $datetime.basename($_FILES["file_pic"]["name"]);

	$sql="INSERT INTO webboard ( id_user, topic_webboard, detail_webboard, pic_webboard,webboard_datetime) VALUES ('$id_user','$topic_webboard','$detail_webboard','$name_file_pic','$webboard_datetime')";
	$result=mysqli_query($conn,$sql);
	if ($result) {
		$_SESSION['ok']="เพิ่มกระดานสนทนาสำเร็จ";
		header("location: ../users-add-webboard.php");
		exit();
	}else{
		echo mysqli_error($conn);
	}
?>