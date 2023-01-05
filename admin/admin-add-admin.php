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
    <title>จัดการบัญชีผู้ใช้งาน - Happy Care Nursing Home - บ้านมีสูข</title>
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
              <h3 class="card-header bg-warning text-center rounded-pill">จัดการบัญชีผู้ใช้งาน</h3>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="form-group mb-5">
                <a href="#search-admin" class="btn btn-primary btn-lg rounded-pill float-end" data-bs-toggle="modal">ค้นหา</a>
                <a href="#add-admin" class="btn btn-success btn-lg rounded-pill mb-3 float-start" data-bs-toggle="modal">สร้างบัญชีผู้ใช้งาน</a>
              </div>
              <br>

              <?php if(isset($_SESSION['search_admin'])){ ?>
             <div class="alert alert-warning">
               <h5 class="text-danger">คำค้นหาของคุณคือ : <?php echo $_SESSION['search_admin']; ?></h5>
               <div class="ms-auto">
                 <a href="sql/clear-session.php?search_admin=1" class="btn btn-danger">ยกการค้นหา</a>
               </div>
             </div>
              <?php } ?>
              <form action="sql/search.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="search-admin">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <h4 class="modal-title">การค้นหาข่าวสาร</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="ค้นหา" name="search">
                          <input type="hidden" name="admin" value="1">
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

              <form action="sql/insert-admin.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="add-admin">
                  <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                      <div class="modal-header bg-success text-light">
                        <h4 class="modal-title">สร้างบัญชีผู้ใช้งาน</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">

                        <form action="sql/insert-users.php" method="post" enctype="multipart/form-data">
                      <div class="form-group mt-2">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="users_fname" required>
                      </div>

                      <div class="form-group mt-2">
                        <label class="form-label">Surname</label>
                        <input type="text" class="form-control" name="users_lname" required > 
                      </div>
                                    
                      <div class="form-group mt-2">
                        <label class="form-label">E-Mail</label>
                        <input type="email" class="form-control" name="users_email" required> 
                      </div>
                       
                       <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="users_pass1" required onkeyup="chk_pass()">
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">confirm Password</label>
                            <input type="password" class="form-control" name="users_pass2" required onkeyup="chk_pass()">
                          </div>
                          <span id="message"></span>
                       </div>
                    <div class="form-group mt-2">
                      <label class="form-label">Birthday</label>
                      <input type="date" class="form-control" name="users_birthday" required>
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">Tel</label>
                      <input type="text" class="form-control" name="users_tel" maxlength="10" required>
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">Address</label>
                      <textarea class="form-control" name="users_address" required></textarea>
                    </div>

                    <div class="form-group mt-2">
                      <label for="" class="badge bg-danger fs-6 my-1">เลือกระดับผู้ใช้งาน</label>
                        <select class="form-select" name="user_level">
                          <option disabled selected>เลือกระดับผู้ใช้งาน</option>
                          <option value="1" class="alert-danger">แอดมิน</option>
                          <option value="0" class="alert-warning">ผู้ใช้งานทั่วไป</option>
                        </select>
                    </div>

                    <div class="input-group mt-3">
                      <label for="" class="input-group-text">เลือกรูปโปไฟล์</label>
                      <input type="file" class="form-control" name="users_file_pic">
                    </div>


                  </form>

                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>">
                        <button type="submit" class="btn btn-warning" id="register" disabled>สมัครสมาชิก</button>
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

          if(isset($_SESSION['search_admin'])){
            $search_admin=$_SESSION['search_admin'];

            $sql="SELECT * FROM users WHERE id_user != 1 and email LIKE '%$search_admin%' or passwords LIKE '%$search_admin%' or fname LIKE '%$search_admin%' or lname LIKE '%$search_admin%' or tel LIKE '%$search_admin%' or address LIKE '%$search_admin%'"; 

          }else{
            $sql="SELECT * FROM users where id_user !=1";
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
              <a href="#show-user<?php echo $i;?>" data-bs-toggle="modal" class="btn btn-primary btn-sm">ดู</a>
              <a href="#edit-user<?php echo $i;?>" data-bs-toggle="modal"  class="btn btn-warning btn-sm">แก้ไข</a>
              <a href="sql/del-admin.php?id=<?php echo $row->id_user;?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล ?');">ลบ</a>
            </td>
          </tr>
                  <div class="modal fade" id="show-user<?php echo $i;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-primary text-light">
                          <h4 class="modal-title">ผู้ใช้งาน</h4>
                          <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">

                      <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" readonly value="<?php echo $row->fname;?>"> 
                      </div>

                      <div class="form-group mt-2">
                        <label class="form-label">Surname</label>
                        <input type="text" class="form-control" readonly value="<?php echo $row->lname;?>"> 
                      </div>
                                    
                      <div class="form-group mt-2">
                        <label class="form-label">E-Mail</label>
                        <input type="email" class="form-control" readonly value="<?php echo $row->email;?>"> 
                      </div>            
                
                    <div class="form-group mt-2">
                      <label class="form-label">Birthday</label>
                      <input type="date" class="form-control" readonly value="<?php echo $row->birthday?>">
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">Tel</label>
                      <input type="text" class="form-control" readonly value="<?php echo $row->tel;?>">
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">Address</label>
                      <textarea class="form-control" readonly><?php echo $row->address; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="" class="badge bg-danger fs-6 my-1">เลือกระดับผู้ใช้งาน</label>
                        <select class="form-select" disabled>
                          <option><?php if($row->user_level==1){echo "แอดมิน";}else{ echo"ผู้ใช้งานทั่วไป";} ?></option>
                        </select>
                    </div>
                    <img src="../uploads/<?php echo $row->pic;?>" class="w-100 mt-4">

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <form action="sql/edit-admin.php" method="post" enctype="multipart/form-data">

                  <div class="modal fade" id="edit-user<?php echo $i;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-warning">
                          <h4 class="modal-title">กำลังแก้ไขผู้ใช้งาน</h4>
                          <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                        </div>
                        <div class="modal-body">
                             <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" required value="<?php echo $row->fname;?>" name="fname"> 
                      </div>

                      <div class="form-group mt-2">
                        <label class="form-label">Surname</label>
                        <input type="text" class="form-control" required value="<?php echo $row->lname;?>" name="lname"> 
                      </div>
                                    
                      <div class="form-group mt-2">
                        <label class="form-label">E-Mail</label>
                        <input type="email" class="form-control" required value="<?php echo $row->email;?>" name="email"> 
                      </div>
                      <div class="from-group mt-2">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required value="<?php echo $row->passwords;?>">           
                      </div>         
                
                    <div class="form-group mt-2">
                      <label class="form-label">Birthday</label>
                      <input type="date" class="form-control" required value="<?php echo $row->birthday?>" name="birthday">
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">Tel</label>
                      <input type="text" class="form-control" required value="<?php echo $row->tel;?>" name="tel">
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">Address</label>
                      <textarea class="form-control" required name="address"><?php echo $row->address; ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="" class="badge bg-danger fs-6 my-1">เลือกระดับผู้ใช้งาน</label>
                        <select class="form-select" name="user_level">
                          <option value="1" <?php if($row->user_level==1){echo "selected";} ?> class="alert-danger">แอดมิน</option>
                          <option value="0" <?php if($row->user_level==0){echo "selected";} ?> class="alert-warning">ผู้ใช้งานทั่วไป</option>
                        </select>
                    </div>
                    <div class="input-group mt-3">
                      <label for="" class="input-group-text">เลือกรูปโปไฟล์</label>
                      <input type="file" class="form-control" name="users_file_pic">
                    </div>
                    <img src="../uploads/<?php echo $row->pic;?>" class="w-100 mt-4">
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_user" value="<?php echo $row->id_user;?>">
                          <input type="hidden" name="pic_db" value="<?php echo $row->pic;?>">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                          <button class="btn btn-warning" type="submit">แก้ไข</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>

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