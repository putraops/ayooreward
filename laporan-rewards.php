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

        <title>Laporan Reward - ayooreward!</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                color: blue;
                cursor: pointer;
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

            #my-table th, #my-table tr, #my-table td {
                border: 1px solid #8c8c8c;
            }
            #label-total-pembelian {
                color: red;
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
        <?php $currentpage = "event"; ?>
        <?php $arrayStatus = array(); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php require 'profile-navigation.php'; ?>
            <?php
            echo "<script>";
            if ($create_laporan_reward == "0_0") {
                echo "window.location.href = 'rewards';";
            }
            echo "</script>";
            ?> 
        </nav>

        <div id="page-wrapper" style="margin-top: -30px;">

            <div class="container-fluid" style="margin-bottom: 50px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <strong>BUAT LAPORAN REWARD</strong>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $is_status = isset($_GET['status']) ? $con->real_escape_string($_REQUEST['status']) : '';
                        $is_vendor = isset($_GET['vendor']) ? $con->real_escape_string($_REQUEST['vendor']) : '';
                        $is_cabang = isset($_GET['cabang']) ? $con->real_escape_string($_REQUEST['cabang']) : '';
                        $is_quartal = isset($_GET['quartal']) ? $con->real_escape_string($_REQUEST['quartal']) : '';
                        $is_brand = isset($_GET['brand']) ? $con->real_escape_string($_REQUEST['brand']) : '';
                        $is_cp = isset($_GET['cp']) ? $con->real_escape_string($_REQUEST['cp']) : '';
                        ?>
                        <!--                    <form class="form-inline">
                                                <div class="form-group">
                                                    <label>Filter Tanggal Buat : </label>
                                                    <div class="input-group">
                                                        <input class="form-control siku" id="m_tanggal-awal" data-select="datepicker" accept="" value="<?php echo $param_firstdate; ?>"readonly="true" onkeyup="removeError(this.id)" placeholder="Tanggal Awal" style="background-color: White; cursor: pointer;" />
                                                        <div class="input-group-addon siku" style="border-left: 0px; border-right: 0px;">sampai</div>
                                                        <input class="form-control siku" id="m_tanggal-akhir" data-select="datepicker" accept="" value="<?php echo $param_lastdate; ?>" readonly="true" onkeyup="removeError(this.id)" placeholder="Tanggal Akhir" style="background-color: White; cursor: pointer;" />
                                                    </div>
                                                </div>
                                            </form>-->
                        <form class="" style="margin: 5px 0px 5px 0px;">
                            <div class="form-group">
                                <label>PILIH VENDOR : </label>
                                <select id="vendor-laporan" onclick="removeErrorText(this.id)" style="padding: 2px ;">
                                    <option value="0" <?php echo $is_vendor == "" || $is_vendor == "0" ? "selected" : ""; ?> style='padding: 7px;'>Semua Vendor</option>
                                    <?php
                                    $sql = "SELECT kode, nama, email, telp, alamat, keterangan, status_hapus, created_at, updated_at 
                                            FROM db_vendor 
                                            Where status_hapus = 0 
                                            order by nama ASC;";

                                    $result = $con->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $selected = "";
                                        while ($row = $result->fetch_assoc()) {
                                            $row['kode'] == $is_vendor ? $selected = "selected" : $selected = "";
                                            echo "<option " . $selected . " value='" . $row['kode'] . "' style='padding: 7px;'>" . $row['nama'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>PILIH BRAND: </label>
                                <select id="brand-laporan" name="brand-laporan" onchange="removeError(this.id)" style="padding: 2px;">
                                    <option value="0" style='padding: 7px;'>Semua Brand</option>
                                    <?php
                                    //require './connection.php';
                                    $sql = "SELECT id, nama  FROM db_brand Where isDelete = 0 order by nama ASC;";

                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $selected = "";
                                        while ($row = $result->fetch_assoc()) {
                                            $row['kode'] == $is_vendor ? $selected = "selected" : $selected = "";
                                            $row['id'] == $is_brand ? $selected = "selected" : $selected = "";
                                            echo "<option " . $selected . " value='" . $row['id'] . "' style='padding: 7px;'>" . $row['nama'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>PILIH STATUS : </label>
                                <select id="status-laporan" onclick="removeErrorText(this.id)" style="padding: 2px;">
                                    <option value="0" <?php echo $is_status == "" || $is_status == "0" ? "selected" : ""; ?> style='padding: 7px;'>Semua Reward</option>
                                    <?php
                                    $sql = "Select kode, nama from db_status WHERE no_urut != 0 ORDER BY no_urut ASC";

                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $nomor = 1;
                                        $lastid = "";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option " . ($is_status == $row['kode'] ? 'selected' : '' ) . " value='" . $row['kode'] . "' style='padding: 7px;'>" . $row['nama'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <?php if ($jabatanUserLogin == "admin" || $cabangUserLogin == "0") : ?>
                                <div class="form-group">
                                    <label>PILIH CABANG : </label>
                                    <select id="cabang-laporan" name="userCabang" onchange="removeError(this.id)" style="padding: 2px;">
                                        <option value="0" style='padding: 7px'>Semua Cabang</option>
                                        <?php
                                        require './connection.php';

                                        $sql = "SELECT id, nama, created_at, updated_at FROM db_cabang Where status > 0 order by nama ASC;";

                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $selected = "";
                                            while ($row = $result->fetch_assoc()) {
                                                $row['id'] == $is_cabang ? $selected = "selected" : $selected = "";
                                                echo "<option " . $selected . " value='" . $row['id'] . "' style='padding: 7px;'>" . $row['nama'] . "</option>";
                                            }
                                        }
                                        mysqli_close($con);
                                        ?>
                                    </select>
                                </div>

                            <?php endif; ?>

                            <div class="form-group">
                                <label>PILIH KONTAK PERSON : </label>
                                <select id="contactPerson-laporan" name="contactPerson-laporan" onchange="removeError(this.id)" style="padding: 2px;">
                                    <option value="0" style='padding: 7px'>Semua Kontak Person</option>
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
                                            $row['id'] == $is_cp ? $selected = "selected" : $selected = "";
                                            echo "<option " . $selected . " value='" . $row['id'] . "' style='padding: 7px;'>" . $row['nama'] . " - " . $row['email'] . ' ( ' . $row['telp'] . ' )' . "</option>";
                                        }
                                    }
                                    mysqli_close($con);
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>PILIH QUARTAL : </label>
                                <select id="quartal-laporan" name="-laporan" onchange="removeError(this.id)" style="padding: 2px;">
                                    <option style='padding: 7px' value="">Semua Quartal</option>
                                    <option style='padding: 7px;' value="Q1" <?php echo $is_quartal == "Q1" ? 'selected=\"true\"' : ""; ?> >Q1</option>
                                    <option style='padding: 7px;' value="Q2" <?php echo $is_quartal == "Q2" ? 'selected=\"true\"' : ""; ?>>Q2</option>
                                    <option style='padding: 7px;' value="Q3" <?php echo $is_quartal == "Q3" ? 'selected=\"true\"' : ""; ?>>Q3</option>
                                    <option style='padding: 7px;' value="Q4" <?php echo $is_quartal == "Q4" ? 'selected=\"true\"' : ""; ?>>Q4</option>
                                </select>
                            </div>
                        </form>
                        <button type="button" class="btn btn-info siku" onclick="show_report()">Tampilkan</button>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="pull-left"><strong>Hasil Laporan</strong></h4>
                    </div>

                    <div class="col-md-12" id="section-report">
                        <?php
                        require './data-report.php';
                        ?>
                    </div>
                    <div class="col-md-12">
                        <a href="data-report-export-excel.php?filename=Laporan Reward <?php echo date("d-m-Y") ?>"><button class="btn btn-primary siku pull-right" id="btnExport" style="display: block;"> EXPORT KE EXCEL </button></a>
                    </div>
                </div>
                <hr/>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script type="text/javascript" src="datepicker/js/jquery.datepicker.js"></script>
        <script src="select-filter/js/select2.min.js"></script>

        <script type="text/javascript">
            var idstatuschange = 0;
            //var namestatuschange = "";
            var arrayStatus = "";
            $(document).ready(function () {

            });
            function removeError(id) {
                $("#val-" + id).remove();
            }
            function removeErrorText(id) {
                $("#val-" + id).html("");
            }

            function show_report() {
                var status = $("#status-laporan").val();
                var vendor = $("#vendor-laporan").val();
                var cabang = $("#cabang-laporan").val();
                var quartal = $("#quartal-laporan").val();
                var brand = $("#brand-laporan").val();
                var kontakperson = $("#contactPerson-laporan").val();
                var url = "?filter=true";
                if (status != 0) {
                    url += "&status=" + status;
                }
                if (vendor != 0) {
                    url += "&vendor=" + vendor;
                }
                if (brand != 0) {
                    url += "&brand=" + brand;
                }
                if (cabang != 0) {
                    url += "&cabang=" + cabang;
                }
                if (kontakperson != 0) {
                    url += "&cp=" + kontakperson;
                }
                if (quartal != 0) {
                    url += "&quartal=" + quartal;
                }
                window.location.href = "laporan-rewards" + url;
            }
        </script>
    </body>
</html>
