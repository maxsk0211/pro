
<!-- Modal -->
<div class="modal fade" id="login" aria-labelledby="loginLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginLabel">การเข้าสูระบบ</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- เปิด Form -->
       <form action="<?php echo $FormAction; ?>" method="POST">
        <div class="modal-body">

          <!-- พื้นที่ของ input box -->
      			<div class="form-group">
      				<label>ชื่อผู้ใช้งาน</label>
      				<input type="text" name="usernames" class="form-control">
      			</div>

    		  	<div class="form-group">
    				  <label>รหัสผ่าน</label>
              <input type="password" name="passwords" class="form-control">
    		  	</div>

            <input type="hidden" name="login" value="login" id="login">
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-success">เข้าสูระบบ</button>
        </div>

      </form>
      <!-- ปิด Form -->
    </div>
  </div>
</div>

