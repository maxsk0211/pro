<?php 
	session_start();
	require('../../dbcon.php');
	$id_pa=$_POST['id_pa'];
	$pa_name=$_POST['pa_name'];
	$pa_detail=$_POST['pa_detail'];
	$pa_price=$_POST['pa_price'];
	$name_file_pic=$_FILES['pa_pic']['name'];

// chk file pic
if ($name_file_pic==null) {
	$name_file_pic=$_POST['pic_db'];
}else{
	$datetime= date("yymdhis");
	$target_dir = "../../uploads/";
	$name_file_pic = $target_dir . $datetime.basename($_FILES["pa_pic"]["name"]);
	move_uploaded_file($_FILES["pa_pic"]["tmp_name"], $name_file_pic);
	$name_file_pic = $datetime.basename($_FILES["pa_pic"]["name"]);
}

	$sql="UPDATE package SET pa_name ='$pa_name' , pa_detail ='$pa_detail' , pa_pic ='$name_file_pic' , pa_price ='$pa_price'  WHERE package.id_pa ='$id_pa'";
	
	$result=mysqli_query($conn,$sql);
	if ($result) {
		$_SESSION['ok']="แก้ไขแพ็คเกจสำเร็จ";
		header("location: ../admin-add-package.php");
		exit();
	}else{
		mysqli_error($conn);
	}
 ?>