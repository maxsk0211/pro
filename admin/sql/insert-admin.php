<?php 

// 	ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

	require('../../dbcon.php');

	$username=$_POST["usernames"];
	$password=$_POST["passwords"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$age=$_POST["age"];
	$address=$_POST["address"];
	$age=$_POST["age"];
	$user_level=$_POST["user_level"]; 
$datetime= date("yymdhis");
$target_dir = "../../uploads/";
$name_file_pic = $target_dir . $datetime.basename($_FILES["file_pic"]["name"]);
move_uploaded_file($_FILES["file_pic"]["tmp_name"], $name_file_pic);
$name_file_pic =  $datetime.basename($_FILES["file_pic"]["name"]);


$sql="INSERT INTO users ( usernames , passwords, fname, lname, age, address, pic ,user_level) VALUES ('$username','$password','$fname','$lname','$age','$address','$name_file_pic','$user_level')";
	


$result = mysqli_query($conn,$sql);

	if($result){

		header("location:../admin-add-admin.php");
		exit(0);
	}else{
		echo mysqli_error($conn);
	}
	
	
 ?>
