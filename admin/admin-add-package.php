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
     
     <?php include 'nav-admin.php'; ?>
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
                <a href="#add-package" class="btn btn-success btn-lg rounded-pill mb-3 float-start" data-bs-toggle="modal">สร้างแพ็คเกจ</a>
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
              <form action="sql/insert-package.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="add-package">
                  <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                      <div class="modal-header bg-success text-light">
                        <h4 class="modal-title">สร้างแพ็คเกจ</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">

                        <div class="form-group ">
                          <label for="" class="form-label">ชื่อแพ็คเกจ</label>
                          <input class="form-control" type="text" name="pa_name"></input>
                        </div>
                        
                        <label class="form-label">ราคา</label>
                        <div class="input-group">
                          <input type="number" name="pa_price" class="form-control">
                          <span class="input-group-text">บาท</span>
                        </div>
                        
                        <div class="form-group">
                          <label for="" class="form-label">รายละเอียด</label>
                          <textarea class="form-control" name="pa_detail"></textarea>
                        </div>
                        <div class="input-group me-3">
                          <label for="" class="input-group-text">เลือกรูปปก</label>
                          <input type="file" name="pa_pic" class="form-control">
                        </div>
                        <br>
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>">
                        <button type="submit" class="btn btn-success float-end">บันทึกข้อมูล</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <!-- end modal add package -->






              <h4 class="bg-primary card-header mb-2 text-light">แพ็คเกจทั้งหมด</h4>
              <table class="table table-hover table-info">
                <thead>
                  <tr class="table-primary">
                    <th class="text-center">#</th>
                    <th>หัวเรื่องโปรโมชั้น</th>
                    <th>ราคา / บาท</th>
                    <th>ผู้สร้าง</th>
                    <th>ตำสั่ง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if (isset($_SESSION['search_package'])) {
                    $search_package=$_SESSION['search_package'];
                    $sql="SELECT * FROM package,users WHERE (pa_name LIKE '%$search_package%' or pa_detail LIKE '%$search_package%') and users.id_user=package.id_user ORDER BY id_pa DESC";
                  }else{
                    $sql = "SELECT * FROM package,users WHERE users.id_user=package.id_user  ORDER BY id_pa DESC";

                  }
                $result=mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if ($count==0) { ?>
                  <tr>
                    <td colspan="5" class="text-center table-danger">ไม่พบข้อมูล</td>
                  </tr>
                <?php }
                $i=1;


                  while( $row = mysqli_fetch_object($result)){ 
                      
                   ?>
                  <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td><?php echo $row->pa_name; ?></td>
                    <td><?php echo $row->pa_price." บาท"; ?></td>
                    <td><?php echo $row->fname." ".$row->lname; ?></td>
                    
                    <td>
                      <a href="#show-package<?php echo $i;?>" data-bs-toggle="modal" class="btn btn-primary btn-sm">ดู</a>
                      <a href="#edit-package<?php echo $i;?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">แก้ไข</a>
                      <a href="sql/del-package.php?id_pa=<?php echo $row->id_pa;?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล ?');">ลบ</a>
                    </td>
                  </tr>
                  <!-- show -->
                  <div class="modal fade" id="show-package<?php echo $i;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-primary text-light">
                          <h4 class="modal-title">เนื้อหาโปรโมชั้น</h4>
                          <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                        </div>
                        <div class="modal-body">

                          
                        <div class="form-group ">
                          <label for="" class="form-label">ชื่อแพ็คเกจ</label>
                          <input class="form-control" type="text" name="pa_name" disabled value="<?php echo $row->pa_name;?>">
                        </div>
                        
                        <label class="form-label">ราคา</label>
                        <div class="input-group">
                          <input type="number" name="pa_price" class="form-control" disabled value="<?php echo $row->pa_price;?>">
                          <span class="input-group-text">บาท</span>
                        </div>
                        
                        <div class="form-group">
                          <label for="" class="form-label">รายละเอียด</label>
                          <textarea class="form-control" disabled name="pa_detail"><?php echo $row->pa_detail; ?></textarea>
                        </div>


                        <div class="mt-3">
                          <label class="input-group-text">รูปภาพ</label>
                          <img src="../uploads/<?php echo $row->pa_pic; ?>" class="w-100">
                        </div>

                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-danger" type="button" data-bs-dismiss="modal">ปิด</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end show -->
                  <!-- edit -->
                  <form action="sql/edit-package.php" method="post" enctype="multipart/form-data">
                  <div class="modal fade" id="edit-package<?php echo $i;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-warning">
                          <h4 class="modal-title">เนื้อหาโปรโมชั้น</h4>
                          <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                        </div>
                        <div class="modal-body">

                          
                        <div class="form-group ">
                          <label for="" class="form-label">ชื่อแพ็คเกจ</label>
                          <input class="form-control" type="text" name="pa_name" value="<?php echo $row->pa_name;?>">
                        </div>
                        
                        <label class="form-label">ราคา</label>
                        <div class="input-group">
                          <input type="number" name="pa_price" class="form-control" value="<?php echo $row->pa_price;?>">
                          <span class="input-group-text">บาท</span>
                        </div>
                        
                        <div class="form-group">
                          <label for="" class="form-label">รายละเอียด</label>
                          <textarea class="form-control" name="pa_detail"><?php echo $row->pa_detail; ?></textarea>
                        </div>
                        <div class="input-group me-3">
                          <label class="input-group-text">เลือกรูปปก</label>
                          <input type="file" name="pa_pic" class="form-control">
                        </div>

                        <div class="mt-3">
                          <label class="input-group-text">รูปภาพ</label>
                          <img src="../uploads/<?php echo $row->pa_pic; ?>" class="w-100">
                        </div>

                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_pa" value="<?php echo $row->id_pa; ?>">
                          <input type="hidden" name="pic_db" value="<?php echo $row->pa_pic; ?>">
                          <button class="btn btn-danger" type="button" data-bs-dismiss="modal">ปิด</button>
                          <button type="submit" class="btn btn-warning">แก้ไข</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
                  <!-- end edit -->
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