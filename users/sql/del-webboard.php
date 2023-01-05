<?php 
    session_start();
    require('../../dbcon.php');
    $id_webboard=$_GET["id_webboard"];
    $sql="DELETE FROM webboard WHERE webboard.id_webboard = '$id_webboard'";

    $result=mysqli_query($conn,$sql);
    if ($result) {
        $_SESSION['ok']="ลบกระดานสนทนาสำเร็จ";
    	header("location: ../users-add-webboard.php");
    	exit();
    	
    }else{
    echo mysqli_error($conn);
  }

 ?>