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
      <div class="row my-5 justify-content-center">
        <div class="col-md-12 col-lg-8 col-sm-10">
          <div class="alert bg-danger text-center h4 text-light rounded-pill border-4 border-light">Package - แพ็คเกจ</div>



          <div class="row bg-light">
             <div class="form-group my-2">
                <a href="#search-package" class="btn btn-primary btn-lg rounded-pill float-end" data-bs-toggle="modal">ค้นหา</a>
              </div>
              <br>
            <?php if(isset($_SESSION['search_package'])){ ?>
             <div class="alert alert-warning">
               <h5 class="text-danger">คำค้นหาของคุณคือ : <?php echo $_SESSION['search_package']; ?></h5>
               <div class="ms-auto">
                 <a href="sql/clear-session.php?search_package=1" class="btn btn-danger">ยกการค้นหา</a>
               </div>
             </div>
             <?php } ?>
             <form action="sql/search.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="search-package">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <h4 class="modal-title ">การค้นหาข่าวสาร</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="ค้นหา" name="search">
                          <input type="hidden" name="package" value="1">
                          <button class="btn btn-primary">ค้นหา</button>
                        </div>
                        <div class="form-text text-danger">คุณสามารถค้นหา : หัวข้อแพ็คเกจ ,รายละเอียดแพ็คเกจ</div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </form>


            <?php 
                  if (isset($_SESSION['search_package'])) {
                    $search_package=$_SESSION['search_package'];
                    $sql="SELECT * FROM package,users WHERE (pa_name LIKE '%$search_package%' or pa_detail LIKE '%$search_package%') and users.id_user=package.id_user ORDER BY id_pa DESC";
                  }else{
                    $sql = "SELECT * FROM package,users WHERE users.id_user=package.id_user  ORDER BY id_pa DESC";

                  }
            $result=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($result);
            if ($count==0) { ?>
            <div class="alert alert-danger">
              <h4 class="text-center">ไม่พบข้อมูล</h4>
            </div>
            <?php }
            
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