<?php



 if(isset($_POST['inputUsername'])&&isset($_POST['inputPassword'])){
  session_start();
  require_once('connect.php');
  $md5 = md5($_POST['inputPassword']);
    $sql = "SELECT * FROM tb_user WHERE user_name = '".$_POST['inputUsername']."' AND user_pass = '".$md5."'";
  if($result=$conn->query($sql)){
   if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
     // $_SESSION['admin'] = $row['admin_user'];
     $_SESSION['user'] = $row['user_id'];
     $_SESSION['type'] = $row['usedtype'];

     
     
     
    }
    echo "เข้าสู่ระบบสำเร็จ";
   }else{
    echo "ชื่อผู้ใช้งาน หรือรหัสผ่าน ไม่ถูกต้อง";
   }

  }else{
   echo "server error";
  }
  $conn->close();
 }
?>