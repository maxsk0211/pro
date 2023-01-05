	<nav class="navbar navbar-expand-lg navbar-dark p-3 fixed-top" id="headerNav" style="background-color: rgb(23,165, 137);">
  <div class="container-fluid">
    <a class="navbar-brand d-block d-lg-none" href="#">
      <img src="img/logo.png" height="50" />
    </a>
    <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto ">

		      <div class="nav-item m-2 mt-2">
		      	<a href="#show_promotion" class="btn btn-danger rounded-pill">โปรโมชั้น</a>
					</div>
		      <div class="nav-item m-2 mt-2">
		      	<a href="#show_news" class="btn btn-primary rounded-pill">ข่าวสาร</a>
					</div>
					<div class="nav-item m-2 mt-2">
		      	<a href="#show-webboard" class="btn btn-light rounded-pill">กระดาษสนทนา</a>
		      </div>

        <li class="nav-item d-none d-lg-block navbar-brand">
          <a class="nav-link mx-2" href="index.php">
            <img src="img/logo.png" height="50" />
          </a>
        </li>

        	<div class="nav-item m-2 mt-2">
		      	<a href="#show-report" class="btn btn-secondary rounded-pill">แบบสอบถาม</a>
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
	      <div class="modal-header">
	        <h1 class="modal-title fs-5">ระบบสมาชิก</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	      </div>
	      <div class="modal-body">

				  	<div class="row">
				  		<div class="col-md-6">

				  			<form action="sql/chk-login.php" method="post">
				  				<h4 class="text-center alert-success rounded-pill modal-title">เข้าสู่ระบบ</h4>
					       	<div class="form-group my-2">
					       		<label class="form-label">E-mail</label>
					       		<input type="text" class="form-control" name="email"></input>
					       	</div>
					       	<div class="form-group my-2">
					       		<label class="form-label">Password</label>
					       		<input type="password" class="form-control" name="passwords">
					       	</div>
					       	<div class="d-grid gap-2 mt-3">
					       		<button type="submit" class="btn btn-success">เข้าสูระบบ</button>
					       	</div> 
					       	<hr>
								</form>

				  		</div> 
				  		<div class="col-md-6">
				  				<h4 class="text-center alert-warning rounded-pill modal-title">สมัครสมาชิก</h4>
				  					<form action="sql/insert-users.php" method="post" enctype="multipart/form-data">
                    	<div class="form-group mt-2">
                    		<label class="form-label">Name</label>
                    		<input type="text" class="form-control" name="fname" required>
                    	</div>

                    	<div class="form-group mt-2">
                    		<label class="form-label">Surname</label>
                    		<input type="text" class="form-control" name="lname" required > 
                    	</div>
                                    
		                	<div class="form-group mt-2">
	                    	<label class="form-label">E-Mail</label>
	                    	<input type="email" class="form-control" name="email" required>	
		                	</div>
		                   
		                   <div class="row mt-2">
		                   		<div class="col-md-6">
		                   			<label class="form-label">Password</label>
		                    		<input type="password" class="form-control" name="pass1" required onkeyup="chk_pass()">
		                   		</div>
		                   		<div class="col-md-6">
		                   			<label class="form-label">confirm Password</label>
		                    		<input type="password" class="form-control" name="pass2" required onkeyup="chk_pass()">
		                   		</div>
		                   		<span id="message"></span>
		                   </div>


		          
                
                    <div class="form-group mt-2">
                    	<label class="form-label">Birthday</label>
                    	<input type="date" class="form-control" name="birthday" required>
                    </div>

                    <div class="form-group mt-2">
                    	<label class="form-label">Tel</label>
                    	<input type="text" class="form-control" name="tel" maxlength="10" required>
                    </div>

                    <div class="form-group mt-2">
                    	<label class="form-label">Address</label>
                    	<textarea class="form-control" name="address" required></textarea>
                    </div>

										<div class="input-group mt-3">
											<label for="" class="input-group-text">เลือกรูปโปไฟล์</label>
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

	<!--  Navbar  top-->
    <nav class="navbar fixed-bottom" style="background-color: rgb(23,165, 137);"> 
			<div class="containero">
				<strong>Copyright - Happy Care Nursing Home - บ้านมีสูข / โทร . 075-611-797 / Line official : @HappyCareNursingHome</strong>
				
			</div>
    </nav>
<!--  Navbar top-->


<script type="text/javascript">
 function chk_pass(){

    const pass1 = document.querySelector('input[name=pass1]');
    const pass2 = document.querySelector('input[name=pass2]');
    if (pass1.value===pass2.value) {
        pass2.setCustomValidity('');
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'รหัสผ่านเหมือนกัน';
        document.getElementById("register").disabled = false;
    }else{
        pass2.setCustomValidity('กรุณาใส่ใหม่อีกครั้ง');
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'รหัสผ่านไม่ตรงกัน';
        document.getElementById("register").disabled = true;
    }
  }


</script>