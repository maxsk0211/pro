<?php
      session_start(); 
      //$_SESSION["id_user"]=1;
      //$_SESSION["user_lv"]=1;
  if(!isset($_SESSION["user_lv"]) && $_SESSION['user_lv']==0 ){
    header("location: ../index.php?");
    exit();
  }


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
    <title>จัดการห้องแชท - Happy Care Nursing Home - บ้านมีสูข</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet"> 
      <script src="../js/bootstrap.js"></script> 

  </head>
  <body style="height: 5000px; padding-top: 70px;background: rgb(100, 40, 140);">

    <div class="container-fluid">
     
     <?php include 'nav-admin.php'; ?>
     <div class="row justify-content-center">
       <div class="col-md-3 d-none d-lg-block">
          <?php include 'nav-left.php'; ?>
       </div>
       <div class="col-md-9">
          <div class="card border-primary border-4 rounded-pill my-2">
            <div class="card-body">
              <h3 class="card-header bg-primary text-light text-center rounded-pill">Dashboard</h3>
            </div>
          </div>

            <div class="row  bg-light p-1">
              <!-- card 1 -->
              <div class="col-md-4 p-2">
                <div class="card bg-primary">
                  <div class="card-header h3 text-light">จำนวนผู้เข้าชม</div>
                  <div class="card-body text-light">
                    <div class="h1 float-end">
                      <div class="badge bg-danger">
                        99
                      </div>
                      ครั้ง
                    </div>
                  </div>
                </div>
              </div>
              <!-- card 1 -->

              <!-- card 2 -->
              <div class="col-md-4 p-2">
                <div class="card bg-danger">
                  <div class="card-header h3 text-light">จำนวนผู้เข้าชม</div>
                  <div class="card-body text-light">
                    <div class="h1 float-end">
                      <div class="badge bg-danger">
                        99
                      </div>
                      ครั้ง
                    </div>
                  </div>
                </div>
              </div>
              <!-- card 2 -->

            </div>
            <!-- end row -->




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