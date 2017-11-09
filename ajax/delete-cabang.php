<?php
    require_once('../connection.php');
    $kode = $con->real_escape_string($_REQUEST["kode"]);
    
  
    $sql = "UPDATE db_cabang SET status = '0' WHERE id = '$kode';";
    if($con->query($sql)) {
        echo "1";
    } else {
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>