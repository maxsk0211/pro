
<!-- start Carousel Pr -->
	<div class="row my-5 justify-content-center " id="show_news">
		<div class="col-md-12 col-lg-8 col-sm-10">
			<div class="alert alert-primary text-center h4 text-dark rounded-pill border-4 border-primary">News - ข่าวสาร</div>
					
				<div class="row my-2">

					<?php 
					$sql_show_new="SELECT * FROM news ORDER by id_news DESC LIMIT 9";
					$result_show_new=mysqli_query($conn,$sql_show_new);
					while($row_show_new=mysqli_fetch_object($result_show_new)){ ?>
						<div class="col-sm-4 mt-2">
					    <div class="card">
					    	<img src="uploads/<?php echo $row_show_new->news_pic;?>" class="card-img-top" alt="...">
					      <div class="card-body">
					        <h5 class="card-title"><?php echo $row_show_new->news_topic;?></h5>
					        <p class="card-text"><?php echo $row_show_new->news_topic_detail;?></p>
					        <a href="show-news-detail.php?id_news=<?php echo $row_show_new->id_news; ?>" class="btn btn-success float-end">ดูเพิ่มเติม</a>
					      </div>
					    </div>	
					  </div>

					<?php } ?>

												  
			</div>
					<!-- <a href="index-showNew.php" class="btn btn-primary d-grid gap-2 mt-2">ดูทั้งหมด</a> -->
        </div>
        <!-- end col-md-8 col-sm-10 -->

</div>
		<!-- End Carousel Pr -->
