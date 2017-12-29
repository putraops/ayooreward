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

        <title>Daftar User - ayooreward!</title>

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
                            <strong>DAFTAR USER</strong>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <?php if ($create_user != "0_0"): ?>
                        <div class="col-lg-12">
                            <a href="tambah-user" type="button" class="btn btn-info siku"><strong>+</strong> Tambah User</a><br/><br/>
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Cabang</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th>Login Terakhir</th>                                    
                                        <th>Status</th>
                                        <?php if ($update_privileges != "0_0"): ?>
                                            <th>Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require './connection.php';

                                    $sql = "SELECT u.kode, u.username as username, u.name as name, u.email as email, "
                                            . "u.telp as telp, u.jabatan as jabatan, c.nama as namacabang, "
                                            . "u.status as status, u.last_login as last_login, u.created_at as created_at, u.updated_at as updated_at "
                                            . "FROM db_user u "
                                            . "LEFT JOIN db_cabang c ON u.id_cabang = c.id ";
                                    $sql .= "WHERE u.kode > 0 ";
                                    if ($jabatanUserLogin != "admin") {
                                        $sql .= "AND u.jabatan != 'admin' ";
                                    }
                                    $sql .= "AND u.isdelete = 0 ";
                                    $sql .= "order by created_at ASC;";

                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $nomor = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            $temp = explode(" ", $row['last_login']);

                                            echo "<tr>";
                                            echo "<td>" . $nomor . "</td>";
                                            echo "<td>" . ($row['namacabang'] == "" ? "Semua Cabang" : $row['namacabang']) . "</td>";
                                            echo "<td>" . ($row['username'] == "" ? "-" : $row['username']) . "</td>";
                                            echo "<td>" . ($row['name'] == "" ? "-" : $row['name']) . "</td>";
                                            echo "<td>" . ($row['email'] == "" ? "-" : $row['email']) . "</td>";
                                            echo "<td>" . ($row['telp'] == "" ? "-" : $row['telp']) . "</td>";
                                            if ($row['last_login'] === "0000-00-00 00:00:00") {
                                                echo "<td>Belum Pernah Login</td>";
                                            } else {
                                                echo "<td>" . tanggal_indo($temp[0]) . " " . $temp[1] . "</td>";
                                            }


                                            $temp = "";
                                            if ($set_user_active != "0_0") {
                                                $temp = "status-user";
                                            } else {
                                                $temp = "no-status-user";
                                            }
                                            if ($row['status'] == '1') {
                                                echo "<td class='text-center'><span class=\"label label-success activate " . $temp . " siku\" id=\"" . $row['kode'] . "\" dir=\"" . $row['status'] . "\"  onclick=\"setstatususer(" . $row['kode'] . ", this)\">AKTIF</span></td>";
                                            } else {
                                                echo "<td class='text-center'><span class=\"label label-danger deactivate " . $temp . " siku\" id=\"" . $row['kode'] . "\" dir=\"" . $row['status'] . "\" onclick=\"setstatususer(" . $row['kode'] . ", this)\">TIDAK AKTIF</span></td>";
                                            }

                                            if ($update_privileges != "0_0" || $update_user) {
                                                echo "<td class='text-center'>";

                                                if ($jabatanUserLogin == "admin") {
                                                    echo "<a id=\"" . $row['kode'] . "\" onclick=\"formchangepassword(this.id)\" class=\"btn btn-default btn-xs siku\">&nbsp;Ubah Password&nbsp;</a>&nbsp;";
                                                }
                                                if ($update_privileges != "0_0") {

                                                    echo "<a href=\"detail-user?k=" . $row['kode'] . "\"class=\"btn btn-info btn-xs siku\">&nbsp;Settings&nbsp;</a>&nbsp;";
                                                }
                                                if ($update_user != "0_0") {
                                                    echo "<a href=\"edit-user?k=" . $row['kode'] . "\"class=\"btn btn-primary btn-xs siku\">&nbsp;Ubah&nbsp;</a>&nbsp;";
                                                }
                                                if ($set_user_active != "0_0") {

                                                    echo "<button class=\"btn btn-danger btn-xs siku\" onclick=\"deleteuser(" . $row['kode'] . ")\">Hapus</button>";
//                                                echo "<a href=\"detail-user?k=" .$row['kode']. "\"class=\"btn btn-danger btn-xs siku\">&nbsp;Hapus&nbsp;</a>&nbsp;";
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
        <div class="modal fade-scale" id="modal-change-status" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content siku">
                    <div class="modal-header" style="padding: 10px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: 7px;"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" style="font-size: 18pt; letter-spacing: 0.5px;">UBAH PASSWORD USER</h4>
                    </div>
                    <div class="modal-body" style="font-size: 12pt; letter-spacing: 1px; color: #666;">
                        <div class="form-group col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label style="margin-bottom: 5px;">Password Baru</label>
                                <input type="password" class="form-control siku" name="newPassword" id="newPassword" onkeyup="removeError(this.id)" placeholder="Password Baru" value="">
                            </div> 
                            <i class="validation-text" id="val-status-invoice" style="letter-spacing: 0px;"></i>
                        </div>
                        <div class="text-right" style="padding: 15px;">
                            <button type="button" class="btn btn-default siku" data-dismiss="modal"> Batal </button>
                            <button type="button" class="btn btn-primary siku" onclick="ubahpassword()" style="width: 70px;"> Ubah </button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript">

                                var iduser = "";
                                function formchangepassword(id) {
                                    iduser = id;
                                    $("#newPassword").val("");
                                    $('#modal-change-status').modal('show');
                                }

                                function ubahpassword() {
                                    var password = $("#newPassword").val().trim();
                                    $("#repeatNewPassword").val("");
                                    if (confirm("Apakah anda yakin ingin mengubah password user ini?")) {
                                        var url = 'ajax/change-password.php?id=' + iduser + "&password=" + password;
                                        console.log(url);
                                        $.ajax({
                                            url: url,
                                            success: function (data, textStatus, jqXHR) {
                                                if (data == "1") {
                                                    swal("Berhasil mengubah password user ini", "", "success");
                                                }
                                            },
                                        });
                                    }
                                }

                                $(document).ready(function () {
                                    var defaultDatatableReward;
                                    if (localStorage.getItem("defaultDatatableUser") != null) {
                                        defaultDatatableReward = localStorage.getItem("defaultDatatableUser");
                                    } else {
                                        defaultDatatableReward = 50;
                                    }
                                    $('#myTable').DataTable({
                                        "pageLength": defaultDatatableReward
                                    });
                                    $("#myTable_wrapper select").change(function () {
                                        localStorage.setItem("defaultDatatableUser", $("#myTable_wrapper select").val());
                                    });
                                });

                                function deleteuser(kode) {
                                    if (confirm("Apakah anda yakin ingin menghapus user ini?")) {
                                        var url = 'ajax/delete-user.php?kode=' + kode;
                                        $.ajax({
                                            url: url,
                                            success: function (data, textStatus, jqXHR) {
                                                if (data == "1") {
                                                    swal({
                                                        title: "Berhasil menghapus user ini",
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
                                                                    window.location.href = "user";
                                                                }
                                                            });
                                                }
                                            },
                                        });
                                    }
                                }

                                $(".status-user").hover(function (e) {
                                    if ($(this).hasClass("activate")) { // set not-active
                                        $(this).html('NON AKTIFKAN');
                                    }
                                    if ($(this).hasClass("deactivate")) { // set not-active
                                        $(this).html('AKTIFKAN');
                                    }
                                });
                                $(".status-user").mouseout(function (e) {
                                    if ($(this).hasClass("activate")) { // set not-active
                                        $(this).html('AKTIF');
                                    }
                                    if ($(this).hasClass("deactivate")) { // set not-active
                                        $(this).html('TIDAK AKTIF');
                                    }
                                });

                                $(".status-user").click(function (e) {
                                    var status = "";
                                    var id = e.target.id;

                                    if (e.target.attributes["dir"].value === "0") {
                                        status = "1";
                                    } else {
                                        status = "0";
                                    }

                                    var temp = this;
                                    var url = 'ajax/edit-setstatususer.php?kode=' + id + "&set=" + status;
                                    //console.log(url);
                                    $.ajax({
                                        url: url,
                                        success: function (data, textStatus, jqXHR) {
                                            if (data == "1") {
                                                console.log(temp);
                                                $(temp).attr("dir", status);
                                                $(temp).html("dir");
                                                if (status == "1") { //mau diubah ke "TIDAK AKTIF"
                                                    //alert();
                                                    $(temp).removeClass("deactivate");
                                                    $(temp).addClass("activate");
                                                    $(temp).html('TIDAK AKTIF');

                                                    $(temp).removeClass('label-danger');
                                                    $(temp).addClass('label-success');
                                                } else if (status == "0") { //mau diubah ke "AKTIF"
                                                    $(temp).removeClass("activate");
                                                    $(temp).addClass("deactivate");
                                                    $(temp).html('AKTIF');

                                                    $(temp).removeClass('label-success');
                                                    $(temp).addClass('label-danger');

                                                }

                                                swal("Berhasil status user", "", "success");
                                            }
                                        },
                                    });
                                });


                                function showModalCategory() {
                                    $('#modal-CategoryAction').modal('show');
                                }

        </script>

    </body>

</html>
