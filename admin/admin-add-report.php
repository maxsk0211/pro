<?php  
      session_start(); 
  if(!isset($_SESSION["user_lv"]) && $_SESSION['user_lv']==0 ){
    header("location: ../index.php?");
    exit();
  }
require('../dbcon.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการแบบสอบถาม - Happy Care Nursing Home - บ้านมีสูข</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet"> 
      <script src="../js/bootstrap.js"></script> 

  </head>
  <body style="height: 5000px; padding-top: 70px;background: rgb(100, 40, 140);">


    <div class="container-fluid">
      <?php include 'nav-admin.php' ?>
      <div class="row justify-content-center">
        <div class="col-md-3">
          <?php include 'nav-left.php'; ?>
        </div>
        <div class="col-md-9">

          <div class="card border-primary border-3 rounded-pill my-2">
            <div class="card-body">
              <h3 class="card-header bg-secondary text-center text-white rounded-pill">จัดการแบบสอบถาม</h3>
            </div>
          </div>


          <div class="card">
            <div class="card-body">

              <div class="form-group mb-5">
                <a href="#search-report" class="btn btn-primary btn-lg rounded-pill float-end" data-bs-toggle="modal">ค้นหา</a>
                <a href="#add-report" class="btn btn-success btn-lg rounded-pill mb-3 float-start" data-bs-toggle="modal">สร้างข่าวสาร</a>
              </div>
              <br>


              <?php if(isset($_SESSION['search_report'])){ ?>
             <div class="alert alert-warning">
               <h5 class="text-danger">คำค้นหาของคุณคือ : <?php echo $_SESSION['search_report']; ?></h5>
               <div class="ms-auto">
                 <a href="sql/clear-session.php?search_report=1" class="btn btn-danger">ยกการค้นหา</a>
               </div>
             </div>
              <?php } ?>
            <form action="sql/search.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="search-report">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <h4 class="modal-title ">การค้นหาข่าวสาร</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="ค้นหา" name="search">
                          <input type="hidden" name="report" value="1">
                          <button class="btn btn-primary">ค้นหา</button>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
            </form>

              <form action="sql/insert-report.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="add-report">
                  <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                      <div class="modal-header bg-success text-light">
                        <h4 class="modal-title">สร้างข่าวสาร</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group m-3">
                          <label for="" class="form-label">ชื่อหัวแบบสอบถาม</label>
                          <input class="form-control" type="text" name="report_topic" required>
                        </div>
                
                        <div class="form-group m-3">
                          <label for="" class="form-label">รายละเอียด</label>
                          <textarea class="form-control" name="report_detail" required></textarea>
                        </div>

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
              <!-- insert -->

              <h4 class="bg-primary card-header mb-2 text-light">แบบสอบถามทั้งหมด</h4>
              <table class="table table-hover table-info">
                <thead>
                  <tr class="table-primary">
                    <th class="text-center">#</th>
                    <th>ชื่อแบบสอบถาม</th>
                    <th>ผู้สร้าง</th>
                    <th>เยี่ยมชม</th>
                    <th>รายละเอียดต่าง</th>
                    <th>รายงาน</th>
                    <th>ตำสั่ง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if(isset($_SESSION['search_report'])){
                    $search_report=$_SESSION['search_report'];
                    $sql="SELECT * FROM report,users WHERE report.id_user=users.id_user and report_topic LIKE '%$search_report%' or `report_detail` LIKE '%$search_report%'  ORDER BY report.id_report DESC";

                  }else{

                    $sql="SELECT * FROM report,users where report.id_user= users.id_user ORDER BY report.id_report DESC";
                  }

                  $result=mysqli_query($conn,$sql);
                  $count = mysqli_num_rows($result);
                  if($count==0){ ?>
                      <tr>
                      <td class="table-danger text-center" colspan="7" >ไม่พบข้อมูล </td>
                      </tr>
                  <?php }
          $i=1;
          while( $row = mysqli_fetch_object($result)){ 
                    
                   ?>
                  <tr>
                    <th class="text-center "><?php echo $i++; ?></th>
                    <td><?php echo $row->report_topic;?></td>
                    <td><?php echo $row->fname." ".$row->lname ?></td>
                    <td><?php echo $row->view_report." ครั้ง";?></td>
                    <td><?php echo $row->report_detail; ?></td> 
                    <td><a href="show-report.php?id_report=<?php echo $row->id_report;?>" class="btn btn-primary btn-sm">รายงาน</a></td>
                    <td>
                      <a href="admin-add-report-detail.php?id=<?php echo $row->id_report;?>" class="btn btn-success btn-sm">เพิ่มรายละเอียด</a>
                      <a href="#edit-report_<?php echo $i; ?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">แก้ไข</a>
                      <a href="sql/del-report.php?id=<?php echo $row->id_report;?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล ?');">ลบ</a>
                    </td>
                  </tr>
       <form action="sql/edit-report.php" method="post" enctype="multipart/form-data">            
                  <div class="modal fade" id="edit-report_<?php echo $i;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-warning">
                          <h4 class="modal-title">กำลังแก้ไขแบบสอบถาม</h4>
                          <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group m-3">
                            <label for="" class="form-label">ชื่อหัวแบบสอบถาม</label>
                            <input class="form-control" type="text" name="report_topic" value="<?php echo $row->report_topic;?>">
                          </div>
                  
                          <div class="form-group m-3">
                            <label for="" class="form-label">รายละเอียด</label>
                            <textarea class="form-control" name="report_detail"><?php echo $row->report_detail; ?></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_report" value="<?php echo $row->id_report;?>">
                          <a href="#" class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</a>
                          <button class="btn btn-warning" type="submit">แก้ไข</button>
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







        </div>
        <!-- col-md-9 -->
      </div>
      <!-- row -->






    </div>



  <script src="../js/jquery-3.6.1.min.js"></script>
  <?php include '../alert-modal.php'; ?>
  </body>
</html>