<?php
      session_start(); 
      include 'chk-session.php';


require ('../dbcon.php');
$id_user=$_SESSION["id_user"];

$sql="SELECT * FROM users where id_user='$id_user'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_object($result);


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการแพ็คเกจ - Happy Care Nursing Home - บ้านมีสูข</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet"> 
      <script src="../js/bootstrap.js"></script> 

  </head>
  <body style=" padding-top: 70px;background: rgb(100, 40, 140);">

    <div class="container-fluid">
     
     <?php include 'nav-user.php'; ?>
     <div class="row justify-content-center">
       <div class="col-md-3 d-none d-lg-block">
          <?php include 'nav-left.php'; ?>
       </div>
       <div class="col-md-9">
          <div class="card border-primary border-3 rounded-pill my-2">
            <div class="card-body">
              <h3 class="card-header bg-danger text-center text-light rounded-pill">จัดการแพ็คเกจ</h3>
            </div>
          </div>


          <div class="card border-primary">
            <div class="card-body">
              <div class="form-group mb-5">
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
                        <h4 class="modal-title">การค้นหาแพ็คเกจ</h4>
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






              <h4 class="bg-primary card-header mb-2 text-light">แพ็คเกจทั้งหมด</h4>

         <div class="row">
            <?php 
            if (isset($_SESSION['search_package'])) {
                    $search_package=$_SESSION['search_package'];
                    $sql="SELECT * FROM package,users WHERE users.id_user=package.id_user and (pa_name LIKE '%$search_package%' or pa_detail LIKE '%$search_package%') ORDER BY package.id_pa DESC";
                  }else{
                    $sql = "SELECT * FROM package,users WHERE users.id_user=package.id_user  ORDER BY package.id_pa DESC";

                  }
            $result=mysqli_query($conn,$sql);
            
              while($row=mysqli_fetch_object($result)){ ?>
                <div class="col-md-4 bg-light p-3">
                  <div class="card alert-danger">
                    <img src="../uploads/<?php echo $row->pa_pic;?>" alt="">
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





            </div>
          </div>
          <!-- card border-primary -->






       </div>
       <!-- col-md-9 -->
     </div>
     <!-- row -->


      





    </div>

  <script src="../js/jquery-3.6.1.min.js"></script>
  <?php include '../alert-modal.php'; ?>
  </body>
</html>
<?php 
//session_destroy();

?>