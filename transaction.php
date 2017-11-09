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

        <title>SB Admin - Bootstrap Admin Template</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS /// NO NEED -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    
        <script src="sweetalert/dist/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
                
    </head>

<body>
    <?php $currentpage = "transaction";?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php require 'profile-navigation.php'; ?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php require 'side-navigation.php'; ?>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <strong>DAFTAR TRANSAKSI</strong>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                                
                <div class="row">
                    <div class="col-lg-12">
                        <a href="tambah-transaction" type="button" class="btn btn-info siku"><strong>+</strong> Tambah Transaksi</a><br/><br/>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Event</th>
                                        <th>Tanggal Event</th>
                                        <th>Lokasi</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    require './connection.php';
                                    
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  
    <script type="text/javascript">
       $(document).ready(function(){
            $('#myTable').DataTable();
        });
        function removeError(id){
            $("#val-" + id).remove();
        }
        
       
    </script>

</body>

</html>
