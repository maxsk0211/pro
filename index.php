<?php 
	session_start();
	require('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Happy Care Nursing Home - บ้านมีสูข</title>
       <link href="css/bootstrap.min.css" rel="stylesheet"> 
	    <script src="js/bootstrap.js"></script> 
</head>
  <body style="height: 5000px; padding-top: 50px;background: rgb(100, 40, 140);">
  	<!-- main container -->
  <div class="container-fluid">
		  <?php include 'nav-index.php'; ?>
			<!-- start Carousel -->
				<div class="row my-5 justify-content-center ">
					<div class="col-md-12 col-lg-8 col-sm-10">
						
						<div class="alert   text-center h4 text-light rounded-pill border-4 border-light" style="background-image: var(--bs-gradient);background-color: rgb(211, 84, 0);">Happy Care Nursing Home - บ้านมีสูข </div>

	          <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
	            <ol class="carousel-indicators">
	              <li data-bs-target="#carousel1" data-bs-slide-to="0" class="active"></li>
	              <li data-bs-target="#carousel1" data-bs-slide-to="1"></li>
	              <li data-bs-target="#carousel1" data-bs-slide-to="2"></li>
	            </ol>
	            <div class="carousel-inner" role="listbox">
	              <div class="carousel-item active"> 
	              	<img class="d-block mx-auto w-100" src="img/img1.jpg" alt="First slide">
	                <div class="carousel-caption">
	                  <h5>First slide Heading</h5>
	                  <p>First slide Caption</p>
	                </div>
	              </div>
	              <div class="carousel-item"> 
	              	<img class="d-block mx-auto w-100" src="img/img2.jpg" alt="Second slide">
	                <div class="carousel-caption">
	                  <h5>Second slide Heading</h5>
	                  <p>Second slide Caption</p>
	                </div>
	              </div>
	              <div class="carousel-item"> 
	              	<img class="d-block mx-auto w-100" src="img/img3.jpg" alt="Third slide">
	                <div class="carousel-caption">
	                  <h5>Third slide Heading</h5>
	                  <p>Third slide Caption</p>
	                </div>
	              </div>
	            </div>
	            <a class="carousel-control-prev"  href="#carousel1" role="button" data-bs-slide="prev"> 
	            	<span class="carousel-control-prev-icon" aria-hidden="true"></span> 
	            	<span class="sr-only">Previous</span> 
	            </a> 
	            <a class="carousel-control-next" href="#carousel1" role="button" data-bs-slide="next"> 
	            	<span class="carousel-control-next-icon" aria-hidden="true"></span> 
	            	<span class="sr-only">Next</span> 
	            </a> 
	          </div>

	        </div>
				</div>
			<!-- End Carousel -->
			<?php include 'show-package.php'; ?>
			<?php include 'show-news.php'; ?>
	

			<?php include 'show-webboard.php' ?>
			<?php include 'show-report.php'; ?>

    </div>
<!-- End container -->


  <script src="js/jquery-3.6.1.min.js"></script> 
  
  <?php include 'alert-modal.php'; ?>


</body>
</html>



