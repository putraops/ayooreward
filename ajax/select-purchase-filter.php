<?php

require_once('../connection.php');

$action = $con->real_escape_string($_REQUEST["action"]);
$firstdate = "";
$lastdate = "";
$status = "";

$arrPurchase = array();
$arrItem = array();

$out = "";

$sql = "Select dbp.no_order as noorder, 
                dbp.subject as subject, 
                dbv.kode as kodevendor, 
                dbv.nama as namavendor, 
                dbp.no_invoice as noinvoice, 
                dbp.no_po as nopo,
                dbp.no_do as nodo, 
                dbp.status_order as statusorder, 
                dbs.nama as statusnama, 
                dbp.tanggal_beli as tanggalbeli, 
                dbp.total_beli as totalbeli, 
                dbp.reward as reward,
                dbp.tanggal_lunas as tanggallunas 
        from db_purchase dbp
        INNER JOIN db_status dbs ON dbp.status_order = dbs.kode
        INNER JOIN db_vendor dbv ON dbv.kode = dbp.kode_vendor ";
if ($action == "byorder") {
    $noorder = $con->real_escape_string($_REQUEST["noorder"]);
    $sql .= "where dbp.no_order = '$noorder' order by dbp.no_order asc";
} else if ($action == "bydate") { /*-- Filter Laporan Pembelian -- */
    $firstdate = $con->real_escape_string($_REQUEST["firstdate"]);
    $lastdate = $con->real_escape_string($_REQUEST["lastdate"]);
    $status = $con->real_escape_string($_REQUEST["status"]);
    $sql .= "where dbp.tanggal_beli between '$firstdate' AND '$lastdate' ";
    if ($status == 3) { 
        ## Pesanan Selesai
        $sql .= "AND dbp.status_order = 3 ";
    } else { 
        ## Pesanan Belum Selesai
        $sql .= "AND dbp.status_order != 3 ";
    }
    $sql .= "order by dbp.tanggal_beli asc";
}



$result = $con->query($sql);

if ($result->num_rows > 0) {    
    while($row = $result->fetch_assoc()) {
        $temp_order = $row['noorder'];
        $sqlitem = "Select dbp.no_order as noorder, dbb.nama as namabarang, dbpd.keterangan as keterangan
                    from db_purchase dbp
                    INNER JOIN db_purchase_detail dbpd ON dbp.no_order = dbpd.no_order
                    INNER JOIN db_barang dbb ON dbb.id = dbpd.kode_barang ";
                if ($action == "byorder") {
                    $noorder = $con->real_escape_string($_REQUEST["noorder"]);
                    $sqlitem .= "where dbp.no_order = '$noorder' order by dbp.no_order asc";
                } else if ($action == "bydate") { /*-- Filter Laporan Pembelian -- */
                    $firstdate = $con->real_escape_string($_REQUEST["firstdate"]);
                    $lastdate = $con->real_escape_string($_REQUEST["lastdate"]);
                    $sqlitem .= "where dbp.tanggal_beli between '$firstdate' AND '$lastdate' AND dbpd.no_order = '$temp_order'";
                }
        
        $resultitem = $con->query($sqlitem);
        
        if ($resultitem->num_rows > 0) {    
            while($rowitem = $resultitem->fetch_assoc()) {
                array_push($arrItem, array($rowitem['namabarang'], $rowitem['keterangan']));
            }
        }
        
        array_push($arrPurchase, array($row['noorder'], $row['subject'], $row['kodevendor'], $row['namavendor'], 
                                     $row['noinvoice'], $row['nopo'], $row['nodo'], $row['statusorder'], $row['statusnama'], 
                                     $row['tanggalbeli'], $row['totalbeli'], $row['reward'], $row['tanggallunas'], $arrItem));
        $arrItem = array();
        $out = array_values($arrPurchase);   
    }
    echo json_encode($out);
} else {
    echo 0;
}

mysqli_close($con);


?>


