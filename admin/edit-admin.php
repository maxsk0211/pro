<?php  
      session_start(); 
include 'chk-session.php';
	require('../dbcon.php');
	$id_user=$_SESSION['id_user'];
	$sql="SELECT * FROM users WHERE id_user = '$id_user'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_object($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขข้อมูลส่วนตัว</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/bootstrap.js"></script> 
		<style type="text/css">

		</style>
  </head>
  <body style="padding-top: 70px;background: rgb(100, 40, 120);">
	  <div class="container-fluid">
     <?php include 'nav-admin.php'; ?> 
     <div class="row justify-content-center">
     	<div class="col-md-3">
     		<?php include 'nav-left.php'; ?>
     	</div>
     	<div class="col-md-9">
     		<div class="card">
     			<div class="card-body">
     				<form action="sql/edit-admin-me.php" method="post" enctype="multipart/form-data">
     					
     				<div class="p-3">
				                <div class=" mb-3">
				                    <h4 class="alert alert-danger">แกัไขบัญชีส่วนตัว</h4>
				                </div>
				                <div class="row mt-2">
				                    <div class="col-md-6">
				                    	<label class="form-label">ชื่อ</label>
				                    	<input type="text" class="form-control" name="fname" value="<?php echo $row->fname;?>"  require>
				                    </div>
				                    <div class="col-md-6">
				                    	<label class="form-label">นามสกุล</label>
				                    	<input type="text" class="form-control" name="lname" value="<?php echo $row->lname;?>"   require>
				                    </div>
				                </div>
				                <div class="row mt-2">
				                    <div class="col-md-6">
				                    	<label class="form-label">ชื่อบัญชี</label>
				                    	<input type="text" class="form-control" name="usernames" value="<?php echo $row->usernames;?>"  require>
				                    </div>
				                    <div class="col-md-6">
				                    	<label class="form-label">รหัสผ่าน</label>
				                    	<input type="password" class="form-control" name="password" value="<?php echo $row->passwords;?>"   require>
				                    </div>
				                </div>
				                
				                    <div class="form-group mt-2">
				                    	<label class="form-label">วันเกิด</label>
				                    	<input type="date" class="form-control" name="birthday"  value="<?php echo $row->birthday; ?>"  require>
				                    </div>

				                    <div class="form-group mt-2">
				                    	<label class="form-label">เบอร์โทร</label>
				                    	<input type="text" class="form-control" name="tel" maxlength="2"  value="<?php echo $row->tel;?>"  require>
				                    </div>

				                    <div class="form-group mt-2">
				                    	<label class="form-label">ที่อยู่</label>
				                    	<textarea class="form-control" name="address"  require><?php echo $row->address; ?></textarea>
				                    </div>

														<div class="form-group mt-2">
															<label for="" class="form-label">เลือกระดับผูเใช้งาน</label>
															<select name=""disabled class="form-select">
																<option value="" selected >ผู้ดูแลระบบ</option>
															</select>
														</div>

														<div class="form-group mt-3">
															<label for="" class="form-label">เลือกรูปโปไฟล์</label>
															<input type="file" class="form-control" name="file_pic">
														</div>


				                <div class="mt-5 text-center">
				                	<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'];?>">
				                	<input type="hidden" name="pic_db" value="<?php echo $row->pic;?>">
				                	<button class="btn btn-success" type="submit">บันทึกข้อมูล</button>
				                </div>
				            </div>
     				</form>

     			</div>
     		</div>
     	</div>
     	<!-- col-md-9 -->
     </div>
     <!-- row -->




		  	</div>
		  </div>
    </div>
	  
	 
	  
	  
	  
  <script src="../js/jquery-3.6.1.min.js"></script>
  <?php include '../alert-modal.php'; ?>
  </body>
</html>
