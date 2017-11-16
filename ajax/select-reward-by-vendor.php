<?php
    try {
        require_once('../connection.php');
        
        $id = 0;
        $status = "";

        if (isset($_REQUEST["id"])) {
            $id = $con->real_escape_string($_REQUEST["id"]);
        } 
        if (isset($_REQUEST["status"])) {
            $status = $con->real_escape_string($_REQUEST["status"]);
        } 
		
	## Array Declare
        $arrResult = array(); 
        $arrPerjalanan = array(); 
        $arrPengeluaran = array(); 
        
        $sql = "Select dbv.kode as kodevendor, 
                dbv.nama as namavendor, 
                dbb.id as idbrand, 
                dbb.nama as namabrand, 
                dbr.status as status, dbs.nama as statusnama, 
                dbr.id as id,
                dbr.no_po as nopo,
                dbr.quartal as quartal, 
                dbr.keterangan_reward as keterangan_reward, 
                dbr.tanggal_buat as tanggalbuat, 
                dbr.tanggal_selesai as tanggalselesai, 
                dbr.tanggal_tagih as tanggaltagih, 
                dbr.memo as memo,
                dbjr.nama as jenisreward,
                dbr.nama_cp as nama_cp, 
                dbr.email_cp as email_cp, 
                dbr.telp_cp as telp_cp,
                c.nama as namacabang,
                dbu.id_cabang as idcabang,
                dbcp.id as id_tablecontactperson, 
                dbcp.nama as nama_tablecontactperson, 
                dbcp.email as email_tablecontactperson, 
                dbcp.telp as telp_tablecontactperson 
        from db_rewards dbr
        LEFT JOIN db_vendor dbv ON dbv.kode = dbr.kode_vendor 
        LEFT JOIN db_brand dbb ON dbb.id = dbr.idbrand 
        INNER JOIN db_user dbu ON dbu.kode = dbr.id_user 
        INNER JOIN db_status dbs ON dbr.status = dbs.kode 
        INNER JOIN db_jenis_reward dbjr ON dbjr.id = dbr.id_jenis_reward
        LEFT JOIN db_cabang c ON c.id = dbu.id_cabang 
        LEFT JOIN db_contactperson dbcp ON dbcp.id = dbr.id_contactperson
        where dbv.kode = '$id'";
        
        //echo $sql;
        
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
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
                        'idbrand' => $row['idbrand'],
                        'namabrand' => $row['namabrand'],
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
                        'cabang' => $row['namacabang'] == "" ? "Semua Cabang" : $row['namacabang'],
                        'idcabang' => $row['idcabang'],
                        ];
                array_push($arrResult, $data);
            }

            $data = [   
                        'status' => "succeeded", 
                        'message' => 'Detail Reward berhasil didapatkan.', 
                        'Data' => $arrResult,
                    ];
        } else {
            $data = ['status' => "failed", 'message' => 'Data Reward gagal didapatkan.'];
        }
        


        echo json_encode($data);
        ## Close connection
        mysqli_close($con);
        
    } catch (Exception $ex) {
        echo 'Error: ' . $ex->getMessage();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>