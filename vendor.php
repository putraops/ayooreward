<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Vendor - ayooreward!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    
    <script src="sweetalert/dist/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
    
    <style>
        
    </style>
</head>

<body>
    <?php $currentpage = "vendor";?>
        
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php require 'profile-navigation.php'; ?>
        <?php 
        echo "<script>";
        if ($read_vendor == "0_0") {
            echo "window.location.href = 'rewards';";
        }
        echo "</script>";
        ?>
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <strong>DAFTAR VENDOR</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <?php if ($create_vendor != "0_0"): ?>
                <div class="col-lg-12">
                    <a href="tambah-vendor" type="button" class="btn btn-info siku"><strong>+</strong> Tambah Vendor</a><br/><br/>
                </div>
                <?php endif; ?>
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
<!--                                    <th>Email</th>
                                    <th>Telp</th>-->
                                    <th>NPWP</th>
                                    <th>Alamat</th>
<!--                                    <th>Kontak Person</th>-->
                                    <th>Keterangan</th>
                                    <?php if ($update_vendor != "0_0" || $delete_vendor != "0_0"): ?>
                                    <th>Aksi</th>
                                    <?php endif;?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                require './connection.php';

                                $sql = "SELECT kode, nama, email, telp, npwp, alamat, nama_cp, email_cp, telp_cp, keterangan, status_hapus, created_at, updated_at "
                                        . "FROM db_vendor "
                                        . "Where status_hapus = 0 "
                                        . "order by created_at ASC;";                            

                                $result = $con->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $nomor = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $nomor . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
//                                        echo "<td>" . $row['email'] . "</td>";
//                                        echo "<td>" . $row['telp'] . "</td>";
                                        echo "<td>" . ($row['npwp'] == "" ? "-" : $row['npwp']). "</td>";
                                        echo "<td>" . $row['alamat'] . "</td>";
//                                        echo "<td>" . $row['nama_cp'] . "<br>" . $row['email_cp'] . "<br>" . $row['telp_cp'] . "</td>";
                                        echo "<td>" . $row['keterangan'] . "</td>";
                                        
                                        if ($update_vendor != "0_0" || $delete_vendor != "0_0") {
                                            echo "<td class='text-center'>";
                                            if ($update_vendor != "0_0") {
                                                echo "<a href='edit-vendor?q=" . $row['kode'] . "' class=\"btn btn-primary btn-xs siku\">Ubah&nbsp;</a>&nbsp;";
                                            }
                                            if ($delete_vendor != "0_0") {
                                                echo "<button class=\"btn btn-danger btn-xs siku\" onclick=\"deletevendor(". $row['kode'] .")\">Hapus</button>";
                                            }
                                            echo "</td>";
                                        }
                                        echo "</tr>";
                                        $nomor++;
                                    }
                                }
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
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
        
        function showModalCategory(){
            $('#modal-CategoryAction').modal('show'); 
        }
        
        function deletevendor(kode) {
            if (confirm("Apakah anda yakin ingin menghapus vendor ini?")) {
                var url = 'ajax/delete-vendor.php?kode=' + kode;
                $.ajax({
                    url: url,
                    success: function(data, textStatus, jqXHR) {
                        if (data == "1") {
                            swal({
                                title: "Berhasil menghapus vendor",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "Black",
                                confirmButtonText: "Ya",
                                cancelButtonText: "Tidak",
                                closeOnConfirm: false,
                                closeOnCancel: true
                            },
                            function(isConfirm) {
                                if (isConfirm) {  
                                    window.location.href = "vendor";
                                }
                            });   
                        }
                    },
                });
            }
        }
    </script>

</body>

</html>
