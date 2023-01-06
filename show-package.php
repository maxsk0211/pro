
<!-- start Carousel Pr -->
	<div class="row my-5 justify-content-center " id="show_promotion">
		<div class="col-md-12 col-lg-8 col-sm-10">
			<div class="alert alert-danger text-center h4 text-dark rounded-pill border-4 border-danger">Promotion - โปรโมชั้น</div>

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
	              	<div class="row g-0 bg-danger position-relative ">
					  <div class="col-md-6 mb-md-0 p-md-4">
					    <img src="uploads/<?php echo $row->pa_pic;?>" class="w-100" alt="...">
					  </div>
					  <div class="col-md-6 p-4 ps-md-0">
					    <h5 class="mt-0"><?php echo $row->pa_name; ?></h5>
					    <p><?php echo $row->pa_detail; ?></p>
					    <!-- <a href="detail-New.php" class="stretched-link btn btn-primary float-start">ดูเพิ่มเติม...</a> -->
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
					
        </div>
        <!-- end col-md-8 col-sm-10 -->

</div>
		<!-- End Carousel Pr -->
