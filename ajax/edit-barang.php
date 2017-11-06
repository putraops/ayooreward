<?php
    require_once('../connection.php');
    //$id = $con->real_escape_string($_REQUEST["id"]);
    $kode = $con->real_escape_string($_REQUEST["kode"]);
    $nama = $con->real_escape_string($_REQUEST["nama"]);
    $ket = $con->real_escape_string($_REQUEST["ket"]);
    
  
    $sql = "UPDATE db_barang SET nama = '$nama', deskripsi = '$ket', updated_at = now() WHERE kode_barang = '$kode';";
    //echo $sql;
    if($con->query($sql)) {
        echo "1";
    } else {
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>