<?php 
    session_start();
    require('../../dbcon.php');
$count=$_POST['count'];
$id_user=$_POST['id_user'];
$id_report=$_POST['id_report'];
for ($i=0; $i < $count ; $i++) {

   //$_POST['id_report_detail'][$i] . " " . $_POST['score'][$i] . "<br>";
   
    $id_report_detail=$_POST['id_report_detail'][$i];
    $score=$_POST['score'][$i];

    $sql="INSERT INTO score_report (id_report, id_report_detail, use_score_report, id_user) VALUES ('$id_report','$id_report_detail',' $score','$id_user')";
    //echo "<br>";
    $result=mysqli_query($conn,$sql);

} 
if ($result) {
    $_SESSION['ok']="ประเมินสำเร็จ";
    header("location: ../users-add-report.php");
    exit();
}else{
    echo mysqli_error($conn);
}

 ?>