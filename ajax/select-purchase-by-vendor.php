<?php

require_once('../connection.php');

$kodevendor = $con->real_escape_string($_REQUEST["kodevendor"]);

$arrPurchase = array();
$out = "";

$sql = "Select dbp.no_order as noorder, dbp.subject as subject, dbv.kode as kodevendor, dbv.nama as namavendor, dbp.no_invoice as noinvoice, dbp.no_po as nopo,
                dbp.no_do as nodo, dbp.status_order as statusorder, dbs.nama as statusnama, dbp.tanggal_beli as tanggalbeli, 
                dbp.total_beli as totalbeli
        from db_purchase dbp
        INNER JOIN db_status dbs ON dbp.status_order = dbs.kode
        INNER JOIN db_vendor dbv ON dbv.kode = dbp.kode_vendor
        where dbv.kode = '$kodevendor'
        order by dbp.no_order asc";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($arrPurchase, array($row['noorder'], $row['subject'], $row['kodevendor'], $row['namavendor'], 
                                     $row['noinvoice'], $row['nopo'], $row['nodo'], $row['statusorder'], $row['statusnama'], 
                                     $row['tanggalbeli'], $row['totalbeli']));
        $out = array_values($arrPurchase);   
    }
    echo json_encode($out);
} else {
    echo 0;
}

mysqli_close($con);
?>


