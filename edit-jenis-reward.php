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

        <title>Edit Vendor - ayooreward!</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS /// NO NEED -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
        
        <script src="sweetalert/dist/sweetalert-dev.js"></script>
        
        <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
        
        <style>
            textarea {
                resize: none;
            }
        </style>
    </head>

<body>
<?php $currentpage = "jenis-reward";?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php require 'profile-navigation.php'; ?>
        <?php 
        echo $update_jenis_reward;
            echo "<script>";
            if ($update_jenis_reward == "0_0") {
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
                        <strong>UBAH DATA JENIS REWARD  </strong> 
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <?php
                require './connection.php';

                $isError = false;
                $succeed = false;
                $currentKode = $_GET['q'];
                
                $namaErr =  "";
                $vendorName = "";
                

                $sql = "select id, nama, isDelete  
                        from db_jenis_reward 
                        where id = '$currentKode' AND isDelete = 0;";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    
                    $vendorName = $row['nama'];
                } else {
                    //echo false;
//                    echo "<script>";
//                    echo "window.location.assign('jenis-reward');";
//                    echo "</script>";
                }
                    
               

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $vendorName = isset($_POST['vendorName']) ? $_POST['vendorName'] : '';
                    
                    if (!$vendorName) {
                        $namaErr = "Kolom Nama Event tidak boleh kosong";
                        $isError = true;
                    }
                    
                    if (isset($_POST["submit"])) {
                        if (!$isError) {
                            $sql = "UPDATE db_jenis_reward 
                                    SET nama= '$vendorName', 
                                    updated_at = now() 
                                    where id = '$currentKode'";

                            $con->query($sql);

                            $vendorName = '';
                            $succeed = true;
                            
                            if ($succeed) {
                                $succeed = false;
                                echo "<script>";
                                echo "swal({";
                                echo "     title: \"Berhasil mengubah data jenis reward\",";
                                echo "     type: \"success\",";
                                echo "     showCancelButton: false,";
                                echo "     confirmButtonColor: \"Black\",";
                                echo "     confirmButtonText: \"Ya\",";
                                echo "     cancelButtonText: \"Tidak\",";
                                echo "     closeOnConfirm: false,";
                                echo "     closeOnCancel: true";
                                echo " },";
                                echo " function(isConfirm) {";
                                echo "     if (isConfirm) {  ";
                                echo "         window.location.assign('edit-jenis-reward?q=".$currentKode."');";
                                echo "     }";
                                echo " }); ";
                                echo "</script>";
                            }
                        }
                    }
                }

            ?>
            <?php
                if ($succeed) {
                    echo "<div class=\"alert alert-success alert-dismissible siku\" id=\"tambah-vendor-berhasil\" role=\"alert\">";
                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                    echo "<strong>BERHASIL !</strong> Telah berhasil mengubah data jenis reward. Lihat daftar vendor <a href='vendor'>disini</a>";
                    echo "</div>";
                }
            ?>
            <div class="row col-md-6">
                
                <div class="panel panel-default siku">
                    <div class="panel-heading">
                      <h3 class="panel-title">FORM UBAH DATA JENIS REWARD</h3>
                    </div>
                    <div class="panel-body">

                        <form method="post">
                            <div class="form-group">
                                <label>Nama Jenis Reward</label>
                                <input class="form-control siku" name="vendorName" id="vendorName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Vendor" value="<?php echo $vendorName; ?>">
                                <?php
                                    if ($namaErr) {
                                        echo "<i class=\"validation-text\" id=\"val-vendorName\">" . $namaErr . "</i>";
                                    }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <button type="submit" name="submit" class="btn btn-default siku"><i class="fa fa-save"> </i> Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="datepicker/js/jquery.datepicker.js"></script>

</body>

</html>
