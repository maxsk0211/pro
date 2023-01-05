<?php 
if(!isset($_SESSION)){
	session_start();
}
require('dbcon.php');
$FormAction = $_SERVER['PHP_SELF'];
//echo $_POST['Usernames']=="root";

if ((isset($_GET['login'])) && ($_GET['login'] == "login" )) { 
	//echo $_GET['login']; 
	 $usernames=$_GET['usernames'];
	 $passwords=$_GET['passwords'];
	 $sql = "SELECT * FROM users WHERE usernames = '$usernames' AND passwords = '$passwords'";
	
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
//	echo $row;
//	echo "<br>";
	if($count > 0){
//		echo "ข้อมูลถูกต้อง";
		$show_users=mysqli_fetch_object($result);
		$_SESSION['se_user']=$show_users->usernames;
		$_SESSION['se_pass']=$show_users->passwords;
		$_SESSION['se_fname']=$show_users->fname;
		$_SESSION['se_lname']=$show_users->lname;
		$_SESSION['se_user_lv']=$show_users->user_level;
		header("location:index.php");
	}else{
		echo mysqli_error($conn);
		//mysqli_error()
	}
}
mysqli_close($conn);

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap - Prebuilt Layout</title>

    <!-- Bootstrap -->
     <link href="css/bootstrap.min.css" rel="stylesheet"> 
<!--    <link href="css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">-->
	  <script src="js/bootstrap.js"></script>
</head>
  <body class="bg-secondary" style="height: 1500px;">
      <div class="container-fluid">
		<!--  start Nav     -->
	    <nav class="navbar navbar-dark bg-info fixed-top"> 
		<!--	container-fluid เพิ่ม		-->
			<div class="container-fluid">
		<!--	container-fluid เพิ่ม		-->
			<a class="navbar-brand text-danger" href="#"><span class="badge text-bg-primary rounded-pill "><h5>สังคมผู้สูงอายุ</h5></span></a>
		    <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
		    <div class="collapse navbar-collapse " id="navbarSupportedContent1">
		      <ul class="navbar-nav mr-auto">
		        <li class="nav-item "> <a class="nav-link text-light" href="#">Home</a> </li>
		        <li class="nav-item"> <a class="nav-link text-light" href="#">Link</a> </li>
		        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </a>
		          <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a>
		            <div class="dropdown-divider"></div>
		            <a class="dropdown-item" href="#">Something else here</a> </div>
	            </li>
		       
	          </ul>
		      <form class="form-inline my-2 my-lg-0 btn-danger">
				  <div class="form-group">
						<!-- Button trigger modal Login -->
						<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#login">
						  Login
						</button>
							  
						<!-- Button trigger modal register -->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#register">
						  register
						</button>
			  </div>


				  <?php include 'login.php'; ?>
				  <?php include 'register.php'; ?>
	          </form>
	      </div>
	<!--	container-fluid	ปิด		-->
		  </div>
	<!-- 	container-fluid	ปิด   -->
  </nav>
	<!-- end nav	-->
<!--		  -->
		  
		  
<div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="carousel" style="background-color: grey; margin-top: 110px">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active"> 
		<img class="d-block mx-auto w-100 img-fluid" src="https://cdn.pixabay.com/photo/2016/05/24/16/48/mountains-1412683_960_720.png" alt="First slide">
      <div class="carousel-caption">
        <h5>First slide Heading</h5>
        <p>First slide Caption</p>
      </div>
    </div>
    <div class="carousel-item"> 
		<img class="d-block mx-auto w-100 img-fluid" src="https://cdn.pixabay.com/photo/2012/08/27/14/19/mountains-55067_960_720.png" alt="Second slide">
      <div class="carousel-caption">
        <h5>Second slide Heading</h5>
        <p>Second slide Caption</p>
      </div>
    </div>
    <div class="carousel-item"> 
		<img class="d-block mx-auto w-100 img-fluid" src="https://cdn.pixabay.com/photo/2017/01/19/23/46/church-1993645_960_720.jpg" alt="Third slide">
      <div class="carousel-caption">
        <h5>Third slide Heading</h5>
        <p>Third slide Caption</p>
      </div>
    </div>
  </div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-bs-slide="prev"> 
	  <span class="carousel-control-prev-icon" aria-hidden="true"></span> 
	  <span class="sr-only">Previous</span> 
	</a> 
	<a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-bs-slide="next"> 
		<span class="carousel-control-next-icon" aria-hidden="true"></span> 
		<span class="sr-only">Next</span> 
	</a> 
</div> 
	<br>
	<div class="d-grid gap-2">
	  <button class="btn btn-primary" type="button">Button</button>
	  <button class="btn btn-primary" type="button">Button</button>
	</div>
		  
		  
		  <?php for($i = 0 ; $i < 5 ; $i++ ) {?>
<div class="row g-0 bg-light position-relative my-4">
  <div class="col-md-6 mb-md-0 p-md-4">
    <img src="https://cdn.pixabay.com/photo/2022/06/13/14/58/road-7260175_960_720.jpg" class="w-100" alt="...">
  </div>
  <div class="col-md-6 p-4 ps-md-0">
    <h5 class="mt-0">Columns with stretched link</h5>
    <p>Another instance of placeholder content for this other custom component. It is intended to mimic what some real-world content would look like, and we're using it here to give the component a bit of body and size.</p>
    <a href="#" class="stretched-link btn btn-primary float-end">ดูเพิ่มเติม...</a>
  </div>
</div>
		  
		  <?php }?>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <?php echo $_SESSION['se_fname']." ".$_SESSION['se_lname'] ; ?>
		  
		  
		  
      </div>


    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <!-- <script src="js/bootstrap.min.js"></script> -->
  <script src="js/jquery-3.4.1.min.js"></script>
<!--    <script src="js/popper.min.js"></script>-->
<!--    <script src="js/bootstrap-4.4.1.js"></script>-->
  
</body>
</html>



