<?php
    require_once('../connection.php');
    //$id = $con->real_escape_string($_REQUEST["id"]);
    $noorder = $con->real_escape_string($_REQUEST["noorder"]);
    $noinvoice = $con->real_escape_string($_REQUEST["noinvoice"]);
    $nopo = $con->real_escape_string($_REQUEST["nopo"]);
    $nodo = $con->real_escape_string($_REQUEST["nodo"]);
    $status = $con->real_escape_string($_REQUEST["status"]);
    $reward = $con->real_escape_string($_REQUEST["reward"]);
    $tanggallunas = $con->real_escape_string($_REQUEST["tanggallunas"]);
    
    $sql = "UPDATE db_purchase 
           SET no_invoice = '$noinvoice', 
               no_po = '$nopo', 
               no_do = '$nodo', 
               status_order = '$status', 
               reward = '$reward', 
               tanggal_lunas = '$tanggallunas', 
               updated_at = now() WHERE no_order = '$noorder';";
  
    if($con->query($sql)) {
        mysqli_close($con);
        echo "1";
    } else {
        mysqli_close($con);
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>