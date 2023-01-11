<?php 
	session_start();
	require('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Happy Care Nursing Home - บ้านมีสูข</title>
       <link href="css/bootstrap.min.css" rel="stylesheet"> 
	    <script src="js/bootstrap.js"></script> 
</head>
  <body style="height: 5000px; padding-top: 50px;background: rgb(100, 40, 140);">
  	<!-- main container -->
    <div class="container-fluid">
		  <?php include 'nav-index-all.php'; ?>
      <div class="row my-5 justify-content-center">
        <div class="col-md-12 col-lg-8 col-sm-10">
          <div class="alert bg-primary text-center h4 text-light rounded-pill border-4 border-light">News - ข่าวสาร</div>

        <div class="row my-2 bg-light p-4">
          <div class="form-group my-2">
            <a href="#search-news" class="btn btn-primary btn-lg rounded-pill float-end" data-bs-toggle="modal">ค้นหา</a>
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
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">ปิด</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </form>
          <?php 

              if (isset($_SESSION['search_news'])) {
                  $search_news=$_SESSION['search_news'];
                $sql_show_new = "SELECT * FROM news,users where users.id_user=news.id_user and news_topic LIKE '%$search_news%'";
                  
                }else{
                $sql_show_new = "SELECT * FROM news,users where users.id_user=news.id_user";

                }

          $result_show_new=mysqli_query($conn,$sql_show_new);
          while($row_show_new=mysqli_fetch_object($result_show_new)){ ?>
            <div class="col-sm-4 mt-2">
              <div class="card alert-info">
                <img src="uploads/<?php echo $row_show_new->news_pic;?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row_show_new->news_topic;?></h5>
                  <p class="card-text"><?php echo $row_show_new->news_topic_detail;?></p>
                  <a href="show-news-detail.php?id_news=<?php echo $row_show_new->id_news; ?>" class="btn btn-success float-end">ดูเพิ่มเติม</a>
                </div>
              </div>  
            </div>

          <?php } ?>

                          
        </div>
          <!-- row -->
        </div>
      </div>
  </div>
</body>
</html>