<?php  
      session_start(); 
include 'chk-session.php';
  require('../dbcon.php');

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
    <title>จัดการกระดาษสนทนา - Happy Care Nursing Home - บ้านมีสูข</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/bootstrap.js"></script> 

  </head>
  <body style="padding-top: 70px;background: rgb(100, 40, 140);">

	  
	  <div class="container-fluid">
     <?php include 'nav-admin.php'; ?>
      <div class="row justify-content-center">
        <div class="col-md-3 d-none d-lg-block">
          <?php include 'nav-left.php'; ?>
        </div>
        <div class="col-md-9 ">
          <a href="admin-add-webboard.php" class="btn btn-warning btn-lg"><---back</a>
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
                $sql = " SELECT * FROM webboard,users WHERE users.id_user=webboard.id_user and webboard.id_webboard = '$id_webboard' ORDER BY webboard.id_webboard DESC";
                $result=mysqli_query($conn,$sql);
                $row = mysqli_fetch_object($result) 
                   ?>
                <div class="col-md-3 form-group">
                  <div class="card text-center d-block alert-success">
                   <img src="../uploads/<?php echo $row->pic;?>" class="w-100 p-3 rounded-pill">
                    <div class="card-body">
                      <p class="form-label badge bg-success fs-6"><?php echo $row->fname." ".$row->lname; ?></p><br>
                      <p class="form-label badge fs-6 <?php if($row->user_level==1){echo "bg-danger";}else{echo "bg-warning";} ?>"><?php echo $row->usernames; ?></p>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-9">
                    <h4>เรื่อง : <?php echo $row->topic_webboard; ?></h4>
                    <hr>
                    <p class="h5"><?php echo $row->detail_webboard; ?></p>
                    <img src="../uploads/<?php echo $row->pic_webboard;?>" class="w-100 p-3 ">
                </div>
                <p class="text-center h5">วันที่สร้าง : <span class="badge bg-primary"><?php echo $row->webboard_datetime; ?></span></p>
                <p class="text-center h5">เยี่ยมชม : <span class="badge bg-danger"><?php echo $row->view_webboard; ?></span> ครั้ง</p>
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
                  <div class="card text-center d-block alert-success">
                   <img src="../uploads/<?php echo $row->pic;?>" class="w-100 p-3 rounded-pill ">
                    <div class="card-body">
                      <p class="form-label badge bg-success fs-6"><?php echo $row->fname." ".$row->lname; ?></p><br>
                      <p class="form-label badge fs-6 <?php if($row->user_level==1){echo "bg-danger";}else{echo "bg-warning";} ?>"><?php echo $row->usernames; ?></p>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-9 alert-warning">
                    <p class="mt-4 h5"><?php echo $row->comment; ?></p>

                </div>

              </div>
              <p class="text-center h5">วันที่สร้าง : <span class="badge bg-primary"><?php echo $row->comment_datetime; ?></span></p>
              <a href="sql/del-comment-webboard.php?id_com_web=<?php echo $row->id_com_web;?>&id_webboard=<?php echo $_GET['id_webboard'];?>"class="btn btn-danger float-end" onclick="return confirm('ยืนยันการลบข้อมูล ?');">ลบคอมเม้น</a>



            </div>
          </div>
           <?php } ?>


            <form action="sql/insert_comment.php" method="post" enctype="multipart/form-data">
                  <div class="card mt-3">
                    <div class="card-body">
                      <div class="row">
             <?php 
              $id_user=$_SESSION['id_user'];
              $sql="SELECT * FROM `users` WHERE id_user='$id_user'";
              $result=mysqli_query($conn,$sql);
              $row=mysqli_fetch_object($result);

              ?>
                        <div class="col-md-3 form-group">
                          <div class="card text-center d-block alert-success">
                           <img src="../uploads/<?php echo $row->pic; ?>" class="w-100 p-3 rounded-pill">
                            <div class="card-body">
                              <p class="form-label badge bg-success fs-6"><?php echo $row->fname." ".$row->lname; ?></p><br>
                              <p class="form-label badge fs-6 <?php if($row->user_level==1){echo "bg-danger";}else{echo "bg-warning";} ?>"><?php echo $row->usernames; ?></p>
                            </div>
                          </div>
                          
                        </div>

                        <div class="col-md-9">
                          <div class="form-group">
                            <label for="" class="form-label h5">แสดงความคิดเห็น</label>
                            <textarea class="form-control" name="comment"></textarea>
                          </div>
                          <button class="btn btn-success m-4 float-end" type="submit">บันทึกข้อมูล</button>
                        </div>
                        <input type="hidden" name="id_webboard" value="<?php echo $_GET['id_webboard'];?>">
                      
                      </div>
                    </div>
                  </div>
                </form>





        </div>
        <!-- col-md-9 -->
      </div>
      <!-- row -->


  </div>
  
  </div>
<!-- End container -->
    </div>
	 
	  
	  
	  
  <script src="../js/jquery-3.6.1.min.js"></script>
  <?php include '../alert-modal.php'; ?>
  </body>
</html>
