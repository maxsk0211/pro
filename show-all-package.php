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
		  <?php include 'nav-index-all.php'; ?>
      <div class="row my-5 justify-content-center">
        <div class="col-md-12 col-lg-8 col-sm-10">
          <div class="alert bg-danger text-center h4 text-light rounded-pill border-4 border-light">Package - แพ็คเกจ</div>

          <div class="row">
            <?php 
            $sql="SELECT * FROM package ORDER BY id_pa DESC";
            $result=mysqli_query($conn,$sql);
            
              while($row=mysqli_fetch_object($result)){ ?>
                <div class="col-md-4 bg-light p-3">
                  <div class="card alert-danger">
                    <img src="uploads/<?php echo $row->pa_pic;?>" alt="">
                    <div class="card-body">
                      <h5 class="card-title alert alert-success "><?php echo $row->pa_name ?></h5>
                      <p class="card-text alert alert-warning"><?php echo $row->pa_detail; ?></p>
                      <strong class="alert bg-danger d-flex text-light h4">ราคา <?php echo $row->pa_price; ?> บาท</strong>
                    </div>
                  </div>
                </div>
             <?php }              
             ?>
          </div>
          <!-- row -->
        </div>
      </div>
  </div>
</body>
</html>