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
    <title>จัดการแพ็คเกจ - Happy Care Nursing Home - บ้านมีสูข</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet"> 
      <script src="../js/bootstrap.js"></script> 

  </head>
  <body style="height: 5000px; padding-top: 70px;background: rgb(100, 40, 140);">

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
                    <th>เยี่ยมชม</th>
                    <th>คะแนนของแพ็คเกจ</th>
                    <th>ผู้สร้าง</th>
                    <th>ตำสั่ง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if (isset($_SESSION['search_package'])) {
                    $search_package=$_SESSION['search_package'];
                    $sql="SELECT * FROM package,users WHERE users.id_user=package.id_user and pa_name LIKE '%$search_package%' ORDER BY package.id_pa ASC";
                  }else{
                    $sql = "SELECT * FROM package,users WHERE users.id_user=package.id_user  ORDER BY `package`.`id_pa` ASC";

                  }
                $result=mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);

                $i=1;


                  while( $row = mysqli_fetch_object($result)){ 
                      
                   ?>
                  <tr>
                    <th class="text-center"><?php echo $i++; ?></th>
                    <td><?php echo $row->pa_name; ?></td>
                    <td><?php echo $row->pa_price." บาท"; ?></td>
                    <td><?php echo $row->pa_view." ครั้ง"; ?></td>
                    <td> 3.4/5 (245 ครั้ง)</td>
                    <td><?php echo $row->fname." ".$row->lname; ?></td>
                    
                    <td>
                      <a href="#show_news_<?php echo $i;?>" class="btn btn-primary btn-sm">แชท</a>
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