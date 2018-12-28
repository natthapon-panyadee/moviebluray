<?php

	session_start();
	require_once('connect.php');
if (isset($_SESSION['user'])) {
	$sql = "DELETE FROM tb_cart WHERE user_id = ".$_SESSION['user'];
	echo $sql;
	if($conn->query($sql)){
		header("location:../cart.php");
			echo "ลบเร็จ";
		}else{
			echo "ผิดพลาด";
		}
		
}
	
?>