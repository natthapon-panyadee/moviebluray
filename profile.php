<!-- usermanage-info-edit.html -->
<!DOCTYPE html>
<html>
<?php 
require_once('structure/head.php');

?>
<body>
	<?php 
	require_once('structure/header.php');
	?>
	<div class="container ">
		
		
		<div class="row mt-4">

			<!-- title -->
			<div class="col-12">
				<h4 class="border-bottom-5 pb-2"><strong>ข้อมูลส่วนตัว</strong></h4>
			</div><!-- title -->
			<?php 

			if (isset($_SESSION['user'])) {
				$sql = "SELECT * FROM user WHERE user_id = ".$_SESSION['user'];
			
				if($result=$conn->query($sql)){
					if($result->num_rows>0){
						while($row = $result->fetch_assoc()){
							?>
							<!-- profile image -->
							<div class="col-12 mt-2">
								
								<div class="row">
									<div class="col-12 text-center">
										<div class="icon-profile mx-auto">
											<img src="asset/<?php
											if($row['image']){
												echo 'upload2/'.$row['image'];
												}else{
													echo 'images/user-default.jpg';
												}
												?>" class="img-fluid rounded-circle overflow-hidden">
											</div>

											<div class="mt-4">
												<label class="text-danger cursor-pointer" for="ipFile">
													<strong>อัพโหลดรูปภาพ</strong>
												</label>
												<input type="file" id="uploadfile" name="uploadfile">
											</div>
										</div>
									</div><!-- row -->
									
								</div><!-- profile image -->
								
				

				<!-- profile info -->
				<div class="col-12 mt-2">
					<div class="row m-0  ">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label class="text-muted" for="inputFullName">ชื่อ-นามสกุล</label>
								<input type="text" class="form-control" name="inputFullName" id="inputFullName" value="<?php echo $row['fullname'] ?>" placeholder="ชื่อจริง">
							</div>
						</div>

						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label class="text-muted" for="ipPhone">รหัสผ่าน</label>
								<input type="text" class="form-control" name="inputPassword" id="inputPassword"  placeholder="xxxxxxx">
							</div>
						</div>
					</div><!-- row -->
				</div><!-- profile info -->

				<?php 
			}
		}
	}
}
?>



				<!-- profile button -->
				<div class="col-12 mt-4 mb-65">
					<div class="row">
						<div class="col-12 col-sm-4 offset-sm-2">
							<a href="usermanage-info.html" class="btn btn-outline-danger text-danger form-control"  style="background-color: #fff !important; border-color: #76b6c2!important; color: #2f3638!important;">ยกเลิก</a>
						</div>
						<div class="col-12 col-sm-4 mt-2 mt-sm-0">
							<button class="btn btn-danger text-light form-control  " id="btn-post" style="background-color: #2f3638 !important; border-color: #76b6c2">ยืนยัน
							</button>
						</div>
					</div><!-- row -->
				</div><!-- profile button -->

			</div><!-- row -->
			
		</div>
		<script type="text/javascript">
		$('#btn-post').on('click',function(){
			var name = $('#inputFullName').val();
			var password = $('#inputPassword').val();
		

			var formData = new FormData();

		 	formData.append('inputFullName',name);
		 	
if(password!= '' ){
		 	formData.append('inputPassword',password);

}
		 	if($('input#uploadfile')[0].files[0]){
		 		formData.append('uploadfile', $('input#uploadfile')[0].files[0]);
		 		formData.append('iuploadfile',1);
		 	}else{
		 		formData.append('iuploadfile',0);
		 	}


		
		$.ajax({
      		type: "POST",
      		mimeTypes:"multipart/form-data",
      		url: "structure/api_updateprofile.php",
      		contentType: false,
    		processData: false,
      		data: formData,
      		success: function(data) {
      			alert(data);
				window.location.href = "profile.php";
      		},
      		error: function(xhr, status, error) {
      			var err = eval("(" + xhr.responseText + ")");
      			alert(err.Message);

      		}
      	});



	});


	</script>




		<?php 
		require_once('structure/footer.php');
		?>
	</body>
	</html>
