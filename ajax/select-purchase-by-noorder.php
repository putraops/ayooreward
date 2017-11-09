<?php

require_once('../connection.php');

$noorder = $con->real_escape_string($_REQUEST["noorder"]);

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
                dbp.tanggal_lunas as tanggallunas,
                dbp.is_reward as isreward
        from db_purchase dbp
        INNER JOIN db_status dbs ON dbp.status_order = dbs.kode
        INNER JOIN db_vendor dbv ON dbv.kode = dbp.kode_vendor
        where dbp.no_order = '$noorder'
        order by dbp.no_order asc";

$result = $con->query($sql);

if ($result->num_rows > 0) {    
    while($row = $result->fetch_assoc()) {
        $sqlitem = "Select dbp.no_order as noorder, dbb.nama as namabarang, dbpd.keterangan as keterangan
                    from db_purchase dbp
                    INNER JOIN db_purchase_detail dbpd ON dbp.no_order = dbpd.no_order
                    INNER JOIN db_barang dbb ON dbb.id = dbpd.kode_barang
                    where dbp.no_order = '$noorder'";
        
        $resultitem = $con->query($sqlitem);
        
        if ($resultitem->num_rows > 0) {    
            while($rowitem = $resultitem->fetch_assoc()) {
                array_push($arrItem, array($rowitem['namabarang'], $rowitem['keterangan']));
            }
        }
        
        array_push($arrPurchase, array($row['noorder'], $row['subject'], $row['kodevendor'], $row['namavendor'], 
                                     $row['noinvoice'], $row['nopo'], $row['nodo'], $row['statusorder'], $row['statusnama'], 
                                     $row['tanggalbeli'], $row['totalbeli'], $row['reward'], $row['tanggallunas'], $row['isreward'], $arrItem));
        $out = array_values($arrPurchase);   
    }
    echo json_encode($out);
} else {
    echo 0;
}
mysqli_close($con);
?>


