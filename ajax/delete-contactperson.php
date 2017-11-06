<?php
    require_once('../connection.php');
    $id = $con->real_escape_string($_REQUEST["id"]);
  
    $sql = "UPDATE db_contactperson SET isDelete = '1' WHERE id = '$id';";
    if($con->query($sql)) {
        echo "1";
    } else {
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>