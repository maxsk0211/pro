<?php 
  session_start(); 

	require('../../dbcon.php');
	$id_user=$_POST['id_user'];
	$pa_name=$_POST['pa_name'];
	$pa_detail=$_POST['pa_detail'];
	$pa_price=$_POST['pa_price'];


	$name_file_pic=$_FILES['pa_pic']['name'];
	$datetime= date("yymdhis");
	$target_dir = "../../uploads/";
	$name_file_pic = $target_dir . $datetime.basename($_FILES["pa_pic"]["name"]);
	move_uploaded_file($_FILES["pa_pic"]["tmp_name"], $name_file_pic);

	
	$name_file_pic =  $datetime.basename($_FILES["pa_pic"]["name"]);

	$sql="INSERT INTO package (pa_name, pa_detail, pa_pic, id_user, pa_price) VALUES ('$pa_name','$pa_detail','$name_file_pic','$id_user','$pa_price')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		$_SESSION['ok']="เพิ่มแพ็คเกจสำเร็จ";
		header("location: ../admin-add-package.php");
		exit();
	}else{
		mysqli_error($conn);
	}
 ?>