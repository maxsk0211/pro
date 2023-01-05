<?php
  
  require('dbcon.php');
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
    <title>Bootstrap - Prebuilt Layout</title>

    <!-- Bootstrap -->
       <link href="css/bootstrap.min.css" rel="stylesheet"> 
	    <script src="js/bootstrap.js"></script> 

</head>
  <body class="bg-secondary" style="height: 5000px; padding-top: 70px;">
  	<!-- main container -->
  <div class="container-fluid">
    <?php include 'show-Nav.php'; ?>

    <?php 
      $id_news=$_GET['id_news'];
      $sql="SELECT * FROM news,users WHERE news.id_user=users.id_user AND news.id_news='$id_news'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_object($result);

     ?>
<!-- start Carousel Pr -->
  <div class="row my-5 justify-content-center ">
    <div class="col-md-12 col-lg-8 col-sm-10">
      <div class="alert alert-success h3">ประชาสัมพันธ์</div>
        <div class="card border-success">
          <div class="card-body">
            <h2 class="text-center"><?php echo $row->news_topic; ?></h2>
              <hr>
            <p><?php echo $row->news_topic_detail; ?></p>
            <img src="uploads/<?php echo $row->news_pic;?>" class="w-100">
            <hr>
            <strong>ผู้เขียนบทความ : <?php echo $row->fname." ".$row->lname; ?></strong>
             <p class="text-center h4">จำนวนผู้เข้าชม <?php echo $row->news_view; ?> ครั้ง</p>
          </div>
        </div>
          <br>
         
<!--           <div class="card">
            <div class="card-body">
              <div class="row">

                <div class="col-md-3 ">
                  <div class="card text-center d-block">
                   <img src="https://cdn.pixabay.com/photo/2014/04/03/10/32/user-310807_960_720.png" class="w-50 mt-2">
                    <div class="card-body">
                      <label class="form-label">ผู้ใช้งานทั่วไป</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-9">
                    <p>การออกกำลังกายช่วยธำรงสมรรถภาพทางกาย ช่วยรักษาน้ำหนักให้ถูกสุขภาพ ช่วยย่อยอาหาร ช่วยสร้างและรักษาความหนาแน่นของกระดูก ความแข็งแรงของกล้ามเนื้อ และความยืดหยุ่นได้ของข้อต่อ ลดความเสี่ยงเมื่อผ่าตัด และเสริมความแข็งแรงของระบบภูมิคุ้มกัน งานศึกษาบางงานชี้ว่า การออกกำลังกายอาจเพิ่มการคาดหมายคงชีพและคุณภาพชีวิตโดยทั่วไป[13]</p>
                </div>
              </div>
            </div>
          </div> -->

          <!-- <div class="card mt-3">
            <div class="card-body">
              <div class="row">

                <div class="col-md-3 form-group">
                  <div class="card text-center d-block">
                   <img src="https://cdn.pixabay.com/photo/2014/04/03/10/32/user-310807_960_720.png" class="w-50">
                    <div class="card-body">
                      <label class="form-label">แอดมิน</label>
                    </div>
                  </div>
                </div>

                <div class="col-md-9">
                  <form action="#">
                    <div class="form-group">
                      <label for="">เแสดงความคิดเห็น</label>
                      <textarea class="form-control"></textarea>
                    </div>
                    <button class="btn btn-success m-4 float-end">บันทึกข้อมูล</button>
                    </form>
                  </div>
                
              </div>
            </div>
          </div> -->



      </div>
    </div>
  </div>
  
  </div>
<!-- End container -->

  
  <script src="js/jquery-3.6.1.min.js"></script> 

  
</body>
</html>
