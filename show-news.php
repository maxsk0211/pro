
<!-- start Carousel Pr -->
	<div class="row my-5 justify-content-center " id="show_news">
		<div class="col-md-12 col-lg-8 col-sm-12 ">
			<div class="alert bg-primary text-center h4 text-light rounded-pill border-4 border-light">News - ข่าวสาร</div>
					
				
				<div class="bg-light">
					<nav class="pt-4 ps-4">
					  <div class="nav nav-tabs" id="nav-tab" role="tablist">
					    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button">ข่าวสารล่าสุด</button>
					    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button">ข่าวสารยอดนิยม</button>
					  </div>
					</nav>

					<div class="tab-content" id="pills-tabContent">
					  <!-- tab1 -->
					  <div class="tab-pane fade show active alert-danger" id="tab1">
					  	<div class="row my-2  p-4">
					  	<?php 
							$sql_show_new="SELECT * FROM news ORDER by id_news DESC LIMIT 6";
							$result_show_new=mysqli_query($conn,$sql_show_new);
							while($row_show_new=mysqli_fetch_object($result_show_new)){ ?>
							<div class="col-sm-4 mt-2">
						    <div class="card alert-info">
						    	<img src="uploads/<?php echo $row_show_new->news_pic;?>" class="card-img-top" alt="...">
						      <div class="card-body">
						        <h5 class="card-title"><?php echo $row_show_new->news_topic;?></h5>
						        <p class="card-text"><?php echo $row_show_new->news_topic_detail;?></p>

						        	
						        <a href="show-news-detail.php?id_news=<?php echo $row_show_new->id_news; ?>" class="btn btn-success float-end">ดูเพิ่มเติม</a>
						        เยี่ยมชม <span class="badge bg-danger"><?php echo $row_show_new->news_view;?></span> ครั้ง
						        <br>
						        <span class="badge bg-danger"><?php echo $row_show_new->news_date;?></span> 
						      </div>
						    </div>	
						  </div>

						<?php } ?>
						</div>
					  </div>
					  <!-- end tap1 -->
					  <!-- tab2 -->
					  <div class="tab-pane fade alert-warning" id="tab2">
					  	<div class="row my-2  p-4">
					  	<?php 
							$sql_show_new="SELECT * FROM news ORDER BY news_view DESC LIMIT 6";
							$result_show_new=mysqli_query($conn,$sql_show_new);
							while($row_show_new=mysqli_fetch_object($result_show_new)){ ?>
							<div class="col-sm-4 mt-2">
						    <div class="card alert-info">
						    	<img src="uploads/<?php echo $row_show_new->news_pic;?>" class="card-img-top" alt="...">
						      <div class="card-body">
						        <h5 class="card-title"><?php echo $row_show_new->news_topic;?></h5>
						        <p class="card-text"><?php echo $row_show_new->news_topic_detail;?></p>
						        <a href="show-news-detail.php?id_news=<?php echo $row_show_new->id_news; ?>" class="btn btn-success float-end">ดูเพิ่มเติม</a>
						        เยี่ยมชม <span class="badge bg-danger"><?php echo $row_show_new->news_view;?></span> ครั้ง
						        <br>
						        <span class="badge bg-danger"><?php echo $row_show_new->news_date;?></span> 

						      </div>
						    </div>	
						  </div>

						<?php } ?>
						</div>
					  </div>
					  <!-- end tab2 -->
					</div>
				</div>


												  
				<a href="show-all-news.php" class="btn btn-primary d-grid gap-2 mt-2">ดูทั้งหมด</a>
        </div>
        <!-- end col-md-8 col-sm-10 -->

</div>
		<!-- End Carousel Pr -->
