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
  <body style="height: 5000px; padding-top: 70px;background: rgb(100, 40, 140);">

    <div class="container-fluid">
     
     <?php include 'nav-admin.php'; ?>
     <div class="row justify-content-center">
       <div class="col-md-3 d-none d-lg-block">
          <?php include 'nav-left.php'; ?>
       </div>
       <div class="col-md-9">
        <a href="admin-add-chat-room.php" class="btn btn-warning btn-lg"><--- Back</a>
          <div class="card border-primary border-3 rounded-pill my-2">
            <div class="card-body">
              <h3 class="card-header bg-success text-center text-light rounded-pill">จัดการประเภทห้องแชท</h3>
            </div>
          </div>


          <div class="card border-primary">
            <div class="card-body">
              <div class="form-group mb-5">
                <a href="#add-news" class="btn btn-success btn-lg rounded-pill mb-3 float-start" data-bs-toggle="modal">สร้างประเภทห้องแชท</a>
              </div>
              <br>
              <form action="sql/insert-chat-room-type.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="add-news">
                  <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                      <div class="modal-header bg-success text-light">
                        <h4 class="modal-title">สร้างประเภทห้องแชท</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group m-3">
                          <label for="" class="form-label">ชื่อประเภท</label>
                          <input class="form-control" type="text" name="type_name"></input>
                        </div>
              
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success float-end">บันทึกข้อมูล</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <!-- end modal add news -->

              <h4 class="bg-primary card-header mb-2 text-light">ประเภททั้งหมด</h4>
              <table class="table table-hover table-info">
                <thead>
                  <tr class="table-primary">
                    <th class="text-center">#</th>
                    <th>ชื่อประเภท</th>
                    <th>คำสั่ง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql = "SELECT * FROM chat_room_type  ORDER BY id_chat_room_type DESC";

                    $result=mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    $i=1;

                  while( $row = mysqli_fetch_object($result)){ 
                      
                   ?>
                  <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td><?php echo $row->type_name; ?></td>

                    <td>
                      <a href="sql/del-chat-room-type.php?id_chat_room_type=<?php echo $row->id_chat_room_type;?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล ?');">ลบ</a>
                    </td>
                  </tr>
                                  

                <?php } ?>
                </tbody>
              </table>
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