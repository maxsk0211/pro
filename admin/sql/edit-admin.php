<?php 
	session_start();
	require('../../dbcon.php');

	$email=$_POST["email"];
	$password=$_POST["password"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$tel=$_POST["tel"];
	$address=$_POST["address"];
	$id_user=$_POST["id_user"];
	$user_level=$_POST["user_level"]; 
	$name_file_pic=$_FILES['file_pic']['name'];
	$birthday=$_POST["birthday"];
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

	echo $sql="UPDATE users SET email = '$email', passwords = '$password', fname = '$fname', lname = '$lname', tel = '$tel', address = '$address', pic = '$name_file_pic', birthday = '$birthday', user_level = '$user_level' WHERE users.id_user = '$id_user'";
	//exit();


$result = mysqli_query($conn,$sql);

	if($result){
		$_SESSION['ok']="แก้ไขบัญชีผู้ใช้งานสำเร็จ";
		header("location:../admin-add-admin.php");
		exit(0);
	}else{
		echo mysqli_error($conn);
	}
	
	
 ?>
