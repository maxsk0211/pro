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
    <title>จัดการแบบสอบถาม</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet"> 
      <script src="../js/bootstrap.js"></script> 

  </head>
  <body style=" padding-top: 70px;background: rgb(100, 40, 140);">

    <div class="container-fluid">
      <?php include 'nav-user.php' ?>
      <div class="row">
        <div class="col-md-3 d-none d-lg-block">
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
              <h4 class="bg-primary card-header mb-2 text-light">แบบสอบถามาทั้งหมด</h4>
              <table class="table table-hover table-info">
                <thead>
                  <tr class="table-primary">
                    <th class="text-center">#</th>
                    <th>ชื่อแบบสอบถาม</th>
                    <th>ผู้สร้าง</th>
                    <th>เยี่ยมชม</th>
                    <th>รายละเอียดต่าง</th>
                    <th>ตำสั่ง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
          $sql="SELECT * FROM report,users  where  report.id_user= users.id_user ORDER BY report.id_report DESC";
          $result=mysqli_query($conn,$sql);
          $i=1;
          while( $row = mysqli_fetch_object($result)){ 
                    
                   ?>
                  <tr>
                    <th class="text-center"><?php echo $i; ?></th>
                    <td><?php echo $row->report_topic;?></td>
                    <td><?php echo $row->fname." ".$row->lname ?></td>
                    <td><?php echo $row->view_report." ครั้ง";?></td>
                    <td><?php echo $row->report_detail; ?></td> 
                    <td>
                      <!-- เช็คการประเมิน -->
                      <?php 

                        $id_report=$row->id_report;
                        $id_user=$_SESSION['id_user'];
                        $dis="";
                        $sql="SELECT * FROM score_report WHERE id_user ='$id_user' and id_report = '$id_report'";
                        $result_chk_report=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($result_chk_report);
                        if($count!=0){
                          $dis="disabled";
                        }
                       ?>
                      <a href="#insert-score-<?php echo $i; ?>" class="btn btn-primary btn-sm <?php echo $dis; ?>" data-bs-toggle="modal" >ประเมิน</a>
                      <a href="show-report.php?id_report=<?php echo $row->id_report;?>" class="btn btn-success btn-sm">รายงาน</a>
                    </td>
                  </tr>
    <form action="sql/insert-score.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="insert-score-<?php echo $i; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          
            <div class="modal-header bg-primary text-light">
              <h4 class="modal-title">กำลังทำแบบประเมิน</h4>
              <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
              <h5 class="alert alert-success"><?php echo $row->report_topic;?></h5>
              <p class="alert alert-warning"><?php echo $row->report_detail; ?></p>
              <div class="form-group">
                <?php 
                $id_report=$row->id_report;
                $sql_show_detail="SELECT * FROM report_detail, report WHERE report.id_report = report_detail.id_report and report_detail.id_report='$id_report'";
                $result_show_detail=mysqli_query($conn,$sql_show_detail);
                //นับรอบ
                $count=1; 

                  while ($row_show_detail=mysqli_fetch_object($result_show_detail)){
                  $report_score=$row_show_detail->report_score
                ?>
                <label class="form-label"><?php echo $count." : ".$row_show_detail->detail_name; ?></label>
                <select class="form-select" name="score[]">
                  <?php for ( $ii=$report_score ; $ii >= 0 ; $ii--) {?>
                  <option value="<?php echo $ii; ?>"><?php echo $ii; ?> คะแนน</option>
                  <?php } ?>
                </select>

                <input type="hidden" name="id_report_detail[]" value="<?php echo $row_show_detail->id_report_detail; ?>">
                <input type="hidden" name="count" value="<?php echo $count++;?>">
              <?php } ?>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_report" value="<?php echo $row->id_report ; ?>">
              <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'];?>">
              <button class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</button>
              <button class="btn btn-success" type="submlt">บันทึก</button>
            </div>
        </div>
      </div>
    </div>
    </form>

                <?php $i++; } ?>
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