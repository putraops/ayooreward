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

        <title>Tambah Kontak Person - ayooreward!</title>

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
        
        <link href="select-filter/css/select2.min.css" rel="stylesheet" />
             
        <style>
            .form-group .select2-container {
                width: 100% !important;
            }
            .form-group .select2-selection {
                height: 35px;
                padding-top: 3px;
                border: 1px solid #ccc;
                border-radius: 0px;
                
            }
            #inp_reward, #val-reward {
                display: none;
            }
            .validation-text {
                font-style: italic;
                color: red;
            }
            
            #myInput {
                background-image: url('assets/search-icon.png');
                background-position: 10px 12px;
                background-repeat: no-repeat;
                background-size: 25px;
                background-position-y: 15px;
                width: 100%;
                font-size: 16px;
                padding: 15px;
                padding-left: 40px;
                border: 1px solid #ddd;
                margin-bottom: 12px;
            }
            #myUL {
                font-size: 15px;
            }
            .required {
                color: red;
            }
        </style>   
        
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
                        <strong>TAMBAH KONTAK PERSON</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <?php
                $isError = false;
                $succeed = false;
                $nameErr = $emailErr = $telpErr = "";
                $userName = isset($_POST['userName']) ? trim($_POST['userName']) : '';
                $userEmail = isset($_POST['userEmail']) ? trim($_POST['userEmail']) : '';
                $userTelp = isset($_POST['userTelp']) ? trim($_POST['userTelp']) : '';
               

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!$userName) {
                        $nameErr = "Kolom Nama tidak boleh kosong";
                        $isError = true;
                    }
                    
                    if (!$userEmail) {
                        $emailErr = "Kolom Email tidak boleh kosong";
                        $isError = true;
                    } else {
                        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                            $emailErr = "Format Email kamu masukkan salah."; 
                            $isError = true;
                        }
                    }
                    
                    if (!$userTelp) {
                        $telpErr = "Kolom No Telp / No Handphone tidak boleh kosong";
                        $isError = true;
                    } else {
                        if (!is_numeric($userTelp)){
                            $telpErr = "No Telp / No Handphone harus berupa angka";
                            $isError = true;
                        } else {
                            if(strlen($userTelp) < 9) {
                                $telpErr = "No Telp / No Handphone tidak boleh kurang dari 9 karakter";
                                $isError = true;
                            }
                            else if(strlen($userTelp) > 12 ) {
                                $telpErr = "No Telp / No Handphone tidak boleh lebih dari 12 karakter";
                                $isError = true;
                            }
                        }
                    }
                    
                    if (isset($_POST["submit"])) {
                        if (!$isError) {
                            try {
                                require './connection.php';

                                $sql = "INSERT INTO db_contactperson (nama, email, telp, created_at, updated_at) "
                                     . "VALUES ('$userName', '$userEmail', '$userTelp', now(), now())";

                                $con->query($sql);

                                $succeed = true;
                                
                                if ($succeed) {
                                    $userName = '';
                                    $userEmail = '';
                                    $userTelp = '';
                                    echo "<script>";
                                
                                    echo "swal('Berhasil menambahkan kontak person baru')";

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
                    echo "<strong>BERHASIL !</strong> Telah berhasil menambahkan kontak person baru. Lihat daftar kontak person <a href='contactperson'>disini</a>";
                    echo "</div>";
                }
            ?>
            <div class="row">
                <div class="col-md-6">
                    <form role="form" method="post" action="tambah-contactperson" style="padding-bottom: 100px;">
                        <div class="panel panel-default siku">
                            <div class="panel-footer siku" style="background-color: white">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control siku" name="userName" id="userName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama" value="<?php echo $userName;?>">
                                    <?php
                                        if ($nameErr) {
                                            echo "<i class=\"validation-text\" id=\"val-userName\">" . $nameErr . "</i>";
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control siku" name="userEmail" id="userEmail" onkeyup="removeError(this.id)" placeholder="Masukkan Email" value="<?php echo $userEmail;?>">
                                    <?php
                                        if ($emailErr) {
                                            echo "<i class=\"validation-text\" id=\"val-userEmail\">" . $emailErr . "</i>";
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Telp / No Handphone</label>
                                    <input class="form-control siku" name="userTelp" id="userTelp" onkeyup="removeError(this.id)" placeholder="Masukkan No Telp / No Handphone" value="<?php echo $userTelp;?>">
                                    <?php
                                        if ($telpErr) {
                                            echo "<i class=\"validation-text\" id=\"val-userTelp\">" . $telpErr . "</i>";
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

    <script src="select-filter/js/select2.min.js"></script>
    
    <script type="text/javascript">
         $('select').select2();
    </script>
    <script type="text/javascript">
       
         function removeError(id){
             $("#val-" + id).remove();
         }
    </script>

</body>

</html>
