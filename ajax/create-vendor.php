<?php

    require_once('../connection.php');

    mysqli_autocommit($con,FALSE);


    $nama   = $con->real_escape_string($_REQUEST["nama"]);
    $npwp   = $con->real_escape_string($_REQUEST["npwp"]);
    $alamat   = $con->real_escape_string($_REQUEST["alamat"]);
    $keterangan   = $con->real_escape_string($_REQUEST["keterangan"]);

$sql = " INSERT INTO db_vendor (nama, npwp, alamat, keterangan, created_at, updated_at)
            VALUES ('$nama', '$npwp', '$alamat', '$keterangan', now(), now())";

if ($con->query($sql)) {
    $last_purchase_id = $con->insert_id; 
    echo $last_purchase_id;
    mysqli_commit($con);
} else {
    mysqli_rollback($con);
    echo "0";
}

mysqli_close($con);

?>


