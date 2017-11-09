<?php
    require_once('../connection.php');
    $kode = $con->real_escape_string($_REQUEST["kode"]);
    
    if ($kode == "1" || $kode == "2" || $kode == "3") {
        ## cannot allowed to delete this status
        echo "-1";
    } else {
        $sql = "UPDATE db_status SET isDelete = '1', updated_at = now() WHERE kode = '$kode';";
        if($con->query($sql)) {
            ## status deleted
            echo "1";
        } else {
            ## failed to delete a status
            echo "0";
        }  
    }
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>