<?php  
      session_start(); 
include 'chk-session.php';

	// update view
	require('../dbcon.php');
	$id_report=$_GET['id_report'];
	$sql="UPDATE report SET view_report = (view_report+1) WHERE report.id_report = '$id_report'";
	mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แบบรายงานแบบสอบถาม</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/bootstrap.js"></script> 

  </head>
  <body style="height: 5000px; padding-top: 70px;background: rgb(100, 40, 140);">
	  <div class="container-fluid">
     <?php include 'nav-admin.php'; ?> 
     <div class="row justify-content-center ">
     	<div class="col-md-3 d-none d-lg-block">
     		<?php include 'nav-left.php'; ?>
     	</div>
     	<div class="col-md-9">
     		<a href="admin-add-report.php" class="btn btn-warning btn-lg"><--- Back</a>
     			 <div class="card border-primary border-3 rounded-pill my-2">
            <div class="card-body">

              <h3 class="card-header bg-secondary text-center text-white rounded-pill">รายงานแบบสอบถาม</h3>
            </div>
          </div>



          <div class="card">
					<div class="card-body">
						<h5 class="card-header bg-info">รายงานคะแนนการประเมินแบบสอบถาม</h5>
							<?php
								$id_report=$_GET['id_report'];
								$sql_show_report="SELECT * FROM report WHERE id_report = '$id_report'";
								$result_show_report=mysqli_query($conn,$sql_show_report);
								$row_show_report=mysqli_fetch_object($result_show_report);
							 ?>
							
            <div class="alert alert-danger">
              <strong class="text-danger fs-5">หัวข้อแบบประเมิน : </strong>
              <strong class="text-danger h5"><?php echo $row_show_report->report_topic; ?></strong>
              <br>
              <strong class="text-success fs-6">รายละเอียด : </strong>
              <strong class="text-success"><?php echo $row_show_report->report_detail; ?></strong>
            </div>

							<h5 class="card-header bg-info">สรุปการประเมิน</h5>
							<?php 
								$id_report=$_GET['id_report'];
								$sql="SELECT
										    report_detail.id_report_detail,
										    report_detail.detail_name,
										    COUNT(report_detail.id_report_detail) as count_score,
										    SUM(use_score_report) AS sum_score,
										    report_detail.report_score
										FROM
										    score_report,
										    report,
										    report_detail
										WHERE
										    report.id_report = report_detail.id_report AND 
										    score_report.id_report_detail = report_detail.id_report_detail AND
										    report_detail.id_report='$id_report'
										GROUP BY
										    report_detail.id_report_detail
										    ";
								$result=mysqli_query($conn,$sql);
								$count_score=0;
								while($row=mysqli_fetch_object($result)){
									//นับคนประเมิน
									$count_score=$row->count_score;
									//คะแนน
									$report_score=$row->report_score;
									//คะแนนรวม
									$sum_score=$row->sum_score;

									$total=$count_score*$report_score;
									//หาค่าเฉลี่ยร้อยละ
									$percentage=($sum_score/$total)*100; 
									//หลอดที่เท่า
									$balance=100-$percentage;

									// กำหนดสีพื้นหลังของหลอด
									if ($percentage >= 80 ) {
										$bg="bg-success";
									}elseif($percentage >= 60){
										$bg="bg-warning";
									}else{
										$bg="bg-danger";
									}
							 ?>

							 <div class="alert alert-info mt-3">
								<div class="alert-heading h5"><?php echo $row->detail_name; ?></div>
								<div class="progress" style="height: 50px;">

								  <div class="progress-bar text-dark <?php echo $bg; ?>" role="progressbar" style="width: <?php echo $percentage;?>%; h" aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="100"><p class="h4 "><?php echo number_format((float)$percentage, 2, '.', '');?>%</p></div>

								  <div class="progress-bar bg-secondary" role="progressbar" style="width: <?php echo $balance;?>%; h" aria-valuenow="<?php echo $balance;?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>

							</div>
						<?php } ?>

						<div class="alert alert-primary m-5 text-center h5">
							จำนวนผู้ประเมิน
								<div class="badge bg-danger">
									<?php echo $count_score; ?>
								</div>ครั้ง
							<br>
							จำนวนผู้เข้าชม : 
								<div class="badge bg-danger">
									<?php echo $row_show_report->view_report; ?> 
								</div>
							ครั้ง
						</div>

					</div>
				</div>
     	</div>
     	<!-- col-md-9 -->
     </div>
     <!-- row -->

    </div>
	  
	 
	  
	  
	  
  <script src="../js/jquery-3.6.1.min.js"></script>
  <?php include '../alert-modal.php'; ?>
  </body>
</html>
