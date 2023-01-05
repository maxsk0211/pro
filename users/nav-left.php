<div class="card text-light d-none d-lg-block" style="background-color: rgb(36, 113, 163);" >
	<div class="card-body">
		<h4 class="card-header text-center">ระดับผู้ใช้งาน :  
			<p class="badge bg-warning">ผู้ใช้งานทั่วไป</p>
		</h4>
	    <div class="d-flex flex-column align-items-center text-center">
        	<img class="rounded-pill mt-5" width="80%" src="../uploads/<?php echo $row->pic;?>">

	          <p class="form-label badge bg-success fs-5 font-weight-bold mt-3"><?php echo $row->fname." ".$row->lname; ?></p>
	          <p class="form-label badge fs-6 mt-2 <?php if($row->user_level==1){echo "bg-danger";}else{echo "bg-warning";} ?>"><?php echo $row->email; ?></p>

        	<div class="mt-5">
            	<a href="edit-admin.php" class="btn btn-warning rounded-pill">แก้ไขข้อมูลส่วนตัว</a>
          	</div>
          	<div class="mt-2">
          		<a href="admin-contact.php" class="btn btn-success rounded-pill">สนทนา</a>
          	</div>
	        <div class="mt-1">
	            <a href="../logout.php" class="btn btn-danger rounded-pill">ออกจากระบบ</a>
	        </div>
        </div>
	</div>
</div>