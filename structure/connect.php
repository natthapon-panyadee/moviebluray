<?php

    error_reporting(E_ALL);

    $conn = new mysqli('localhost' , 'root' , '' , 'moviebluray');
    $conn -> set_charset('utf8');

    // echo $conn->connect_error;
    // echo $conn->connect_errno;

    
    if($conn->connect_errno){
        echo " ไม่ได้โว้ยยยยไอเวร :" .$conn->connect_error ;
        exit();
    }else {
    	
    }
                                    
?>
