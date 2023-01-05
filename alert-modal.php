<div class="modal fade" id="ok">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h4 class="modal-title text-center">การแจ้งเตือน</h4>
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
				<!-- <a href="#login" class="btn btn-danger float-end" data-bs-toggle="modal">ปิด</a> -->
				<button class="btn btn-danger float-end" data-bs-dismiss="modal">ปิด</button>
			</div>
		</div>
	</div>
</div>
<!-- hi -->
  <script type="text/javascript">
  	// แจ้ง login ผิดพลาด
	<?php  if (isset($_GET["log"]) && ($_GET["log"]==1)) { ?>
	    $(window).on('load', function() {
	    	$('#login').modal('show');
	        $('#login_error').modal('show');
	    });
	<?php } ?>

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


	
</script>