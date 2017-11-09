<?php
    require_once('../connection.php');
    //$id = $con->real_escape_string($_REQUEST["id"]);
    $noorder = $con->real_escape_string($_REQUEST["kode"]);
    $status = $con->real_escape_string($_REQUEST["status"]);
    
  
        $sql = "UPDATE db_purchase SET status_order = '$status', updated_at = now() WHERE no_order = '$noorder';";
    if($con->query($sql)) {
        mysqli_close($con);
        echo "1";
    } else {
        mysqli_close($con);
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>