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

        <title>Daftar Barang - ayooreward!</title>

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
    <?php $currentpage = "sponsorship";?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php require 'profile-navigation.php'; ?>
        <?php 
            echo "<script>";
            if ($read_jenis_reward == "0_0") {
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
                        <strong>DAFTAR JENIS REWARD</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
                    <?php // if($create_jenis_reward != "0_0"): ?>
                    <div class="col-lg-12">
                        <a href="tambah-jenis-reward" type="button" class="btn btn-info siku"><strong>+</strong> Tambah Jenis Reward</a><br/><br/>
                    </div>
                    <?php // endif; ?>
                </div>
                
                

                <div class="col-md-12">
                     <div class="panel panel-default siku">
                        <div class="panel-heading">
                          <h3 class="panel-title">DAFTAR JENIS REWARD</h3>
                        </div>
                        <div class="panel-body">

                            <div class="table-responsive">
                               <table id="myTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <?php // if ($update_barang != "0_0" || $delete_barang != "0_0"): ?>
                                            <th>Aksi</th>
                                            <?php // endif;?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        require './connection.php';

                                        $sql = "SELECT id, nama, created_at, updated_at "
                                                . "FROM db_jenis_reward where isDelete = 0;";                            

                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $nomor = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $nomor++ . "</td>";
                                                echo "<td>" . $row['nama'] . "</td>";

                                                if ($update_jenis_reward != "0_0" || $delete_jenis_reward != "0_0") {
                                                    echo "<td class='text-center'>";
                                                    if ($update_jenis_reward != "0_0") {
                                                        echo "<a href='edit-jenis-reward?q=".$row['id']."' class=\"btn btn-primary btn-xs siku\" title=\"Ubah " . $row['nama'] . "\">Ubah</button></a> ";
                                                    }
                                                    if ($delete_jenis_reward != "0_0") {
                                                        echo "<button class=\"btn btn-danger btn-xs siku\" onclick=\"deletebarang(". $row['id'] .")\" title=\"Hapus " . $row['nama'] . "\">Hapus</button>";
                                                    }
                                                    echo "</td>";
                                                }
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    
    
<div class="modal fade" id="modalEditBarang" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content siku">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title">Ubah Barang</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input class="form-control siku" id="modal-barangKode" readonly="true" disabled="true"  onkeyup="removeError(this.id)" placeholder="Masukkan Kode Barang">
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input class="form-control siku" id="modal-barangName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Barang">
                    <i class="validation-text" id="val-modal-barangName"></i>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="3" id="modal-barangKeterangan" onkeyup="removeError(this.id)" placeholder="Masukkan Keterangan Barang"></textarea>
                    <i class="validation-text" id="val-modal-barangKeterangan"></i>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default siku" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary siku" onclick="ubahbarang()">Ubah</button>
            </div>
        </div>
    </div>
</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  
    <script type="text/javascript">
       $(document).ready(function(){
            $('#myTable').DataTable();
            //$("#modalEditBarang").modal('show');
        });
        function removeError(id){
            $("#val-" + id).html('');
        }
        
        function deletebarang(id) {
            if (confirm("Apakah anda yakin ingin menghapus jenis reward ini?")) {
                var url = 'ajax/delete-jenis-reward.php?kode=' + id;
                $.ajax({
                    url: url,
                    success: function(data, textStatus, jqXHR) {
                        if (data == "1") {
                            swal({
                                title: "Berhasil Menghapus Jenis Reward",
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
                                    window.location.href = "jenis-reward";
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
