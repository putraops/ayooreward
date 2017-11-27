<?php
require './connection.php';



$status = isset($_GET['status']) ? $con->real_escape_string($_REQUEST['status']) : '';
$vendor = isset($_GET['vendor']) ? $con->real_escape_string($_REQUEST['vendor']) : '';
$cabang = isset($_GET['cabang']) ? $con->real_escape_string($_REQUEST['cabang']) : '';
$brand = isset($_GET['brand']) ? $con->real_escape_string($_REQUEST['brand']) : '';
$quartal = isset($_GET['quartal']) ? $con->real_escape_string($_REQUEST['quartal']) : '';
$cp = isset($_GET['cp']) ? $con->real_escape_string($_REQUEST['cp']) : '';
$filter = isset($_GET['filter']) ? $con->real_escape_string($_REQUEST['filter']) : '';

$sql = "Select dbv.kode as kodevendor, 
                dbv.nama as namavendor, 
                dbb.id as idbrand, 
                dbb.nama as namabrand, 
                dbr.status as status, 
                dbs.nama as statusnama, 
                dbs.warna as kodewarna, 
                dbr.quartal as quartal, 
                dbr.id as id,
                dbr.no_po as nopo,
                dbr.keterangan_reward as keterangan_reward, 
                dbr.keteranganclose as keteranganclose, 
                dbr.tanggal_buat as tanggalbuat, 
                dbr.tanggal_selesai as tanggalselesai, 
                dbr.tanggal_tagih as tanggaltagih, 
                dbr.nama_cp as nama_cp, 
                dbr.email_cp as email_cp, 
                dbr.telp_cp as telp_cp, 
                dbr.memo as memo,
                dbr.kode_vendor as kode_vendor,
                dbr.idbrand as idbrand,
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
         LEFT JOIN db_vendor dbv ON dbv.kode = dbr.kode_vendor 
         INNER JOIN db_jenis_reward dbjr ON dbjr.id = dbr.id_jenis_reward 
         LEFT JOIN db_brand dbb ON dbb.id = dbr.idbrand 
         LEFT JOIN db_contactperson dbcp ON dbcp.id = dbr.id_contactperson";
$sql .= " LEFT JOIN db_cabang c ON c.id = dbr.id_cabang ";
$sql .= " WHERE dbr.isDelete = 0 AND dbs.isDelete = 0 ";

if ($status != 0) {
    $sql .= " AND dbr.status = '$status'";
}
if ($vendor != 0) {
    $sql .= " AND dbv.kode = '$vendor'";
}
if ($brand != 0) {
    $sql .= " AND dbv.brand = '$brand'";
}
if ($cabang != 0) {
    $sql .= " AND dbu.id_cabang = '$cabang'";
}
if ($cp != 0) {
    $sql .= " AND dbcp.id = '$cp'";
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

if ($filter != "") {
    $result = $con->query($sql);
}
?>
<h3>Laporan Reward</h3>
<?php if ($status != 0):?>
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<span>Status: " . $row['statusnama'] . " </span><br />";
    }
    ?>
<?php endif;?>
<?php if ($vendor != 0):?>
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<span>Vendor: " . $row['namavendor'] . " </span><br />";
    }
    ?>
<?php endif;?>
<?php if ($brand != 0):?>
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<span>Brand: " . $row['namabrand'] . " </span><br />";
    }
    ?>
<?php endif;?>    
<?php if ($cabang != 0):?>
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<span>Cabang: " . $row['namacabang'] . " </span><br />";
    }
    ?>
<?php endif;?>     
<?php if ($cp != 0):?>
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<span>Kontak Person: " . $row[nama_tablecontactperson] . ' - '. $row[email_tablecontactperson] . ' - '. $row[telp_tablecontactperson] . " </span><br />";
        
    }
    ?>
<?php endif;?>    
<?php if ($quartal != ""):?>
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<span>Quartal: " . $row[quartal] . " </span><br />";
        
    }
    ?>
<?php endif;?>  
<br/>
<table class="table table-hover table-responsive" id="my-table" border="1"> 
    <thead> 
        <tr style="background-color: #DDD;"> 
            <th>No</th>
            <th>CABANG</th>
            <th>QUARTAL</th>
            <th>NAMA REWARD</th>
            <th>JENIS REWARD</th>
            <th>VENDOR</th>
            <th>BRAND</th>
            <th>KONTAK PERSON</th>
            <th style="width: 17%;">KETERANGAN</th>
            <th>DIBUAT OLEH</th>
            <th>STATUS</th>
        </tr> 
    </thead> 
    <tbody id="table-body-vendor"> 
        
        <?php if ($filter == ""): ?>
            <?php 
                echo "<tr>";
                echo "<td colspan='11' style='text-align: center; font-size: 15pt;'><strong>Lakukan filter terlebih dahulu untuk mengambil data</strong></td>";
                echo "</tr>";
            ?>
        <?php else: ?>
        <?php endif; ?>
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            $nomor = 1;
            //echo $result->num_rows . "asdasdasdasd";
            while ($row = $result->fetch_assoc()) {
                $namacp = "";
                $emailcp = "";
                $telpcp = "";
                if ($row['id_tablecontactperson'] != "") {
                    $namacp = $row['nama_tablecontactperson'];
                    $emailcp = $row['email_tablecontactperson'];
                    $telpcp = $row['telp_tablecontactperson'];
                }
                
                echo "<tr>";
                echo "<td>" . $nomor . "</td>";
                echo "<td>" . ($row['namacabang'] == "" ? "Semua Cabang" : $row['namacabang']) . "</td>";
                echo "<td>" . $row['quartal'] . "</td>";
                echo "<td>" . $row['nopo'] . "</td>";
                echo "<td>" . $row['jenisreward'];
                echo "<br/ >Detail: " . $row['keterangan_reward'];
                echo "</td>";
                echo "<td>" . $row['namavendor'] . "</td>";
                echo "<td>" . $row['namabrand'] . "</td>";
                echo "<td>" . $namacp .' <br/>'. $emailcp . ' <br/>'. $telpcp . "</td>";
                echo "<td>" . $row['memo'] . "</td>";
                echo "<td>" . $row['namauser'] . "</td>";
                echo "<td>" . $row['statusnama'] . "</td>";
                echo "</tr>";
                $nomor++;
            }
        } else {
            echo "<tr>";
                echo "<td colspan='11' style='text-align: center; font-size: 15pt;'>Tidak ada data yang ditemukan</td>";
            echo "</tr>";
        }
        ?>
    </tbody> 
</table>