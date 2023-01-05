<?php 
      session_start(); 
  if(!isset($_SESSION["id_user"])){
    header("location: ../index.php");
    exit();
  }
 require('../../dbcon.php');
  $id_com_web=$_GET['id_com_web'];
  $id_webboard=$_GET['id_webboard'];
  $sql="DELETE FROM comment_webboard WHERE comment_webboard.id_com_web = '$id_com_web'";
  $result=mysqli_query($conn,$sql);
  $url="../show-webboard.php?id_webboard=".$id_webboard;
  if ($result) {
    $_SESSION['ok']="ลบคอมเม้นสำเร็จ";
  	header("location: $url");
  }else{
  	echo mysqli_error($conn);
  }
 ?>