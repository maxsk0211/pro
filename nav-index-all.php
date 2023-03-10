	<nav class="navbar navbar-expand-lg navbar-dark p-3 fixed-top" id="headerNav" style="background-color: rgb(23,165, 137);">
  <div class="container-fluid">
    <a class="navbar-brand d-block d-lg-none" href="index.php">
      <img src="img/logo.png" height="50" />
    </a>
    <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto ">

		      <div class="nav-item m-2 mt-2">
		      	<a href="show-all-package.php" class="btn btn-danger rounded-pill">แพ็คเกจ</a>
					</div>
		      <div class="nav-item m-2 mt-2">
		      	<a href="show-all-news.php" class="btn btn-primary rounded-pill">ข่าวสาร</a>
					</div>
					<div class="nav-item m-2 mt-2">
		      	<a href="show-all-webboard.php" class="btn btn-info rounded-pill">กระดาษสนทนา</a>
		      </div>

        <li class="nav-item d-none d-lg-block navbar-brand">
          <a class="nav-link mx-2" href="index.php">
            <img src="img/logo.png" height="50" />
          </a>
        </li>

        	<div class="nav-item m-2 mt-2">
		      	<a href="show-all-report.php" class="btn btn-secondary rounded-pill">แบบสอบถาม</a>
		      </div>
		      <div class="nav-item m-2 mt-2">
		      	<a href="show-contact.php" class="btn btn-warning rounded-pill">ติดต่อ</a>
		      </div>
		      <div class="float-end">

		        <button class="btn btn-success rounded-pill m-2 mt-2" type="button" data-bs-toggle="modal" data-bs-target="#login">ระบบสมาชิก</button>


	        </div>


      </ul>
    </div>
  </div>
</nav>
<br>



<!-- start Modal Login and register -->

	<div class="modal fade" id="login">
	  <div class="modal-dialog modal-dialog-centered modal-lg">
	    <div class="modal-content">
	      <div class="modal-header bg-success">
	        <h1 class="modal-title fs-5 text-light">ระบบสมาชิก</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	      </div>
	      <div class="modal-body alert ">

				  	<div class="row">
				  		<div class="col-md-6">

				  			<form action="sql/chk-login.php" method="post">
				  				<h4 class="text-center text-light bg-primary rounded-pill modal-title">เข้าสู่ระบบ</h4>
					       	<div class="form-group my-2">
					       		<label class="form-label">ชื่อผู้ใช้ หรือ เบอร์โทร</label>
					       		<input type="text" class="form-control" name="usernames" required></input>
					       	</div>
					       	<div class="form-group my-2">
					       		<label class="form-label">รหัสผ่าน</label>
					       		<input type="password" class="form-control" name="passwords" required></input>
					       	</div>
					       	<div class="d-grid gap-2 mt-3">
					       		<button type="submit" class="btn btn-success">เข้าสูระบบ</button>
					       	</div> 
					       	<hr>
								</form>

				  		</div> 
				  		<div class="col-md-6">
				  				<h4 class="text-center text-light bg-warning rounded-pill modal-title">สมัครสมาชิก</h4>
				  					<form action="sql/insert-users.php" method="post" enctype="multipart/form-data">
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


		          
                <script type="text/javascript">
									 function chk_pass(){

									    const pass1 = document.querySelector('input[name=pass1]');
									    const pass2 = document.querySelector('input[name=pass2]');
									    if (pass1.value===pass2.value) {
									        document.getElementById('message').style.color = 'green';
									        document.getElementById('message').innerHTML = 'รหัสผ่านตรงกัน';
									        document.getElementById("register").disabled = false;
									    }else{
									        document.getElementById('message').style.color = 'red';
									        document.getElementById('message').innerHTML = 'รหัสผ่านไม่ตรงกัน';
									        document.getElementById("register").disabled = true;
									    }
									  }

									</script>
									
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

										<div class="form-group mt-3">
											<label for="" class="form-label">เลือกรูปโปไฟล์</label>
											<input type="file" class="form-control" name="file_pic" required>
										</div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-warning" id="register" disabled>สมัครสมาชิก</button>
										</div>
									</form>
				  		</div>
				  	</div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- End Modal Login and register -->
<?php 
	$sql="UPDATE web_history_count SET web_count = (web_count + 1) WHERE id_web_count = 1";
	mysqli_query($conn,$sql);

 ?>

	<!--  Navbar  top-->
    <nav class="navbar fixed-bottom" style="background-color: rgb(23,165, 137);"> 
			<div class="mx-auto">
				<strong>Copyright - Happy Care Nursing Home - บ้านมีสูข / โทร . 075-611-797 / Line official : @HappyCareNursingHome </strong>
				<br>
				<div class="text-center">
					<?php 
					$sql="SELECT * FROM web_history_count WHERE id_web_count = 1";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_object($result);
					 ?>
					<strong>จำนวนผู้เข้าชม <span class="badge bg-danger"><?php echo $row->web_count;?></span> ครั้ง</strong>
				</div>
				
			</div>
    </nav>
<!--  Navbar top-->