<?php

require_once('../connection.php');

mysqli_autocommit($con, FALSE);

$nama = $con->real_escape_string($_REQUEST["nama"]);
$email = $con->real_escape_string($_REQUEST["email"]);
$telp = $con->real_escape_string($_REQUEST["telp"]);

$sql = " INSERT INTO db_contactperson (nama, email, telp, isdelete, created_at, updated_at)
            VALUES ('$nama', '$email', '$telp', 0, now(), now())";

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


