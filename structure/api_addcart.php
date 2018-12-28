<?php
	// require_once '/connectDB.php';

    require_once('connect.php'); // This is line 38
    session_start();

	if (isset($_POST['movieid'])){
		
		$inputmid = $_POST['movieid'];
		$user_id = $_SESSION['user'];
		
		
		
		$sql = "INSERT INTO tb_cart ( user_id ,movie_id) VALUES ( '$user_id', '$inputmid')";
		echo $sql;
		if($conn->query($sql)){
			echo "เข้าตะกร้าสำเร็จ";
		}else{
			echo "ผิดพลาด";
		}
		
	}

?>