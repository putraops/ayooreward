<?php
    require_once('../connection.php');
    $kode = $con->real_escape_string($_REQUEST["kode"]);
    
  
    $sql = "UPDATE db_vendor SET status_hapus = '1' WHERE kode = '$kode';";
    if($con->query($sql)) {
        echo "1";
    } else {
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>