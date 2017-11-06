<?php

require_once('../connection.php');

mysqli_autocommit($con,FALSE);
$flag = true;

$arrOrder = $_REQUEST['arrOrder'];

if (count($arrOrder) > 0) {
    for ($i = 0; $i < count($arrOrder); $i++) {
        $kodestatus = $arrOrder[$i][0];
        $nomorurut = $arrOrder[$i][1];

        $query = " UPDATE db_status 
                    SET no_urut = '$nomorurut' 
                    WHERE kode = $kodestatus";
        $con->query($query);
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


