<?php
    require_once('../connection.php');
    $id = $con->real_escape_string($_REQUEST["id"]);
    $memo = $con->real_escape_string($_REQUEST["memo"]);
  
    $sql = "UPDATE db_rewards SET memo = '$memo', updated_at = now() WHERE id = '$id';";
    //echo $sql;
    if($con->query($sql)) {
        echo "1";
    } else {
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>