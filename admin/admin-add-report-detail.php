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
    <title>จัดการแบบสอบถาม - Happy Care Nursing Home - บ้านมีสูข</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet"> 
      <script src="../js/bootstrap.js"></script> 

  </head>
  <body style=" padding-top: 70px;background: rgb(100, 40, 140);">

    <div class="container-fluid">
      <?php include 'nav-admin.php' ?>
      <div class="row justify-content-center">
        <div class="col-md-3 d-none d-lg-block">
          <?php include 'nav-left.php';?>
        </div>
        <div class="col-md-9">

        <a href="admin-add-report.php" class="btn btn-warning btn-lg"><--- back</a>

          <div class="card border-primary border-3 rounded-pill my-2">
            <div class="card-body">
              <h3 class="card-header bg-secondary text-center text-white rounded-pill">จัดการแบบสอบถาม</h3>
            </div>
          </div>
          

          <div class="card">
            <div class="card-body">
            <?php
					$id_report=$_GET['id'];
					$sql="SELECT * FROM report WHERE id_report = '$id_report' ";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_object($result);
				
				?>
            <div class="alert alert-danger">
              <strong class="text-danger fs-5">หัวข้อแบบประเมิน : </strong>
              <strong class="text-danger h5"><?php echo $row->report_topic; ?></strong>
              <br>
              <strong class="text-success fs-6">รายละเอียด : </strong>
              <strong class="text-success"><?php echo $row->report_detail; ?></strong>
            </div>



              <div class="form-group mb-5">
                <a href="#insert-report-detail" class="btn btn-success float-start btn-lg" data-bs-toggle="modal">สร้างหัวข้อย่อย</a>
                <a href="#search-report-detail" class="btn btn-primary float-end btn-lg" data-bs-toggle="modal">ค้นหา</a>
              </div>
              <br>
            <?php if(isset($_SESSION['search_report_detail'])){ ?>
             <div class="alert alert-warning">
               <h5 class="text-danger">คำค้นหาของคุณคือ : <?php echo $_SESSION['search_report_detail']; ?></h5>
               <div class="ms-auto">
                 <a href="sql/clear-session.php?search_report_detail=1&id_report=<?php echo $_GET['id'];?>" class="btn btn-danger">ยกการค้นหา</a>
               </div>
             </div>
            <?php } ?>
              <form action="sql/search.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="search-report-detail">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <h4 class="modal-title">การค้นหาข่าวสาร</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="ค้นหา" name="search">
                          <input type="hidden" name="report-detail" value="1">
                          <input type="hidden" name="id_report" value="<?php echo $_GET['id']?>">
                          <button class="btn btn-primary">ค้นหา</button>
                        </div>
                        <div class="form-text text-danger">คุณสามารถค้นหา : รายละเอียดย่อย ,หมายเหตุ</div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>


              <form action="sql/insert-report-detail.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="insert-report-detail">
                  <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                      <div class="modal-header bg-success text-light">
                        <h4 class="modal-title">สร้างหัวข้อย่อย</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">

              
                <div class="form-group m-3">
                  <label for="" class="form-label">รายละเอียดย่อย</label>
                  <input class="form-control" type="text" name="detail_name">
                </div>
        
                <div class="form-group m-3">
                  <label for="" class="form-label">กำหนดคะแนนเต็ม (เลขจำนวนเต็ม)</label>
                  <input type="number" name="detail_score" class="form-control">
                </div>
                <div class="form-group m-3">
                  <label for="" class="form-label">หมายเหตุ</label>
                  <textarea class="form-control" name="report_note"></textarea>
                </div>
                <br>
                <input type="hidden" name="id_report" value="<?php echo $_GET["id"]; ?>">



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
              <h4 class="bg-primary card-header mb-2 text-light">รายละเอียดย่อยของแบบสอบถาม</h4>
              <table class="table table-hover table-info">
                <thead>
                  <tr class="table-primary">
                    <th class="text-center">#</th>
                    <th>รายละเอียดย่อย</th>
                    <th class="text-center">คะแนนเต็ม</th>
                    <th>หมายเหตุ</th>
                    <th>ตำสั่ง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                  $id_report=$_GET["id"];
                  if (isset($_SESSION['search_report_detail'])) {
                    $search_report_detail=$_SESSION['search_report_detail'];
                    $sql="SELECT * FROM report_detail,report WHERE report.id_report = report_detail.id_report and report.id_report='$id_report' and (detail_name LIKE '%$search_report_detail%' or report_note LIKE '%$search_report_detail%')";
                  }else{
                    $sql="SELECT * FROM report_detail,report WHERE report.id_report = report_detail.id_report and report.id_report='$id_report'";
                  }
					$i=1;
					
					$result=mysqli_query($conn,$sql);
          $count=mysqli_num_rows($result);

          $sum_score=0; //นับยอดคะแนนรวม
					while($row=mysqli_fetch_object($result)){ 

                   ?>
                  <tr>
                    <th class="text-center"><?php echo $i++; ?></th>
                    <td><?php echo $row->detail_name;?></td>
                    <td class="text-center"><?php echo $row->report_score; $sum_score+=$row->report_score;?></td>
                    <td><?php echo $row->report_note;?></td>
                    <td>
                      <a href="#edit_report_detail<?php echo $i;?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">แก้ไข</a>
                      <a href="sql/del-report-detail.php?id_report=<?php echo $_GET["id"];?>&id_report_detail=<?php echo $row->id_report_detail;?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล ?');">ลบ</a>
                    </td>
                  </tr>
                <form action="sql/edit-report-detail.php" method="post" enctype="multipart/form-data">
                  <div class="modal fade" id="edit_report_detail<?php echo $i;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-warning">
                          <h4 class="modal-title">กำลังแก้ไข</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
          
                          <div class="form-group">
                            <label for="" class="form-label">รายละเอียดย่อย</label>
                            <input class="form-control" type="text" name="detail_name" value="<?php echo $row->detail_name;?>">
                          </div>
                  
                          <div class="form-group">
                            <label for="" class="form-label">กำหนดคะแนนเต็ม (เลขจำนวนเต็ม)</label>
                            <input type="number" name="detail_score" class="form-control" value="<?php echo $row->report_score;?>">
                          </div>
                          <div class="form-group">
                            <label for="" class="form-label">หมายเหตุ</label>
                            <textarea class="form-control" name="report_note"><?php echo $row->report_note; ?></textarea>
                          </div>
                          <br>
                       
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_report_detail" value="<?php echo $row->id_report_detail;?>">
                          <input type="hidden" name="id_report" value="<?php echo $_GET["id"]; ?>">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                          <button type="submit" class="btn btn-warning">แก้ไข</button>
                        </div>
                      </div>  
                    </div>
                  </div>
                   </form>

                <?php } ?>
					       <?php if ($count==0): ?>
                   <tr>
                    <td class="table-danger text-center" colspan="5" >ไม่พบข้อมูล </td>
                  </tr>
                 <?php endif ?>
        					 <tfoot>
                   <tr>
                     <th colspan="2" class="text-end">รวม</th>
                     <th class="text-center text-danger"><?php echo $sum_score;?></th>
                     <th colspan="2">คะแนน</th>
                   </tr>
                  </tfoot>

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