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
  <body style="padding-top: 50px;background: rgb(100, 40, 140);">
  	<!-- main container -->
  <div class="container-fluid">
		  <?php include 'nav-index-all.php'; ?>
      
        <!-- Start webboard -->
        <div class="row my-5 justify-content-center " id="show-webboard">
          <div class="col-md-12 col-lg-8 col-sm-12">



            <div class="alert bg-info rounded-pill border-4 border-light h4 text-center">กระดาษสนทนา</div>

          <div class="card">
            <div class="card-body">
              <div class="form-group mb-5">
                <a href="#search-webboard" class="btn btn-primary btn-lg rounded-pill float-end" data-bs-toggle="modal">ค้นหา</a>
              </div>
              <br>
            <?php if(isset($_SESSION['search_webboard'])){ ?>
             <div class="alert alert-warning">
               <h5 class="text-danger">คำค้นหาของคุณคือ : <?php echo $_SESSION['search_webboard']; ?></h5>
               <div class="ms-auto">
                 <a href="sql/clear-session.php?search_webboard=1" class="btn btn-danger">ยกการค้นหา</a>
               </div>
             </div>
            <?php } ?>
            <form action="sql/search.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="search-webboard">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <h4 class="modal-title">การค้นหากระดานสนทนา</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="ค้นหา" name="search" required>
                          <input type="hidden" name="webboard" value="1">
                          <button class="btn btn-primary">ค้นหา</button>
                        </div>
                        <div class="form-text text-danger">คุณสามารถค้นหา : หัวข้อกระดาษสนทนา ,รายละเอียดกระดาษสนทนา</div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <h4 class="bg-primary text-light card-header mb-2">เรื่องสนทนาทั้งหมด</h4>
              <table class="table table-hover table-info">
                <thead>
                  <tr class="table-primary">
                    <th class="text-center">#</th>
                    <th scope="col">ชื่อหัวเรื่องสนทนา</th>
                    <th scope="col">ผู้สร้าง</th>
                    <th scope="col">เยี่ยมชม</th>
                    <th scope="col">วันที่สร้าง</th>
                    <th scope="col">ตำสั่ง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                if (isset($_SESSION['search_webboard'])) {
                  $search_webboard=$_SESSION['search_webboard'];
                  $sql="SELECT * FROM webboard,users WHERE (topic_webboard LIKE '%$search_webboard%' or detail_webboard LIKE '%$search_webboard%') and users.id_user=webboard.id_user ORDER BY webboard.id_webboard DESC";
                  
                }else{
                  $sql = "SELECT * FROM webboard,users WHERE users.id_user=webboard.id_user ORDER BY webboard.id_webboard DESC";
                }
                
                $result=mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);

                if ($count==0) { ?>
                  <tr>
                    <td colspan="6" class="text-center table-danger">ไม่พบข้อมูล</td>
                  </tr> 
                <?php }

                $i=1;


                  while( $row = mysqli_fetch_object($result)){ 
                   ?>
                  <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td><?php echo $row->topic_webboard ?></td>
                    <td><?php echo $row->fname." ".$row->lname; ?></td>
                    <td><?php echo $row->view_webboard." ครั้ง"; ?></td>
                    <td><?php echo $row->webboard_datetime; ?></td>
                    <td>
                      <a href="show-webboard-detail.php?id_webboard=<?php echo $row->id_webboard;?>" class="btn btn-primary btn-sm">ดู</a>
                    </td>
                  </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

        <!-- <a href="show-all-webboard.php" class="btn btn-primary d-grid mt-2">ดูทั้งหมด</a> -->
          </div>
          
        </div>
        <!-- End webboard -->
  </div>
</body>
</html>