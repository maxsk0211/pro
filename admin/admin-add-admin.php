<?php  
      session_start(); 
  include 'chk-session.php';

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
  <body style="padding-top: 70px;background: rgb(100, 40, 140);">

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
                        <div class="form-text text-danger">คุณสามารถค้นหา : ชื่อ ,นามสกุล ,ชื่อผู้ใช้งาน ,วันเกิด(DD/MM/YYYY) <br> ,เบอร์โทร ,ที่อยู่</div>
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

                      <div class="form-group mt-2">
                        <label class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="fname" required>
                      </div>

                      <div class="form-group mt-2">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" name="lname" required > 
                      </div>
                                    
                      <div class="form-group mt-2">
                        <label class="form-label">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control" name="usernames" required> 
                      </div>
                       
                       <div class="row mt-2">
                          <div class="col-md-6">
                            <label class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="pass1" required onkeyup="chk_pass()">
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control" name="pass2" required onkeyup="chk_pass()">
                          </div>
                          <span id="message"></span>
                       </div>
                    <div class="form-group mt-2">
                      <label class="form-label">วันเกิด</label>
                      <input type="date" class="form-control" name="birthday" required>
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">เบอร์โทร</label>
                      <input type="number" class="form-control" name="tel" maxlength="10" required>
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">ที่อยู่</label>
                      <textarea class="form-control" name="address" required></textarea>
                    </div>

                    <div class="form-group mt-2">
                      <label for="" class="badge bg-danger fs-6 my-1">เลือกระดับผู้ใช้งาน</label>
                        <select class="form-select" name="user_level" required>
                          <option value="0" class="alert-warning">สมาชิก</option> 
                          <option value="1" class="alert-danger">ผู้ดูแลระบบ</option>
                        </select>
                    </div>


                      <div class="form-group mt-3">
                        <label for="" class="form-label">เลือกรูปโปไฟล์</label>
                        <input type="file" class="form-control" name="file_pic" required>
                      </div>
                    
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="register" disabled>บันทึกข้อมูล</button>
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
                    <th>ชื่อบัญชีผู้ใช้</th>
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

            $sql="SELECT * FROM users WHERE id_user != 1 and (usernames LIKE '%$search_admin%'  or fname LIKE '%$search_admin%' or lname LIKE '%$search_admin%' or tel LIKE '%$search_admin%' or address LIKE '%$search_admin%' or birthday LIKE '%$search_admin%') order by id_user DESC"; 

          }else{
            $sql="SELECT * FROM users where id_user !=1 order by id_user DESC";
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
            <td><?php echo $row->usernames; ?></td>
            <td><?php echo $row->fname." ".$row->lname; ?></td>
            <td><?php echo $row->tel; ?></td>
            <td class="text-center">
              <span class="badge   <?php if($row->user_level==1){ echo "bg-danger"; }else{ echo "bg-warning"; } ?>">
              <?php if($row->user_level==1){ echo "ผู้ดูแลระบบ"; }else{ echo "สมาชิก"; } ?></span>
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
                        <label class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" readonly value="<?php echo $row->fname;?>"> 
                      </div>

                      <div class="form-group mt-2">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" readonly value="<?php echo $row->lname;?>"> 
                      </div>
                                    
                      <div class="form-group mt-2">
                        <label class="form-label">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control" readonly value="<?php echo $row->usernames;?>"> 
                      </div>            
                
                    <div class="form-group mt-2">
                      <label class="form-label">วันเกิด</label>
                      <input type="date" class="form-control" readonly value="<?php echo $row->birthday?>">
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">เบอร์โทร</label>
                      <input type="text" class="form-control" readonly value="<?php echo $row->tel;?>">
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">ที่อยู่</label>
                      <textarea class="form-control" readonly><?php echo $row->address; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="" class="badge bg-danger fs-6 my-1">เลือกระดับผู้ใช้งาน</label>
                        <select class="form-select" disabled>
                          <option><?php if($row->user_level==1){echo "ผู้ดูแลระบบ";}else{ echo"สมาชิก";} ?></option>
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
                        <label class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" required value="<?php echo $row->fname;?>" name="fname"> 
                      </div>

                      <div class="form-group mt-2">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" required value="<?php echo $row->lname;?>" name="lname"> 
                      </div>
                                    
                      <div class="form-group mt-2">
                        <label class="form-label">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control" required value="<?php echo $row->usernames;?>" name="usernames"> 
                      </div>
                      <div class="from-group mt-2">
                        <label class="form-label">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control" required value="<?php echo $row->passwords;?>">           
                      </div>         
                
                    <div class="form-group mt-2">
                      <label class="form-label">วันเกิด</label>
                      <input type="date" class="form-control" required value="<?php echo $row->birthday?>" name="birthday">
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">เบอร์โทร</label>
                      <input type="number" class="form-control" required value="<?php echo $row->tel;?>" name="tel">
                    </div>

                    <div class="form-group mt-2">
                      <label class="form-label">ที่อยู่</label>
                      <textarea class="form-control" required name="address"><?php echo $row->address; ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="" class="badge bg-danger fs-6 my-1">เลือกระดับผู้ใช้งาน</label>
                        <select class="form-select" name="user_level">
                          <option value="1" <?php if($row->user_level==1){echo "selected";} ?> class="alert-danger">ผู้ดูแลระบบ</option>
                          <option value="0" <?php if($row->user_level==0){echo "selected";} ?> class="alert-warning">สมาชิก</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                      <label for="" class="form-label">เลือกรูปโปไฟล์</label>
                      <input type="file" class="form-control" name="file_pic">
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

    const pass1 = document.querySelector('input[name=pass1]');
    const pass2 = document.querySelector('input[name=pass2]');
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