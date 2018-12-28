<?php 	
		require_once('connect.php');
		if (isset($_GET['id'])) {

			$sql = "DELETE FROM tb_movies where movie_id = " .$_GET['id'];
			echo $sql;
		if($conn->query($sql)){

			
			header('location:../addminpage.php');
		}else{
			echo "โพสผิดพลาด";
		}
			
		}
 ?>