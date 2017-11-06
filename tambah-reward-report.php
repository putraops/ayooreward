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

        <title>Print Laporan Reward - ayooreward!</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <link href="datepicker/css/jquery.datepicker.css" rel="stylesheet" type="text/css"/>	
        
        <script src="sweetalert/dist/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
        
        <style>
            body {
                background-color: white;
                margin-top: -25px;
                padding-left: 50px;
                padding-right: 50px;
            }
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
            #page-header {
                text-decoration: underline;
            }
            @media print
            {
                .printing { visibility: hidden; }
            }
        </style>         
    </head>

<body>
    <?php $currentpage = "sponsorship";?>
    <?php 
            echo "<script>";
            if ($create_purchase == "0_0") {
                echo "window.location.href = 'beranda';";
            }
            echo "</script>";
        ?> 
    <?php
    require_once('connection.php');
    
    $documentReferral = $quartal = $reward = $detailreward = $vendor = $status = $dibuatoleh = $tanggalbuat = $tanggaltagih = $memo = "";
    $cabang = "";
    
    $nama_cp = $email_cp = $telp_cp = "";
    function tanggal_indo($tanggal)
    {
    $bulan = array (1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
    ?>
    <div id="page-wrapper" style="padding-bottom: 100px;">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <?php
                    $id = $con->real_escape_string($_REQUEST["q"]);
                    $sql =  "Select dbv.kode as kodevendor, 
                                    dbv.nama as namavendor, 
                                    dbr.status as status, dbs.nama as statusnama, 
                                    dbr.id as id,
                                    dbr.no_po as nopo,
                                    dbr.quartal as quartal,
                                    dbr.nama_cp as nama_cp,
                                    dbr.email_cp as email_cp,
                                    dbr.telp_cp as telp_cp,
                                    dbr.keterangan_reward as keterangan_reward, 
                                    dbr.tanggal_buat as tanggalbuat, 
                                    dbr.tanggal_selesai as tanggalselesai, 
                                    dbr.tanggal_tagih as tanggaltagih, 
                                    dbr.memo as memo,
                                    dbu.name as namauser, 
                                    dbjr.nama as jenisreward,
                                    c.nama as namacabang,
                                    dbu.id_cabang as idcabang,
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
                            where dbr.isDelete = 0 AND dbr.id = '$id'";

                    $result = $con->query($sql);
                ?>
                <?php 
                    if ($result->num_rows > 0) {    
                        while($row = $result->fetch_assoc()) {
                            $namacp = $row['nama_cp'] == "" ? "-" : $row['nama_cp'];
                            $emailcp = $row['email_cp'] == "" ? "-" : $row['email_cp'];
                            $telpcp = $row['telp_cp'] == "" ? "-" : $row['telp_cp'];

                            if ($row['id_tablecontactperson'] != "") {
                                $namacp = $row['nama_tablecontactperson'];
                                $emailcp = $row['email_tablecontactperson'];
                                $telpcp = $row['telp_tablecontactperson'];
                            }
                
                            $documentReferral = $row['nopo'];
                            $quartal = $row['quartal'];
                            $cabang = $row['namacabang'] == "" ? "Semua Cabang" : $row['namacabang'];
                            $reward = $row['jenisreward'];
                            $detailreward = $row['keterangan_reward'];
                            $vendor = $row['namavendor'];
                            $nama_cp = $namacp;
                            $email_cp = $emailcp;
                            $telp_cp = $telpcp;
                            $status = $row['statusnama'];
                            $dibuatoleh = $row['namauser'];
                            $tanggalbuat = $row['tanggalbuat'];
                            $tanggaltagih = $row['tanggaltagih'];
                            $memo = $row['memo'];
                        }
                    }
                ?>
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">
                        <strong>Laporan Reward</strong>
                    </h1>
                </div>
                <div class="col-lg-12 text-right">
                    <p>Tanggal Buat: <?php echo tanggal_indo($tanggalbuat);?></p>
                </div>
                <div class="col-lg-12" style="font-size: 16px;">
                    <p><strong>Status: </strong><?php echo $status;?></p>
                    <br/>
                    
                    <p><strong>Reward harus ditagih sebelum: </strong><?php echo tanggal_indo($tanggaltagih);?></p>
                    <p><strong>Quartal: </strong><?php echo $quartal;?></p>
                    <p><strong>Cabang: </strong><?php echo $cabang;?></p><br/>
                    <p><strong>Nama Reward: </strong><?php echo $documentReferral;?></p>
                    <p><strong>Jenis Reward: </strong><?php echo $reward;?></p>
                    <p><strong>Detail Reward: </strong><?php echo $detailreward;?></p>
                    <p><strong>Keterangan: </strong><?php echo $memo;?></p>
                    <br />
                    <p><strong>Vendor: </strong><?php echo $vendor;?></p>
                    <p><strong>Kontak Person: </strong><?php echo $nama_cp;?></p>
                    <p><strong>Email : </strong><?php echo $email_cp;?></p>
                    <p><strong>Telp: </strong><?php echo $telp_cp;?></p>
                    <br/>
                    
                    <p class="text-right" style="margin-top: 50px;"><i>Dibuat oleh: <?php echo $dibuatoleh;?></i></p>
                    
                    <p class="row text-right">
                        <button class="btn btn-primary printing siku" onclick="myFunction()" style="width: 150px;">Print</button>
                    </p>
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
    <script>
        function thousandSeparator(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
    
    <script type="text/javascript">
        function removeError(id){
            $("#val-" + id).html("");
        }
    </script>
    <script>
        function myFunction() {
            window.print();
        }
    </script>

</body>

</html>
