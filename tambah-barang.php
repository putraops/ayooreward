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
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <strong>TAMBAH BARANG</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-6">
                        <?php
                        require './connection.php';
                        $isError = false;
                        $succeed = false;
                        $kodeErr = $namaErr = $keteranganErr = "";
                        $barangKode = isset($_POST['barangKode']) ? $_POST['barangKode'] : '';
                        $barangName = isset($_POST['barangName']) ? $_POST['barangName'] : '';
                        $barangKeterangan = isset($_POST['barangKeterangan']) ? $_POST['barangKeterangan'] : '';

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (!$barangKode) {
                                $kodeErr = "Kolom Kode Barang tidak boleh kosong";
                                $isError = true;
                            }
                            if (!$barangName) {
                                $namaErr = "Kolom Nama Barang tidak boleh kosong";
                                $isError = true;
                            }
                            
                            if (isset($_POST["submit"])) {
                                if (!$isError) {
                                    
                                    $sql = "SELECT id, kode_barang, nama, deskripsi, created_at, updated_at "
                                            . "FROM db_barang where kode_barang = '$barangKode';";                            

                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
                                        $kodeErr = "Kode Barang sudah pernah digunakan. Gunakan kode lain.";
                                    } else {
                                        $sql = "INSERT INTO db_barang (kode_barang, nama, deskripsi, isDelete, created_at, updated_at) "
                                         . "VALUES ('$barangKode', '$barangName','$barangKeterangan', 0, now(), now())";
                                        $con->query($sql);

                                        $succeed = true;  
                                    }

                                    
                                }
                            }
                            
                            if ($succeed) {
                                echo "<script>";
                                echo "swal('Berhasil menambahkan ". $barangName ." ke dalam daftar barang!');";
                                echo "</script>";
                                
                            }
                        }

                    ?>

                    <?php
                        if ($succeed) {
                            echo "<div class=\"alert alert-success alert-dismissible siku\" id=\"tambah-vendor-berhasil\" role=\"alert\">";
                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                            echo "<strong>BERHASIL !</strong> Telah berhasil menambahkan ". $barangName ." ke dalam daftar barang.";
                            echo "</div>";
                            
                            $barangKode = '';
                            $barangName = '';
                            $barangKeterangan = '';
                        }
                    ?>
                        <form role="form" method="post" action="tambah-barang" style="">
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input class="form-control siku" name="barangKode" id="barangKode" onkeyup="removeError(this.id)" placeholder="Masukkan Kode Barang" value="<?php echo $barangKode;?>">
                                <?php
                                    if ($kodeErr) {
                                        echo "<i class=\"validation-text\" id=\"val-barangKode\">" . $kodeErr . "</i>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control siku" name="barangName" id="barangName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Barang" value="<?php echo $barangName;?>">
                                <?php
                                    if ($namaErr) {
                                        echo "<i class=\"validation-text\" id=\"val-barangName\">" . $namaErr . "</i>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="barangKeterangan" rows="3" id="barangKeterangan" onkeyup="removeError(this.id)" placeholder="Masukkan Keterangan Barang"><?php echo $barangKeterangan; ?></textarea>
                                <?php
                                    if ($keteranganErr) {
                                        echo "<i class=\"validation-text\" id=\"val-barangKeterangan\">" . $keteranganErr . "</i>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default siku" name="submit"><i class="fa fa-save"> </i> Simpan</button>
                            </div>
                        </form>
                    </div>
<!--                  </div>-->
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
            if (confirm("Apakah anda yakin ingin menghapus barang ini?")) {
                var url = 'ajax/delete-barang.php?kode=' + id;
                $.ajax({
                    url: url,
                    success: function(data, textStatus, jqXHR) {
                        if (data == "1") {
                            swal({
                                title: "Berhasil menghapus Barang",
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
                                    window.location.href = "barang";
                                }
                            });   
                        }
                    },
                });
            }
        }
        
        function passsingdataubahbarang(id) {
            var table = $('#myTable').DataTable();
            
            $('#myTable tbody').on( 'click', 'tr', function () {
                var row = table.row(this).data();
               
                $("#modal-title").html("Ubah Barang " + row[1]);
                $("#modal-barangKode").val(row[0]);
                $("#modal-barangName").val(row[1]);
                $("#modal-barangKeterangan").val(row[2]);
            } );

            $("#modalEditBarang").modal('show');
        }
        
        function ubahbarang() {
            var kodebarang = $("#modal-barangKode").val();
            var namabarang = $("#modal-barangName").val();
            var keterangan = $("#modal-barangKeterangan").val();
            var isError = false;
            
            if (namabarang == "") {
                $("#val-modal-barangName").html("Nama barang tidak boleh kosong.");
                isError = true;
            }
            
            if (!isError) {
                var url = 'ajax/edit-barang.php?kode=' + kodebarang + '&nama=' + namabarang + '&ket=' + keterangan;
                $.ajax({
                    url: url,
                    success: function(data, textStatus, jqXHR) {
                        if (data == "1") {
                            swal({
                                title: "Berhasil mengubah Barang",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "Black",
                                confirmButtonText: "Ya",
                                cancelButtonText: "Tidak",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function(isConfirm) {
                                if (isConfirm) {  
                                    window.location.href = "barang";
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
