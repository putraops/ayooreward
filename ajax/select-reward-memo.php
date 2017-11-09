<?php

require_once('../connection.php');

$id = $con->real_escape_string($_REQUEST["id"]);
  
$arrImages = array();
$out = "-1";

$sql = "Select dbr.memo as memo
        from db_rewards dbr
        where dbr.id = $id;";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $out = $row['memo'];   
    }
} 
echo $out;




?>


