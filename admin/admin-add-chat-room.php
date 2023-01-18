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
    <title>จัดการห้องแชท - Happy Care Nursing Home - บ้านมีสูข</title>
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
              <h3 class="card-header bg-success text-center text-light rounded-pill">จัดการห้องแชท</h3>
            </div>
          </div>


          <div class="card border-primary">
            <div class="card-body">
              
              <div class="form-group mb-5">
                <a href="#search-chat-room" class="btn btn-primary btn-lg rounded-pill float-end" data-bs-toggle="modal">ค้นหา</a>
              </div>
              <div class="form-group mb-2">
                <a href="admin-add-chat-room-type.php" class="btn btn-warning btn-lg rounded-pill float-end">จัดการประเภทห้องสนทนา</a>
              </div>
              <br>
              <br>
              <br>
              <?php if(isset($_SESSION['search_chat_room'])){ ?>
             <div class="alert alert-warning">
               <h5 class="text-danger">คำค้นหาของคุณคือ : <?php echo $_SESSION['search_chat_room']; ?></h5>
               <h5 class="text-success">ประเภทคือ : <?php if($_SESSION['type_name']==""){ echo "ทุกประเภท";}else{ echo $_SESSION['type_name']; }  ?></h5>
               <div class="ms-auto">
                 <a href="sql/clear-session.php?search_chat_room=1" class="btn btn-danger">ยกการค้นหา</a>
               </div>
             </div>
              <?php } ?>
              
              <form action="sql/search.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="search-chat-room">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <h4 class="modal-title">การค้นหาห้องแชท</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label class="form-label">คำค้นหา</label>
                          <input type="text" class="form-control" placeholder="ค้นหา" name="search">
                          <input type="hidden" name="search_chat_room" value="1">
                        </div>
                        <div class="form-text text-danger">คุณสามารถค้นหา : ชื่อห้องแชท</div>
                        <hr>
                        <div class="form-group">
                          <label class="form-label">เลือกประเภท</label>
                          <select name="type_name" class="form-control">
                            <option value="" selected>ทุกประเภท</option>
                            <?php 
                            $sql="SELECT * FROM chat_room_type";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_object($result)){
                             ?>
                            <option value="<?php echo $row->type_name; ?>"><?php echo $row->type_name; ?></option>


                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-text text-danger">คุณสามารถเลือกประเภทได้</div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">ค้นหา</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>





              <h4 class="bg-primary card-header mb-2 text-light">ห้องแชททั้งหมด</h4>
              <table class="table table-hover table-info">
                <thead>
                  <tr class="table-primary">
                    <th class="text-center">#</th>
                    <th>ชื่อห้องแชท</th>
                    <th>ประเถท</th>
                    <th>คำสั่ง</th>
                    <th>สถานะ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  

                  if (isset($_SESSION['search_chat_room'])) {
                    $search_chat_room=$_SESSION['search_chat_room'];
                    $type_name=$_SESSION['type_name'];
                    $sql="SELECT * FROM chat_room,chat_room_type WHERE chat_room.id_chat_room_type=chat_room_type.id_chat_room_type and chat_room_name LIKE '%$search_chat_room%' and chat_room_type.type_name LIKE '%$type_name%'  ORDER BY chat_room.id_chat_room DESC";
                  }else{
                    $sql = "SELECT * FROM chat_room,chat_room_type where chat_room.id_chat_room_type=chat_room_type.id_chat_room_type   ORDER BY chat_room.id_chat_room DESC";

                  }
                $result=mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);

                $i=1;
                if ($count==0) { ?>
                  <tr class="table-danger text-center">
                    <td colspan="5">ไม่พบข้อมูล</td>
                  </tr>
               <?php }

                  while( $row = mysqli_fetch_object($result)){ 
                      
                   ?>
                  <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td><?php echo $row->chat_room_name; ?></td>
                    <td><?php echo $row->type_name; ?></td>
                    <td>
                      <a href="admin-chat-room.php?id_chat_room=<?php echo $row->id_chat_room;?>" class="btn btn-primary btn-sm">ห้องแชท</a>
                      <a href="sql/del-chat-detail.php?id_chat_room=<?php echo $row->id_chat_room;?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล ?');">ลบ</a>
                    </td>
                    <td>
                      <?php if($row->char_room_status==1){ ?>
                        <span class="badge bg-success">สามารถแชทได้</span>
                      <?php }else{ ?>
                        <span class="badge bg-danger">จบการสนทนา</span>
                      <?php }?>
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