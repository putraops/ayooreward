<?php

require_once('../connection.php');

$noorder = $con->real_escape_string($_REQUEST["noorder"]);

$arrImages = array();
$out = "";

$sql = "Select dbb.nama as namabarang, dbpd.keterangan as keterangan
        from db_purchase dbp
        INNER JOIN db_purchase_detail dbpd ON dbp.no_order = dbpd.no_order
        INNER JOIN db_barang dbb ON dbb.id = dbpd.kode_barang
        where dbp.no_order = $noorder;";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($arrImages, array($row['namabarang'], $row['keterangan']));
        $out = array_values($arrImages);   
    }
    echo json_encode($out);
} else {
    echo 0;
}




?>


