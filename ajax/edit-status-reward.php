<?php
    require_once('../connection.php');
    //$id = $con->real_escape_string($_REQUEST["id"]);
    $id = $con->real_escape_string($_REQUEST["kode"]);
    $status = $con->real_escape_string($_REQUEST["status"]);
    $keterangan = htmlspecialchars($con->real_escape_string($_REQUEST["keterangan"]));
    $user  = $con->real_escape_string($_REQUEST["usernamelogin"]);
    
    function print_tanggal($tanggal) {
        $split = explode('-', $tanggal);
        return $split[2] . '/' . $split[1] . '/' . $split[0];
    }
    
   $sql = "UPDATE db_rewards SET user_selesai = '$user', status = '$status', ";
    if ($status == "2" || $status == "3") {
        $sql .= "tanggal_selesai = now(), keteranganclose = '$keterangan', ";
    }
    $sql .= "updated_at = now() WHERE id = '$id';";
    
    if($con->query($sql)) {
        $sql = "Select * from db_rewards 
                where id = $id;";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tanggalBuatReward = print_tanggal($row['tanggal_buat']);
                $documentReferral = $row['no_po'];
                $quartalReward = $row['Quartal'];
                $jenisReward = $row['id_jenis_reward'];
                $keteranganReward = $row['keterangan_reward'];
                $vendorReward = $row['kode_vendor'];
                $tanggalTagihanReward = print_tanggal($row['tanggal_tagih']);
                $memoReward = $row['memo'];
                $userselesai = $row['user_selesai'];

                $vendorNamaCP = $row['nama_cp'];
                $vendorEmailCP = $row['email_cp'];
                $vendorTelpCP = $row['telp_cp'];

                $contactPersonReward = $row['id_contactperson'];
                
                $tanggalBuatReward_new = date('Y-m-d', strtotime($date = str_replace('/', '-', $tanggalBuatReward)));
                $tanggalTagihanReward_new = date('Y-m-d', strtotime($date = str_replace('/', '-', $tanggalTagihanReward)));
                
                $sql = "INSERT INTO db_rewards_history (id_user, id_reward, kode_vendor, id_jenis_reward, id_contactperson, keterangan_reward, no_po, quartal, tanggal_buat, tanggal_tagih, nama_cp, email_cp, telp_cp, user_selesai, status, memo, isDelete, created_at, updated_at) "
                 . "VALUES ('$user', '$id', '$vendorReward', '$jenisReward', '$contactPersonReward', '$keteranganReward', '$documentReferral', '$quartalReward', '$tanggalBuatReward_new', '$tanggalTagihanReward_new', '$vendorNamaCP', '$vendorEmailCP', '$vendorTelpCP', '$userselesai', '$status', '$memoReward', '0', now(), now())";


                $con->query($sql);
                
            }
        } 
        
       
        
        $query1 = " INSERT INTO db_history_status_reward (id_reward, id_status, id_user, created_at)
            VALUES ('$id', '$status', '$user', now())";
        
        $con->query($query1);
        
        $return_colorcode = "";
        ## Pengeluaran
        $sql = "SELECT warna FROM db_status WHERE kode = '$status'";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $return_colorcode = $row['warna'];
            }
        }
        
        mysqli_close($con);
        echo $return_colorcode;
    } else {
        mysqli_close($con);
        echo "0";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>