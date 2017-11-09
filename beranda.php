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

        <title>Monitoring Pembelian</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS /// NO NEED -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <style>
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
        </style>
    </head>

<body>
    <?php $currentpage = "beranda";?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php require 'profile-navigation.php'; ?>
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        DASHBOARD
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <?php

            require './connection.php';

            $neworder = 0;
            $processing = 0;
            $finished = 0;
            $totalorder = 0;

            ## Paten dari status pesanan
            $sql = "SELECT 
                   (SELECT count(*) FROM db_purchase WHERE status_order = 1)  as neworder, 
                   (SELECT count(*) FROM db_purchase WHERE status_order != 1 AND status_order != 3) as processing, 
                   (SELECT count(*) FROM db_purchase WHERE status_order = 3) as finished,
                   (SELECT count(*) FROM db_purchase) as totalorder";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();

            $neworder = $row['neworder'];
            $processing = $row['processing'];
            $finished = $row['finished'];
            $totalorder = $row['totalorder'];

            ?>
<!--            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary siku">
                        <div class="panel-heading siku">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $neworder;?></div>
                                    <div>PESANAN BARU</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer siku">
                                <span class="pull-left">Lihat Selengkapnya..</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red siku">
                        <div class="panel-heading siku">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $processing;?></div>
                                    <div>SEDANG DIPROSES</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer siku">
                                <span class="pull-left">Lihat Selengkapnya..</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green siku">
                        <div class="panel-heading siku">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-square fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $finished;?></div>
                                    <div>PESANAN SELESAI</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer siku">
                                <span class="pull-left">Lihat Selengkapnya..</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow siku">
                        <div class="panel-heading siku">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-reorder fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totalorder;?></div>
                                    <div>TOTAL ORDER</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer siku">
                                <span class="pull-left">Lihat Selengkapnya..</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>-->
            
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-primary siku">
                        <div class="panel-heading siku"><b>Reward yang ditagih Hari ini</b></div>
                        <div class="panel-body">
                            <ul class="list-group siku">
                                <?php
                                    $tempsql = "";
                                    $sql =  "Select dbv.kode as kodevendor, 
                                                    dbv.nama as namavendor, 
                                                    dbr.status as status, 
                                                    dbs.nama as statusnama, 
                                                    dbr.id as id,
                                                    dbr.no_po as nopo,
                                                    dbr.keterangan_reward as keterangan_reward, 
                                                    dbr.tanggal_buat as tanggalbuat, 
                                                    dbr.tanggal_selesai as tanggalselesai, 
                                                    dbr.tanggal_tagih as tanggaltagih, 
                                                    dbr.memo as memo,
                                                    dbjr.nama as jenisreward
                                            from db_rewards dbr
                                            INNER JOIN db_user dbu ON dbu.kode = dbr.id_user 
                                            INNER JOIN db_status dbs ON dbr.status = dbs.kode 
                                            INNER JOIN db_vendor dbv ON dbv.kode = dbr.kode_vendor 
                                            INNER JOIN db_jenis_reward dbjr ON dbjr.id = dbr.id_jenis_reward 
                                            where dbr.isDelete = 0";
                                    $tempsql .= $sql . " AND dbr.tanggal_tagih = DATE(NOW()) order by dbr.created_at asc"; 

                                    $result = $con->query($tempsql);
                                    if ($result->num_rows > 0) {
                                        $nomor = 1;

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<li class=\"list-group-item siku\">";
                                            if ($row['status'] == 1) {
                                                echo "<span class=\"badge badge-error\">". $row['statusnama'] ."</span>";
                                            } else if ($row['status'] == 2){
                                                echo "<span class=\"badge badge-success\">". $row['statusnama'] ."</span>";
                                            }
                                            echo $row['jenisreward'] ;
                                            if ($row['keterangan_reward'] != "") {
                                                echo "<br/>" . $row['keterangan_reward'];
                                            }
                                            echo "</li>";
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-danger siku">
                        <div class="panel-heading siku"><b>Reward yang ditagih Minggu ini</b></div>
                        <div class="panel-body">
                      
                            <ul class="list-group siku">
                                <?php
                                $tempsql = "";
                                $tempsql .= $sql . " AND dbr.tanggal_tagih > DATE_SUB(NOW(), INTERVAL 1 WEEK) order by dbr.tanggal_tagih asc"; 

                                    $result = $con->query($tempsql);
                                    if ($result->num_rows > 0) {
                                        $nomor = 1;

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<li class=\"list-group-item siku\">";
                                            if ($row['status'] == 1) {
                                                echo "<span class=\"badge badge-error\">". $row['statusnama'] ."</span>";
                                            } else if ($row['status'] == 2){
                                                echo "<span class=\"badge badge-success\">". $row['statusnama'] ."</span>";
                                            }
                                            echo $row['jenisreward'] . "  <cite title=\"Source Title\"> -- " . tanggal_indo($row['tanggaltagih'])."</cite>";
                                            if ($row['keterangan_reward'] != "") {
                                                echo "<br/>" . $row['keterangan_reward'];
                                            }
                                            echo "</li>";
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-info siku">
                        <div class="panel-heading siku"><b>Reward yang ditagih Bulan ini</b></div>
                        <div class="panel-body">
                      
                            <ul class="list-group siku">
                                <?php
                                    $tempsql = "";
                                    $tempsql .= $sql . " AND month(dbr.tanggal_tagih) = month(NOW()) order by dbr.tanggal_tagih asc"; 
                                    $result = $con->query($tempsql);
                                    if ($result->num_rows > 0) {
                                        $nomor = 1;

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<li class=\"list-group-item siku\">";
                                            if ($row['status'] == 1) {
                                                echo "<span class=\"badge badge-error\">". $row['statusnama'] ."</span>";
                                            } else if ($row['status'] == 2){
                                                echo "<span class=\"badge badge-success\">". $row['statusnama'] ."</span>";
                                            }
                                            echo $row['jenisreward'] . "  <cite title=\"Source Title\"> -- " . tanggal_indo($row['tanggaltagih'])."</cite>";
                                            if ($row['keterangan_reward'] != "") {
                                                echo "<br/>" . $row['keterangan_reward'];
                                            }
                                            echo "</li>";
                                        }
                                    }
                                ?>
                            </ul>
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

<!--     Morris Charts JavaScript 
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>-->

</body>

</html>
