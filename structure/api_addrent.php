<?php
	// require_once '/connectDB.php';

    require_once('connect.php'); // This is line 38
    session_start();

	if (isset($_POST['inputcid'])){
		
		$inputcid = $_POST['inputcid'];
		
		
		
		
		$sql = "INSERT INTO tb_rent ( cart_id ) VALUES ( '$inputcid')";
		echo $sql;
		if($conn->query($sql)){
			echo "จองาสำเร็จ";
		}else{
			echo "ผิดพลาด";
		}
		
	}

?>