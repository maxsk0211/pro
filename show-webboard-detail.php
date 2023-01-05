<?php  
      session_start(); 
  require('dbcon.php');

  // update view
  $id_webboard=$_GET['id_webboard'];
  $sql="UPDATE webboard SET view_webboard = (view_webboard+1) WHERE webboard.id_webboard = '$id_webboard'";
  mysqli_query($conn,$sql);
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap - Prebuilt Layout</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.js"></script> 

  </head>
  <body class="bg-secondary" style="padding-top:70px ;">
	  
	  <div class="container-fluid">
     <?php include 'show-Nav.php'; ?>
<!-- start Carousel Pr -->
  <div class="row my-5 justify-content-center ">
    <div class="col-md-12 col-lg-8 col-sm-10">

          <div class="card border-4 border-primary my-2 rounded-pill">
            <div class="card-body">
              <h3 class="card-header bg-info text-center rounded-pill">ระบบกระดานสนทนา</h3>
            </div>
          </div>
        
          <div class="card">
            <div class="card-body">
              <div class="row">

                <?php 
                $id_webboard=$_GET['id_webboard'];
                $sql = " SELECT * FROM webboard,users WHERE users.id_user=webboard.id_user and webboard.id_webboard = '$id_webboard' ";
                $result=mysqli_query($conn,$sql);
                $row = mysqli_fetch_object($result) 
                   ?>
                <div class="col-md-3 form-group">
                  <div class="card text-center d-block ">
                   <img src="uploads/<?php echo $row->pic;?>" class="w-100 p-3 ">
                    <div class="card-body">
                      <label class="form-label"><?php echo $row->fname." ".$row->lname; ?></label>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-9">
                    <h4>เรื่อง : <?php echo $row->topic_webboard; ?></h4>
                    <hr>
                    <p class="h5"><?php echo $row->detail_webboard; ?></p>
                    <img src="uploads/<?php echo $row->pic_webboard;?>" class="w-100 p-3 ">
                </div>
                <p class="text-center">วันที่สร้าง : <?php echo $row->webboard_datetime; ?></p>
                <p class="text-center">เยี่ยมชม : <?php echo $row->view_webboard; ?> ครั้ง</p>
              </div>
            </div>
          </div>

          <?php 
          $id_webboard=$_GET['id_webboard'];

          $sql="SELECT * FROM comment_webboard,users WHERE id_webboard='$id_webboard' and 
          comment_webboard.id_user=users.id_user ORDER BY comment_webboard.comment_datetime ASC";
          $result=mysqli_query($conn,$sql);

            while( $row = mysqli_fetch_object($result)){?>
            
          <div class="card my-1">
            <div class="card-body">
              <div class="row">

                <div class="col-md-3 form-group">
                  <div class="card text-center d-block ">
                   <img src="uploads/<?php echo $row->pic;?>" class="w-100 p-3 ">
                    <div class="card-body">
                      <label class="form-label"><?php echo $row->fname." ".$row->lname; ?></label>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-9">
                    <p class="mt-4 h5"><?php echo $row->comment; ?></p>

                </div>

              </div>
              <p class="text-center">วันที่สร้าง : <?php echo $row->comment_datetime; ?></p>


            </div>
          </div>
           <?php }
         // }

           ?>


        

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
