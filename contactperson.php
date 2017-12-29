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

        <title>Daftar Kontak Person - ayooreward!</title>

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
            .activate, .deactivate {
                letter-spacing: 0.5px;
            }
            .status-user {
                cursor: pointer;
            }
            .no-status-user {
                cursor: no-drop;
            }
        </style>
    </head>

    <body>
        <?php $currentpage = "user"; ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php require 'profile-navigation.php'; ?>
            <?php
            echo "<script>";
            if ($read_user == "0_0") {
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
                            <strong>DAFTAR KONTAK PERSON</strong>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <?php if ($create_user != "0_0"): ?>
                        <div class="col-lg-12">
                            <a href="tambah-contactperson" type="button" class="btn btn-info siku"><strong>+</strong> Tambah Kontak Person</a><br/><br/>
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <?php if ($update_privileges != "0_0"): ?>
                                            <th>Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require './connection.php';

                                    $sql = "SELECT id, nama, email, telp, isdelete
                                        FROM db_contactperson 
                                        WHERE isdelete = 0
                                        order by created_at ASC;";

                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $nomor = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $nomor . "</td>";
                                            echo "<td>" . ($row['nama'] == "" ? "-" : $row['nama']) . "</td>";
                                            echo "<td>" . ($row['email'] == "" ? "-" : $row['email']) . "</td>";
                                            echo "<td>" . ($row['telp'] == "" ? "-" : $row['telp']) . "</td>";

                                            if ($update_privileges != "0_0" || $update_user) {
                                                echo "<td class='text-center'>";
                                                if ($update_user != "0_0") {
                                                    echo "<a href=\"edit-contactperson?k=" . $row['id'] . "\"class=\"btn btn-primary btn-xs siku\">&nbsp;Ubah&nbsp;</a>&nbsp;";
                                                }
                                                if ($set_user_active != "0_0") {
                                                    echo "<button class=\"btn btn-danger btn-xs siku\" onclick=\"deleteuser(" . $row['id'] . ")\">Hapus</button>";
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
            $(document).ready(function () {
                var defaultDatatableReward = 50;
                if (localStorage.getItem("defaultDatatableCP") != null) {
                    defaultDatatableReward = localStorage.getItem("defaultDatatableCP");
                }
                $('#myTable').DataTable({
                    "pageLength": defaultDatatableReward
                });
                $("#myTable_wrapper select").change(function () {
                    localStorage.setItem("defaultDatatableCP", $("#myTable_wrapper select").val());
                });
            });

            function deleteuser(kode) {
                if (confirm("Apakah anda yakin ingin menghapus kontak person ini?")) {
                    var url = 'ajax/delete-contactperson.php?id=' + kode;
                    $.ajax({
                        url: url,
                        success: function (data, textStatus, jqXHR) {
                            if (data == "1") {
                                swal({
                                    title: "Berhasil menghapus kontak person ini",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "Black",
                                    confirmButtonText: "Ya",
                                    cancelButtonText: "Tidak",
                                    closeOnConfirm: false,
                                    closeOnCancel: true
                                },
                                        function (isConfirm) {
                                            if (isConfirm) {
                                                window.location.href = "contactperson";
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
