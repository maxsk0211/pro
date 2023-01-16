<div class="modal fade" id="ok">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h4 class="modal-title text-center text-light">การแจ้งเตือน</h4>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-success h5 text-center"><?php if(isset($_SESSION['ok'])){echo $_SESSION['ok'];} ?></div>
				<button class="btn btn-danger float-end" data-bs-dismiss="modal">ปิด</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="error">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h4 class="modal-title text-center">การแจ้งเตือน</h4>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger text-center h3"><?php if(isset($_SESSION['error'])){echo $_SESSION['error']; }?></div>
				<button class="btn btn-danger float-end" data-bs-dismiss="modal">ปิด</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="error_login">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h4 class="modal-title text-center">การแจ้งเตือน</h4>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger text-center h3"><?php if(isset($_SESSION['error_login'])){echo $_SESSION['error_login']; }?></div>
				<a href="#login" class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-dismiss="modal">ปิด</a>
			</div>
		</div>
	</div>
</div>


  <script type="text/javascript">

	//แจ้ง สำเร็จ
	<?php if(isset($_SESSION['ok'])){ ?>
		$(window).on('load', function() {
	    	$('#ok').modal('show');
	    });
	<?php unset($_SESSION['ok']); } ?>

	//แจ้ง Error 
	<?php if(isset($_SESSION['error'])){ ?>
		$(window).on('load', function() {
	    	$('#error').modal('show');
	    });
	<?php unset($_SESSION['error']); } ?>
	
	//แจ้ง error login
	<?php if(isset($_SESSION['error_login'])){ ?>
		$(window).on('load', function() {
	    	$('#error_login').modal('show');
	    });
	<?php unset($_SESSION['error_login']); } ?>

	
</script>