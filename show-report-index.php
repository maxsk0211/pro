<?php  


	// update view
	require('dbcon.php');
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
    <title>แก้ไขข้อมูลส่วนตัว</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.js"></script> 

  </head>
  <body class="bg-secondary" style="height:3000px;padding-top: 70px;">
	  <div class="container-fluid">
     <?php include 'show-Nav.php'; ?> 
		  <div class="row my-5 justify-content-center">
		  	<div class="col-md-12 col-lg-8 col-sm-10">
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
							
							<div class="alert alert-success h5 mx-5 mt-4"><?php echo $row_show_report->report_topic; ?></div>
							<div class="alert alert-warning mx-5"><?php echo $row_show_report->report_detail; ?></div>


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
								while($row=mysqli_fetch_object($result)){
									$total=$row->count_score*$row->report_score;
									$percentage=($row->sum_score/$total)*100
							 ?>

							 <div class="alert alert-info mt-3">
								<div class="alert-heading h5"><?php echo $row->detail_name; ?></div>
								<div class="progress" style="height: 25px;">
								  <div class="progress-bar" role="progressbar" style="width: <?php echo $percentage;?>%; h" aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percentage;?>%</div>
								</div>
							</div>
						<?php } ?>

						<div class="alert alert-primary m-5 text-center h5">
							จำนวนผู้เข้าชม : <?php echo $row_show_report->view_report; ?> ครั้ง
						</div>

					</div>
				</div>
			  </div>
		  </div>
    </div>
	  
	 
	  
	  
	  
  <script src="js/jquery-3.6.1.min.js"></script>
  <?php include 'alert-modal.php'; ?>
  </body>
</html>
