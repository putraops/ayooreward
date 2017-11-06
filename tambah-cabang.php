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

        <title>Tambah Cabang - ayooreward!</title>

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
                
    </head>

<body>
<?php $currentpage = "user";?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php require 'profile-navigation.php'; ?>
        
        <?php 
            echo "<script>";
            if ($create_user == "0_0") {
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
                        <strong>TAMBAH CABANG</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <?php
                $isError = false;
                $succeed = false;
                $nameErr = $emailErr = $telpErr = $contactNameErr = "";
                
                $cabangName = isset($_POST['cabangName']) ? trim($_POST['cabangName']) : '';
                $cabangContactName = isset($_POST['cabangContactName']) ? trim($_POST['cabangContactName']) : '';
                $cabangEmail = isset($_POST['cabangEmail']) ? trim($_POST['cabangEmail']) : '';
                $cabangTelp = isset($_POST['cabangTelp']) ? trim($_POST['cabangTelp']) : '';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!$cabangName) {
                        $nameErr = "Kolom Nama tidak boleh kosong";
                        $isError = true;
                    }
                    
                    if (!$cabangContactName) {
                        $contactNameErr = "Kolom Nama Kontak Person tidak boleh kosong";
                        $isError = true;
                    }
                    
                    if (!$cabangEmail) {
                        $emailErr = "Kolom Username tidak boleh kosong";
                        $isError = true;
                    } else {
                        if (!filter_var($cabangEmail, FILTER_VALIDATE_EMAIL)) {
                            $emailErr = "Format Email yang dimasukkan salah."; 
                            $isError = true;
                        }
                    }
                                        
                    if (!$cabangTelp) {
                        $telpErr = "Kolom No Telp / No Handphone tidak boleh kosong";
                        $isError = true;
                    } else {
                        if (!is_numeric($cabangTelp)){
                            $telpErr = "No Telp / No Handphone harus berupa angka";
                            $isError = true;
                        } else {
                            if(strlen($cabangTelp) < 6) {
                                $telpErr = "No Telp / No Handphone tidak boleh kurang dari 6 karakter";
                                $isError = true;
                            }
                            else if(strlen($cabangTelp) > 12 ) {
                                $telpErr = "No Telp / No Handphone tidak boleh lebih dari 12 karakter";
                                $isError = true;
                            }
                        }
                    }
                    
                    if (isset($_POST["submit"])) {
                        if (!$isError) {
                            try {
                                require './connection.php';

                                $sql = "INSERT INTO db_cabang (nama, kontak_person, email, no_telp, created_at, updated_at) "
                                        . "VALUES ('$cabangName', '$cabangContactName', '$cabangEmail', '$cabangTelp', now(), now())";

                                $con->query($sql);

                                
                                $cabangName = '';
                                $cabangContactName = '';
                                $cabangEmail = '';
                                $cabangTelp = '';

                                $succeed = true;
                                
                                if ($succeed) {
                                    $cabangName = '';
                                $cabangContactName = '';
                                $cabangEmail = '';
                                $cabangTelp = ''; 
                                    echo "<script>";
                                
                                    echo "swal('Berhasil menambahkan cabang baru')";

                                    echo "</script>";
                                }
                            } catch (Exception $ex) {

                            }
                        }
                    }
                }

            ?>

            <?php
                if ($succeed) {
                    echo "<div class=\"alert alert-success alert-dismissible siku\" id=\"tambah-vendor-berhasil\" role=\"alert\">";
                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                    echo "<strong>BERHASIL !</strong> Telah berhasil menambahkan cabang baru. Lihat daftar cabang <a href='cabang'>disini</a>";
                    echo "</div>";
                }
            ?>
            <div class="row">
                <div class="col-md-6">
                    <form role="form" method="post" action="tambah-cabang" style="padding-bottom: 100px;">
                        
                        <div class="panel panel-default siku">
                            <div class="panel-footer siku" style="background-color: white">
                                <strong>Data Cabang</strong>
                                <hr style="margin: 5px 0px 10px 0px;"/>
                                <div class="form-group">
                                    <div style="margin-bottom: 5px;">Nama</div>
                                    <input class="form-control siku" name="cabangName" id="cabangName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Cabang" value="<?php echo $cabangName; ?>">
                                    <?php
                                    if ($nameErr) {
                                        echo "<i class=\"validation-text\" id=\"val-cabangName\">" . $nameErr . "</i>";
                                    }
                                    ?>
                                </div> 
                            </div>
                            <div class="panel-footer siku" style="background-color: white">
                                <strong>Kontak Person</strong>
                                <hr style="margin: 5px 0px 10px 0px;"/>
                                <div class="form-group">
                                    <div style="margin-bottom: 5px;">Nama</div>
                                    <input class="form-control siku" name="cabangContactName" id="cabangContactName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Kontak Person" value="<?php echo $cabangContactName; ?>">
                                    <?php
                                    if ($contactNameErr) {
                                        echo "<i class=\"validation-text\" id=\"val-cabangContactName\">" . $contactNameErr . "</i>";
                                    }
                                    ?>
                                </div> 
                                <div class="form-group" style="margin-top: 10px;">
                                    <div style="margin-bottom: 5px;">Email</div>
                                    <input class="form-control siku" name="cabangEmail" id="cabangEmail" onkeyup="removeError(this.id)" placeholder="Masukkan Email" value="<?php echo $cabangEmail; ?>">
                                    <?php
                                    if ($emailErr) {
                                        echo "<i class=\"validation-text\" id=\"val-cabangEmail\">" . $emailErr . "</i>";
                                    }
                                    ?>
                                </div> 
                                <div class="form-group" style="margin-top: 10px;">
                                    <div style="margin-bottom: 5px;">Telp</div>
                                    <input class="form-control siku" name="cabangTelp" id="cabangTelp" onkeyup="removeError(this.id)" placeholder="Masukkan No Telp / Hp" value="<?php echo $cabangTelp; ?>">
                                    <?php
                                    if ($telpErr) {
                                        echo "<i class=\"validation-text\" id=\"val-cabangTelp\">" . $telpErr . "</i>";
                                    }
                                    ?>
                                </div> 
                                <button type="submit" class="btn btn-primary siku" name="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
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
    
    <script type="text/javascript" src="datepicker/js/jquery.datepicker.js"></script>
  
   <script type="text/javascript">
        function removeError(id){
            $("#val-" + id).remove();
        }
    </script>

</body>

</html>
