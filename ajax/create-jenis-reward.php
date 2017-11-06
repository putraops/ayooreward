<?php

require_once('../connection.php');

mysqli_autocommit($con, FALSE);

$nama = $con->real_escape_string($_REQUEST["nama"]);

$sql = " INSERT INTO db_jenis_reward (nama, created_at, updated_at)
            VALUES ('$nama', now(), now())";

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


