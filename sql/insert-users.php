<?php
	session_start();
	require('../dbcon.php');
	$usernames=$_POST["usernames"];
	//$email="snookzonezaa@gmail.com";
	$passwords=$_POST["pass1"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$tel=$_POST["tel"];
	$address=$_POST["address"];
	$birthday=$_POST["birthday"];
	$name_file_pic=$_FILES['file_pic']['name'];

	$sql="SELECT * FROM users WHERE usernames = '$usernames' or tel = '$tel'";
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
			$target_dir ="../uploads/";
			$name_file_pic = $target_dir.$datetime.basename($_FILES["file_pic"]["name"]);
			move_uploaded_file($_FILES["file_pic"]["tmp_name"],$name_file_pic);

			$name_file_pic = $datetime.basename($_FILES["file_pic"]["name"]);
		}
		$sql="INSERT INTO users (usernames, passwords, fname, lname, tel, address, pic, birthday) VALUES ('$usernames', '$passwords', '$fname', '$lname', '$tel', '$address', '$name_file_pic', '$birthday')";

		$result=mysqli_query($conn,$sql);
			if($result){
				// ตึงข้อมูล
				$sql="SELECT * FROM users WHERE usernames = '$usernames'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_object($result);
				$_SESSION['id_user']=$row->id_user;
				// end
				$_SESSION['user_lv']=$row->user_level;
				$_SESSION['ok']="ยินดีต้อนรับ คุณ".$row->fname." ".$row->lname;
				header("location: ../users/users-add-news.php");
				exit(0);

			}else{
				echo mysqli_error($conn);
			}
	

	}else{
		// E mail ช้ำ
		$_SESSION['error_login']="มีชื่อผู้ใช้หรือเบอร์โทรนี้แล้ว<br>กรุณาสมัครข้อมูลใหม่";
		header("location:../index.php");
		exit(0);
	}






?>