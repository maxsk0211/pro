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
    <title>จัดการห้องแชท - Happy Care Nursing Home - บ้านมีสูข</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet"> 
      <script src="../js/bootstrap.js"></script> 

  </head>
  <body style=" padding-top: 70px;background: rgb(100, 40, 140);">

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

            <div class="row  bg-light">
              <!-- card 1 -->
              <?php 
              $sql="SELECT * FROM web_history_count WHERE id_web_count = 1";
              $result=mysqli_query($conn,$sql);
              $row=mysqli_fetch_object($result);
               ?>
              <div class="col-md-4 p-2">
                <div class="card bg-primary">
                  <div class="card-header h3 text-light">จำนวนผู้เข้าชม</div>
                  <div class="card-body text-light">
                    <div class="h1 float-end">
                      <div class="badge bg-danger">
                        <?php echo $row->web_count; ?>
                      </div>
                      ครั้ง
                    </div>
                  </div>
                </div>
              </div>
              <!-- card 1 -->

              <!-- card 2 -->
              <?php 
              $sql="select count(id_user) as count from users";
              $result=mysqli_query($conn,$sql);
              $row=mysqli_fetch_object($result);
               ?>
              <div class="col-md-4 p-2">
                <div class="card bg-warning">
                  <div class="card-header h3 text-light">จำนวนบัญชีผู้ใช้</div>
                  <div class="card-body text-light">
                    <div class="h1 float-end">
                      <div class="badge bg-danger">
                        <?php echo $row->count; ?>
                      </div>
                      บัญชี
                    </div>
                  </div>
                </div>
              </div>
              <!-- card 2 -->

               <!-- card 3 -->
               <?php 
               $sql="SELECT count(id_chat_room) as count FROM chat_room";
               $result=mysqli_query($conn,$sql);
               $row=mysqli_fetch_object($result);
                ?>
              <div class="col-md-4 p-2">
                <div class="card bg-success">
                  <div class="card-header h3 text-light">จำนวนห้องสนทนา</div>
                  <div class="card-body text-light">
                    <div class="h1 float-end">
                      <div class="badge bg-danger">
                        <?php echo $row->count; ?>
                      </div>
                      ห้อง
                    </div>
                  </div>
                </div>
              </div>
              <!-- card 3 -->

              <div class="p-3">
                <h4 class="bg-danger card-header text-light">ประวัติการเข้าสู่ระบบ</h4>
              <table class="table table-hover table-warning mt-2">
                <thead>
                  <tr class="table-danger">
                    <th class="text-center">#</th>
                    <th>ip</th>
                    <th>วันและเวลา</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $id_user=$_SESSION['id_user'];
                  $sql="SELECT * FROM log_login WHERE id_user = '$id_user' ORDER BY detatime_log DESC limit 20";
                  $result=mysqli_query($conn,$sql);
                  
                  $i=1;

                    while($row=mysqli_fetch_object($result)){
                   ?>

                  <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td><?php echo $row->ip; ?></td>
                    <td><?php echo $row->detatime_log; ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </div>
            


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
