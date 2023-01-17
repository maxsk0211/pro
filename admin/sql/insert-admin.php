<?php
	session_start();
	require('../../dbcon.php');
	$usernames=$_POST["usernames"];
	//$email="snookzonezaa@gmail.com";
	$passwords=$_POST["pass1"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$tel=$_POST["tel"];
	$address=$_POST["address"];
	$birthday=$_POST["birthday"];
	$user_level=$_POST["user_level"];
	$name_file_pic=$_FILES['file_pic']['name'];

	$sql="SELECT * FROM users WHERE usernames = '$usernames'";
	$result=mysqli_query($conn,$sql);
	//นับข้อมูลช้ำ
	$count=mysqli_num_rows($result);
	
	if($count == 0){
		//ไม่เจอข้อมูลช้ำ

		//เช็ค ใส่รูป
		if ($name_file_pic==null) {
			//ไม่เลือกรูป
			$name_file_pic="pic_default.jpg";
		}else{
			//เลือกรูป
			$datetime = date("yymdhis");
			$target_dir ="../../uploads/";
			$name_file_pic = $target_dir.$datetime.basename($_FILES["file_pic"]["name"]);
			move_uploaded_file($_FILES["file_pic"]["tmp_name"],$name_file_pic);

			$name_file_pic = $datetime.basename($_FILES["file_pic"]["name"]);
		}
		$sql="INSERT INTO users (usernames, passwords, fname, lname, tel, address, pic, birthday,user_level) VALUES ('$usernames', '$passwords', '$fname', '$lname', '$tel', '$address', '$name_file_pic', '$birthday','$user_level')";

		$result=mysqli_query($conn,$sql);
			if($result){
				$_SESSION['ok']="เพิ่มข้อมูลบัญชีผู้ใช้สำเร็จ";
				header("location:../admin-add-admin.php");
				exit(0);

			}else{
				echo mysqli_error($conn);
			}
	

	}else{
		// E mail ช้ำ
		$_SESSION['error']="มีผู้ใช้ E-Mail นี้แล้ว กรุณากรอก E-Mail ใหม่";
		header("location:../admin-add-admin.php");
		exit(0);
	}






?>