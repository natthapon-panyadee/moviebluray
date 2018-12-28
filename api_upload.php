<?php
	// require_once '/connectDB.php';
if (file_exists('../dbconfig.php')) {
    require('../dbconfig.php');
	session_start();

	if (isset($_POST['moviename'])){
		$moviename01 = $_POST['moviename'];
            $movietype01 = $_POST['movietype']
            $movieimage01 = $_POST['movieimage'];
            $price01 = $_POST['price']; 
            $description01 = $_POST['description'];
           
		// id
		$user_id = $_SESSION['user'];
		
		//upload move image
		$uploadDirectory = "../images/";
		if($_POST['iuploadfile']==1){

			$fileName = $_FILES['uploadfile']['name'];
			
			$tmp = explode('.', $fileName);
			$extension = end($tmp);
			$newfilename=$_POST['nameherbs']."_".date("m-d-y").date("h-i-sa").".".$extension;
			$fileTmpName  = $_FILES['uploadfile']['tmp_name'];
			$uploadPath = $uploadDirectory . basename($newfilename);
			move_uploaded_file($fileTmpName, $uploadPath);
			echo "result";
			
		}
		
		
		

		$sql = "INSERT INTO item ( item_name, item_price,type_disease,user_id,descript";
		if ($_POST['iuploadfile']==1) {
			$sql.= ",item_image";
		}
		$sql.=") VALUES ( '$nameherbs', '$price','$typeherbs','$user_id','$detailherbs' ";
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