<?php 
      session_start(); 
	if(!isset($_SESSION["id_user"])){
		header("location: ../index.php");
		exit();
	}
	require('../../dbcon.php');

	$email=$_POST["email"];
	$password=$_POST["password"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$tel=$_POST["tel"];
	$address=$_POST["address"];
	$birthday=$_POST["birthday"];
	$id_user=$_SESSION["id_user"];

	$name_file_pic=$_FILES['file_pic']['name'];
	//exit();
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

$sql="UPDATE users SET email = '$email', passwords = '$password', fname = '$fname', lname = '$lname', tel = '$tel', address = '$address', pic = '$name_file_pic', birthday = '$birthday' WHERE users.id_user = '$id_user'";
	


$result = mysqli_query($conn,$sql);

	if($result){
		$_SESSION['ok']="แก้ไขข้อมูลส่วนตัวสำเร็จ";
		header("location:../edit-admin.php");
		exit(0);
	}else{
		echo mysqli_error($conn);
	}
	
	
 ?>
