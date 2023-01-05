<?php 
	require('../dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap - Prebuilt Layout</title>


       <link href="../css/bootstrap.min.css" rel="stylesheet"> 

	    <script src="../js/bootstrap.js"></script> 



</head>
  <body class="bg-secondary" style="height: 5000px; padding-top: 70px;">
  	<!-- main container -->
  <div class="container-fluid">
	

	<?php include 'nav-user.php'; ?>


    </div>
<!-- End container -->

  <script src="../js/jquery-3.6.1.min.js"></script> 

  <?php include '../alert-modal.php'; ?>


</body>
</html>



