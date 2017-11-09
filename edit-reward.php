<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ubah Data Reward - ayooreward!</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS /// NO NEED -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="datepicker/css/jquery.datepicker.css" rel="stylesheet" type="text/css"/>	

        <script src="sweetalert/dist/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">


        <link href="select-filter/css/select2.min.css" rel="stylesheet" />

        <style>
            .form-group .select2-container {
                width: 100% !important;
            }
            .form-group .select2-selection {
                height: 35px;
                padding-top: 3px;
                border: 1px solid #ccc;
                border-radius: 0px;

            }
            #inp_reward, #val-reward {
                display: none;
            }
            .validation-text {
                font-style: italic;
            }

            #myInput {
                background-image: url('assets/search-icon.png');
                background-position: 10px 12px;
                background-repeat: no-repeat;
                background-size: 25px;
                background-position-y: 15px;
                width: 100%;
                font-size: 16px;
                padding: 15px;
                padding-left: 40px;
                border: 1px solid #ddd;
                margin-bottom: 12px;
            }
            #myUL {
                font-size: 15px;
            }
            .required {
                color: red;
            }
        </style>         
    </head>

    <body>
        <?php $currentpage = "sponsorship"; ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php require 'profile-navigation.php'; ?>
            <?php
            echo "<script>";
            if ($update_reward == "0_0") {
                echo "window.location.href = 'rewards';";
            }
            echo "</script>";
            ?> 
        </nav>

        <div id="page-wrapper" style="padding-bottom: 100px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <strong>UBAH DATA REWARD</strong>
                        </h1>
                    </div>
                    <?php

                    function print_tanggal($tanggal) {
                        $split = explode('-', $tanggal);
                        return $split[2] . '/' . $split[1] . '/' . $split[0];
                    }
                    ?>
                    <div class="col-md-8">
                        <?php
                        require './connection.php';
                        $isError = false;
                        $succeed = false;
                        $tanggalBuatRewardErr = $tanggalTagihanRewardErr = $documentReferralErr = $jenisRewardErr = $keteranganRewardErr = $vendorRewardErr = "";
                        $quartalRewardErr = "";
                        $contactPersonRewardErr = "";

                        $id = $_GET['q'];
                        $sql = "Select dbv.kode as kodevendor, 
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
                                dbjr.nama as jenisreward,
                                dbr.id_jenis_reward as idreward,
                                dbr.nama_cp as nama_cp,
                                dbr.email_cp as email_cp,
                                dbr.telp_cp as telp_cp,
                                dbcp.id as dbcpid, 
                                dbcp.nama as dbcpnama,
                                dbcp.email as dbcpemail,
                                dbcp.telp as dbcptelp 
                        from db_rewards dbr
                        INNER JOIN db_user dbu ON dbu.kode = dbr.id_user 
                        INNER JOIN db_status dbs ON dbr.status = dbs.kode 
                        INNER JOIN db_vendor dbv ON dbv.kode = dbr.kode_vendor 
                        INNER JOIN db_jenis_reward dbjr ON dbjr.id = dbr.id_jenis_reward 
                        LEFT JOIN db_contactperson dbcp ON dbcp.id = dbr.id_contactperson 
                        where dbr.id = '$id'";


                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $tanggalBuatReward = print_tanggal($row['tanggalbuat']);
                                $documentReferral = $row['nopo'];
                                $quartalReward = $row['quartal'];
                                $jenisReward = $row['idreward'];
                                $keteranganReward = $row['keterangan_reward'];
                                $vendorReward = $row['kodevendor'];
                                $tanggalTagihanReward = print_tanggal($row['tanggaltagih']);
                                $memoReward = $row['memo'];

                                $vendorNamaCP = $row['nama_cp'];
                                $vendorEmailCP = $row['email_cp'];
                                $vendorTelpCP = $row['telp_cp'];
                                
                                $contactPersonReward = $row['dbcpid'];
                            }
                        } else {
                            echo "<script>";
                            echo "window.location.assign('rewards');";
                            echo "</script>";
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            $tanggalBuatReward = isset($_POST['tanggalBuatReward']) ? $_POST['tanggalBuatReward'] : '';
                            $documentReferral = isset($_POST['documentReferral']) ? $_POST['documentReferral'] : '';
                            $quartalReward = isset($_POST['quartalReward']) ? $_POST['quartalReward'] : '';
                            $jenisReward = isset($_POST['jenisReward']) ? $_POST['jenisReward'] : '';
                            //$keteranganReward = isset($_POST['keteranganReward']) ? str_replace(PHP_EOL, '', nl2br($_POST['keteranganReward'])) : '';
                            
                            $keteranganReward = isset($_POST['keteranganReward']) ? preg_replace( "/\r|\n/", "", nl2br($_POST['keteranganReward'])) : '';
                            $keteranganReward = str_replace('"', '&#34;', $keteranganReward);
                            $keteranganReward = str_replace("'", '&#39;', $keteranganReward);
                            
                            $vendorReward = isset($_POST['vendorReward']) ? $_POST['vendorReward'] : '';
                            $tanggalTagihanReward = isset($_POST['tanggalTagihanReward']) ? $_POST['tanggalTagihanReward'] : '';
                            //$memoReward = isset($_POST['memoReward']) ? str_replace(PHP_EOL, '', nl2br($_POST['memoReward'])) : '';
                            $memoReward = isset($_POST['memoReward']) ? preg_replace( "/\r|\n/", "", nl2br($_POST['memoReward'])) : '';
                            $memoReward = str_replace('"', '&#34;', $memoReward );
                            $memoReward = str_replace("'", '&#39;', $memoReward );

                            $vendorNamaCP = isset($_POST['vendorNamaCP']) ? $_POST['vendorNamaCP'] : '';
                            $vendorEmailCP = isset($_POST['vendorEmailCP']) ? $_POST['vendorEmailCP'] : '';
                            $vendorTelpCP = isset($_POST['vendorTelpCP']) ? $_POST['vendorTelpCP'] : '';
                            
                            $contactPersonReward = isset($_POST['contactPersonReward']) ? $_POST['contactPersonReward'] : '0';

                            if (!$tanggalBuatReward) {
                                $tanggalBuatRewardErr = "Tanggal buat reward tidak boleh kosong";
                                $isError = true;
                            }
                            if (!$documentReferral) {
                                $documentReferralErr = "Document Referral / PO tidak boleh kosong";
                                $isError = true;
                            }
                            if (!$quartalReward) {
                                $quartalRewardErr = "Quartal harus dipilih";
                                $isError = true;
                            }
                            if ($jenisReward == 0) {
                                $jenisRewardErr = "Tipe Reward tidak boleh kosong";
                                $isError = true;
                            }
                            if (!$keteranganReward) {
                                $keteranganRewardErr = "Detail Reward tidak boleh kosong";
                                $isError = true;
                            }
                            if (!$tanggalTagihanReward) {
                                $tanggalTagihanRewardErr = "Tanggal tagihan Reward tidak boleh kosong";
                                $isError = true;
                            }
                            if ($vendorReward == 0) {
                                $vendorRewardErr = "Vendor tidak boleh kosong";
                                $isError = true;
                            }
                            
                            if ($contactPersonReward == 0) {
                                $contactPersonRewardErr = "Kontak Person tidak boleh kosong";
                                $isError = true;
                            }
                            
                            if (!$isError) {
                                # Kode LOgin dari Session - profile-navigation.php
                                $tanggalBuatReward_new = date('Y-m-d', strtotime($date = str_replace('/', '-', $tanggalBuatReward)));
                                $tanggalTagihanReward_new = date('Y-m-d', strtotime($date = str_replace('/', '-', $tanggalTagihanReward)));

                                $sql = "UPDATE db_rewards SET
                                        id_jenis_reward = '$jenisReward', 
                                        keterangan_reward = '$keteranganReward',
                                        kode_vendor = '$vendorReward',
                                        no_po = '$documentReferral',
                                        quartal = '$quartalReward', 
                                        tanggal_buat = '$tanggalBuatReward_new',
                                        tanggal_tagih = '$tanggalTagihanReward_new',
                                        memo = '$memoReward',
                                        id_contactperson = '$contactPersonReward',
                                        updated_at = 'now()' 
                                        where id = '$id'";

                                $con->query($sql);
                                
                                $sql = "INSERT INTO db_rewards_history (id_user, id_reward, kode_vendor, id_jenis_reward, id_contactperson, keterangan_reward, no_po, quartal, tanggal_buat, tanggal_tagih, nama_cp, email_cp, telp_cp, status, memo, isDelete, created_at, updated_at) "
                                 . "VALUES ('$kodeLogin', '$id', '$vendorReward', '$jenisReward', '$contactPersonReward', '$keteranganReward', '$documentReferral', '$quartalReward', '$tanggalBuatReward_new', '$tanggalTagihanReward_new', '$vendorNamaCP', '$vendorEmailCP', '$vendorTelpCP', '1', '$memoReward', '0', now(), now())";
                                
                                
                                $con->query($sql);

                                $succeed = true;

                                if ($succeed) {
                                    $succeed = false;
                                    echo "<script>";
                                    echo "swal({";
                                    echo "     title: \"Berhasil mengubah data reward\",";
                                    echo "     type: \"success\",";
                                    echo "     showCancelButton: false,";
                                    echo "     confirmButtonColor: \"Black\",";
                                    echo "     confirmButtonText: \"Ya\",";
                                    echo "     cancelButtonText: \"Tidak\",";
                                    echo "     closeOnConfirm: false,";
                                    echo "     closeOnCancel: true";
                                    echo " },";
                                    echo " function(isConfirm) {";
                                    echo "     if (isConfirm) {  ";
                                    echo "         window.location.assign('edit-reward?q=" . $id . "');";
                                    echo "     }";
                                    echo " }); ";
                                    echo "</script>";

                                    $tanggalBuatReward = date('d/m/Y');
                                    $documentReferral = '';
                                    $jenisReward = '';
                                    $keteranganReward = '';
                                    $vendorReward = '';
                                    $tanggalTagihanReward = '';
                                    $memoReward = '';

                                    $vendorNamaCP = '';
                                    $vendorEmailCP = '';
                                    $vendorTelpCP = '';
                                }
                            }
                        }
                        ?>
                        <?php
                        if ($succeed) {
                            echo "<script>";
                            echo "swal('Berhasil menambahkan reward baru')";
                            echo "</script>";

                            echo "<div class=\"alert alert-success alert-dismissible siku\" id=\"tambah-vendor-berhasil\" role=\"alert\">";
                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                            echo "<strong>BERHASIL !</strong> Telah berhasil reward baru. Lihat semua daftar reward <a href='rewards'>disini.</a>";
                            echo "</div>";
                        }
                        ?>

                        <div class="panel panel-default siku">
                            <div class="panel-heading">
                                <h3 class="panel-title">Form Ubah Data Reward</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="edit-reward?q=<?php echo $id; ?>" style="">
                                    <div class="form-group col-md-4">
                                        <label>Nama Reward</label>
                                        <input class="form-control siku" id="inp_nopo" name="documentReferral" value="<?php echo $documentReferral; ?>" onkeyup="removeError(this.id)" placeholder="Document Referral">
                                    </div>
                                    <div class="form-group col-md-offset-4 col-md-4">
                                        <label>Tanggal Buat <span class="required">*</span></label>
                                        <input class="form-control siku" name="tanggalBuatReward" id="tanggalBuatReward" value="<?php echo $tanggalBuatReward; ?>" data-select="datepicker" accept="" readonly="true" onclick="removeError(this.id)" placeholder="Pilih Tanggal Buat Reward" style="background-color: White; cursor: pointer;" />
                                        <?php
                                        if ($tanggalBuatRewardErr) {
                                            echo "<i class=\"validation-text\" id=\"val-tanggalBuatReward\">" . $tanggalBuatRewardErr . "</i>";
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Quartal</label>
                                        <select id="quartalReward" name="quartalReward" onchange="removeError(this.id)">
                                            <option value="">None</option>
                                            <option value="Q1" <?php echo $quartalReward == "Q1" ? 'selected=\"true\"' : ""; ?> >Q1</option>
                                            <option value="Q2" <?php echo $quartalReward == "Q2" ? 'selected=\"true\"' : ""; ?>>Q2</option>
                                            <option value="Q3" <?php echo $quartalReward == "Q3" ? 'selected=\"true\"' : ""; ?>>Q3</option>
                                            <option value="Q4" <?php echo $quartalReward == "Q4" ? 'selected=\"true\"' : ""; ?>>Q4</option>
                                        </select>
                                        <?php
                                        if ($quartalReward == 0) {
                                            echo "<i class=\"validation-text\" id=\"val-quartalReward\">" . $quartalRewardErr . "</i>";
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Jenis Reward <span class="required">*</span></label>
                                        <select id="jenisReward" name="jenisReward" onchange="removeError(this.id)">
                                            <option value="0">Pilih Tipe Reward</option>
                                            <?php
                                            require './connection.php';

                                            $sql = "SELECT id, nama, created_at, updated_at 
                                                FROM db_jenis_reward 
                                                Where isDelete = 0 
                                                order by nama ASC;";

                                            $result = $con->query($sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                $selected = "";
                                                while ($row = $result->fetch_assoc()) {
                                                    $row['id'] == $jenisReward ? $selected = "selected" : $selected = "";
                                                    echo "<option " . $selected . " value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
                                                }
                                            }
                                            mysqli_close($con);
                                            ?>
                                        </select>
                                            <?php
                                            if ($jenisRewardErr) {
                                                echo "<i class=\"validation-text\" id=\"val-jenisReward\">" . $jenisRewardErr . "</i>";
                                            }
                                            ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Detail Reward <span class="required">*</span></label>
                                        <textarea class="form-control" name="keteranganReward" id="keteranganReward" onkeypress="removeError(this.id)" placeholder="Tambahkan Detail Reward"><?php echo preg_replace('#<br\s*/?>#i', "\n", $keteranganReward); ?></textarea>
<?php
if ($keteranganRewardErr) {
    echo "<i class=\"validation-text\" id=\"val-keteranganReward\">" . $keteranganRewardErr . "</i>";
}
?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Tanggal Tagih Reward <span class="required">*</span></label>
                                        <input class="form-control siku" value="<?php echo $tanggalTagihanReward; ?>" id="tanggalTagihanReward" name="tanggalTagihanReward" data-select="datepicker" accept="" readonly="true" onclick="removeError(this.id)" placeholder="Pilih Tanggal Tagih Reward" style="background-color: White; cursor: pointer;" />
<?php
if ($tanggalTagihanRewardErr) {
    echo "<i class=\"validation-text\" id=\"val-tanggalTagihanReward\">" . $tanggalTagihanRewardErr . "</i>";
}
?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Vendor <span class="required">*</span></label>
                                        <select id="vendorReward" name="vendorReward" onchange="removeError(this.id)">
                                            <option value="0">Pilih Vendor</option>
                                                <?php
                                                require './connection.php';

                                                $sql = "SELECT kode, nama, email, telp, alamat, keterangan, status_hapus, created_at, updated_at 
                                                                                                FROM db_vendor 
                                                                                                Where status_hapus = 0 
                                                                                                order by nama ASC;";

                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    $selected = "";
                                                    while ($row = $result->fetch_assoc()) {
                                                        $row['kode'] == $vendorReward ? $selected = "selected" : $selected = "";
                                                        echo "<option " . $selected . " value='" . $row['kode'] . "'>" . $row['nama'] . "</option>";
                                                    }
                                                }
                                                mysqli_close($con);
                                            ?>
                                        </select>
                                            <?php
                                            if ($vendorRewardErr) {
                                                echo "<i class=\"validation-text\" id=\"val-vendorReward\">" . $vendorRewardErr . "</i>";
                                            }
                                            ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="memoReward" id="memoReward" onkeypress="removeError(this.id)" placeholder="Tambahkan Keterangan Reward"><?php echo preg_replace('#<br\s*/?>#i', "\n", $memoReward); ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Kontak Person</label>
                                    </div>
                                    <?php if ($contactPersonReward == 0):?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" readonly="true" name="vendorNamaCP" id="vendorNamaCP" onkeyup="removeError(this.id)" placeholder="Nama Kontak Person" value="<?php echo $vendorNamaCP; ?>">
                                            <?php
                                            if ($namaCPErr) {
                                                echo "<i class=\"validation-text\" id=\"val-vendorNamaCP\">" . $namaCPErr . "</i>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" readonly="true" name="vendorEmailCP" id="vendorEmailCP" onkeyup="removeError(this.id)" placeholder="Email Kontak Person" value="<?php echo $vendorEmailCP; ?>">
                                            <?php
                                            if ($emailCPErr) {
                                                echo "<i class=\"validation-text\" id=\"val-vendorEmailCP\">" . $emailCPErr . "</i>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>No Hp</label>
                                            <input class="form-control" readonly="true" name="vendorTelpCP" id="vendorTelpCP" onkeyup="removeError(this.id)" placeholder="No Hp Kontak Person" value="<?php echo $vendorTelpCP; ?>">
                                            <?php
                                            if ($telpCPErr) {
                                                echo "<i class=\"validation-text\" id=\"val-vendorTelpCP\">" . $telpCPErr . "</i>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                    <div class="form-group col-md-12">
                                        <?php if ($contactPersonReward == 0):?>
                                        <label>Ubah Kontak Person <span class="required">*</span></label>
                                        <?php endif;?>
                                        <select id="contactPersonReward" name="contactPersonReward" onchange="removeError(this.id)">
                                            <option value="0">Silahkan Pilih Kontak Person</option>
                                                <?php
                                                require './connection.php';

                                                $sql = "SELECT kode, nama, email, telp, alamat, keterangan, status_hapus, created_at, updated_at 
                                                                                                FROM db_vendor 
                                                                                                Where status_hapus = 0 
                                                                                                order by nama ASC;";
                                                $sql = "SELECT id, nama, email, telp  
                                                FROM db_contactperson 
                                                Where isdelete = 0 
                                                order by nama ASC;"; 

                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    $selected = "";
                                                    while ($row = $result->fetch_assoc()) {
                                                        $row['id'] == $contactPersonReward ? $selected = "selected" : $selected = "";
                                                        echo "<option " . $selected . " value='". $row['id'] ."'>" . $row['nama'] . " - " . $row['email'] . ' ( ' . $row['telp'] . ' )'. "</option>";
                                                    }
                                                }
                                                mysqli_close($con);
                                            ?>
                                        </select>
                                            <?php
                                            if ($contactPersonRewardErr) {
                                                echo "<i class=\"validation-text\" id=\"val-contactPersonReward\">" . $contactPersonRewardErr . "</i>";
                                            }
                                            ?>
                                    </div>
                                    <div class="form-group col-md-12" style="margin-top: 0px;">
                                        <button type="submit" class="btn btn-primary siku full-width" name="submit" ><i class="fa fa-save"> </i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script type="text/javascript" src="datepicker/js/jquery.datepicker.js"></script>
        <script src="select-filter/js/select2.min.js"></script>

        <script type="text/javascript">
                                                $('select').select2();
        </script>


        <script type="text/javascript">
            function removeError(id) {
                $("#val-" + id).html("");
                $("#tambah-vendor-berhasil").remove();
            }
        </script>

    </body>

</html>
