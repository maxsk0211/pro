<?php 
	session_start();
	require("../../dbcon.php");
	$chart_room_name=$_POST['chart_room_name'];
	$id_user=$_POST['id_user'];
	$sql="INSERT INTO chat_room (chart_room_name, user_general) VALUES ('$chart_room_name','$id_user')";
	$result=mysqli_query($conn,$sql);

	if ($result) {
		$_SESSION['ok']="สร้างห้องแชทสำเร็จ";
		header("location: ../users-chart-room.php");
	}else{
		echo mysqli_error($conn);
	}
 ?>