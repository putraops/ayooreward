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

    <title>Detail User - ayooreward!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
    <script src="sweetalert/dist/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
    
    <style>
        .page-header {
            letter-spacing: 1.5px;
        }
    </style>
</head>

<body>
    <?php $currentpage = "detail-user";?>
    
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php require 'profile-navigation.php'; ?>
        
        <?php 
            echo "<script>";
            if ($update_privileges == "0_0") {
                echo "window.location.href = 'rewards';";
            }
            echo "</script>";
        ?>    
    </nav>

    <div id="page-wrapper" style="padding-bottom: 100px;">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        <strong>INFORMASI USER</strong>
                    </h3>
                </div>
            </div>
            <!-- /.row -->

            <?php
                require './connection.php';
                $currentkode = $con->real_escape_string($_REQUEST["k"]);
                $name = $email = $telp = $status = $lastlogin = $temp = "";
                //== First = id_privilages || Second = isChecked
                $read_status = $read_user = $read_vendor = $read_barang = $read_purchase = $read_reward = $read_jenis_reward = $read_contactperson = "0_0";
                $update_status = $update_user = $update_privileges = $update_vendor = $update_barang = $update_purchase = $update_reward = $update_jenis_reward = $update_contactperson = "0_0";
                $create_status = $create_user = $create_vendor = $create_barang = $create_purchase = $create_reward = $create_jenis_reward = $create_contactperson = "0_0";
                $delete_vendor = $delete_barang = $delete_purchase = $delete_reward = $delete_jenis_reward = $delete_contactperson = "0_0";
                $delete_contactperson = $delete_barang = $delete_purchase = $delete_reward = $delete_jenis_reward = "0_0";

                $set_user_active = "0_0";
                $create_laporan = "0_0";
                $create_laporan_reward = "0_0";
                
                $sql = "SELECT name, email, telp, username, status, last_login, created_at, updated_at "
                     . "FROM db_user "
                     . "Where kode = '$currentkode'";
                
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    $name = $row['name'];
                    $email = $row['email'];
                    $telp = $row['telp'];
                    $status = $row['status'];
                    $lastlogin = $row['last_login'];
                    $temp = explode(" ", $row['last_login']);
                    
                    $sql = "SELECT pd.id_privileges as priv, pd.id_user as user ";
                    $sql .= "FROM db_privileges p ";
                    $sql .= "INNER JOIN db_privileges_detail pd ON pd.id_privileges = p.id ";
                    $sql .= "INNER JOIN db_user u ON u.kode = pd.id_user ";
                    $sql .= "WHERE pd.id_user = '$currentkode' ORDER BY pd.id_privileges asc";
                    
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                           // echo $row_siste
                            $row['priv'] == 1 ? $read_status = $row['priv'] . "_1" : "";
                            $row['priv'] == 2 ? $create_status = $row['priv'] . "_1" : "";
                            $row['priv'] == 3 ? $update_status = $row['priv'] . "_1" : "";
                            
                            $row['priv'] == 4 ? $read_user = $row['priv'] . "_1" : "";
                            $row['priv'] == 5 ? $create_user = $row['priv'] . "_1" : "";
                            $row['priv'] == 5 ? $update_user = $row['priv'] . "_1" : "";
                            $row['priv'] == 6 ? $update_privileges = $row['priv'] . "_1" : "";
                            $row['priv'] == 7 ? $set_user_active = $row['priv'] . "_1" : "";
                            
                            $row['priv'] == 8 ? $read_vendor = $row['priv'] . "_1" : "";
                            $row['priv'] == 9 ? $create_vendor = $row['priv'] . "_1" : "";
                            $row['priv'] == 10 ? $update_vendor = $row['priv'] . "_1" : "";
                            $row['priv'] == 11 ? $delete_vendor = $row['priv'] . "_1" : "";
                            
                            $row['priv'] == 12 ? $read_barang = $row['priv'] . "_1" : "";
                            $row['priv'] == 13 ? $create_barang = $row['priv'] . "_1" : "";
                            $row['priv'] == 14 ? $update_barang = $row['priv'] . "_1" : "";
                            $row['priv'] == 15 ? $delete_barang = $row['priv'] . "_1" : "";
                            
                            $row['priv'] == 16 ? $read_purchase = $row['priv'] . "_1" : "";
                            $row['priv'] == 17 ? $create_purchase = $row['priv'] . "_1" : "";
                            $row['priv'] == 18 ? $update_purchase = $row['priv'] . "_1" : "";
                            $row['priv'] == 19 ? $delete_purchase = $row['priv'] . "_1" : "";
                            $row['priv'] == 20 ? $create_laporan = $row['priv'] . "_1" : "";
                            
                            $row['priv'] == 21 ? $read_reward = $row['priv'] . "_1" : "";
                            $row['priv'] == 22 ? $create_reward = $row['priv'] . "_1" : "";
                            $row['priv'] == 23 ? $update_reward = $row['priv'] . "_1" : "";
                            $row['priv'] == 24 ? $delete_reward = $row['priv'] . "_1" : "";
                            
                            $row['priv'] == 21 ? $read_reward = $row['priv'] . "_1" : "";
                            $row['priv'] == 22 ? $create_reward = $row['priv'] . "_1" : "";
                            $row['priv'] == 23 ? $update_reward = $row['priv'] . "_1" : "";
                            $row['priv'] == 24 ? $delete_reward = $row['priv'] . "_1" : "";

                            $row['priv'] == 25? $create_laporan_reward = $row['priv'] . "_1" : "";
                            
                            $row['priv'] == 26 ? $read_jenis_reward = $row['priv'] . "_1" : "";
                            $row['priv'] == 27 ? $create_jenis_reward = $row['priv'] . "_1" : "";
                            $row['priv'] == 28 ? $update_jenis_reward = $row['priv'] . "_1" : "";
                            $row['priv'] == 29 ? $delete_jenis_reward = $row['priv'] . "_1" : "";
                            
                            $row['priv'] == 30 ? $read_contactperson = $row['priv'] . "_1" : "";
                            $row['priv'] == 31 ? $create_contactperson = $row['priv'] . "_1" : "";
                            $row['priv'] == 32 ? $update_contactperson = $row['priv'] . "_1" : "";
                            $row['priv'] == 33 ? $delete_contactperson = $row['priv'] . "_1" : "";

                        }
                    }
                    
                } else {
                    echo "<script>";
                    echo "swal({";
                    echo "    title: 'Tidak ada user terdaftar kode ini.',";
                    echo "    type: 'warning',";
                    echo "    showCancelButton: false,";
                    echo "    confirmButtonColor: 'Black',";
                    echo "    confirmButtonText: 'Ya',";
                    echo "    cancelButtonText: 'Tidak',";
                    echo "    closeOnConfirm: false,";
                    echo "    closeOnCancel: true";
                    echo "},";
                    echo "function(isConfirm) {";
                    echo "    if (isConfirm) {  ";
                    echo "        window.location.href = 'user';";
                    echo "    }";
                    echo "})";
                    echo "</script>";
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <address>
                        <h3>Nama: <?php echo $name; ?></h3>
                        <h4>Email: <a href="mailto:#"><?php echo $email;?></a></h4>
                        <h4>Telp / No Handphone: <abbr title="Telp / No Handphone"><i class="fa fa-phone"></i></abbr> <?php echo $telp;?></h4>
                        <h4>Login Terakhir: <?php echo $lastlogin == "0000-00-00 00:00:00" ? "Belum Pernah Login" : tanggal_indo($temp[0]) . " " . $temp[1];?></h4>
                        <h4>Status: <?php echo $status == "0" ? "<span class=\"label label-warning siku\">Tidak Aktif</span>" : "<span class=\"label label-success siku\">Aktif</span>";?></h4>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 5px;">
                    <h3 class="page-header">
                        <strong>HAK AKSES</strong>
                    </h3>
                    <input type="checkbox" class="" id="checkall" name="select-login"> Pilih Semua
                </div>
                <div id="checkboxes">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label style="font-size: 15pt;">Rewards</label> <br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $read_reward); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_21" name="select_login"> Lihat Daftar
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $create_reward); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_22" name="select_login"> Tambah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $update_reward); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_23" name="select_login"> Ubah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $delete_reward); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_24" name="select_login"> Hapus
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $create_laporan_reward); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_25" name="select_login"> Laporan
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label style="font-size: 15pt;">Jenis Reward</label> <br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $read_jenis_reward); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_26" name="select_login"> Lihat Daftar
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $create_jenis_reward); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_27" name="select_login"> Tambah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $update_jenis_reward); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_28" name="select_login"> Ubah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $delete_jenis_reward); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_29" name="select_login"> Hapus
                            </label><br/>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label style="font-size: 15pt;">Vendor</label> <br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $read_vendor); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_8" name="select_login"> Lihat Daftar
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $create_vendor); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_9" name="select_login"> Tambah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $update_vendor); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_10" name="select_login"> Ubah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $delete_vendor); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_11" name="select_login"> Hapus
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label style="font-size: 15pt;">User</label> <br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $read_user); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_4" name="select_login" value="option1"> Lihat Daftar
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $create_user); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_5" name="select_login" value="option1"> Tambah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $update_user); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_30" name="select_login" value="option1"> Ubah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $update_privileges); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_6" name="select_login" value="option1"> Atur Akses
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $set_user_active); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_7" name="select_login" value="option1"> Hapus / Aktif / Non Aktifkan
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label style="font-size: 15pt;">Master Status</label> <br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $read_status); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_1" name="select_login" value="option1"> Lihat Daftar
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $create_status); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_2" name="select_login" value="option2"> Tambah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $update_status); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_3" name="select_login" value="option3"> Atur Urutan
                            </label><br/>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label style="font-size: 15pt;">Kontak Person</label> <br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $read_contactperson); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_30" name="select_login"> Lihat Daftar
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $create_contactperson); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_31" name="select_login"> Tambah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $update_contactperson); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_32" name="select_login"> Ubah
                            </label><br/>
                            <label class="checkbox-inline">
                                <input type="checkbox" class="sistem-login" <?php $temp = explode("_", $delete_contactperson); echo $temp[1] == "1" ? "checked" : ""; ?> id="priv_33" name="select_login"> Hapus
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <button class="btn btn-default siku text-center" onclick="save()" style="width: 60%; margin-top: 15px;">Simpan</button>
                    </div>
                </div
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
    
    <script type="text/javascript">
        
        $(document).ready(function() {
            if ($('.sistem-login:checked').length === $('.sistem-login').length) {
            //do something
                 $("#checkall").attr('checked', 'checked');
            }
        });
        
        var arrSistemLogin = [];
        function save() {
            var isError = false;
            var user = <?php echo $currentkode;?>;
            arrSistemLogin = [];
            $("input:checkbox[name=select_login]:checked").each(function(){
                var temp_id = $(this)[0].id;
                var id = temp_id.split("_");
                arrSistemLogin.push(id[1]);
            });
            //console.log(arrSistemLogin);
            //console.log(user);
            if (!isError) {
                url = "ajax/create_privileges.php",
                $.ajax({
                    url: url,
                    data: {
                       user: user,
                       arrPrivileges: arrSistemLogin
                    },
                    success: function(data, textStatus, jqXHR) {
                        //var result = data.replace(/\s/g,'');;
                        swal({
                            title: "Berhasil menentukan hak akses untuk user ini",
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
                                window.location.href = "detail-user?k=" + user;
                            }
                        });
                    }
                });
            } else {
                //window.scrollTo(0,0);
            }
        }
        
       $('#checkall').click(function() {
        var checked = $(this).prop('checked');
        $('#checkboxes').find('input:checkbox').prop('checked', checked);
      });
       
    </script>

</body>

</html>
