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

//echo $sql_status; exit;

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

$sql = "Select dbr.id as id,
               dbu.name as namapengubah, 
               dbr.created_at as created_at
        FROM db_rewards dbr
        INNER JOIN db_user dbu ON dbu.kode = dbr.id_user 
        INNER JOIN db_status dbs ON dbr.status = dbs.kode 
        WHERE dbr.isdelete = 0 AND dbr.id = '$id'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ## GET LAST STATUS
        $data = [
            'id' => $row['id'],
            'idstatus' => "1",
            'namastatus' => "New Reward",
            'tanggalbuat' => $row['created_at'],
            'namapengubah' => $row['namapengubah'],
        ];
        //print_r($data);exit;
        array_push($arrStatus, $data);
    }



    $data = [
        'status' => "succeeded",
        'message' => 'Detail Reward berhasil didapatkan.',
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


