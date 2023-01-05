<?php 
    require('../../dbcon.php');
    $id_webboard=$_GET["id_webboard"];
    $sql="DELETE FROM webboard WHERE webboard.id_webboard = '$id_webboard'";

    $result=mysqli_query($conn,$sql);
    if ($result) {
    	header("location: ../admin-add-webboard.php?ok=1");
    	exit();
    	
    }else{
    echo mysqli_error($conn);
  }

 ?>