<?php 

    if(!isset($_SESSION["user_lv"]) or ($_SESSION['user_lv']==1) ){
      $_SESSION['error']="คุณไม่มีสิทธิการเข้าถึงหน้านี้!<br>กรุณา Login ครับ";
    header("location: ../index.php");
    exit();
  }


 ?>