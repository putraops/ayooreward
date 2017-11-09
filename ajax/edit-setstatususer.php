<?php
    require_once('../connection.php');
    $kode = $con->real_escape_string($_REQUEST["kode"]);
    $set = $con->real_escape_string($_REQUEST["set"]);
  
    $sql = "UPDATE db_user SET status = '$set', updated_at = now() WHERE kode = '$kode';";
    if($con->query($sql)) {
        echo "1";
    } else {
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>