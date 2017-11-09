<?php
    require_once('../connection.php');
    $kode = $con->real_escape_string($_REQUEST["kode"]);
    
  
    $sql = "UPDATE db_barang SET isDelete = '1', updated_at = now() WHERE id = '$kode';";
    if($con->query($sql)) {
        echo "1";
    } else {
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>