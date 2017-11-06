<?php

try {
    require_once('../connection.php');

    $id = "";
    $password = "";

    if (isset($_REQUEST["id"])) {
        $id = $con->real_escape_string($_REQUEST["id"]);
    }
    if (isset($_REQUEST["password"])) {
        $password = $con->real_escape_string($_REQUEST["password"]);
    }

    $hashpassword = md5($password);

    $sql = "UPDATE db_user ";
    $sql .= "SET updated_at = now() ";
    if ($password != "") {
        $sql .= ", password = '$hashpassword' ";
    }
    $sql .= "WHERE kode = '$id'";

    if ($con->query($sql)) {
        echo "1";
    } else {
        echo "0";
    }

} catch (Exception $ex) {
    echo 'Error: ' . $ex->getMessage();
}
?>