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

          <?php 
          $sql_show_new="SELECT * FROM news ORDER by id_news DESC";
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