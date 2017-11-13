<?php
require './connection.php';



$status = isset($_GET['status']) ? $con->real_escape_string($_REQUEST['status']) : '';
$vendor = isset($_GET['vendor']) ? $con->real_escape_string($_REQUEST['vendor']) : '';
$cabang = isset($_GET['cabang']) ? $con->real_escape_string($_REQUEST['cabang']) : '';
$quartal = isset($_GET['quartal']) ? $con->real_escape_string($_REQUEST['quartal']) : '';

$sql =  "Select dbv.kode as kodevendor, 
                dbv.nama as namavendor, 
                dbr.status as status, dbs.nama as statusnama, 
                dbr.id as id,
                dbr.no_po as nopo,
                dbr.quartal as quartal,
                dbr.keterangan_reward as keterangan_reward, 
                dbr.tanggal_buat as tanggalbuat, 
                dbr.tanggal_selesai as tanggalselesai, 
                dbr.tanggal_tagih as tanggaltagih, 
                dbr.memo as memo,
                dbu.name as namauser, 
                dbu1.name as userselesai, 
                dbjr.nama as jenisreward,
                c.nama as namacabang,
                dbu.id_cabang as idcabang, 
                dbcp.id as id_tablecontactperson, 
                dbcp.nama as nama_tablecontactperson, 
                dbcp.email as email_tablecontactperson, 
                dbcp.telp as telp_tablecontactperson 
        From db_rewards dbr
             INNER JOIN db_user dbu ON dbu.kode = dbr.id_user 
             LEFT JOIN db_user dbu1 ON dbu1.kode = dbr.user_selesai
             INNER JOIN db_status dbs ON dbr.status = dbs.kode 
             INNER JOIN db_vendor dbv ON dbv.kode = dbr.kode_vendor 
             INNER JOIN db_jenis_reward dbjr ON dbjr.id = dbr.id_jenis_reward 
             LEFT JOIN db_contactperson dbcp ON dbcp.id = dbr.id_contactperson";
$sql .=  " LEFT JOIN db_cabang c ON c.id = dbr.id_cabang ";
$sql .=  " WHERE dbr.isDelete = 0 AND dbs.isDelete = 0 ";

if ($status != 0) {
    $sql .= " AND dbr.status = '$status'";
}
if ($vendor != 0) {
    $sql .= " AND dbv.kode = '$vendor'";
}
if ($cabang != 0) {
    $sql .= " AND dbu.id_cabang = '$cabang'";
}
if ($quartal != "") {
    $sql .= " AND dbr.quartal = '$quartal'";
}
if ($jabatanUserLogin == "admin") {
    ## Do Nothing
} else {
    if ($cabangUserLogin != "0") {
        $sql .= " AND dbr.id_cabang = '$cabangUserLogin' ";
    }
}

//echo $sql;
//if ($firstdate && $lastdate) {
//    $sql .= "and dbr.tanggal_buat between '$firstdate' AND '$lastdate' ";
//}
$sql .= " order by dbr.created_at desc;"; 

$result = $con->query($sql);
?>
<h3>Laporan Reward</h3>
<table class="table table-hover table-responsive" id="my-table" border="1"> 
    <thead> 
        <tr style="background-color: #DDD;"> 
            <th>No</th>
            <th>CABANG</th>
            <th>QUARTAL</th>
            <th>NAMA REWARD</th>
            <th>JENIS REWARD</th>
            <th>DETAIL REWARD</th>
            <th>KETERANGAN</th>
            <th>VENDOR</th>
            <th>DIBUAT OLEH</th>
            <th>STATUS</th>
        </tr> 
    </thead> 
    <tbody id="table-body-vendor"> 
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            $nomor = 1;
            //echo $result->num_rows . "asdasdasdasd";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                    echo "<td>".$nomor."</td>";
                    echo "<td>" . ($row['namacabang'] == "" ? "Semua Cabang" : $row['namacabang']) . "</td>";
                    echo "<td>" . $row['quartal'] . "</td>";
                    echo "<td>" . $row['nopo'] . "</td>";
                    echo "<td>" . $row['jenisreward'] . "</td>";
                    echo "<td>" . $row['keterangan_reward'] . "</td>";
                    echo "<td>" . $row['memo'] . "</td>";
                    echo "<td>" . $row['namavendor'] . "</td>";
                    echo "<td>" . $row['namauser'] . "</td>";
                    echo "<td>" . $row['statusnama'] . "</td>";
                echo "</tr>";
                $nomor++;
            }
        }
        ?>
    </tbody> 
</table>