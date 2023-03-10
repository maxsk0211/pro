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
  <body style="padding-top: 70px;background: rgb(100, 40, 140);">
	  
	  <div class="container-fluid">
     <?php include 'nav-index-all.php'; ?>
  <!-- start Carousel Pr -->
  <div class="row my-5 justify-content-center ">
    <div class="col-md-12 col-lg-8 col-sm-10">
      <a href="show-all-webboard.php" class="btn btn-warning my-2"><--- Back</a>
          <div class="alert bg-info rounded-pill border-4 border-light h4 text-center">กระดาษสนทนา</div>
        
          <div class="card">
            <div class="card-body">
              <div class="row">

                <?php 
                $id_webboard=$_GET['id_webboard'];
                $sql = " SELECT * FROM webboard,users WHERE users.id_user=webboard.id_user and webboard.id_webboard = '$id_webboard' ORDER BY webboard.id_webboard DESC";
                $result=mysqli_query($conn,$sql);
                $row = mysqli_fetch_object($result) 
                   ?>
                <div class="col-3 form-group">
                  <div class="card text-center d-block alert-success">
                   <img src="uploads/<?php echo $row->pic;?>" class="w-100 p-3 rounded-pill">
                    <div class="card-body">
                      <p class="form-label badge bg-success fs-6"><?php echo $row->fname." ".$row->lname; ?></p><br>
                      <p class="form-label badge fs-6 <?php if($row->user_level==1){echo "bg-danger";}else{echo "bg-warning";} ?>"><?php echo $row->usernames; ?></p>
                    </div>
                  </div>
                  
                </div>
                <div class="col-9">
                    <h4>เรื่อง : <?php echo $row->topic_webboard; ?></h4>
                    <hr>
                    <p class="h5"><?php echo $row->detail_webboard; ?></p>
                    <img src="uploads/<?php echo $row->pic_webboard;?>" class="w-100 p-3 ">
                </div>
                <p class="text-center h5">วันที่สร้าง : <span class="badge bg-primary"><?php echo $row->webboard_datetime; ?></span></p>
                <p class="text-center h5">เยี่ยมชม : <span class="badge bg-danger"><?php echo $row->view_webboard; ?></span> ครั้ง</p>
              </div>
            </div>
          </div>

          <?php 
          $id_webboard=$_GET['id_webboard'];

          $sql="SELECT * FROM comment_webboard,users WHERE id_webboard='$id_webboard' and comment_webboard.id_user=users.id_user ORDER BY comment_webboard.comment_datetime ASC";
          $result=mysqli_query($conn,$sql);

            while( $row = mysqli_fetch_object($result)){?>
            
          <div class="card my-1">
            <div class="card-body">
              <div class="row">

                <div class="col-3 form-group">
                  <div class="card text-center d-block alert-success">
                   <img src="uploads/<?php echo $row->pic;?>" class="w-100 p-3 rounded-pill ">
                    <div class="card-body">
                      <p class="form-label badge bg-success fs-6"><?php echo $row->fname." ".$row->lname; ?></p><br>
                      <p class="form-label badge fs-6 <?php if($row->user_level==1){echo "bg-danger";}else{echo "bg-warning";} ?>"><?php echo $row->usernames; ?></p>
                    </div>
                  </div>
                  
                </div>
                <div class="col-9 alert-warning">
                    <p class="mt-4 h5"><?php echo $row->comment; ?></p>

                </div>

              </div>
              <p class="text-center h5">วันที่สร้าง : <span class="badge bg-primary"><?php echo $row->comment_datetime; ?></span></p>
                

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
