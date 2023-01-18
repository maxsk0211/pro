<?php
  require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ติดต่อ - Happy Care Nursing Home - บ้านมีสูข</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.js"></script> 

  </head>
  <body style="padding-top: 50px;background: rgb(100, 40, 140);">
	  
	  <div class="container-fluid">
     <?php include 'nav-index-all.php'; ?>
<!-- start Carousel Pr -->
  <div class="row my-5 justify-content-center ">
    <div class="col-md-12 col-lg-8 col-sm-10">

          <div class="alert bg-warning rounded-pill border-4 border-light h4 text-center">ติดต่อ - contact</div>
        
          <div class="card">
            <div class="card-body">
              <div class="row m-3">
                <div class="col-md-4">
                  <img src="https://cdn.pixabay.com/photo/2013/07/12/14/45/qr-code-148732_960_720.png" class="w-100">
                  <p class="my-3 h5 text-center">Line official : @HappyCareNursingHome</p>
                </div>
                <div class="col-md-8">
                  <div class="alert alert-success text-center">
                    <p class="fw-bold h4">Happy Care Nursing Home - บ้านมีสูข</p>
                  </div>
                  <p class="fw-bold h5 my-2">ที่อยู่ : เลขที่ 9 ซอย นาคนิวาส 18 เขตลาดพร้าว กรุงเทพมหานคร 10230</p>
                  <p class="fw-bold my-2 h5">เบอร์โทร : 075-611-797</p>
                  <p class="fw-bold my-2 h5">วันทำการ ทุกวัน 08:00-19:00น.</p>
                  <div class="text-center">
                    <a href="#" title="" class="btn btn-success">Google Map</a>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
  
  </div>
<!-- End container -->
    </div>
	 
	  
	  
	  
  <script src="js/jquery-3.6.1.min.js"></script>
  <?php include 'alert-modal.php'; ?>
  </body>
</html>
