<?php
	// require_once '/connectDB.php';

    require_once('connect.php'); // This is line 38

	if (isset($_POST['inputUsername'])){
		
		$inputUsername = $_POST['inputUsername'];
		$inputPassword = $_POST['inputPassword'];
		$inputCfPassword = $_POST['inputCfPassword'];

		
		if ($inputCfPassword == $inputPassword) {
			$md5pass = md5($inputPassword);
		
		
		$sql = "INSERT INTO tb_user ( user_name, user_pass) VALUES ( '$inputUsername', '$md5pass')";
		echo $sql;
		
		if($conn->query($sql)){
			echo "สมัครสมาชิกสำเร็จ";
		}else{
			echo "สมัครสมาชิกผิดพลาด";
		}
		
	}
}
?>