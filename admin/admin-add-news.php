<?php
      session_start(); 
include 'chk-session.php';

require ('../dbcon.php');


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการข่าวสาร - Happy Care Nursing Home - บ้านมีสูข</title>
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

          <div class="card border-primary border-4 rounded-pill my-2">
            <div class="card-body">
              <h3 class="card-header bg-primary text-light text-center rounded-pill">จัดการข่าวสาร</h3>
            </div>
          </div>


        <div class="card border-primary">
            <div class="card-body">
              <div class="form-group mb-5">
                <a href="#search-news" class="btn btn-primary btn-lg rounded-pill float-end" data-bs-toggle="modal">ค้นหา</a>
                <a href="#add-news" class="btn btn-success btn-lg rounded-pill mb-3 float-start" data-bs-toggle="modal">สร้างข่าวสาร</a>
              </div>
              <br>


              <?php if(isset($_SESSION['search_news'])){ ?>
             <div class="alert alert-warning">
               <h5 class="text-danger">คำค้นหาของคุณคือ : <?php echo $_SESSION['search_news']; ?></h5>
               <div class="ms-auto">
                 <a href="sql/clear-session.php?search_news=1" class="btn btn-danger">ยกการค้นหา</a>
               </div>
             </div>
              <?php } ?>
              <form action="sql/search.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="search-news">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <h4 class="modal-title ">การค้นหาข่าวสาร</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="ค้นหา" name="search">
                          <input type="hidden" name="news" value="1">
                          <button class="btn btn-primary">ค้นหา</button>
                        </div>
                        <div class="form-text text-danger">คุณสามารถค้นหา : หัวข้อข่าว ,เนื้อหาข่าว</div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </form>

              <form action="sql/insert-news.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="add-news">
                  <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                      <div class="modal-header bg-success text-light">
                        <h4 class="modal-title">สร้างข่าวสาร</h4>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group m-3">
                          <label for="" class="form-label">หัวเรื่องข่าวสาร</label>
                          <input class="form-control" type="text" name="topic" required></input>
                        </div>
                
                        <div class="form-group m-3">
                          <label for="" class="form-label">รายละเอียด</label>
                          <textarea class="form-control" name="detail" required></textarea>
                        </div>
                        <div class="input-group me-3">
                          <label for="" class="input-group-text">เลือกรูปปก</label>
                          <input type="file" name="file_pic" class="form-control" required>
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
              <!-- end modal add news -->

              <h4 class="bg-primary card-header mb-2 text-light">ข่าวสารทั้งหมด</h4>
              <table class="table table-hover">
                <thead>
                  <tr class="table-primary">
                    <th class="text-center">#</th>
                    <th scope="col">หัวเรื่องข่าว</th>
                    <th scope="col">ผู้สร้าง</th>
                    <th scope="col">เยี่ยมชม</th>
                    <th scope="col">ตำสั่ง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                if (isset($_SESSION['search_news'])) {
                  $search_news=$_SESSION['search_news'];
                $sql = "SELECT * FROM news,users where  (news_topic LIKE '%$search_news%' or news_topic_detail LIKE '%$search_news%') and users.id_user=news.id_user ORDER by id_news DESC";
                  
                }else{
                $sql = "SELECT * FROM news,users where users.id_user=news.id_user ORDER by id_news DESC";

                }

                // ตึงข้อมูล
                $result=mysqli_query($conn,$sql);
                // นับข้อมูล
                $count=mysqli_num_rows($result);
                // ไม่พบข้อมูล
                if ($count == 0 ) { ?>
                  <tr>
                    <td class="table-danger text-center" colspan="5" >ไม่พบข้อมูล </td>
                  </tr>
                <?php }

                $i=1;


                  while( $row = mysqli_fetch_object($result)){ 
                      
                   ?>
                  <tr>
                    <td class="text-center table-info"><?php echo $i++; ?></td>
                    <td class="table-info"><?php echo $row->news_topic; ?></td>
                    <td class="table-info"><?php echo $row->fname." ".$row->lname; ?></td>
                    <td class="table-info"><?php echo $row->news_view." คร้ัง"; ?></td>
                    
                    <td class="table-info">
                      <a href="admin-show-news-detail.php?id_news=<?php echo $row->id_news;?>" class="btn btn-primary btn-sm">ดู</a>
                      <a href="#edit_news_<?php echo $i;?>" data-bs-toggle="modal" class="btn btn-warning btn-sm">แก้ไข</a>
                      <a href="sql/del-news.php?id=<?php echo $row->id_news;?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล ?');">ลบ</a>
                    </td>
                  </tr>

                  <div class="modal fade" id="show_news_<?php echo $i;?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">เนื้อหาข่าว</h4>
                          <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">

                          <div class="form-group">
                            <label for="" class="form-label">หัวเรื่องข่าวสาร</label>
                            <input class="form-control" disabled type="text" value="<?php echo $row->news_topic; ?>">
                          </div>
                  
                          <div class="form-group">
                            <label for="" class="form-label">รายละเอียด</label>
                            <textarea class="form-control" disabled name="detail"><?php echo $row->news_topic_detail; ?></textarea>
                          </div>
                          <div class="mt-3">
                            <label for="" class="input-group-text">รูปภาพ</label>
                            <img src="../uploads/<?php echo $row->news_pic; ?>" class="w-100">
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <form action="sql/edit-news.php" method="post" enctype="multipart/form-data">
                  <div class="modal fade" id="edit_news_<?php echo $i;?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header bg-warning">
                          <h4 class="modal-title">เนื้อหาข่าว</h4>
                          <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">

                          <div class="form-grou">
                            <label for="" class="form-label">หัวเรื่องข่าวสาร</label>
                            <input class="form-control" disable type="text" name="news_topic" value="<?php echo $row->news_topic; ?>">
                          </div>
                  
                          <div class="form-grou">
                            <label for="" class="form-label">รายละเอียด</label>
                            <textarea class="form-control" name="news_detail"><?php echo $row->news_topic_detail; ?></textarea>
                          </div>
                          <div class="input-group mt-3">
                            <label for="" class="input-group-text">รูปภาพ</label>
                            <input type="file" name="file_pic" class="form-control">
                            <input type="hidden" name="pic_db" value="<?php echo $row->news_pic; ?>">
                          </div>
                          <div class="mt-3">
                            <img src="../uploads/<?php echo $row->news_pic; ?>" class="w-100">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_news" value="<?php echo $row->id_news; ?>">
                          <button class="btn btn-danger" type="button" data-bs-dismiss="modal">ปิด</button>
                          <button type="submit" class="btn btn-warning">แก้ไข</button>
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




  <script src="../js/jquery-3.6.1.min.js"></script>
  <?php include '../alert-modal.php'; ?>
  </body>
</html>
<?php 
//session_destroy();

?>