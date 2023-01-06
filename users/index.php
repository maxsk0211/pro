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

<div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
  </div>
  <div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade  " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">..1.</div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...2</div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">..3.</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">..4.</div>
  </div>
</div>


  <script src="../js/jquery-3.6.1.min.js"></script> 

  <?php include '../alert-modal.php'; ?>


</body>
</html>



