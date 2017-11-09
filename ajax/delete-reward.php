<?php
    require_once('../connection.php');
    $id = $con->real_escape_string($_REQUEST["id"]);
  
    $sql = "UPDATE db_rewards SET isDelete = '1', updated_at = now() WHERE id = '$id';";
    if($con->query($sql)) {
        echo "1";
    } else {
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>