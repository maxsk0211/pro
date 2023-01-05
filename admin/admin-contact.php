<?php  
      session_start(); 
  if(!isset($_SESSION["user_lv"]) && $_SESSION['user_lv']==0 ){
    header("location: ../index.php?");
    exit();
  }

  require("../dbcon.php");

 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>การสนทนา - Happy Care Nursing Home - บ้านมีสูข</title>
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

          <div class="card border-primary rounded-pill my-2">
            <div class="card-body">
              <h3 class="card-header bg-success text-light text-center rounded-pill">จัดการ การสนทนา</h3>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
             <div class="form-group mb-5">
                <a href="#search-contact-user" class="btn btn-primary float-end btn-lg" data-bs-toggle="modal">ค้นหา</a>
              </div>
              <br>
              <?php if(isset($_SESSION['search_contact_user'])){ ?>
             <div class="alert alert-warning">
               <h5 class="text-danger">คำค้นหาของคุณคือ : <?php echo $_SESSION['search_contact_user']; ?></h5>
               <div class="ms-auto">
                 <a href="sql/clear-session.php?search_contact_user=1" class="btn btn-danger">ยกการค้นหา</a>
               </div>
             </div>
              <?php } ?>
              <form action="sql/search.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="search-contact-user">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <h4 class="modal-title">การค้นหาผู้ใช้งาน</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="ค้นหา" name="search">
                          <input type="hidden" name="search-contact-user" value="1">
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

              


              <h4 class="bg-primary card-header mb-2 text-light">บัญชีผู้ใช้งานทั้งหมด</h4>
              <table class="table table-hover table-info">
                <thead>
                  <tr class="table-primary">
                    <th class="text-center">#</th>
                    <th>E-Mail</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เบอร์โทร</th>
                    <th class="text-center">ระดับผู้ใช้งาน</th>
                    <th>ตำสั่ง</th>
                  </tr>
                </thead>
                <tbody>
  
          <?php

          if(isset($_SESSION['search_contact_user'])){
            $search_contact_user=$_SESSION['search_contact_user'];
            $id_user=$_SESSION['id_user'];  
            $sql="SELECT * FROM users WHERE id_user != 1 and id_user != '$id_user'  and email LIKE '%$search_contact_user%'  or fname LIKE '%$search_contact_user%' or lname LIKE '%$search_contact_user%' or tel LIKE '%$search_contact_user%' or address LIKE '%$search_contact_user%'"; 

          }else{
            $sql="SELECT * FROM users where id_user !=1  and id_user != '$id_user'";
          }

          $result = mysqli_query($conn,$sql);
          $count=mysqli_num_rows($result);
          $i=1;
          if($count == 0) { ?>
              <tr>
                <td class="table-danger text-center" colspan="6" >ไม่พบข้อมูล </td>
              </tr>
          <?php }

            while($row=mysqli_fetch_object($result)){
          ?>
          <tr>
            <td class="text-center"><?php echo $i++; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->fname." ".$row->lname; ?></td>
            <td><?php echo $row->tel; ?></td>
            <td class="text-center">
              <span class="badge   <?php if($row->user_level==1){ echo "bg-danger"; }else{ echo "bg-warning"; } ?>">
              <?php if($row->user_level==1){ echo "แอดมิน"; }else{ echo "ผู้ใช้งานทั่วไป"; } ?></span>
            </td>
            <td>
              <a href="#show-user<?php echo $i;?>" data-bs-toggle="modal" class="btn btn-primary btn-sm">แชท</a>


            </td>
          </tr>

                <?php  } ?>
          
                  

              
          
              
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
    <?php include '../alert-modal.php';  ?>
    <script type="text/javascript">
 function chk_pass(){

    const pass1 = document.querySelector('input[name=users_pass1]');
    const pass2 = document.querySelector('input[name=users_pass2]');
    if (pass1.value===pass2.value) {
        pass2.setCustomValidity('');
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'รหัสผ่านเหมือนกัน';
        document.getElementById("register").disabled = false;
    }else{
        pass2.setCustomValidity('กรุณาใส่ใหม่อีกครั้ง');
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'รหัสผ่านไม่ตรงกัน';
        document.getElementById("register").disabled = true;
    }
  }


</script>
  </body>
</html>