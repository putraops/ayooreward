.<?php
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

        <title>Tambah Reward - ayooreward!</title>

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
                color: red;
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
    <?php $currentpage = "sponsorship";?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php require 'profile-navigation.php'; ?>
        <?php 
            echo "<script>";
            if ($create_reward == "0_0") {
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
                        <strong>TAMBAH REWARD BARU</strong>
                    </h1>
                </div>
                <div class="col-md-8">
                        <?php
                        require './connection.php';
                    
                        //echo $jabatanUserLogin;
                        //echo $cabangUserLogin;
        
                        $valuecabangreward = 0;
                        
                        //echo $cabangUserLogin;
                        //echo $tempcabangreward;
        
                        $isError = false;
                        $succeed = false;
                        $last_id;
                        $tanggalBuatRewardErr = $tanggalTagihanRewardErr = $documentReferralErr = $jenisRewardErr = $keteranganRewardErr = $vendorRewardErr = "";
                        $quartalRewardErr = "";
                        $namaCPErr = $emailCPErr = $telpCPErr = "";
                        $contactPersonRewardErr = "";
                        
                        
                        $tanggalBuatReward = isset($_POST['tanggalBuatReward']) ? $_POST['tanggalBuatReward'] : '';
                        $documentReferral = isset($_POST['documentReferral']) ? $_POST['documentReferral'] : '';
                        $quartalReward = isset($_POST['quartalReward']) ? $_POST['quartalReward'] : '';
                        $jenisReward = isset($_POST['jenisReward']) ? $_POST['jenisReward'] : '';
                        //$keteranganReward = isset($_POST['keteranganReward']) ? str_replace(PHP_EOL, '', nl2br($_POST['keteranganReward'])) : '';
                        //preg_replace( "/\r|\n/", "", $yourString );
                        $keteranganReward = isset($_POST['keteranganReward']) ? preg_replace("/\r|\n/", "", nl2br($_POST['keteranganReward'])) : "";
                        $keteranganReward = htmlspecialchars($keteranganReward , ENT_QUOTES);
                        
                        if ($jabatanUserLogin == "user") {
                            $valuecabangreward = $cabangUserLogin;
                        } else {
                            $valuecabangreward = isset($_POST['cabangReward']) ? $_POST['cabangReward'] : '0';
                        }
                        
                        //$keteranganReward = str_replace('"', '&#34;', $keteranganReward);
                        //$keteranganReward = str_replace('"', '&#34;', $keteranganReward);
                        //$keteranganReward = str_replace("'", '&#39;', $keteranganReward);htmlspecialchars
                        
                        
                        
                        
                        $vendorReward = isset($_POST['vendorReward']) ? $_POST['vendorReward'] : '';
                        $tanggalTagihanReward = isset($_POST['tanggalTagihanReward']) ? $_POST['tanggalTagihanReward'] : '';
                        //$memoReward = isset($_POST['memoReward']) ? str_replace(PHP_EOL, '', nl2br($_POST['memoReward'])): '';                        
                        $memoReward = isset($_POST['memoReward']) ? preg_replace("/\r|\n/", "", nl2br($_POST['memoReward'])) : "";
                        $memoReward = htmlspecialchars($memoReward , ENT_QUOTES);
                        //$memoReward = str_replace('"', '&#34;', $memoReward);
                        //$memoReward = str_replace("'", '&#39;', $memoReward);
                        
                        $contactPersonReward = isset($_POST['contactPersonReward']) ? $_POST['contactPersonReward'] : '';
                        
                        $vendorNamaCP = isset($_POST['vendorNamaCP']) ? $_POST['vendorNamaCP'] : '';
                        $vendorEmailCP = isset($_POST['vendorEmailCP']) ? $_POST['vendorEmailCP'] : '';
                        $vendorTelpCP = isset($_POST['vendorTelpCP']) ? $_POST['vendorTelpCP'] : '';
                        
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (!$tanggalBuatReward) {
                                $tanggalBuatRewardErr = "Tanggal buat reward tidak boleh kosong";
                                $isError = true;
                            }
                            if (!$documentReferral) {
                                $documentReferralErr = "Nama Reward tidak boleh kosong";
                                $isError = true;
                            } 
                            if (!$quartalReward) {
                                $quartalRewardErr = "Quartal harus dipilih";
                                $isError = true;
                            }
                            if ($jenisReward == 0) {
                                $jenisRewardErr = "Jenis Reward tidak boleh kosong";
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
                                
                                if ($memoReward == "") {
                                    $memoReward = "-";
                                }
                                
                                $sql = "INSERT INTO db_rewards (id_user, kode_vendor, id_jenis_reward, id_contactperson, id_cabang, keterangan_reward, no_po, quartal, tanggal_buat, tanggal_tagih, nama_cp, email_cp, telp_cp, status, memo, isDelete, created_at, updated_at) "
                                 . "VALUES ('$kodeLogin', '$vendorReward', '$jenisReward', '$contactPersonReward', '$valuecabangreward', '$keteranganReward', '$documentReferral', '$quartalReward', '$tanggalBuatReward_new', '$tanggalTagihanReward_new', '$vendorNamaCP', '$vendorEmailCP', '$vendorTelpCP', '1', '$memoReward', '0', now(), now())";
                                
                                if ($con->query($sql) === TRUE) {
                                    $last_id = $con->insert_id;
                                } 
                                
                                $sql = "INSERT INTO db_rewards_history (id_user, id_reward, kode_vendor, id_jenis_reward, id_contactperson, id_cabang, keterangan_reward, no_po, quartal, tanggal_buat, tanggal_tagih, nama_cp, email_cp, telp_cp, status, memo, isDelete, created_at, updated_at) "
                                 . "VALUES ('$kodeLogin', '$last_id', '$vendorReward', '$jenisReward', '$contactPersonReward', '$valuecabangreward', '$keteranganReward', '$documentReferral', '$quartalReward', '$tanggalBuatReward_new', '$tanggalTagihanReward_new', '$vendorNamaCP', '$vendorEmailCP', '$vendorTelpCP', '1', '$memoReward', '0', now(), now())";
                                
                                
                                $con->query($sql);
                                
                                $succeed = true;
                                $tanggalBuatReward = date('d/m/Y');
                                $documentReferral = '';
                                $quartalReward = '';
                                $jenisReward =  '';
                                $keteranganReward = '';
                                $vendorReward = '';
                                $tanggalTagihanReward = '';
                                $memoReward = '';
                                
                                $vendorNamaCP = '';
                                $vendorEmailCP = '';
                                $vendorTelpCP = '';
                            }
                        }
                        ?>
                        <?php
                        if ($succeed) {
                            $urlreport = 'tambah-reward-report?q=' . $last_id;
                            echo "<script>";
                            echo "swal('Berhasil menambahkan reward baru');";
                            echo "window.open('".$urlreport."');";
                            //echo "window.open(window.location.href + '-report' + "?q=" + result)";
                                    
                            echo "</script>";
                            
                            echo "<div class=\"alert alert-success alert-dismissible siku\" id=\"tambah-vendor-berhasil\" role=\"alert\">";
                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                            echo "<strong>BERHASIL !</strong> Telah berhasil reward baru. Lihat semua daftar reward <a href='rewards'>disini.</a>";
                            echo "</div>";
                        }
                        ?>
                    
                    <div class="panel panel-default siku">
                        <div class="panel-heading">
                          <h3 class="panel-title">Form Tambah Reward Baru</h3>
                        </div>
                        <div class="panel-body">
                            <form class="row" role="form" method="post" action="tambah-reward" style="">
                                <?php if ($jabatanUserLogin == "admin"): ?>
                                <div class="form-group col-md-12">
                                    <label>Cabang</label>
                                    <select id="cabangReward" name="cabangReward" onchange="removeError(this.id)">
                                        <option value="0" <?php echo $valuecabangreward == "0" ? "selected" : ""; ?>>Semua Cabang</option>
                                        <?php
                                        require './connection.php';

                                        $sql = "SELECT id, nama, created_at, updated_at FROM db_cabang Where status > 0 order by nama ASC;";

                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $selected = "";
                                            while ($row = $result->fetch_assoc()) {
                                                $row['id'] == $valuecabangreward ? $selected = "selected" : $selected = "";
                                                echo "<option " . $selected . " value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
                                            }
                                        }
                                        mysqli_close($con);
                                        ?>
                                    </select>
                                </div>
                                <?php endif;?>
                                <div class="form-group col-md-4">
                                    <label>Nama Reward</label>
                                    <input class="form-control siku" id="inp_nopo" name="documentReferral" value="<?php echo $documentReferral; ?>" onkeyup="removeError(this.id)" placeholder="Nama Reward">
                                </div>
                                <div class="form-group col-md-offset-4 col-md-4">
                                    <label>Tanggal Buat <span class="required">*</span></label>
                                    <input class="form-control siku" name="tanggalBuatReward" id="tanggalBuatReward" value="<?php echo date('d/m/Y'); ?>" data-select="datepicker" accept="" readonly="true" onclick="removeError(this.id)" placeholder="Pilih Tanggal Buat Reward" style="background-color: White; cursor: pointer;" />
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
                                        <option value="Q1" <?php echo $quartalReward == "Q1" ? 'selected=\"true\"': ""; ?> >Q1</option>
                                        <option value="Q2" <?php echo $quartalReward == "Q2" ? 'selected=\"true\"': ""; ?>>Q2</option>
                                        <option value="Q3" <?php echo $quartalReward == "Q3" ? 'selected=\"true\"': ""; ?>>Q3</option>
                                        <option value="Q4" <?php echo $quartalReward == "Q4" ? 'selected=\"true\"': ""; ?>>Q4</option>
                                    </select>
                                    <?php
                                        if ($quartalReward == 0) {
                                            echo "<i class=\"validation-text\" id=\"val-quartalReward\">" . $quartalRewardErr . "</i>";
                                        }
                                    ?>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <button type="button" onclick="addReward()" class="btn btn-primary btn-xs pull-right siku" style="font-family: twcent;"><i class="fa fa-plus-circle"></i> Tambah Jenis Reward</button>
                                    <label>Jenis Reward <span class="required">*</span></label>
                                    <select id="jenisReward" name="jenisReward" onchange="removeError(this.id)">
                                        <option value="0">Pilih Jenis Reward</option>
                                        <?php
                                    
                                        require './connection.php';

                                        $sql = "SELECT id, nama, created_at, updated_at FROM db_jenis_reward  Where isDelete = 0 order by nama ASC;";                            

                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $selected = "";
                                            while ($row = $result->fetch_assoc()) {
                                                $row['id'] == $jenisReward ? $selected = "selected" : $selected = ""; 
                                                echo "<option " . $selected . " value='". $row['id'] ."'>" . $row['nama'] . "</option>";
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
                                    <textarea class="form-control" name="keteranganReward" id="keteranganReward" onkeypress="removeError(this.id)" placeholder="Tambahkan Detail Reward" style="resize: none;"><?php echo $keteranganReward;?></textarea>
                                    <?php
                                        if ($keteranganRewardErr) {
                                            echo "<i class=\"validation-text\" id=\"val-keteranganReward\">" . $keteranganRewardErr . "</i>";
                                        }
                                    ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Tanggal Tagih Reward <span class="required">*</span></label>
                                    <input class="form-control siku" value="<?php echo $tanggalTagihanReward;?>" id="tanggalTagihanReward" name="tanggalTagihanReward" data-select="datepicker" accept="" readonly="true" onclick="removeError(this.id)" placeholder="Pilih Tanggal Tagih Reward" style="background-color: White; cursor: pointer;" />
                                    <?php
                                        if ($tanggalTagihanRewardErr) {
                                            echo "<i class=\"validation-text\" id=\"val-tanggalTagihanReward\">" . $tanggalTagihanRewardErr . "</i>";
                                        }
                                    ?>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="button" onclick="addVendor()" class="btn btn-primary btn-xs pull-right siku" style="font-family: twcent;"><i class="fa fa-plus-circle"></i> Tambah Vendor</button>
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
                                                echo "<option " . $selected . " value='". $row['kode'] ."'>" . $row['nama'] . "</option>";
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
                                    <textarea class="form-control" name="memoReward" id="memoReward" onkeypress="removeError(this.id)" placeholder="Tambahkan Keterangan Reward" style="resize: none;"><?php echo $memoReward;?></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="button" onclick="addKontakPerson()" class="btn btn-primary btn-xs pull-right siku" style="font-family: twcent;"><i class="fa fa-plus-circle"></i> Tambah Kontak Person</button>
                                    <label>Kontak Person <span class="required">*</span></label>
                                    <select id="contactPersonReward" name="contactPersonReward" onchange="removeError(this.id)">
                                        <option value="0">Silahkan Pilih Kontak Person</option>
                                        <?php
                                    
                                        require './connection.php';

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
                                        if ($vendorRewardErr) {
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

        <div class="modal fade" id="modal-addvendor" role="dialog">
            <div class="modal-dialog siku">
                <!-- Modal content-->
                <div class="modal-content siku">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Vendor</h4>
                    </div>
                    <div class="modal-body"><div class="form-group">
                        <span class='required'>*</span> Harus diisi    
                        <div class="form-group" style='margin-top: 15px;'>
                            <label>Nama <span class='required'>*</span></label>
                            <input class="form-control siku" name="vendorName" id="vendorName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama" value="">
                            <i class="validation-text" id="val-vendorName"></i>
                        </div>
                        <div class="form-group">
                            <label>NPWP</label>
                            <input class="form-control" name="vendorNpwp" id="vendorNpwp" onkeyup="removeError(this.id)" placeholder="Masukkan NPWP" value="">
                            <i class="validation-text" id="val-vendorNpwp"></i>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="vendorAddress" rows="3" id="vendorAddress" onkeyup="removeError(this.id)" placeholder="Masukkan Alamat" style="resize: none;"></textarea>
                            <i class="validation-text" id="val-vendorAddress"></i>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="vendorKeterangan" rows="3" id="vendorKeterangan" onkeyup="removeError(this.id)" placeholder="Masukkan Keterangan" style="resize: none;"></textarea>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary siku" onclick="saveVendor()">Tambah</button>
                            <button type="button" class="btn btn-default siku" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>    

        </div>
        
        <div class="modal fade" id="modal-addreward" role="dialog">
            <div class="modal-dialog siku">
                <!-- Modal content-->
                <div class="modal-content siku">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Jenis Reward</h4>
                    </div>
                    <div class="modal-body">
                        <span class='required'>*</span> Harus diisi    
                        <div class="form-group" style='margin-top: 15px;'>
                            <div class="form-group">
                                <label>Nama <span class="required">*</span></label>
                                <input class="form-control siku" name="jenisRewardName" id="jenisRewardName" onkeyup="removeError(this.id)" placeholder="Masukkan Jenis Reward" value="">
                                <i class="validation-text" id="val-jenisRewardName"></i>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary siku" onclick="saveReward()">Tambah</button>
                            <button type="button" class="btn btn-default siku" data-dismiss="modal">Batal</button>
                        </div>
                    </div>

                </div>
            </div>    
        </div>
        <div class="modal fade" id="modal-addcontactperson" role="dialog">
            <div class="modal-dialog siku">
                <!-- Modal content-->
                <div class="modal-content siku">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Kontak Person</h4>
                    </div>
                    <div class="modal-body">
                        <span class='required'>*</span> Harus diisi    
                        <div class="form-group" style='margin-top: 15px;'>
                            <div class="form-group">
                                <label>Nama <span class="required">*</span></label>
                                <input class="form-control siku" name="namaCP" id="namaCP" onkeyup="removeError(this.id)" placeholder="Masukkan Nama" value="">
                                <i class="validation-text" id="val-namaCP"></i>
                            </div>
                        </div>
                        <div class="form-group" style='margin-top: 15px;'>
                            <div class="form-group">
                                <label>Email <span class="required">*</span></label>
                                <input class="form-control siku" name="emailCP" id="emailCP" onkeyup="removeError(this.id)" placeholder="Masukkan Email" value="">
                                <i class="validation-text" id="val-emailCP"></i>
                            </div>
                        </div>
                        <div class="form-group" style='margin-top: 15px;'>
                            <div class="form-group">
                                <label>Telp / No Hp <span class="required">*</span></label>
                                <input class="form-control siku" name="telpCP" id="telpCP" onkeyup="removeError(this.id)" placeholder="Masukkan Telp / No Hp" value="">
                                <i class="validation-text" id="val-telpCP"></i>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary siku" onclick="saveKontakPerson()">Tambah</button>
                            <button type="button" class="btn btn-default siku" data-dismiss="modal">Batal</button>
                        </div>
                    </div>

                </div>
            </div>    
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
        function removeError(id){
            $("#val-" + id).html("");
            $("#tambah-vendor-berhasil").remove();
        }
    </script>
    
    <script type="text/javascript">
        function addVendor() {
            $("#vendorName").val("");
            $("#vendorNpwp").val("");
            $("#vendorAddress").val("");
            $("#vendorKeterangan").val("");
            
            $("#modal-addvendor").modal('show');
        }
        
        function saveVendor() {
            var nama = $("#vendorName").val();
            var npwp = $("#vendorNpwp").val();
            var alamat = $("#vendorAddress").val();
            var keterangan = $("#vendorKeterangan").val();
                    
                    
            var isError = false;
            
            if (!nama) {
                $("#val-vendorName").html("Nama Vendor tidak boleh kosong.");
                isError = true;
            }
            
            
            if (!isError) {
                var url = "ajax/create-vendor.php";
                $.ajax({
                    url: url,
                    data: {
                       nama: nama,
                       npwp: npwp,
                       alamat: alamat,
                       keterangan: keterangan
                    },
                    success: function(data, textStatus, jqXHR) {
                        //console.log(data);
                        var obj = $.parseJSON(data);
                        //    console.log(obj);
                            
                        if (obj == "0") {
                            swal("Gagal tambah vendor", "", "warning");
                        } else {
                            $("#vendorReward").append("<option value='"+obj+"'>"+ nama +"</option>");
                            swal("Berhasil tambah vendor", "", "success");
                            $("#modal-addvendor").modal('hide');
                        }
                    }
                }); 
            }
        }
        
        function addReward() {
            $("#modal-addreward").modal('show');
        }
        
        function saveReward() {
            var nama = $("#jenisRewardName").val();
                    
            var isError = false;
            
            if (!nama) {
                $("#val-jenisRewardName").html("Jenis Reward tidak boleh kosong.");
                isError = true;
            }
            
            if (!isError) {
                var url = "ajax/create-jenis-reward.php";
                $.ajax({
                    url: url,
                    data: {
                       nama: nama
                    },
                    success: function(data, textStatus, jqXHR) {
                        var obj = $.parseJSON(data);
                            
                        if (obj == "0") {
                            swal("Gagal tambah jenis reward", "", "warning");
                        } else {
                            $("#jenisReward").append("<option value='"+obj+"'>"+ nama +"</option>");
                            swal("Berhasil tambah jenis reward", "", "success");
                            $("#modal-addreward").modal('hide');
                        }
                    }
                }); 
            }
        }
        
        function addKontakPerson() {
            $("#namaCP").val("");
            $("#emailCP").val("");
            $("#telpCP").val("");
            
            $("#modal-addcontactperson").modal('show');
        }
        
        function saveKontakPerson() {
            var nama  = $("#namaCP").val();
            var email = $("#emailCP").val();
            var telp  = $("#telpCP").val();
                    
            var isError = false;
            
            if (!nama) {
                $("#val-namaCP").html("Nama tidak boleh kosong.");
                isError = true;
            }
            if (!email) {
                $("#val-emailCP").html("Email tidak boleh kosong.");
                isError = true;
            }
            if (!telp) {
                $("#val-telpCP").html("Telp / No Hp tidak boleh kosong.");
                isError = true;
            }
            
            if (!isError) {
                var url = "ajax/create-contactperson.php";
                $.ajax({
                    url: url,
                    data: {
                       nama: nama,
                       email: email,
                       telp: telp
                    },
                    success: function(data, textStatus, jqXHR) {
                        var obj = $.parseJSON(data);
                            
                        if (obj == "0") {
                            swal("Gagal tambah kontak person", "", "warning");
                        } else {
                            $("#contactPersonReward").append("<option value='"+obj+"'>"+ nama + " - " + email + " ( " + telp + " ) " +  "</option>");
                            swal("Berhasil tambah kontak person", "", "success");
                            $("#modal-addcontactperson").modal('hide');
                        }
                    }
                }); 
            }
        }
    </script>

</body>

</html>
