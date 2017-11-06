<?php

require_once('../connection.php');

mysqli_autocommit($con,FALSE);
$flag = true;

$subject = $_REQUEST['subject'];
$vendor = $_REQUEST['vendor'];
$tanggalbeli = $_REQUEST['tanggalbeli'];
$namapembelian = $_REQUEST['namapembelian'];
$noinvoice = $_REQUEST['noinvoice'];
$nopo = $_REQUEST['nopo'];
$nodo = $_REQUEST['nodo'];
$totalbeli = $_REQUEST['totalbeli'];
$iduser = $_REQUEST['iduser'];

$reward = $_REQUEST['reward'];
$valuereward = $_REQUEST['valuereward'];

$arrCart = $_REQUEST['arrCart'];

$query1 = " INSERT INTO db_purchase (id_user, kode_vendor, subject, no_invoice, no_po, no_do, tanggal_beli, total_beli, status_order, reward, is_reward, created_at, updated_at)
            VALUES ('$iduser', '$vendor', '$subject', '$noinvoice', '$nopo', '$nodo', '$tanggalbeli', '$totalbeli', '1', '$reward', '$valuereward', now(), now())";
$con->query($query1);
$last_purchase_id = $con->insert_id; 

if (count($arrCart) > 0) {
    for ($i = 0; $i < count($arrCart); $i++) {
        $kodebarang = $arrCart[$i][0];
        $keterangan = $arrCart[$i][2];
        $isActive = $arrCart[$i][3];
        
        if ($isActive == 1) {
            $query2 = " INSERT INTO db_purchase_detail (no_order, kode_barang, keterangan)
                        VALUES ('$last_purchase_id', '$kodebarang', '$keterangan')";
            $con->query($query2);
            if (!$con) {
                $flag = false;
                break;
            } 
        }

    }

}

if ($flag) {
    mysqli_commit($con);
    echo $last_purchase_id;
} else {
    mysqli_rollback($con);
    echo "0";
}
mysqli_close($con);

//echo $name . "-" . $location . "-" . count($arrayDetailInvoice) . "-" . $arrayDetailInvoice[0][1];

    
    
//    for ($i = 0; $i < count($arrayInvoice); $i++)
//    {
//        $uniquecode = $arrayInvoice[$i][0];
//        $item = $arrayInvoice[$i][1];
//        $nominal = $arrayInvoice[$i][2];
//        $query2 = " INSERT INTO nota_item (idnota, keterangan, nominal)
//                    VALUES ('$lastnotaid', '$item', '$nominal')";
//        $con->query($query2);
//        $last_id_nota_item = $con->insert_id;
//        for ($j = 0; $j < count($arrayDetailInvoice); $j++)
//        {
//            if ($arrayInvoice[$i][0] == $arrayDetailInvoice[$j][0]) {
//                $info = $arrayDetailInvoice[$j][1];
//                $query3 = " INSERT INTO nota_item_detail (id_nota_item, info)
//                            VALUES ('$last_id_nota_item', '$info')";
//                $con->query($query3);
//            } 
//        }
//        if (!$con) {
//            $flag = false;
//            break;
//        }
//    }

?>


