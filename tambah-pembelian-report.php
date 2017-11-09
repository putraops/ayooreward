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

        <title>Print Pembelian - ayooreward!</title>

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
    $namapembelian = $tanggalbeli = $nopreorder = $nodeliveryorder = $vendor = $totalbeli = $isreward = $reward = $namauser = "";
    
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
                    $noorder = $con->real_escape_string($_REQUEST["q"]);
                    $sql = "Select dbp.no_order as noorder, 
                            dbp.subject as subject, 
                            dbv.nama as namavendor, 
                            dbp.no_invoice as noinvoice, 
                            dbp.no_po as nopo,
                            dbp.no_do as nodo, 
                            dbp.tanggal_beli as tanggalbeli, 
                            dbp.total_beli as totalbeli, 
                            dbp.reward as reward,
                            dbp.tanggal_lunas as tanggallunas,
                            dbp.is_reward as isreward,
                            dbu.name as namauser
                    from db_purchase dbp
                    INNER JOIN db_status dbs ON dbp.status_order = dbs.kode
                    INNER JOIN db_vendor dbv ON dbv.kode = dbp.kode_vendor
                    INNER JOIN db_user dbu ON dbu.kode = dbp.id_user  
                    where dbp.no_order = '$noorder'
                    order by dbp.no_order asc";

                    $result = $con->query($sql);
                ?>
                <?php 
                    if ($result->num_rows > 0) {    
                        while($row = $result->fetch_assoc()) {
                            $namapembelian = $row['subject'];
                            $totalbeli = $row['totalbeli'];
                            $tanggalbeli = $row['tanggalbeli'];
                            $nopreorder = $row['nopo'];
                            $noinvoice = $row['noinvoice'];
                            $nodeliveryorder = $row['nodo'];
                            $vendor = $row['namavendor'];
                            $isreward = $row['isreward'];
                            $reward = $row['reward'];
                            $namauser = $row['namauser'];
                        }
                    }
                ?>
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">
                        <strong>Form Bukti Pembelian</strong>
                    </h1>
                    <p style="margin-top: -15px;">Pembelian: <?php echo $namapembelian;?></p>
                </div>
                <div class="col-lg-12 text-right">
                    <p>Tanggal Cetak: <?php echo tanggal_indo(date("Y-m-d"));?></p>
                </div>
                <div class="col-lg-12" style="font-size: 16px;">
                    <p><strong>Tanggal Beli: </strong><?php echo tanggal_indo($tanggalbeli);?></p>
                    <p><strong>No Invoice: </strong><?php echo $noinvoice;?></p>
                    <p><strong>No Preorder: </strong><?php echo $nopreorder;?></p>
                    <p><strong>No Delivery Order: </strong><?php echo $nodeliveryorder;?></p>
                    <p><strong>Vendor: </strong><?php echo $vendor;?></p>
                    <p><strong>Total Pembelian: </strong>Rp. <?php echo number_format($totalbeli);?></p>
                    <h4 style="margin-top: 50px;">Daftar Barang yang dibeli:</h4>
                    <?php
                        $sqlitem = "Select dbp.no_order as noorder, dbb.nama as namabarang, dbpd.keterangan as keterangan
                            from db_purchase dbp
                            INNER JOIN db_purchase_detail dbpd ON dbp.no_order = dbpd.no_order
                            INNER JOIN db_barang dbb ON dbb.id = dbpd.kode_barang
                            where dbp.no_order = '$noorder'";

                        $resultitem = $con->query($sqlitem);
                    ?>
                    
                    <?php if ($resultitem->num_rows > 0): ?>
                        <ol>
                        <?php while($rowitem = $resultitem->fetch_assoc()) :?>
                            <li><?php echo $rowitem['namabarang'];?>
                                <p>Keterangan: <?php echo $rowitem['keterangan'] == "" ? "-" : $rowitem['keterangan'];?></p>
                            </li>
                        <?php endwhile;?>
                        </ol>
                    <?php endif;?>
                    <h4 style="margin-top: 30px;"><i>Reward: <?php echo $isreward == 0 ? "Tidak ada reward" : $reward ; ?></i></h4>

                    <p class="text-right" style="margin-top: 50px;"><i>Created by: <?php echo $namauser;?></i></p>
                    
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary printing siku" onclick="myFunction()" style="width: 150px;">Print</button>
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
