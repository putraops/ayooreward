<?php
    require_once('../connection.php');
    $kode = $con->real_escape_string($_REQUEST["kode"]);
    $color = $con->real_escape_string($_REQUEST["color"]);
  
    $sql = "UPDATE db_status SET warna = '$color', updated_at = now() WHERE kode = '$kode';";
    if($con->query($sql)) {
        echo "1";
    } else {
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>