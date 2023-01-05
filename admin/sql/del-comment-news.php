<?php 
      session_start(); 

  require('../../dbcon.php');
  $id_com_news=$_GET['id_com_news'];
  $id_news=$_GET['id_news'];
  $sql="DELETE FROM comment_news WHERE comment_news.id_com_news = '$id_com_news'";
  $result=mysqli_query($conn,$sql);
  if ($result) {
    $_SESSION['ok']="ลบความคิดเห็นสำเร็จ";
    header("location: ../admin-show-news-detail.php?id_news=$id_news");
  }else{
    echo mysqli_error($conn);
  }
 ?>