	<!-- Start webboard -->
	<div class="row my-5 justify-content-center " id="show-report">
	  <div class="col-md-12 col-lg-8 col-sm-12">
	    <div class="alert bg-secondary rounded-pill border-4 border-light h4 text-center text-light">แบบสอบถาม</div>


	    <div class="card">
	      <div class="card-body">
	        <h4 class="bg-primary card-header mb-2 text-light">แบบสอบถามทั้งหมด</h4>
	        <table class="table table-hover table-info">
	          <thead>
	            <tr class="table-primary">
	              <th class="text-center">#</th>
	              <th>ชื่อแบบสอบถาม</th>
	              <th>ผู้สร้าง</th>
	              <th>เยี่ยมชม</th>
	              <th>รายละเอียดต่าง</th>
	              <th>ตำสั่ง</th>
	            </tr>
	          </thead>
	          <tbody>
	            <?php
              $sql = "SELECT * FROM report,users  where  report.id_user= users.id_user ORDER BY report.id_report DESC limit 5";
              $result = mysqli_query($conn, $sql);
              $i = 1;
              while ($row = mysqli_fetch_object($result)) {

              ?>
	              <tr>
	                <th class="text-center"><?php echo $i; ?></th>
	                <td><?php echo $row->report_topic; ?></td>
	                <td><?php echo $row->fname . " " . $row->lname ?></td>
	                <td><?php echo $row->view_report . " ครั้ง"; ?></td>
	                <td><?php echo $row->report_detail; ?></td>
	                <td>

	                  <a href="show-report-detail.php?id_report=<?php echo $row->id_report; ?>" class="btn btn-success btn-sm">รายงาน</a>
	                </td>
	              </tr>

	            <?php  } ?>
	          </tbody>
	        </table>
	      </div>
	    </div>
	    <a href="show-all-report.php" class="btn btn-primary d-grid mt-2">ดูทั้งหมด</a>







	  </div>
	</div>