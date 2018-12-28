<!-- login.html -->
<!DOCTYPE html>
<html>
<?php 
	require_once('structure/head.php');
 ?>
<body>
	
	<div class="container">
		<div class="form-wrap mt-65">
			
			<div class="row mt-4 shadow-lg pt-4 pb-4" >
				<div class="col-12 text-center">
					<h4><strong>เข้าสู่ระบบ</strong></h4>
				</div>
				<div class="col-12">
					<form id="loginwithemail">
						<div class="form-group mt-4">
							<label for="inputUsername">Your username</label>
							<input type="email" class="form-control bg-light" id="inputUsername" placeholder="ชื่อผู้ใช้งาน">
						</div>
					
						<div class="form-group position-relative">
							<label for="inputPassword">Your password</label>
							<span class="position-absolute" style="right: 0;">
								<a href="#" class="text-blue">
									forget password
								</a>
							</span>
							<input type="password" class="form-control bg-light" id="inputPassword" placeholder="••••••••">
						</div>
						<div class="form-check custom-control">
							<input type="checkbox" class="form-check-input d-none" id="inputRemember">
							<label class="checkmark" for="inputRemember"></label>
							<label class="form-check-label" for="inputRemember">จดจำรหัสผ่าน</label>
						</div>
						<div class="text-center mt-4 mb-4">
							<button id="btn-login" class="btn btn-danger rounded pl-4 pr-4" style="background-color: #2f3638 !important; border-color: #76b6c2">เข้าสู่ระบบ</button>
						</div>
					</form>
				</div>
			</div>
		</div>
			<div class="row text-center mt-4 mb-65">
				<div class="col-12">
					ยังไม่มีบัญชี ? <a href="register.php" class="text-danger" style="color: #76b6c2 !important;">สมัครสมาชิก</a>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript"> 
		$('#btn-login').on('click',function(){

			var user = $('#inputUsername').val();
			var password = $('#inputPassword').val();

			$.ajax({
				type: "POST",
				url: "structure/api_login.php",
				data: {
					
					'inputUsername': user,
					'inputPassword': password,
					
				},
				success: function(data) {
					alert(data);
          window.location.href = "index.php";
		      },
		  });
		});
		
	 </script>
</body>