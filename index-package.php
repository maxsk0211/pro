
<!-- start Carousel Pr -->
	<div class="row my-5 justify-content-center ">
		<div class="col-md-12 col-lg-8 col-sm-10">
			<div class="alert alert-danger text-center h4 text-dark rounded-pill border-4 border-danger">Promotion - โปรโมชั้น</div>
						
	          <div id="text1" class="carousel slide" data-bs-ride="carousel">
	            <ol class="carousel-indicators">
	              <li data-bs-target="#text1" data-bs-slide-to="0" class="active"></li>
	              <li data-bs-target="#text1" data-bs-slide-to="1"></li>
	              <li data-bs-target="#text1" data-bs-slide-to="2"></li>
	            </ol>
	            <div class="carousel-inner" role="listbox">
	              <div class="carousel-item active"> 
	              	
	              	<div class="row g-0 bg-light position-relative ">
					  <div class="col-md-6 mb-md-0 p-md-4">
					    <img src="https://cdn.pixabay.com/photo/2022/06/13/14/58/road-7260175_960_720.jpg" class="w-100" alt="...">
					  </div>
					  <div class="col-md-6 p-4 ps-md-0">
					    <h5 class="mt-0">Columns with stretched link</h5>
					    <p>Another instance of placeholder content for this other custom component. It is intended to mimic what some real-world content would look like, and we're using it here to give the component a bit of body and size.</p>
					    <a href="detail-New.php" class="stretched-link btn btn-primary float-start">ดูเพิ่มเติม...</a>
					  </div>
					</div>


	              </div>
	              <div class="carousel-item "> 
					<div class="row g-0 bg-light position-relative">
					  <div class="col-md-6 mb-md-0 p-md-4">
					    <img src="https://cdn.pixabay.com/photo/2013/07/18/20/26/sea-164989_960_720.jpg" class="w-100" alt="...">
					  </div>
					  <div class="col-md-6 p-4 ps-md-0">
					    <h5 class="mt-0">Columns with stretched link</h5>
					    <p>Another instance of placeholder content for this other custom component. It is intended to mimic what some real-world content would look like, and we're using it here to give the component a bit of body and size.</p>
					    <a href="detail-New.php" class="stretched-link btn btn-primary float-start">ดูเพิ่มเติม...</a>
					  </div>
					</div>
	              </div>
	              <div class="carousel-item"> 
					<div class="row g-0 bg-light position-relative">
					  <div class="col-md-6 mb-md-0 p-md-4 alert">
					    <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_960_720.jpg" class="w-100" alt="...">
					  </div>
					  <div class="col-md-6 p-4 ps-md-0">
					    <h5 class="mt-0">Columns with stretched link</h5>
					    <p>Another instance of placeholder content for this other custom component. It is intended to mimic what some real-world content would look like, and we're using it here to give the component a bit of body and size.</p>
					    <a href="detail-New.php" class="stretched-link btn btn-primary float-start">ดูเพิ่มเติม...</a>
					  </div>
					</div>
	              </div>
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



				<div class="row my-2">

					<?php 
					$sql_show_new="SELECT * FROM news_box ORDER by id_news DESC LIMIT 6";
					$result_show_new=mysqli_query($conn,$sql_show_new);
					while($row_show_new=mysqli_fetch_object($result_show_new)){ ?>
						<div class="col-sm-4 mt-2">
					    <div class="card">
					    	<img src="uploads/<?php echo $row_show_new->news_pic;?>" class="card-img-top" alt="...">
					      <div class="card-body">
					        <h5 class="card-title"><?php echo $row_show_new->news_topic;?></h5>
					        <p class="card-text"><?php echo $row_show_new->news_topic_detail;?></p>
					        <a href="detail-New.php" class="btn btn-success float-end">Go somewhere</a>
					      </div>
					    </div>	
					  </div>

					<?php } ?>

												  
			</div>
					<a href="detail-New.php" class="btn btn-primary d-grid gap-2 mt-2">ดูทั้งหมด</a>
        </div>
        <!-- end col-md-8 col-sm-10 -->

</div>
		<!-- End Carousel Pr -->
