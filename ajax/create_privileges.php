<?php

require_once('../connection.php');

mysqli_autocommit($con,FALSE);
$flag = true;

$user = $_GET['user'];
$arrPrivileges = $_REQUEST['arrPrivileges'];

$sql = "DELETE FROM db_privileges_detail WHERE id_user = '$user'";
$query2 = "";

$con->query($sql);

if (count($arrPrivileges) > 0) {
    for ($i = 0; $i < count($arrPrivileges); $i++) {
        $id_privileges = $arrPrivileges[$i];
        $query2 = " INSERT INTO db_privileges_detail (id_privileges, id_user) 
                    VALUES ('$id_privileges', '$user');";
        
        $con->query($query2);
        if (!$con) {
            $flag = false;
            break;
        } 
    }
}

if ($flag) {
    mysqli_commit($con);
    echo "1";
} else {
    mysqli_rollback($con);
    echo "0";
}
mysqli_close($con);
?>


