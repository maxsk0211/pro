	<!-- Start webboard -->
				<div class="row my-5 justify-content-center " id="show-webboard">
					<div class="col-md-12 col-lg-8 col-sm-12">
						<div class="alert bg-info rounded-pill border-4 border-light h4 text-center">กระดาษสนทนา</div>

          <div class="card">
            <div class="card-body">
              <h4 class="bg-primary text-light card-header mb-2">เรื่องสนทนาทั้งหมด</h4>
              <table class="table table-hover table-info">
                <thead>
                  <tr class="table-primary">
                    <th class="text-center">#</th>
                    <th scope="col">ชื่อหัวเรื่องสนทนา</th>
                    <th scope="col">ผู้สร้าง</th>
                    <th scope="col">เยี่ยมชม</th>
                    <th scope="col">วันที่สร้าง</th>
                    <th scope="col">ตำสั่ง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                $sql = " SELECT * FROM webboard,users WHERE users.id_user=webboard.id_user ORDER BY webboard.id_webboard DESC limit 10";
                $result=mysqli_query($conn,$sql);
                //$count = mysqli_num_rows($result);

                $i=1;


                  while( $row = mysqli_fetch_object($result)){ 
                   ?>
                  <tr>
                    <th class="text-center"><?php echo $i++; ?></th>
                    <td><?php echo $row->topic_webboard ?></td>
                    <td><?php echo $row->fname." ".$row->lname; ?></td>
                    <td><?php echo $row->view_webboard." ครั้ง"; ?></td>
                    <td><?php echo $row->webboard_datetime; ?></td>
                    <td>
                      <a href="show-webboard-detail.php?id_webboard=<?php echo $row->id_webboard;?>" class="btn btn-primary btn-sm">ดู</a>
                    </td>
                  </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
 
				<a href="show-all-webboard.php" class="btn btn-primary d-grid mt-2">ดูทั้งหมด</a>
					</div>
					
				</div>
				<!-- End webboard -->
