<?php 
    session_start();
    require('../../dbcon.php');
    $id_news=$_GET["id"];
    $sql="DELETE FROM news WHERE news.id_news = '$id_news'";

    $result=mysqli_query($conn,$sql);
    if ($result) {
        $_SESSION['ok']="ลบข่าวสารสำเร็จ";
    	header("location: ../admin-add-news.php");
    	exit();
    	
    }else{
    echo mysqli_error($conn);
  }

 ?>