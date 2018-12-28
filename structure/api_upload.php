<?php
	// require_once '/connectDB.php';
if (file_exists('connect.php')) {
    require('./connect.php');
	

	if (isset($_POST['moviename'])){
		$namecompany = $_POST['moviename'];
		$namework = $_POST['movietype'];
		$detailwork = $_POST['price'];
		$price = $_POST['description'];
		// id
		
		
		//upload move image
		$uploadDirectory = "../images";
		if($_POST['iuploadfile']==1){

			$fileName = $_FILES['uploadfile']['name'];
			
			$tmp = explode('.', $fileName);
			$extension = end($tmp);
			$newfilename=$_POST['moviename']."_".date("m-d-y").date("h-i-sa").".".$extension;
			$fileTmpName  = $_FILES['uploadfile']['tmp_name'];
			$uploadPath = $uploadDirectory . basename($newfilename);
			move_uploaded_file($fileTmpName, $uploadPath);
			echo "result";
			
		}
		
		
		

		$sql = "INSERT INTO tb_movies ( movie_name, type_id,movie_price";
		if ($_POST['iuploadfile']==1) {
			$sql.= ",movie_image";
		}
		$sql.=") VALUES ( '$namecompany', '$namework','$detailwork','$price'";
		if ($_POST['iuploadfile']==1) {
			$sql.= ",'$newfilename'";
		}
		$sql.=")";

		echo $sql;
		if($conn->query($sql)){
			echo "โพสสำเร็จ";
		}else{
			echo "โพสผิดพลาด";
		}
		
	}
}

?>