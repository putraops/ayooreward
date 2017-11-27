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

        <title>Tambah Brand - ayooreward!</title>

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
            if ($create_jenis_reward == "0_0") {
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
                        <strong>TAMBAH BRAND</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-5">
                        <?php
                        require './connection.php';
                        $isError = false;
                        $succeed = false;
                        $namaErr = "";
                        $rewardName = isset($_POST['rewardName']) ? $_POST['rewardName'] : '';

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (!$rewardName) {
                                $namaErr = "Kolom Nama Brand tidak boleh kosong";
                                $isError = true;
                            }
                            
                            if (isset($_POST["submit"])) {
                                if (!$isError) {
                                    $sql = "INSERT INTO db_brand (nama, isDelete, created_at, updated_at) "
                                     . "VALUES ('$rewardName', 0, now(), now())";
                                    $con->query($sql);
                                    
                                    $succeed = true;  
                                }
                            }
                            
                            if ($succeed) {
                                echo "<script>";
                                echo "swal('Berhasil menambahkan ". $rewardName ." ke dalam daftar brand!');";
                                echo "</script>";
                                
                            }
                        }

                    ?>

                    
                           
                    <?php
                        if ($succeed) {
                            echo "<div class=\"alert alert-success alert-dismissible siku\" id=\"tambah-vendor-berhasil\" role=\"alert\">";
                            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                            echo "<strong>BERHASIL !</strong> Telah berhasil menambahkan ". $rewardName ." ke dalam daftar barang.";
                            echo "<br/>Untuk melihat daftar Brand lihat <a href='brand' >disini.</a>";
                            echo "</div>";

                            $barangKode = '';
                            $rewardName = '';
                            $barangKeterangan = '';
                        }
                    ?>
                    <div class="panel panel-default siku">
                        <div class="panel-heading">
                          <h3 class="panel-title">FORM TAMBAH BRAND</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="tambah-brand" style="">    
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input class="form-control siku" name="rewardName" id="rewardName" onkeyup="removeError(this.id)" placeholder="Masukkan Jenis Reward" value="<?php echo $rewardName;?>">
                                    <?php
                                        if ($namaErr) {
                                            echo "<i class=\"validation-text\" id=\"val-rewardName\">" . $namaErr . "</i>";
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
<!--                  </div>-->
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
                    <input class="form-control siku" id="modal-rewardName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Barang">
                    <i class="validation-text" id="val-modal-rewardName"></i>
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
        
        
        function passsingdataubahbarang(id) {
            var table = $('#myTable').DataTable();
            
            $('#myTable tbody').on( 'click', 'tr', function () {
                var row = table.row(this).data();
               
                $("#modal-title").html("Ubah Barang " + row[1]);
                $("#modal-barangKode").val(row[0]);
                $("#modal-rewardName").val(row[1]);
                $("#modal-barangKeterangan").val(row[2]);
            } );

            $("#modalEditBarang").modal('show');
        }
        
        function ubahbarang() {
            var kodebarang = $("#modal-barangKode").val();
            var namabarang = $("#modal-rewardName").val();
            var keterangan = $("#modal-barangKeterangan").val();
            var isError = false;
            
            if (namabarang == "") {
                $("#val-modal-rewardName").html("Nama barang tidak boleh kosong.");
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
