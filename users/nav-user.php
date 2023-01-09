<nav class="navbar navbar-expand-lg navbar-dark p-3 fixed-top" id="headerNav" style="background-color: rgb(23,165, 137);">
  <div class="container-fluid">
    <a class="navbar-brand d-block d-lg-none" href="#">
      <img src="../img/logo.png" height="50" />
    </a>
    <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
 
    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto ">
          <div class="nav-item my-2 mx-1">
            <a href="users-add-news.php" class="btn btn-primary rounded-pill">ข่าวสาร</a>
          </div>
          <div class="nav-item my-2 mx-1">
            <a href="users-show-package.php" class="btn btn-danger rounded-pill">แพ็คเกจ</a>
          </div>
          <div class="nav-item my-2 mx-1">
            <a href="users-add-webboard.php" class="btn btn-info text-dark rounded-pill">กระดานสนทนา</a>
          </div>

          <div class="nav-item my-2 mx-1">
            <a href="users-add-report.php" class="btn btn-secondary rounded-pill">แบบสอบถาม</a>
          </div>

      </ul>
    </div>
  </div>
</nav>
<br> <br>


<!-- start Navbar -->
    <nav class="navbar fixed-bottom d-lg-none d-block text-light navbar-dark" style="background-color: rgb(36, 113, 163);"> 
      <div class="container">
        <?php 
          $id_user=$_SESSION['id_user'];
          $sql="SELECT * FROM users WHERE id_user = '$id_user'";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_object($result);
         ?>
         <p class=" ms-auto h4 rounded-pill  bg-primary p-1">เมนูจัดการโปรไฟล์</p>
        <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#nav-2" aria-controls="nav-2" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon "></span></button>
        <div class="collapse navbar-collapse" id="nav-2">
          <div class="navbar-nav mx-auto">
            <div class="nav-item text-center">
              <h4 class="card-header text-center">ระดับผู้ใช้งาน :  
                <p class="badge bg-warning">ผู้ดูแลระบบ</p>
              </h4>
              <img class="rounded-pill mx-auto" width="50%" src="../uploads/<?php echo $row->pic;?>">
              <br>
              <p class="form-label badge bg-success fs-5 mt-2"><?php echo $row->fname." ".$row->lname; ?></p><br>
              <p class="form-label badge fs-6 <?php if($row->user_level==1){echo "bg-danger";}else{echo "bg-warning";} ?>"><?php echo $row->email; ?></p>
              <div class="mt-3">
                  <a href="edit-user.php" class="btn btn-warning rounded-pill">แก้ไขข้อมูลส่วนตัว</a>
              </div>
            <div class="mt-2">
              <a href="users-add-chat-room.php" class="btn btn-success rounded-pill">สนทนา</a>
            </div>
              <div class="mt-1">
                  <a href="../logout.php" class="btn btn-danger rounded-pill">ออกจากระบบ</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
<!-- End Navbar -->