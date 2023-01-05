<?php 
    require('../../dbcon.php');
$count=$_POST['count'];
$id_user=$_POST['id_user'];
$id_report=$_POST['id_report'];
for ($i=0; $i < $count ; $i++) {

   //$_POST['id_report_detail'][$i] . " " . $_POST['score'][$i] . "<br>";
   
    $id_report_detail=$_POST['id_report_detail'][$i];
    $score=$_POST['score'][$i];

    echo $sql="INSERT INTO score_report (id_report, id_report_detail, use_score_report, id_user) VALUES ('$id_report','$id_report_detail',' $score','$id_user')";
    //echo "<br>";
    $result=mysqli_query($conn,$sql);

} 
if ($result) {
    header("location: ../users-add-report.php?ok=1");
    exit();
}else{
    echo mysqli_error($conn);
}

 ?>