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
    <title>ห้องแชท - Happy Care Nursing Home - บ้านมีสูข</title>
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
          <a href="admin-add-chat-room.php" class="btn btn-warning btn-lg"><--- Back</a>
          <div class="card border-primary border-3 rounded-pill my-2">
            <div class="card-body">
              <h3 class="card-header bg-success text-center text-light rounded-pill">ห้องแชท</h3>
            </div>
          </div>


          <div class="card border-primary">
            <div class="card-body">
              <?php 
              $id_chat_room=$_GET['id_chat_room'];
              $sql="SELECT * FROM chat_room WHERE id_chat_room = '$id_chat_room' ";
              $result=mysqli_query($conn,$sql);
              $row_chat_room=mysqli_fetch_object($result);
               ?>
              <div class="alert bg-danger text-center">
                <h4 class="alert-heading text-light">ห้องแชทเรื่อง : <?php echo $row_chat_room->chat_room_name; ?></h4>
              </div>

<!--               <div class="card alert-info my-3" >
                <div class="card-body">
                  <div class="row d-flex flex-row-reverse">
                    <div class="col-11 ">
                      <span class="badge bg-danger   ">admin </span>
                      <br>
                      <p class="   ">12qewdferfgsejrfhglegfleh ewhrg lehrgbf elrhbg lehrbvg elhgbv ehv3</p>
                    </div>
                    <div class="col-1">
                      <div class="d-flex flex-column align-items-center ">
                        <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="" class="w-50 ">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                      <span class="badge bg-info">12/12/2565</span>
                  </div>
                </div>
              </div> -->
              
            <?php 

            $id_user=$_SESSION['id_user'];
            $id_chat_room=$_GET['id_chat_room'];
            $sql="SELECT * FROM chat_detail,users WHERE users.id_user=chat_detail.id_user  and chat_detail.id_chat_room = '$id_chat_room' ORDER BY chat_detail.chat_datetime ASC";
            $result=mysqli_query($conn,$sql);

            //เช๋็คมีข้อมูลมั้ย
            $count=mysqli_num_rows($result);
            if ($count==0) { ?>
              <div class="card alert-danger">
                <div class="card-body">
                  <h4 class="alert-heading text-center">ไม่พบข้อมูล</h4>
                </div>
              </div>
           <?php }

              while($row_chat=mysqli_fetch_object($result)){
                $id_user=$row_chat->id_user;
              
             ?>


             <div class="card   my-3 <?php if($id_user==$_SESSION['id_user']){echo "alert-info";}else{echo "alert-primary";} ?>" >
                <div class="card-body">
                  <div class="row  <?php if($id_user!=$_SESSION['id_user']){echo "d-flex flex-row-reverse";}?>">
                    <div class="col-11">
                      <span class="badge <?php if($id_user==$_SESSION['id_user']){echo "float-end bg-primary";}else{echo "bg-danger";} ?>"><?php echo $row_chat->fname." ".$row_chat->lname; ?></span>
                      <br>
                      <p class="<?php if($id_user==$_SESSION['id_user']){echo "float-end";}?>"><?php echo $row_chat->chat_topic; ?></p>
                    </div>
                    <div class="col-1">
                      <div class="d-flex flex-column align-items-center ">
                        <img src="../uploads/<?php echo $row_chat->pic;?>" alt="" class="w-100 rounded-pill">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                      <span class="badge bg-info"><?php echo $row_chat->chat_datetime; ?></span>
                  </div>
                </div>
              </div>

            <?php } ?>

              <div class="card alert-success my-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                      <div class="d-flex flex-column align-items-center ">
                        <img src="../uploads/<?php echo $row->pic;?>" alt="" class="w-100 rounded-pill">
                        <span class="badge bg-primary mt-1"><?php echo $row->fname." ".$row->lname; ?></span>
                      </div>
                    </div>
                    <div class="col-10">
                      <form action="sql/insert-chat-detail.php" method="post" enctype="multipart/form-data">                      
                          <textarea class="form-control" name="chat_topic" <?php if($row_chat_room->char_room_status==0){ echo "disabled";}?>></textarea>
                          <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'];?>">
                          <input type="hidden" name="id_chat_room" value="<?php echo $_GET['id_chat_room'];?>">
                          <button class="btn btn-success float-end mt-3" <?php if($row_chat_room->char_room_status==0){ echo "disabled";}?>>ส่ง</button>
                      </form>
                    </div>
                  </div>
                  
                </div>
              </div>
              
              <div class="text-center">
                <a href="sql/end-chat.php?id_chat_room=<?php echo $_GET['id_chat_room'];?>&url=admin-chat-room.php" class="btn btn-danger btn-lg <?php if($row_chat_room->char_room_status==0){ echo "disabled";}?>" >จบการสนทนา</a>  
              </div>





              
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