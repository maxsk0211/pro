
<!-- start Carousel Pr -->
	<div class="row my-5 justify-content-center " id="show_promotion">
		<div class="col-md-12 col-lg-8 col-sm-10">
			<div class="alert bg-danger text-center h4 text-light rounded-pill border-4 border-light">Package - แพ็คเกจ</div>

				<?php 
				$sql="SELECT * FROM package WHERE id_pa ORDER BY id_pa DESC LIMIT 3";
				$result=mysqli_query($conn,$sql);
				$result1=mysqli_query($conn,$sql);

				 ?>
	          <div id="text1" class="carousel slide" data-bs-ride="carousel">
	            <ol class="carousel-indicators">
	            	<?php 
	            	$i=0;
	            	while ($row=mysqli_fetch_object($result)) { ?>
	              <li data-bs-target="#text1" data-bs-slide-to="<?php echo $i;?>" class="<?php if($i==0){echo "active";}?>"></li>

	              	<?php $i++; } ?>
	            </ol>
	            <div class="carousel-inner" role="listbox">

	            	<?php 
	            	$i=0;
	            	while ($row=mysqli_fetch_object($result1)) {
	            	
	            	 ?>
	              <div class="carousel-item <?php if($i==0){echo "active";}?>"> 
	              	<div class="row g-0 position-relative" style="background-color: rgb(241, 148, 138);">
					  <div class="col-md-6 mb-md-0 p-md-4">
					    <img src="uploads/<?php echo $row->pa_pic;?>" class="w-100" alt="...">
					  </div>
					  <div class="col-md-6 p-4 ps-md-0">
					  	<div class="alert alert-success">
					  		<h4><?php echo $row->pa_name; ?></h4>
					  	</div>

					    <p class="alert alert-warning"><?php echo $row->pa_detail; ?></p>
					    <strong class="d-flex alert alert-danger h4"><?php echo "ราคา ".$row->pa_price." บาท" ?></strong>
					    <!-- <a href="" class="stretched-link btn btn-primary float-start" data-bs-toggle="modal">ดูเพิ่มเติม...</a> -->
					  </div>
					</div>
	              </div>
	              <?php $i++; } ?>


	            </div>
	            <a class="carousel-control-prev" href="#text1" role="button" data-bs-slide="prev"> 
	            	<span class="carousel-control-prev-icon" aria-hidden="true"></span> 
	            	<span class="sr-only">Previous</span> 
	            </a> 
	            <a class="carousel-control-next" href="#text1" role="button" data-bs-slide="next"> 
	            	<span class="carousel-control-next-icon" aria-hidden="true"></span> 
	            	<span class="sr-only">Next</span> 
	            </a> 
	          </div>

        	<a href="show-all-package.php" class="btn btn-primary d-grid gap-2 mt-2">ดูทั้งหมด</a>					
        </div>
        <!-- end col-md-8 col-sm-10 -->

</div>
		<!-- End Carousel Pr -->
