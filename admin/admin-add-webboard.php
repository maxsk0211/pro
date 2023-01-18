<?php  
      session_start(); 
include 'chk-session.php';
  require('../dbcon.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการกระดาษสนทนา - Happy Care Nursing Home - บ้านมีสูข</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet"> 
      <script src="../js/bootstrap.js"></script> 

  </head>
  <body style="height: 5000px; padding-top: 70px;background: rgb(100, 40, 140);">

    <div class="container-fluid">
      <?php include 'nav-admin.php' ?>
      <div class="row justify-content-center">
        <div class="col-md-3 d-none d-lg-block">
          <?php include 'nav-left.php'; ?>
        </div>
        <div class="col-md-9">

          <div class="card border-4 border-primary my-2 rounded-pill">
            <div class="card-body">
              <h3 class="card-header bg-info text-center rounded-pill">จัดการกระดาษสนทนา</h3>
            </div>
          </div>


          <div class="card">
            <div class="card-body">
              <div class="form-group mb-5">
                <a href="#search-webboard" class="btn btn-primary btn-lg rounded-pill float-end" data-bs-toggle="modal">ค้นหา</a>
                <a href="#add-webboard" class="btn btn-success btn-lg rounded-pill mb-3 float-start" data-bs-toggle="modal">สร้างกระดานสนทนา</a>
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

              <form action="sql/insert-webboard.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="add-webboard">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-success text-light">
                        <h4 class="modal-title">สร้างกระดานสนทนา</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        
                          <div class="form-group m-3">
                            <label class="form-label">ชื่อหัวเรื่องสนทนา</label>
                            <input class="form-control" type="text" name="topic_webboard" required></input>
                          </div>
                          
                          <div class="form-group m-3">
                            <label class="form-label">รายละเอียด</label>
                            <textarea class="form-control" name="detail_webboard"></textarea>
                          </div>

                          <div class="input-group  me-3">
                            <label class="input-group-text">เลือกรูปเพิ่มเติม</label>
                            <input type="file" name="file_pic" class="form-control" required>
                          </div>
                          <br>
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-success float-end me-5" type="submit">บันทึกข้อมูล</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </form>

              <h4 class="bg-primary card-header text-light mb-2">เรื่องสนทนาทั้งหมด</h4>
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
                      <a href="show-webboard.php?id_webboard=<?php echo $row->id_webboard;?>" class="btn btn-primary btn-sm">ดู</a>
                      <a href="#edit-webboard<?php echo $i;?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">แก้ไข</a>
                      <a href="sql/del-webboard.php?id_webboard=<?php echo $row->id_webboard;?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล ?');">ลบ</a>
                    </td>
                  </tr>
                  <form action="sql/edit-webboard.php" method="post" enctype="multipart/form-data">
                    
                  
                  <div class="modal fade " id="edit-webboard<?php echo $i;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-warning">
                          <h4 class="modal-title">กำลังแก้ไขกระดานสนทนา</h4>
                          <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body p-4">
                          <div class="form-group">
                            <label for="" class="form-label">ชื่อหัวเรื่องสนทนา</label>
                            <input class="form-control" type="text" name="topic_webboard" value="<?php echo $row->topic_webboard; ?>">
                          </div>
                  
                          <div class="form-group">
                            <label for="" class="form-label">รายละเอียด</label>
                            <textarea class="form-control" name="detail_webboard"><?php echo $row->detail_webboard; ?></textarea>
                          </div>

                          <div class="input-group  me-3">
                            <label for="" class="input-group-text">เลือกรูปเพิ่มเติม</label>
                            <input type="file" name="file_pic" class="form-control">
                            <img src="../uploads/<?php echo $row->pic_webboard; ?>" class="w-100 mt-4">
                            <input type="hidden" name="pic_db" value="<?php echo $row->pic_webboard; ?>">
                            <input type="hidden" name="id_webboard" value="<?php echo $row->id_webboard;?>">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                          <button type="submit" class="btn btn-warning">แก้ไข</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>


        </div>
        <!-- col-md-9 -->
      </div>
      <!-- row -->


    </div>



  <script src="../js/jquery-3.6.1.min.js"></script>
  <?php include '../alert-modal.php'; ?>
  </body>
</html>