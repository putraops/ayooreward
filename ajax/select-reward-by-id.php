<?php

require_once('../connection.php');

$id = $con->real_escape_string($_REQUEST["id"]);

$arrResult = array();
$arrStatus = array();
$data = array();

##
## History Status
$sql_status = "SELECT h.id as id, 
               h.id_status as idstatus, 
               s.nama as namastatus, 
               h.created_at as tanggalbuat,
               u.name as namapengubah 
        FROM db_history_status_reward h
        LEFT JOIN db_status s ON s.kode = h.id_status
        LEFT JOIN db_user u ON u.kode = h.id_user
        WHERE  h.id_reward = '$id' 
        ORDER BY h.created_at DESC";


$resultstatus = $con->query($sql_status);

if ($resultstatus->num_rows > 0) {
    while ($row = $resultstatus->fetch_assoc()) {
        $data = [
            'id' => $row['id'],
            'idstatus' => $row['idstatus'],
            'namastatus' => $row['namastatus'],
            'tanggalbuat' => $row['tanggalbuat'],
            'namapengubah' => $row['namapengubah'],
        ];

        array_push($arrStatus, $data);
    }
}

$out = "";

$sql = "Select dbv.kode as kodevendor, 
                dbv.nama as namavendor, 
                dbr.status as status, 
                dbs.nama as statusnama, 
                dbr.id as id,
                dbr.no_po as nopo,
                dbr.quartal as quartal, 
                dbr.keterangan_reward as keterangan_reward, 
                dbr.tanggal_buat as tanggalbuat, 
                dbr.tanggal_selesai as tanggalselesai, 
                dbr.tanggal_tagih as tanggaltagih, 
                dbr.nama_cp as nama_cp, 
                dbr.email_cp as email_cp, 
                dbr.telp_cp as telp_cp, 
                dbr.memo as memo,
                dbjr.nama as jenisreward,
                c.nama as namacabang,
                dbu.name as namapengubah, 
                dbr.created_at as created_at, 
                dbcp.id as id_tablecontactperson, 
                dbcp.nama as nama_tablecontactperson, 
                dbcp.email as email_tablecontactperson, 
                dbcp.telp as telp_tablecontactperson 
        from db_rewards dbr
        INNER JOIN db_user dbu ON dbu.kode = dbr.id_user 
        INNER JOIN db_status dbs ON dbr.status = dbs.kode 
        INNER JOIN db_vendor dbv ON dbv.kode = dbr.kode_vendor 
        INNER JOIN db_jenis_reward dbjr ON dbjr.id = dbr.id_jenis_reward 
        LEFT JOIN db_cabang c ON c.id = dbu.id_cabang 
        LEFT JOIN db_contactperson dbcp ON dbcp.id = dbr.id_contactperson
        where dbr.id = '$id'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ## GET LAST STATUS
        $data = [
            'id' => $row['id'],
            'idstatus' => $row['status'],
            'namastatus' => $row['statusnama'],
            'tanggalbuat' => $row['created_at'],
            'namapengubah' => $row['namapengubah'],
        ];

        array_push($arrStatus, $data);
        
        
        $namacp = $row['nama_cp'] == "" ? "-" : $row['nama_cp'];
        $emailcp = $row['email_cp'] == "" ? "-" : $row['email_cp'];
        $telpcp = $row['telp_cp'] == "" ? "-" : $row['telp_cp'];

        if ($row['id_tablecontactperson'] != "") {
            $namacp = $row['nama_tablecontactperson'];
            $emailcp = $row['email_tablecontactperson'];
            $telpcp = $row['telp_tablecontactperson'];
        }

        $data = [
            'id' => $row['id'],
            'kodevendor' => $row['kodevendor'],
            'namavendor' => $row['namavendor'],
            'status' => $row['status'],
            'statusnama' => $row['statusnama'],
            'nopo' => $row['nopo'],
            'quartal' => $row['quartal'],
            'keterangan_reward' => $row['keterangan_reward'],
            'tanggalbuat' => $row['tanggalbuat'],
            'tanggalselesai' => $row['tanggalselesai'],
            'tanggaltagih' => $row['tanggaltagih'],
            'memo' => $row['memo'],
            'jenisreward' => $row['jenisreward'],
            'nama_cp' => $namacp,
            'email_cp' => $emailcp,
            'telp_cp' => $telpcp,
            'cabang' => $row['namacabang'],
        ];
        array_push($arrResult, $data);
    }

    


    $data = [
        'status' => "succeeded",
        'message' => 'Detail Reward berhasil didapatkan.',
        'Data' => $arrResult,
        'HistoryStatus' => $arrStatus
    ];

    echo json_encode($data);
    ## Close connection
    mysqli_close($con);
} else {
    $data = [
        'status' => "failed",
        'message' => 'Detail Reward berhasil didapatkan.',
        'Data' => "0",
    ];
    ## Close connection
    mysqli_close($con);
    echo json_encode($data);
}
?>


