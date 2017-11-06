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

        <title>Master Status - ayooreward!</title>

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
            if ($read_status == "0_0") {
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
                        <strong>DAFTAR STATUS</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-8" style="padding-left: 0px; padding-right: 0px;">
<!--                    <div class="col-lg-12">
                        <a href="tambah-barang" type="button" class="btn btn-info siku"><strong>+</strong> Tambah Barang</a><br/><br/>
                    </div>-->
                    <div class="col-lg-12">
                        <ul class="list-group">
                            
                            <?php

                            require './connection.php';

                            $sql = "SELECT kode, nama, no_urut, warna, created_at, updated_at "
                                    . "FROM db_status where no_urut != 0 AND isdelete = 0 order by no_urut asc";                            

                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                $nomor = 1;
                                while ($row = $result->fetch_assoc()) {
                                    
                                    //echo "<li class=\"list-group-item siku\"><span class=\"badge\" onclick=hapustatus(".$row['no_urut'].") style=\"cursor: pointer;\">Hapus</span>";
                                    echo "<li class=\"list-group-item siku\">";
                                    echo "<span class=\"pull-right \">Warna: <input id=\"color-".$row['kode']."\" class=\"jscolor {onFineChange:'changecolor(this, ".$row['kode'].")'}\" value=\"".$row['warna']."\" onchange=\"updatecolor(".$row['kode'].")\"></span>";
                                    if ($row['kode'] != "1" && $row['kode'] != "2" && $row['kode'] != "3") {
                                        echo "<button class=\"btn btn-danger btn-xs siku\"onclick=hapustatus(".$row['kode'].") style=\"cursor: pointer;\">Hapus</button>";
                                    } else {
                                        echo "<button disabled class=\"btn btn-danger btn-xs siku\"onclick=hapustatus(".$row['kode'].") style=\"cursor: none;\">Hapus</button>";
                                    }
                                    echo " [". $nomor ."] " . $row['nama'];
                                    echo "</li>";
                                    $nomor++;
                                }
                            } else {
                                 echo "<li class=\"list-group-item siku text-center\">";
                                 echo "Tidak ada status yang tersimpan";
                                 echo "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                        $sql = "SELECT kode, nama, no_urut, created_at, updated_at "
                                . "FROM db_status where no_urut = 0 AND isdelete = 0 order by no_urut asc";                            

                        $result = $con->query($sql);
                    ?>
                    <?php if($result->num_rows > 0) : ?>
                    
                    <div class="col-lg-12">
                        <hr/>    
                        <ul class="list-group">
                            <li  class="list-group-item siku text-left" style="border: 1px solid #eee; border-left: 3px solid red; margin: 25px 0px 5px 0px;"><strong>STATUS TIDAK ADA NOMOR URUT</strong></li>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                            <li class="list-group-item siku">
                                <?php echo $row['nama']; ?>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>

                    <?php endif;?>


                    <?php if ($update_status != "0_0") : ?>
                    <div class="col-md-12 text-right">
                        <a href="atur-status" type="button" class="btn btn-primary siku">ATUR KEMBALI NOMOR URUT</a>
                    </div>
                    <?php endif;?>

                    
                </div>
                <?php if ($create_status != "0_0") : ?>
                <div class="col-md-4">
                    
                    <div class="panel panel-default siku">
                        <div class="panel-heading">
                          <h3 class="panel-title">FORM TAMBAH STATUS</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            $isError = false;
                            $succeed = false;
                            $namaErr =  "";
                            $barangName = isset($_POST['barangName']) ? $_POST['barangName'] : '';

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (!$barangName) {
                                    $namaErr = "Kolom Nama Barang tidak boleh kosong";
                                    $isError = true;
                                }


                                if (isset($_POST["submit"])) {
                                    if (!$isError) {
                                        $sql = "INSERT INTO db_status (nama, no_urut, created_at, updated_at) "
                                             . "VALUES ('$barangName', '0', now(), now())";

                                        $con->query($sql);

                                        $succeed = true;              
                                    }
                                }

                                if ($succeed) {
                                    echo "<script>";

                                    echo "swal({";
                                    echo "    title: 'Berhasil menambahkan " . $barangName ." sebagai status baru',";
                                    echo "    type: 'success',";
                                    echo "    showCancelButton: false,";
                                    echo "    confirmButtonColor: 'Black',";
                                    echo "    confirmButtonText: 'Ya',";
                                    echo "    cancelButtonText: 'Tidak',";
                                    echo "    closeOnConfirm: false,";
                                    echo "    closeOnCancel: true";
                                    echo "},";
                                    echo "function(isConfirm) {";
                                    echo "    if (isConfirm) {  ";
                                    echo "        window.location.href = 'status'";
                                    echo "    }";
                                    echo "}); ";

                                    echo "</script>";

                                    $barangKode = '';
                                    $barangName = '';
                                    $barangKeterangan = '';
                                }
                            }

                        ?>

                        <?php
                            if ($succeed) {
                                echo "<div class=\"alert alert-success alert-dismissible siku\" id=\"tambah-vendor-berhasil\" role=\"alert\">";
                                echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                                echo "<strong>BERHASIL !</strong> Telah berhasil menambahkan status baru.";
                                echo "</div>";
                            }
                        ?>
                            <form role="form" method="post" action="status" style="">
                                <div class="form-group">
                                    <label>Nama Status</label>
                                    <input class="form-control siku" name="barangName" id="barangName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Status" value="<?php echo $barangName;?>">
                                    <?php
                                        if ($namaErr) {
                                            echo "<i class=\"validation-text\" id=\"val-barangName\">" . $namaErr . "</i>";
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default siku" name="submit"><i class="fa fa-save"> </i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    

    <script src="jscolor/jscolor.js"></script>
        
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  
    <script type="text/javascript">
       $(document).ready(function(){
           
        });
        function removeError(id){
            $("#val-" + id).html('');
        }
        
        function hapustatus(id) {
            if (confirm("Apakah anda yakin ingin menghapus status ini?")) {
                var url = 'ajax/delete-status.php?kode=' + id;
                $.ajax({
                    url: url,
                    success: function(data, textStatus, jqXHR) {
                        if (data === "1") {
                            swal({
                                title: "Berhasil menghapus status",
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
                                    window.location.href = "status";
                                }
                            });   
                        } else if (data === "-1") {
                            swal("Tidak diperkenankan untuk menghapus status ini. ", "", "warning");
                        } else {
                            swal("Gagal menghapus status. Silahkan coba lagi.", "", "warning");
                        }
                    },
                });
            }
        }
        
        function changecolor(picker, id) {
            $("#color-" + id).val(picker).toUpperCase();
	}
        
        
        function updatecolor(id) {
            var color = $("#color-" + id).val().toUpperCase();
            
            var url = 'ajax/edit-colorstatus';
            $.ajax({
                url: url,
                data: {
                   kode: id,
                   color: color
                },
                success: function(data, textStatus, jqXHR) {
                    if (data === "0") {
                        alert("gagal merubah warna");
                    } 
                },
            });
        }
        
        
    </script>

</body>

</html>
