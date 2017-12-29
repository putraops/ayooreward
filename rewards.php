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

            <title>Daftar Reward - ayooreward!</title>

            <!-- Bootstrap Core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="css/sb-admin.css" rel="stylesheet">

            <!-- Morris Charts CSS /// NO NEED -->
            <link href="css/plugins/morris.css" rel="stylesheet">

            <!-- Custom Fonts -->
            <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

            <link rel="stylesheet" type="text/css" href="datatables/css/jquery.dataTables.min.css">
            
<!--            <link rel="stylesheet" type="text/css" href="datatables/css/jquery.dataTables.css">-->
        
<!--            <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">-->

            <link href="datepicker/css/jquery.datepicker.css" rel="stylesheet" type="text/css"/>	
            
            

            <script src="sweetalert/dist/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
            
            <link href="select-filter/css/select2.min.css" rel="stylesheet" />

            <style>
                .fade-scale {
                  transform: scale(0);
                  opacity: 0;
                  -webkit-transition: all 0.2s linear;
                  -o-transition: all 0.2s linear;
                  transition: all 0.2s linear;
                }

                .fade-scale.in {
                  opacity: 1;
                  transform: scale(1);
                }   
                .hyperlink {
                    cursor: pointer;
                }
                .no-hyperlink {
                    cursor: auto;
                }

                .sweet-alert.showSweetAlert, .sweet-alert .confirm {
                    border-radius: 0px;
                }
                .sweet-alert .confirm {
                    background-color: black !important; 
                    color: white;
                    margin-top: 0px;
                }
                .btn-action {
                    min-width: 42px;
                    max-width: 42px;    
                }

                .datepicker {
                    z-index: 9999 !important;
                }
                #m-input-reward-label {
                    margin-top: -5px;
                }
                tfoot input {
                    width: 100%;
                    padding: 3px;
                    box-sizing: border-box;
                }
                .badge-error {
                  background-color: #b94a48;
                }
                .badge-warning {
                  background-color: #f89406;
                }
                .badge-success {
                  background-color: #5cb85c;
                }
                .badge-info {
                  background-color: #3a87ad;
                }
                .badge-inverse {
                  background-color: #333333;
                }
                
                td.details-control {
                    background: url('datatables/details_open.png') no-repeat center center;
                }
                tr.shown td.details-control {
                    background: url('datatables/details_close.png') no-repeat center center;
                }
                td.details-control, td.td-control {
                    cursor: pointer;
                }
                
                .badge-hyperlink {
                    color: blue;
                    border: 1px solid black;
                    background-color: white;
                    padding: 3px;
                    padding-left: 5px;
                    padding-right: 5px;
                }
                
                .form-group .select2-container {
                    width: 150px !important;
                }
                .form-group .select2-selection {
                    height: 35px;
                    padding-top: 3px;
                    border: 1px solid #ccc;
                    border-radius: 0px;

                }
            </style>
            
        </head>
    <body>
        
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php require 'profile-navigation.php'; ?>
        </nav>
        
        <?php
        require './connection.php';
        
        
        ## Get Data Cabang
        $idcabang = 0;
        $sql = "SELECT kode, id_cabang
                FROM db_cabang c
                INNER JOIN db_user u ON u.id_cabang = c.id 
                WHERE u.kode = '$iduserlogin';";

        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['id_cabang'] > 0 )
            $idcabang = $row['id_cabang'];
        } 
        ##---------------------------------------------------------------------- END Data Cabang
        
        ## Get Data Reward
        $arrayStatus = array();
        
        $firstdate = isset($_GET['dfirst']) ? $con->real_escape_string($_REQUEST['dfirst']) : '';
        $lastdate = isset($_GET['dlast']) ? $con->real_escape_string($_REQUEST['dlast']) : '';
        
        $param_firstdate = $param_lastdate = "";

        $temp_firstdate = explode("-", $firstdate);
        $temp_lastdate = explode("-", $lastdate);

        if ($firstdate != "" && $lastdate != "") {
            $param_firstdate = $temp_firstdate[2] . "/" . $temp_firstdate[1] . "/" . $temp_firstdate[0];
            $param_lastdate = $temp_lastdate[2] . "/" . $temp_lastdate[1] . "/" . $temp_lastdate[0];
        }

        $tipereward = isset($_GET['tipereward']) ? $con->real_escape_string($_REQUEST['tipereward']) : '';
        $cabangreward = isset($_GET['cabangreward']) ? $con->real_escape_string($_REQUEST['cabangreward']) : '';
        $vendorreward = isset($_GET['vendorreward']) ? $con->real_escape_string($_REQUEST['vendorreward']) : '';
        $brandreward = isset($_GET['brandreward']) ? $con->real_escape_string($_REQUEST['brandreward']) : '';
        $statusfilter = isset($_GET['status']) ? $con->real_escape_string($_REQUEST['status']) : '';
        $quartalReward = isset($_GET['quartal']) ? $con->real_escape_string($_REQUEST['quartal']) : '';
        $filter = isset($_GET['filter']) ? $con->real_escape_string($_REQUEST['filter']) : '';
        
        $backcolor = "";
        $sql =  "Select dbv.kode as kodevendor, 
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
                        dbcp.telp as telp_tablecontactperson ";
        $sql .= "From db_rewards dbr
                 LEFT JOIN db_vendor dbv ON dbv.kode = dbr.kode_vendor 
                 LEFT JOIN db_brand dbb ON dbb.id = dbr.idbrand 
                 INNER JOIN db_user dbu ON dbu.kode = dbr.id_user 
                 LEFT JOIN db_user dbu1 ON dbu1.kode = dbr.user_selesai
                 INNER JOIN db_status dbs ON dbr.status = dbs.kode 
                 INNER JOIN db_jenis_reward dbjr ON dbjr.id = dbr.id_jenis_reward 
                 LEFT JOIN db_contactperson dbcp ON dbcp.id = dbr.id_contactperson ";
        $sql .=  "LEFT JOIN db_cabang c ON c.id = dbr.id_cabang ";
        $sql .=  "WHERE dbr.isDelete = 0 AND dbs.isDelete = 0 ";
        
        ## Akses
        if ($jabatanUserLogin == "admin") {
            ## Do Nothing
        } else {
            if ($cabangUserLogin != "0") {
                $sql .= "and dbr.id_cabang = '$cabangUserLogin' ";
            }
        }        
        
        ## Filter
        if ($filter == "true") {
            if ($firstdate && $lastdate) {
                $sql .= "and dbr.tanggal_buat between '$firstdate' AND '$lastdate' ";
            }
            if ($tipereward && $tipereward != "0") {
                $sql .= "and dbr.id_jenis_reward = '$tipereward' ";
            }
            if ($statusfilter && $statusfilter != "0") {
                $sql .= "and dbs.kode = '$statusfilter' ";
            }
            if ($quartalReward && $quartalReward != "") {
                $sql .= "and dbr.quartal = '$quartalReward' ";
            }
            if ($cabangreward && $cabangreward != "0") {
                $sql .= "and dbr.id_cabang = '$cabangreward' ";
            }
            if ($vendorreward && $vendorreward != "0") {
                $sql .= "and dbr.kode_vendor = '$vendorreward' ";
            }
            if ($brandreward && $brandreward != "0") {
                $sql .= "and dbr.idbrand = '$brandreward' ";
            }  
        } else {
            ##$sql .= "and dbs.kode != '2' AND dbs.kode != '3' ";
        }
        
        //        echo $cabangUserLogin;exit;
        
        
        
        //$sql .= "and dbr.id = '51' ";
        $sql .= "order by dbr.created_at desc "; 
        
        
        //$sql .=  "LIMIT 3";
        
        //echo $sql; exit;
        
        $result = $con->query($sql);
        
        $myfile = fopen("datatables/objects.txt", "w") or die("Unable to open file!");
        $printfile = "{";
        $printfile .= '"data": [';
        
        if ($result->num_rows > 0) {
            // output data of each row
            $nomor = 1;
            $jumlah = 0;
            while ($row = $result->fetch_assoc()) {
                $tempfile = "";
                $date=date_create($row['tanggalbuat']);
                
                $namacp = $row['nama_cp'] == "" ? "-" : $row['nama_cp'];
                $emailcp = $row['email_cp'] == "" ? "-" : $row['email_cp'];
                $telpcp = $row['telp_cp'] == "" ? "-" : $row['telp_cp'];
                
                if ($row['id_tablecontactperson'] != "") {
                    $namacp = $row['nama_tablecontactperson'];
                    $emailcp = $row['email_tablecontactperson'];
                    $telpcp = $row['telp_tablecontactperson'];
                }

                $tempfile .= '{';
                $tempfile .= '"no": "'.$nomor.'",';
                $tempfile .= '"id": "'.$row['id'].'",';
                $tempfile .= '"documentreferral": "'.$row['nopo'].'",';
                $tempfile .= '"quartal": "'.$row['quartal'].'",';
                $tempfile .= '"createdby": "'.$row['namauser'].'",';
                $tempfile .= '"createddate": "' . date_format($date,"Y-m-d") . '",';
                $tempfile .= '"duedate": "'.$row['tanggaltagih'].'",';

                $tempfile .= '"contactperson": "'. $namacp .' <br/>'. $emailcp . ' <br/>'. $telpcp .'",';

                $tempfile .= '"closeddate": "'.$row['tanggalselesai'].'",';
                $tempfile .= '"reward": "'. $row['jenisreward'] . ' <br/>Detail: ' . ($row['keterangan_reward']) .'",';
                $tempfile .= '"detailreward": "'. $row['keterangan_reward'].'",';
                $tempfile .= '"namavendor": "<span class=\'hyperlink\' style=\'color: blue;\' onclick=\"showdetail('. $row['id'] .', '. $row['kodevendor'] .', \'itemvendor\')\">'.$row['namavendor'].'</span>",';
                $tempfile .= '"namabrand": "'.$row['namabrand'].'",';
                $tempfile .= '"status": "'.$row['status'].'",';
                $tempfile .= '"kodewarna": "'.$row['kodewarna'].'",';
                $tempfile .= '"userselesai": "'.$row['userselesai'].'",';
                $tempfile .= '"keterangan": "'.$row['memo'].'",';
                $tempfile .= '"keteranganclose": "'.$row['keteranganclose'].'",';
                
//                if ($row['keteranganclose'] == "") {
//                    $tempfile .= '"keteranganclose": "",';
//                } else {
//                    $tempfile .= '"keteranganclose": "'.$row['keteranganclose'].'",';
//                }
                
                if ($row['namacabang'] == "") {
                    $tempfile .= '"cabang": "Semua Cabang",';
                } else {
                    $tempfile .= '"cabang": "'.$row['namacabang'].'",';
                }
                    
                $tempfile .= '"btnlihat": "<a onclick=\'detailreward('.$row['id'].')\' class=\'btn btn-success btn-action btn-xs siku\'>Detail</a>",';
                
                ## Aksi 
                $tempfile .= '"btndelete": "';
                $tempfile .= '<a onclick=\'detailreward('.$row['id'].')\' class=\'btn btn-success btn-action btn-xs siku\'>Detail</a> <br/>';
                if ($delete_reward == "0_0" && $update_reward == "0_0") {
                    ## Do Nothing
                } else {
                    if ($update_reward != "0_0") {
                        $tempfile .= '<a href=\'edit-reward?q='. $row['id'] .'\' class=\'btn btn-default btn-action btn-xs siku\'>Ubah</a> <br/>';
                    }
                    if ($delete_reward != "0_0") {
                        $tempfile .= '<a class=\'btn btn-danger btn-action btn-xs siku \' onclick=\"deletereward('. $row['id'] .', this)\" >Hapus</a>';
                    }                
                }
                $tempfile .= '",';                            

                $temp = ' hyperlink \"'; 
                $temp .= 'title=\'Klik untuk menggubah status reward\' onclick=\"showdetail('. $row['id'] .', '. $row['status'] .', \'itemstatus\')\" ';

                $tempfile .= '"onlystatusname": "'.$row['statusnama'].'",';
                $tempfile .= '"statusname": "<span class=\"badge-hyperlink';
                if ($row['status'] == 2 || $row['status'] == 3) {
                    if  ($_SESSION["roleLogin"] == "admin") {
                        $tempfile .= $temp;
                    } else {
                        $tempfile .= ' no-hyperlink \"'; 
                    }
                } else {
                    $tempfile .= $temp;
                }

                $tempfile .= '>';
                $tempfile .= $row['statusnama'];//. $_SESSION["roleLogin"];
                $tempfile .= '</span>"';

                
                
                
                
                
                if ($nomor < $result->num_rows)
                {
                    $tempfile .= '},';
                } else if ($nomor == $result->num_rows) {
                    
                    $tempfile .= '}';
                }

                $printfile .= $tempfile;

//                if ($jabatanUserLogin == "admin" || $cabangUserLogin == "0") { ## Pengecekan Data yang ada di cabang 
//                    if ($nomor < $result->num_rows) {
//                        $tempfile .= ',';
//                    }
//                    $printfile .= $tempfile;
//                
//                } else {
//                    //echo "<script>alert('asd".$idcabang . "-" . $row['idcabang'] ."')</script>";
//                    if ($idcabang != $row['idcabang']) {
//                        //$tempfile = "";
//                    } else {
//

//                        //echo $tempfile; exit;
//                    }
//                }    
                
                $nomor++;
            }
        } 
        
        $printfile .= "]";
        $printfile .= "}";
        
        //echo $printfile; exit;
        fwrite($myfile, $printfile);
        fclose($myfile);
       
        ?>
       
        <div id="page-wrapper">
            <div class="container-fluid" style="margin-bottom: 30px;">
                <!-- Page Heading -->
                <div class="row" style="margin-top: -30px;">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <strong>DAFTAR REWARD</strong>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if ($create_reward != "0_0"): ?>
                        <a href="tambah-reward" type="button" class="btn btn-info siku pull-left"><strong>+</strong> Tambah Reward Baru</a><br/><br/>
                        <?php endif;?>
                        
                        <?php // if ($create_laporan != "0_0"):?>
                        <div class="pull-left" style="margin: 15px 0px 25px 0px;">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>Tipe Reward: </label>
                                    <select id="jenisReward" name="jenisReward" onchange="removeError(this.id)">
                                        <option value="0">Semua Tipe Reward</option>
                                        <?php
                                        //require './connection.php';
                                        $sql = "SELECT id, nama, created_at, updated_at FROM db_jenis_reward  Where isDelete = 0 order by nama ASC;";                            

                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $selected = "";
                                            while ($row = $result->fetch_assoc()) {
                                                $row['id'] == $tipereward ? $selected = "selected" : $selected = ""; 
                                                echo "<option " . $selected . " value='". $row['id'] ."'>" . $row['nama'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    &nbsp;<label>Status: </label>
                                    <select class="form-control" class="cbo-status-invoice" id="status-filter" onclick="removeErrorText(this.id)">
                                        <option value="0">Semua Status</option>
                                        <?php
                                        $sql = "Select kode, nama from db_status WHERE no_urut != 0 AND isDelete = 0 ORDER BY no_urut ASC";

                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $nomor = 1;
                                            $lastid = "";
                                            $selected = "";
                                            
                                            while ($row = $result->fetch_assoc()) {
                                                $row['kode'] == $statusfilter ? $selected = "selected" : $selected = ""; 
                                                echo "<option " . $selected . " id='status-" . $row['kode'] . "' value='" . $row['kode'] . "'>" . $row['nama'] . "</option>";
                                                array_push($arrayStatus, array($row['kode'], $row['nama']));
                                            }
                                        }
                                        //print_r($arrayStatus);
                                        ?>
                                    </select>
                                    <i class="validation-text" id="val-status-invoice" style="letter-spacing: 0px;"></i>
                                </div>
                                <?php if ($jabatanUserLogin == "admin" || $cabangUserLogin == "0") :?>
                                    <div class="form-group">
                                        <label>Cabang: </label>
                                        <select id="cabangReward" name="cabangReward" onchange="removeError(this.id)" style="padding: 8px;">
                                            <option value="0">Semua Cabang</option>
                                            <?php
                                            //require './connection.php';
                                            $sql = "SELECT id, nama, created_at, updated_at FROM db_cabang Where status != 0 order by nama ASC;";                            

                                            $result = $con->query($sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                $selected = "";
                                                while ($row = $result->fetch_assoc()) {
                                                    $row['id'] == $cabangreward ? $selected = "selected" : $selected = ""; 
                                                    echo "<option " . $selected . " value='". $row['id'] ."'>" . $row['nama'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label>Vendor: </label>
                                    <select id="vendorReward" name="vendorReward" onchange="removeError(this.id)" style="padding: 8px;">
                                        <option value="0">Semua Vendor</option>
                                        <?php
                                        //require './connection.php';
                                        $sql = "SELECT kode, nama, email, telp, alamat, keterangan, status_hapus, created_at, updated_at 
                                                FROM db_vendor 
                                                Where status_hapus = 0 
                                                order by nama ASC;"; 
                                         
                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $selected = "";
                                            while ($row = $result->fetch_assoc()) {
                                                $row['kode'] == $vendorreward ? $selected = "selected" : $selected = ""; 
                                                echo "<option " . $selected . " value='". $row['kode'] ."'>" . $row['nama'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Brand: </label>
                                    <select id="brandReward" name="brandReward" onchange="removeError(this.id)" style="padding: 8px;">
                                        <option value="0">Semua Brand</option>
                                        <?php
                                        //require './connection.php';
                                        $sql = "SELECT id, nama  FROM db_brand Where isDelete = 0 order by nama ASC;"; 
                                         
                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $selected = "";
                                            while ($row = $result->fetch_assoc()) {
                                                $row['id'] == $brandreward ? $selected = "selected" : $selected = ""; 
                                                echo "<option " . $selected . " value='". $row['id'] ."'>" . $row['nama'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Quartal: </label>
                                    <select id="quartalReward" name="quartalReward" onchange="removeError(this.id)" style="padding: 8px;">
                                        <option value="">None</option>
                                        <option value="Q1" <?php echo $quartalReward == "Q1" ? 'selected=\"true\"': ""; ?> >Q1</option>
                                        <option value="Q2" <?php echo $quartalReward == "Q2" ? 'selected=\"true\"': ""; ?>>Q2</option>
                                        <option value="Q3" <?php echo $quartalReward == "Q3" ? 'selected=\"true\"': ""; ?>>Q3</option>
                                        <option value="Q4" <?php echo $quartalReward == "Q4" ? 'selected=\"true\"': ""; ?>>Q4</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-default siku" onclick="showlist()">Tampilkan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="table-responsive">
                            <table id="example" class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>NO</th>
                                        <th>CABANG</th>
                                        <th>TANGGAL INPUT</th>
                                        <th>QUARTAL</th>
                                        <th>NAMA REWARD</th>
                                        <th>REWARD</th>
    <!--                                    <th>KETERANGAN</th>-->
                                        <th>VENDOR</th>
                                        <th>BRAND</th>
                                        <th>CONTACT PERSON</th>
                                        <th style="width: 120px;">STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                    
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>

        <!-- /. Detail Rewardd /. -->
        <div class="modal fade-scale" id="modal-information-by-reward" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 90%;">
                <div class="modal-content siku">
                    <div class="modal-header" style="padding: 10px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: 7px;"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" style="font-size: 18pt; letter-spacing: 0.5px;">Detail Reward</h4>
                    </div>
                    <div class="modal-body" style="font-size: 11pt; letter-spacing: 0px; color: #666;">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>Tanggal Input:</label>
                                    <input type="text" class="form-control" id="tanggal-input">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>Tanggal Tagih:</label>
                                    <input type="text" class="form-control" id="tanggal-tagih">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>Tanggal Selesai:</label>
                                    <input type="text" class="form-control" id="tanggal-selesai">
                                </div>
                            </div>                            
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status: </label>
                                    <span class="text-uppercase" id="status" style="letter-spacing: 1px;"></span>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: -15px;">
                                <label>Cabang: </label>
                                <span class="text-uppercase" id="cabang"></span>
                            </div>
                            <div class="col-md-12" style="margin-top: 0px;">
                                <label>Quartal: </label>
                                <span class="text-uppercase" id="quartal"></span>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nama Reward:</label>
                                            <div id="document-referral">-</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Vendor:</label>
                                            <div id="vendor">-</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Brand:</label>
                                            <div id="brand">-</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Reward:</label>
                                            <div id="reward">-</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Contact Person:</label>
                                            <div id="contactperson">-</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Keterangan:</label>
                                            <div id="keterangan">-</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px;">
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label id="keteranganclosename">Keterangan Close:</label>
                                            <div id="keteranganclose" style="">-</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>History Status <span style="color: red;">*</span> </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Diubah oleh</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="">
                        <button type="button" class="btn btn-default siku" data-dismiss="modal"style="background-color: black; width: 70px; color: white">Tutup</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade-scale" id="modal-information-by-vendor" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 90%;">
                <div class="modal-content siku">
                    <div class="modal-header" style="padding: 10px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: 7px;"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-size: 18pt; letter-spacing: 0.5px;">DETAIL PEMBELIAN VENDOR</h4>
                        <br>
<!--                        <h7>PIC:</h7> <br/>
                        <h7 id="v-pic-nama" style="letter-spacing: 0.5px;">DETAIL PEMBELIAN VzzENDOR</h7><br/>
                        <h7 id="v-pic-email" style="letter-spacing: 0.5px;">DETAIL PEMBELIAN VzzENDOR</h7><br/>
                        <h7 id="v-pic-telp" style="letter-spacing: 0.5px;">DETAIL PEMBELIAN VzzENDOR</h7>-->
                    </div>
                    <div class="modal-body" style="font-size: 11pt; letter-spacing: 0px; color: #666;">
                        <table class="table table-hover"> 
                            <thead> 
                                <tr> 
                                    <th>No</th>
                                    <th>Tanggal Input</th>
                                    <th>Cabang</th>
                                    <th>Brand</th>
                                    <th>Quartal</th>
                                    <th>Nama Reward</th>
                                    <th>Reward</th>
                                    <th>Kontak Person</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr> 
                            </thead> 
                            <tbody id="table-body-vendor"> 
                            </tbody> 
                        </table>
                    </div>
                    <div class="modal-footer" style="margin-top: -33px;">
                        <button type="button" class="btn btn-default siku" data-dismiss="modal"style="background-color: black; width: 70px; color: white">Tutup</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade-scale" id="modal-change-status" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content siku">
                    <div class="modal-header" style="padding: 10px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: 7px;"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" style="font-size: 18pt; letter-spacing: 0.5px;">UBAH STATUS</h4>
                    </div>
                    <div class="modal-body" style="font-size: 12pt; letter-spacing: 1px; color: #666;">
                        <div class="form-group col-md-12">
                            <label>Status: </label>
                            <select class="form-control" class="cbo-status-invoice" id="status-invoice" onchange="toogleketerangan();" onclick="removeErrorText(this.id)">
                                <option value="0">Pilih Status</option>
                                <?php
                                    $sql = "Select kode, nama from db_status WHERE no_urut != 0 AND isDelete = 0 ORDER BY no_urut ASC";                            

                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $nomor = 1;
                                        $lastid = "";
                                        $selected = "";
                                        while ($row = $result->fetch_assoc()) {
                                            $row['kode'] == $status ? $selected = "selected" : $selected = ""; 
                                            echo "<option id='status-". $row['kode'] ."' value='". $row['kode'] ."'>" . $row['nama'] . "</option>"; 
                                            array_push($arrayStatus, array($row['kode'], $row['nama']));
                                        }
                                    }
                                    //print_r($arrayStatus);
                                ?>
                            </select>
                            <i class="validation-text" id="val-status-invoice" style="letter-spacing: 0px;"></i>
                        </div>
                        <div class="col-md-12 form-group" id="form-status-keterangan" style="display: none;">
                            <label>Keterangan: </label>
                            <input type="text" class="form-control" id="status-keterangan" style="resize: none;">
                        </div>
                        <div class="text-right" style="padding: 15px;">
                            <button type="button" class="btn btn-default siku" data-dismiss="modal"> Batal </button>
                            <button type="button" class="btn btn-primary siku" onclick="ubahstatusreward()" style="width: 70px;"> Ubah </button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script src="js/jquery.js"></script>
        
        <script src="datatables/js/jquery.dataTables.min.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script type="text/javascript" src="datepicker/js/jquery.datepicker.js"></script>

        <script type="text/javascript">
           var idstatuschange = 0;
           //var namestatuschange = "";
           var arrayStatus = "";
           var table;            
           var indextable;
           var tablerow;
           var rewardid;
           
           var userjabatanlogin = "<?php echo $jabatanUserLogin;?>";
           $(document).ready(function(){
               
                console.log(localStorage.getItem('session_login_role_ayooklik'));
               
                arrayStatus = <?php echo json_encode($arrayStatus);?>;              
                
                var defaultDatatableReward = 50;
                
                if (localStorage.getItem("defaultDatatableReward") != null) {
                    defaultDatatableReward = localStorage.getItem("defaultDatatableReward");
                }
                
                
                table = $('#example').DataTable({
                    "pageLength": defaultDatatableReward,
                    "ajax": "datatables/objects.txt",
                    "columns": [
                            {
                            //"className":      'details-control',
                            "orderable":      false,
                            "data":           'btnlihat',
                            "defaultContent": ''
                            },
                            { "className": 'td-control', "data": "no" },
                            { "className": 'td-control', "data": "cabang" },
//                            { "className": 'td-control', "ads" },
                            { "className": 'td-control', "data": "createddate" },
                            { "className": 'td-control', "data": "quartal" },
                            { "className": 'td-control', "data": "documentreferral" },
                            { "className": 'td-control', "data": "reward" },
                            { "className": 'td-control', "data": "namavendor" },
                            { "className": 'td-control', "data": "namabrand" },
                            { "className": 'td-control', "data": "contactperson" },
                            { "className": 'td-control text-center', "data": "statusname" },
                            { "data": "btndelete" 
                            }
                    ],
                    "order": [[1, 'asc']],
                    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                        $(nRow).attr('id', "reward-" + aData["id"]);
                        $(nRow).css('background-color', "#" + aData["kodewarna"]);
                    },
//                    "fnInitComplete": function(oSettings, json) {
//                        $("#" + oSettings.sTableId+"_filter input").val("HDFG75");
//                    }
                    
                });
                
                $("#example_wrapper select").change(function(){
                    //alert();
                    localStorage.setItem("defaultDatatableReward", $("#example_wrapper select").val());
                }); 
                //table.ajax.reload();
                
                //table.fnDraw();
                
                
                function format (d) {
                // `d` is the original data object for the row
                    //console.log(d.createddate);
                    
                    var temp =  '';
                   
                    temp += '<div class="col-md-6" id="history-status-'+d.id+'">';
                    temp += '</div>';
                    
                    temp += '<div class="col-md-6"><strong>Keterangan: </strong>';
                    if (d.status != 2 && d.status != 3) {
                        temp += '<input type="button" id="btn-memo-'+ d.id + '" onclick="toogleMemo('+ d.id +', \'UbahSimpan\')" class="btn btn-primary btn-xs siku" value="Ubah" style="margin-bottom: 3px;" /> <input type="button" id="btn-memo-batal-'+ d.id + '" onclick="toogleMemo('+ d.id +', \'Batal\')" class="btn btn-danger btn-xs siku" value="Batal" style="margin-bottom: 3px; visibility: hidden;" />';
                    }
                    temp += '<input type="hidden" id="temp-memo-' + d.id + '" value="' + d.keterangan + '" />';
                    temp += '<br/><span id="memo-' + d.id + '">' + d.keterangan + '</span>';
                    
                    temp += '<div id="ketclose-' + d.id + '">';
                    if (d.keteranganclose != "") {
                        temp += '<br/>';
                        temp += '<span style="font-size: 20px; color: blue; text-decoration: underline;" >Keterangan ' + d.onlystatusname + ': ' + d.keteranganclose + '</span>';
                    }
                    temp += '</div>';
                    temp += '</div>';
                    temp += '</div>';
                    //return "";
                    //alert(d.id);
                    return temp;
                }
                // Add event listener for opening and closing details
                $('#example').on('click', 'td', function (e) {
                    //console.log(e.target.className);
                    //alert();
                    console.log(this);
                    if (e.target.className === " td-control" || e.target.className === "td-control sorting_1" || e.target.className === " details-control") {
                        //alert();
                        var tr = $(this).closest('tr');
                        var row = table.row( tr );

                        if (row.child.isShown()) {
                            // This row is already open - close it
                            console.log(row.child);
                            row.child.hide();
                            tr.removeClass('shown');
                        }
                        else {
                            console.log(row.data());
                            // Open this row
                            if (tr.hasClass("hasHistory")) {
                                row.child.show();
                            } else {
                                row.child( format(row.data())).show();
                                tr.addClass('hasHistory');
                                
                                var rew_id = row.data().id;
                                $.ajax({
                                    type: "POST",
                                    url: 'ajax/select-reward-status-by-id',
                                    data: {
                                        id: rew_id
                                    },
                                    // timeout: 10000, // sets timeout to 10 seconds
                                    // dataType: "json",
                                    beforeSend: function () {
                                        // Handle the beforeSend event
                                        $("#history-status-" + rew_id).html('<i class="fa fa-2x fa-spinner fa-spin"></i>');
                                    },
                                    complete: function () {
                                        // Handle the complete event
                                    },
                                    error: function (xhr, ajaxOptions, thrownError) {
                                        alert(xhr.status);
                                        alert(thrownError);
                                    },
                                    success: function (response) {
                                        var returnJSON = $.parseJSON(response);
                                        console.log(returnJSON);
                                        if (returnJSON.status === "succeeded") {
                                            var temp = "";

                                            temp += "    <div class=\"col-md-12\">";
                                            temp += "        <div class=\"form-group\">";
                                            temp += "            <label>History Status <span style=\"color: red;\">*</span> </label>";
                                            temp += "        </div>";
                                            temp += "    </div>";
                                            temp += "    <div class=\"col-md-12\">";
                                            temp += "        <table class=\"table table-sm\">";
                                            temp += "            <thead>";
                                            temp += "                <tr>";
                                            temp += "                    <th>#</th>";
                                            temp += "                    <th>Status</th>";
                                            temp += "                    <th>Diubah oleh</th>";
                                            temp += "                    <th>Tanggal</th>";
                                            temp += "                </tr>";
                                            temp += "            </thead>";
                                            temp += "                <tbody>";
                                            for(var i = 0; i < returnJSON.HistoryStatus.length; i++) {
                                                temp += "<tr>";
                                                temp += "<td>"+ (i+1) +"</td>";
                                                temp += "<td>"+ returnJSON.HistoryStatus[i].namastatus+"</td>";
                                                temp += "<td>"+ returnJSON.HistoryStatus[i].namapengubah+"</td>";
                                                temp += "<td>"+ returnJSON.HistoryStatus[i].tanggalbuat+"</td>";
                                                temp += "</tr>";
                                            }
                                            temp += "                </tbody>";
                                            temp += "            </table>";
                                            temp += "    </div>";

                                            $("#history-status-" + rew_id).html(temp);

                                        } else {
                                            alert("Silahkan cek koneksi internet.");
                                        }
                                    }
                                }).done(function () {
                                    // $( this ).addClass( "done" );
                                    //$('button.proccess').attr('disabled', false);
                                });
                            }
                            tr.addClass('shown');
                        }
                    }
                    tablerow = this;
                    indextable = table.row(this).index();
                    rewardid = $(tablerow).parent().attr("id");
                });   
            });
            
            function toogleMemo(id, tooglename) {
            //console.log(tooglename);
                var btnmemoid = "#btn-memo-" + id;
                var memoid = "#memo-" + id;
                var btnmemmoidbatal = "#btn-memo-batal-" + id;
                
                var toogle = "Batal";
                if (tooglename != "Batal") {
                    toogle = $(btnmemoid).val();
                }
                var tempmemo = $("#temp-memo-" + id).val();
                var memo = $(memoid + " input").val();
                if (memo == undefined) {
                    memo = $(memoid).html();
                }
                //console.log(memo);
                $(btnmemoid).removeClass("btn-primary");
                $(btnmemoid).removeClass("btn-success");
                
                if (toogle == "Ubah") {
                    $(btnmemoid).val("Simpan");
                    $(btnmemoid).addClass("btn-success");
                    $(btnmemmoidbatal).css("visibility", "visible");
                    $(memoid).html("<input type=\"text\" value='"+ memo +"' style=\"width: 70%;\" />");
                } else if (toogle == "Simpan") {
                    $.ajax({
                        url: 'ajax/edit-reward-memo.php',
                        data: {
                           id: id,
                           memo: memo
                        },
                        success: function(data, textStatus, jqXHR) {
                            $(btnmemmoidbatal).css("visibility", "hidden");
                            $(btnmemoid).val("Ubah");
                            $(btnmemoid).addClass("btn-primary");
                            
                            $("#temp-memo-" + id).val(memo);
                            $(memoid).html(memo);
                        }
                    });
                } else if (toogle == "Batal"){
                    $(btnmemoid).val("Ubah");
                    $(btnmemoid).addClass("btn-primary");
                    $(btnmemmoidbatal).css("visibility", "hidden");

                    $(memoid + " input").remove();
                    $(memoid).append(tempmemo);
                }
            }
            
            function detailreward(id) {
                $.ajax({
                    url: 'ajax/select-reward-by-id.php',
                    data: {
                       id: id,
                    },
                    success: function(data, textStatus, jqXHR) {
                        console.log(data);
                        var obj = $.parseJSON(data);
                        console.log(obj);
                        
                        if (obj.Data === 0) {
                            alert("Terjadi kesalahan dalam pengambilan data");
                        } else {
                            var data = obj.Data[0];
                            $("#modal-information-by-reward #status").html(data.statusnama);
                            $("#modal-information-by-reward #cabang").html(data.cabang);
                            $("#modal-information-by-reward #tanggal-input").val(data.tanggalbuat === "0000-00-00" ? "" : data.tanggalbuat);
                            $("#modal-information-by-reward #quartal").html(data.quartal);
                            $("#modal-information-by-reward #tanggal-tagih").val(data.tanggaltagih === "0000-00-00" ? "" : data.tanggaltagih);
                            $("#modal-information-by-reward #tanggal-selesai").val(data.tanggalselesai === "0000-00-00" ? "" : data.tanggalselesai);
                            $("#modal-information-by-reward #document-referral").html(data.nopo);
                            $("#modal-information-by-reward #reward").html(data.jenisreward + "<br /> <i>" + data.keterangan_reward + "</i>");
                            $("#modal-information-by-reward #contactperson").html("Nama: <strong>" + data.nama_cp + "</strong><br />Email: <strong>" + data.email_cp + "</strong><br /> Telp: <strong>" + data.telp_cp + "</strong>" );
                            $("#modal-information-by-reward #vendor").html(data.namavendor);
                            $("#modal-information-by-reward #brand").html(data.namabrand);
                            $("#modal-information-by-reward #keterangan").html(data.memo === "" ? "-" : data.memo);
                            
                            //style="font-size: 20px; color: blue; text-decoration: underline;"
                            $("#modal-information-by-reward #keteranganclose").css("font-size", "12px");
                            $("#modal-information-by-reward #keteranganclose").css("color", "black");
                            $("#modal-information-by-reward #keteranganclose").css("text-decoration", "none");
                            $("#modal-information-by-reward #keteranganclosename").html("Keterangan Close:");
                            
                            if (data.keteranganclose === "") {                               
                                $("#modal-information-by-reward #keteranganclose").html("-");
                            } else {
                                $("#modal-information-by-reward #keteranganclose").css("font-size", "20px");
                                $("#modal-information-by-reward #keteranganclose").css("color", "blue");
                                $("#modal-information-by-reward #keteranganclose").css("text-decoration", "underline");
                                $("#modal-information-by-reward #keteranganclosename").html("Keterangan " + data.statusnama + ":");
                                $("#modal-information-by-reward #keteranganclose").html(data.keteranganclose);
                            }
                            //$("#modal-information-by-reward #keteranganclose").html(data.keteranganclose === "" ? "-" : data.keteranganclose);
                            console.log(data);
                            
                            console.log(obj.HistoryStatus);
                            var temp = "";
                            for(var i = 0; i < obj.HistoryStatus.length; i++) {
                                temp += "<tr>";
                                temp += "<td>"+ (i+1) +"</td>";
                                temp += "<td>"+obj.HistoryStatus[i].namastatus+"</td>";
                                temp += "<td>"+obj.HistoryStatus[i].namapengubah+"</td>";
                                temp += "<td>"+obj.HistoryStatus[i].tanggalbuat+"</td>";
                                temp += "</tr>";
                            }
                            
                            $("#modal-information-by-reward .modal-footer a").remove();
                            $("#modal-information-by-reward .modal-footer").prepend("<a href=\"tambah-reward-report?q="+id+"\" type=\"button\" class=\"btn btn-primary siku\"><i class=\"fa fa-print\"></i> PRINT</a>");
                            
                            
                            $("#modal-information-by-reward .table tbody").html(temp);
                        }
                        //$('#modal-information-by-vendor').modal('show');
                    },
                });
                $("#modal-information-by-reward").modal('show');
            }
            
            function showmemo(id) {
                $("#modal-memo-input").val(id);
                $("#modal-memo-keterangan").val(id);
                $.ajax({
                    url: 'ajax/select-reward-memo.php',
                    data: {
                       id: id
                    },
                    success: function(data, textStatus, jqXHR) {
                        //console.log(data);
                        $("#modal-memo-keterangan").val(data);
                        $('#modal-memo').modal('show');
                        $("#modal-memo-keterangan").focus();
                    },
                }); 
                $('#modal-memo').modal('show');
            }
            
            function savememo() {
                var id = $("#modal-memo-input").val();
                var memo = $("#modal-memo-keterangan").val();
                $.ajax({
                    url: 'ajax/edit-reward-memo.php',
                    data: {
                       id: id,
                       memo: memo
                    },
                    success: function(data, textStatus, jqXHR) {
                        //console.log(data);
                        table.cell(indextable, 3).data(memo).draw();
                        swal("Berhasil mengubah memo", "", "success");
                        $('#modal-memo').modal('hide');
                    },
                }); 
            }            
            
            
            function toogleketerangan() {
                var status = $("#status-invoice").val();
                if (status == "2" || status == "3") {
                    $("#form-status-keterangan").css("display", "block");
                } else {
                    $("#form-status-keterangan").css("display", "none");
                }
            }
            function ubahstatusreward() {
//                console.log(indextable);
//                console.log(tablerow);
//                console.log($(tablerow));
                var usernamelogin = localStorage.getItem('session_login_id_ayooklik');
                var status = $("#status-invoice").val();
                var statusketerangan = "";
                if (status == "2" || status == "3") {
                    statusketerangan = $("#status-keterangan").val();
                }
//console.log(usernamelogin);
//console.log(status);
//console.log(idstatuschange);
                var statusname = $("#status-invoice option:selected").text();

                if (status === "0") {
                    $("#val-status-invoice").html("Silahkan pilih untuk mengubah status pesanan");
                } else {
                    url = "ajax/edit-status-reward.php",
                    $.ajax({
                        url: url,
                        data: {
                           kode: idstatuschange,
                           status: status,
                           keterangan: statusketerangan,
                           usernamelogin: usernamelogin
                        },
                        success: function(data, textStatus, jqXHR) {
                            var warna = "";
                            if (data !== "0") {
                                
                                var temp = "<span class=\"hyperlink badge-hyperlink\" "; 
                                if (status != "2" || status != "3" || userjabatanlogin == "admin") {
                                    temp +=  "title=\"Klik untuk menggubah status reward\" onclick=\"showdetail("+idstatuschange+", "+ status +", 'itemstatus')\" ";
                                }
                                temp += ">" + statusname;
                                temp += "</span>";
                                table.cell(indextable, 10).data(temp).draw();  
                                
                                var ketclose = '';
                                    ketclose += '<br/>';
                                    ketclose += '<span style="font-size: 20px; color: blue; text-decoration: underline;" >Keterangan ' + statusname + ': ' + statusketerangan + '</span>';
                    
                                $("#ketclose-" + idstatuschange).html(ketclose);
                                
                                warna = data;
                                
                                $('#modal-change-status').modal('hide');
                                swal("Berhasil mengubah status menjadi "+ statusname +"", "", "success");
                            }
                            
                            
                            if (warna != "") {
                                $("#" + rewardid).find("td  ").css("background-color", "#" + warna);
                            }
                        }
                    });
                }
            }
                
            function deletereward(kode, element) {
                if (confirm("Apakah anda yakin ingin reward ini?")) {
                    var url = 'ajax/delete-reward.php?kode=' + kode;
                    $.ajax({
                        url: url,
                        data: {
                           id: kode
                        },
                        success: function(data, textStatus, jqXHR) {
                            if (data == "1") {
                                table.row($(element).parents('tr')).remove().draw();
                                swal("Berhasil menghapus reward. ", "", "success");  
                            } else {
                                swal("Gagal menghapus reward. ", "", "warning");  
                            }
                            
                        },
                    });
                }
            }
            
            function removeError(id) {
                $("#val-" + id).remove();
            }
            
            function removeErrorText(id) {
                $("#val-" + id).html("");
            }

            function showdetail(id, param, act) {
                if (act === "itemstatus") {
                    if (param == "2" || param == "3") {
                        $("#modal-change-status #form-status-keterangan").css("display", "block");
                    } else {
                        $("#modal-change-status #form-status-keterangan").css("display", "none");
                    }
                    
                    $("#modal-change-status select option").removeAttr("selected");
                    $("#modal-change-status .modal-title").html("UBAH STATUS REWARD");
                    
                    
                    
                    $("#modal-change-status #status-invoice #status-" + param).prop("selected", true);
                    $('#modal-change-status').modal('show');
                } else if (act === "itemvendor") {
                    var namavendor = $("#coloumn-vendor-" + id + " span").html();

                    $.ajax({
                        url: 'ajax/select-reward-by-vendor.php',
                        data: {
                           id: param,
                           jabatan: '<?php echo $jabatanUserLogin;?>',
                           cabang: '<?php echo $cabangUserLogin;?>'
                        },
                        success: function(data, textStatus, jqXHR) {
                            var obj = $.parseJSON(data);
                            console.log(obj);
                            var idcabanguserlogin = "<?php echo $cabangUserLogin; ?>";
                            console.log(idcabanguserlogin);
                            var print = "";
                            if (data === 0) {
                                $("#modal-information-by-vendor .modal-body").html("tidak ada data pembelian");
                            } else {
                                
                                var temp = "";
                                for (var i = 0; i < obj.Data.length; i++){
                                    $("#modal-information-by-vendor .modal-title").html("Daftar Pembelian dari vendor " + obj.Data[i]["namavendor"]);
                                    
                                    $("#v-pic-nama").text(obj.Data[i]["nama_cp"]);
                                    $("#v-pic-email").text(obj.Data[i]["email_cp"]);
                                    $("#v-pic-telp").text(obj.Data[i]["telp_cp"]);
                                    
                                    temp += "<tr>";
                                    temp += "<td>" + (i+1) + "</td>";
                                    temp += "<td>" + obj.Data[i]["tanggalbuat"] + "</td>";
                                    temp += "<td>" + obj.Data[i]["cabang"] + "</td>";
                                    temp += "<td>" + obj.Data[i]["namabrand"] + "</td>";
                                    temp += "<td>" + obj.Data[i]["quartal"] + "</td>";
                                    temp += "<td>" + obj.Data[i]["nopo"] + "</td>";
                                    temp += "<td>" + obj.Data[i]["jenisreward"] + "<br/>Detail: " + obj.Data[i]["keterangan_reward"] + "</td>";
                                    temp += "<td>Nama: " + obj.Data[i]["nama_cp"] + "<br/>Email: " + obj.Data[i]["email_cp"] + "<br/>Telp: " + obj.Data[i]["telp_cp"] + "</td>";
                                    temp += "<td>" + obj.Data[i]["statusnama"] + "</td>";
                                    temp += "<td>" + obj.Data[i]["memo"] + "</td>";
                                    temp += "</tr>";
                                    
//                                    if (idcabanguserlogin === "0") {
//                                        print += temp;
//                                    } else if (idcabanguserlogin === obj.Data[i]["idcabang"]) {
//                                        
//                                    }
//print += temp;
            
                                    
                                }
                                $("#table-body-vendor").html(temp);
                            } 
                            $('#modal-information-by-vendor').modal('show');
                        },
                    }); 
                } 
                idstatuschange = id;
            }

            function setFormatDate(date){
                var temp = date.split('-');
                var month = "";
                if (temp[1] == "1" || temp[1] == "01") {
                    month = "Januari";
                } else if (temp[1] == "2" || temp[1] == "02") {
                    month = "Februari";
                } else if (temp[1] == "3" || temp[1] == "03") {
                    month = "Maret";
                } else if (temp[1] == "4" || temp[1] == "04") {
                    month = "April";
                } else if (temp[1] == "5" || temp[1] == "05") {
                    month = "Mei";
                } else if (temp[1] == "6" || temp[1] == "06") {
                    month = "Juni";
                } else if (temp[1] == "7" || temp[1] == "07") {
                    month = "Juli";
                } else if (temp[1] == "8" || temp[1] == "08") {
                    month = "Agustus";
                } else if (temp[1] == "9" || temp[1] == "09") {
                    month = "September";
                } else if (temp[1] == "10") {
                    month = "Oktober";
                } else if (temp[1] == "11") {
                    month = "November";
                } else if (temp[1] == "12") {
                    month = "Desember";
                }
                return temp[2] + " " + month + " " + temp[0];
            }
            
        </script>
        
        <script>
            function set_filter() {
                var firstdate = $("#m_tanggal-awal").val();
                var lastdate = $("#m_tanggal-akhir").val();
                var isError = false;

                if (!firstdate || !lastdate) {
                    isError = true;
                }

                if (!isError) {
                    firstdate = firstdate.split("/");
                    lastdate = lastdate.split("/");
                    var final_firstdate = firstdate[2] + "-" + firstdate[1] + "-" + firstdate[0];
                    var final_lastdate = lastdate[2] + "-" + lastdate[1] + "-" + lastdate[0];

                    console.log(final_firstdate);
                    console.log(final_lastdate);
                    
                    if (parseInt(firstdate[2] + "" + firstdate[1] + "" + firstdate[0]) > parseInt(lastdate[2] + "" + lastdate[1] + "" + lastdate[0])) {
                        swal("Tanggal awal tidak boleh lebih besar dari tanggal awal. ", "", "warning");
                    } else {
                        window.location.href = "rewards?dfirst="+ final_firstdate +"&dlast=" + final_lastdate; 
                    }
                }
            }
        </script>
        <script src="select-filter/js/select2.min.js"></script>
    
        <script type="text/javascript">
            $('#jenisReward').select2();
            
            function showlist() {
                var tipereward = $("#jenisReward").val();
                var status = $("#status-filter").val();
                var quartalReward = $("#quartalReward").val();
                var cabangReward = $("#cabangReward").val();
                var vendorReward = $("#vendorReward").val();
                var brandReward = $("#brandReward").val();
                
                if (cabangReward == undefined) {
                    cabangReward = "0";
                }
                
                var url = "?filter=true";
                if (tipereward != 0) {
                    url += "&tipereward=" + tipereward;
                }
                if (status != 0) {
                    url += "&status=" + status;
                }
                if (quartalReward != "") {
                    url += "&quartal=" + quartalReward;
                }
                if (vendorReward != "0") {
                    url += "&vendorreward=" + vendorReward;
                }
                if (brandReward != "0") {
                    url += "&brandreward=" + brandReward;
                }
                if (cabangReward != "0") {
                    url += "&cabangreward=" + cabangReward;
                }
                
                window.location.href = "rewards" + url; 
                //console.log(url);
            }
        </script>
    </body>
</html>
