<?php
  session_start(); 
include 'chk-session.php';

require ('../dbcon.php');


  //update view news
  $id_news=$_GET['id_news'];
  $sql="UPDATE news SET news_view = news_view+1 WHERE news.id_news ='$id_news'";
  mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการข่าวสาร - Happy Care Nursing Home - บ้านมีสูข</title>

    <!-- Bootstrap -->
       <link href="../css/bootstrap.min.css" rel="stylesheet"> 
	    <script src="../js/bootstrap.js"></script> 

</head>
  <body style="height: 5000px; padding-top: 70px;background: rgb(100, 40, 140);">
  	<!-- main container -->
  <div class="container-fluid">
    <?php include 'nav-admin.php'; ?>

    <?php 
      $id_news=$_GET['id_news'];
      $sql="SELECT * FROM news,users WHERE news.id_user=users.id_user AND news.id_news='$id_news'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_object($result);

     ?>
     <div class="row justify-content-center">
       <div class="col-md-3 d-none d-lg-block">
         <?php include 'nav-left.php'; ?>
       </div>
       <div class="col-md-9">
         <a href="admin-add-news.php" class="btn btn-warning btn-lg mb-3" title=""> <--- back</a>
         <div class="card border-primary border-4 rounded-pill my-2">
            <div class="card-body">
              <h3 class="card-header bg-primary text-light text-center rounded-pill">จัดการข่าวสาร</h3>
            </div>
          </div>
        <div class="card border-success">
          <div class="card-body">
            <h2 class="text-center"><?php echo $row->news_topic; ?></h2>
              <hr>
            <p><?php echo $row->news_topic_detail; ?></p>
            <img src="../uploads/<?php echo $row->news_pic;?>" class="w-100">
            <hr>
            <strong class="h5">ผู้เขียนบทความ : <span class="badge bg-primary text-light"> <?php echo $row->fname." ".$row->lname; ?></span></strong>
             <p class="text-center h4">จำนวนผู้เข้าชม <span class="badge bg-danger"><?php echo $row->news_view; ?></span> ครั้ง</p>
          </div>
        </div>

          <?php 
          $id_news=$_GET['id_news'];

          $sql="SELECT * FROM comment_news,users WHERE id_news='$id_news' and 
          comment_news.id_user=users.id_user ORDER BY comment_news.comment_datetime ASC";
          $result=mysqli_query($conn,$sql);

            while( $row = mysqli_fetch_object($result)){?>
            
          <div class="card my-1">
            <div class="card-body">
              <div class="row">

                <div class="col-3 form-group">
                  <div class="card text-center d-block alert-success">
                   <img src="../uploads/<?php echo $row->pic;?>" class="w-100 p-3 rounded-pill">
                    <div class="card-body">
                      <p class="form-label badge bg-success fs-6"><?php echo $row->fname." ".$row->lname; ?></p><br>
                      <p class="form-label badge fs-6 <?php if($row->user_level==1){echo "bg-danger";}else{echo "bg-warning";} ?>"><?php echo $row->email; ?></p>
                    </div>
                  </div>
                  
                </div>
                <div class="col-9 alert-warning">
                    <p class="mt-4 h5"><?php echo $row->comment; ?></p>

                </div>

              </div>
              <p class="text-center mt-2 h5">วันที่สร้าง : <span class="badge bg-primary"><?php echo $row->comment_datetime; ?></span></p>
              <a href="sql/del-comment-news.php?id_com_news=<?php echo $row->id_com_news;?>&id_news=<?php echo $_GET['id_news'];?>" class="btn btn-danger float-end">ลบคอมเม้น</a>

            </div>
          </div>
           <?php } ?>

        <!-- insert -->
        <form action="sql/insert-comment-news.php" method="post" enctype="multipart/form-data">
          <div class="card mt-3">
            <div class="card-body">
              <div class="row">
                   <?php 
                    $id_user=$_SESSION['id_user'];
                    $sql="SELECT * FROM users WHERE id_user='$id_user'";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_object($result);

                    ?>
                <div class="col-3 form-group">
                  <div class="card text-center alert-success">
                   <img src="../uploads/<?php echo $row->pic; ?>" class="w-100 p-3">
                    <div class="card-body">
                      <p class="form-label badge bg-success fs-6"><?php echo $row->fname." ".$row->lname; ?></p><br>
                      <p class="form-label badge fs-6 <?php if($row->user_level==1){echo "bg-danger";}else{echo "bg-warning";} ?>"><?php echo $row->email; ?></p>
                    </div>
                  </div>
                  
                </div>

                <div class="col-9">
                  <div class="form-group">
                    <label for="" class="form-label h5">เแสดงความคิดเห็น</label>
                    <textarea class="form-control" name="comment"></textarea>
                  </div>
                  <button class="btn btn-success m-4 float-end" type="submit">บันทึกข้อมูล</button>
                </div>
                <input type="hidden" name="id_news" value="<?php echo $_GET['id_news'];?>">
              
              </div>
            </div>
          </div>
        </form>
        <!-- insert -->


       </div>
       <!-- col-md-9 -->
     </div>
     <!-- row -->
<!-- start Carousel Pr -->

  
  
  </div>
<!-- End container -->

  
  <script src="../js/jquery-3.6.1.min.js"></script> 
  <?php include '../alert-modal.php'; ?>


  
</body>
</html>
