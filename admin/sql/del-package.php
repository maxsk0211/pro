<?php 
    session_start();
    require('../../dbcon.php');
    $id_pa=$_GET["id_pa"];
    $sql="DELETE FROM package WHERE package.id_pa = '$id_pa'";

    $result=mysqli_query($conn,$sql);
    if ($result) {
        $_SESSION['ok']="ลบแพ็คเกจสำเร็จ";
    	header("location: ../admin-add-package.php");
    	exit();
    	
    }else{
    echo mysqli_error($conn);
  }

 ?>