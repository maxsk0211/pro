<?php 
    if(!isset($_SESSION["user_lv"]) && $_SESSION['user_lv']==0 ){
      $_SESSION['error']="คุณไม่มีสิทธิการเข้าถึงหน้านี้!<br>กรุณา Login คะ";
    header("location: ../index.php");
    exit();
  }




 ?>