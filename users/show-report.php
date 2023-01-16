<?php  
      session_start(); 
	if(!isset($_SESSION["user_lv"]) && $_SESSION['user_lv']==0 ){
		header("location: ../index.php?");
		exit();
	}

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
     <?php include 'nav-user.php'; ?> 
     <div class="row justify-content-center ">
     	<div class="col-md-3 d-none d-lg-block">
     		<?php include 'nav-left.php'; ?>
     	</div>
     	<div class="col-md-9">
     		<a href="users-add-report.php" class="btn btn-warning btn-lg"><--- Back</a>
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
								$i=0;
								while($row=mysqli_fetch_object($result)){
									$count_score=$row->count_score;
									$report_score=$row->report_score;
									$sum_score=$row->sum_score;
									$total=$count_score*$report_score;
									$percentage=($sum_score/$total)*100;
									$balance=100-$percentage;
									//$percentage=59;
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

							  <a href="#show_detail_score_<?php echo $i;?>"  data-bs-toggle="modal" class="float-end">รายละเอียด</a>
								  <br>
								  <!-- modal detail report -->
									<div class="modal fade" id="show_detail_score_<?php echo $i++;?>">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header bg-primary text-light">
													<h4 class="modal-title">รายละเอียดคะแนน</h4>
													<button class="btn-close" type="button" data-bs-dismiss="modal"></button>
												</div>
												<div class="modal-body">
													<div class="alert alert-success">
												 		<h4 class="">หัวข้อย่อย : <?php echo $row->detail_name; ?></h4>
													</div>
													<h4>คะแนนเต็มในหัวข้อนี้คือ :  <?php echo $report_score; ?> คะแนน</h4>
													<hr>
													<?php 
													
													$id_report_detail=$row->id_report_detail;
													$sql_detail_score="SELECT use_score_report, COUNT(id_score_report) as count_score FROM score_report WHERE id_report_detail = '$id_report_detail'  GROUP BY use_score_report ORDER BY `score_report`.`use_score_report` DESC";
													$result_detail_score=mysqli_query($conn,$sql_detail_score);
													$count=mysqli_num_rows($result_detail_score);
													$sum_use_score_report=0;

													if ($count!=0) {
															while($row_detail_score=mysqli_fetch_object($result_detail_score)){ ?>
																<h5>ประเมิน <?php echo $row_detail_score->use_score_report ?> คะแนน จำนวน <?php echo $row_detail_score->count_score ?> คน</h5>
																
														<?php	}	?>
														<hr>
														<h5>รวมคะแนนเต็ม <?php echo $total; ?> คะแนน </h5>
														<h5>รวมคะแนนที่ได้ <?php echo $sum_score; ?> คะแนน คิดเป็นร้อนละ <?php echo number_format((float)$percentage, 2, '.', ''); ?> %</h5>
													<?php }else{

													}
													 ?>
													
												</div>
												<div class="modal-footer">
													<a href="#" class="btn btn-danger"  type="button" data-bs-dismiss="modal">ปิด</a>
												</div> 
											</div>
										</div>
									</div>
									<!-- end modal detail report -->

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
