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

        <title>Tambah User - ayooreward!</title>

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
                        <strong>TAMBAH USER</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <?php
                $isError = false;
                $succeed = false;
                $nameErr = $cabangErr = $emailErr = $telpErr = $usernameErr = $passwordErr = $repasswordErr = "";
                $userName = isset($_POST['userName']) ? trim($_POST['userName']) : '';
                $userEmail = isset($_POST['userEmail']) ? trim($_POST['userEmail']) : '';
                $userTelp = isset($_POST['userTelp']) ? trim($_POST['userTelp']) : '';
                $userUsername = isset($_POST['userUsername']) ? trim($_POST['userUsername']) : '';
                $userPassword = isset($_POST['userPassword']) ? trim($_POST['userPassword']) : '';
                $userRePassword = isset($_POST['userRePassword']) ? trim($_POST['userRePassword']) : '';
                $userCabang = isset($_POST['userCabang']) ? trim($_POST['userCabang']) : '';
                

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!$userName) {
                        $nameErr = "Kolom Nama tidak boleh kosong";
                        $isError = true;
                    }
                    
                    if ($userCabang == -1) {
                        $cabangErr = "Cabang harus dipilih";
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
                                        
                    if (!$userUsername) {
                        $usernameErr = "Kolom Username tidak boleh kosong";
                        $isError = true;
                    } else {
                        if(strlen($userUsername) < 4) {
                            $usernameErr = "Username tidak boleh kurang dari 4 karakter";
                            $isError = true;
                        }
                        else if(strlen($userUsername) > 20 ) {
                            $usernameErr = "Username tidak boleh lebih dari 20 karakter";
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
                        }
                    }

                    if (!$userPassword) {
                        $passwordErr = "Kolom Password tidak boleh kosong";
                        $isError = true;
                    }

                    if (!$userRePassword) {
                        $repasswordErr = "Kolom Ulangi Password tidak boleh kosong";
                        $isError = true;
                    } else {
                        if ($userPassword && $userRePassword && ($userPassword != $userRePassword)) {
                            $repasswordErr = "Password dan Ulangi Password harus sama";
                            $isError = true;
                        } 
                    }

                    if (isset($_POST["submit"])) {
                        if (!$isError) {
                            try {
                                require './connection.php';

                                $sql = "Select username From db_user where username = '$userUsername'";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    $usernameErr = "Username sudah terdaftar";
                                } else {
                                    $passwordMd5 = md5($userPassword);
                                    $sql = "INSERT INTO db_user (name, id_cabang, email, telp, username, password, status, created_at, updated_at) "
                                         . "VALUES ('$userName', '$userCabang', '$userEmail', '$userTelp', '$userUsername', '$passwordMd5',  '1', now(), now())";
                                    //echo $sql; exit;
                                    $con->query($sql);
                                    $last_id = $con->insert_id;
                                    
                                    $userName = '';
                                    $userEmail = '';
                                    $userTelp = '';
                                    $userUsername = '';
                                    $userPassword = '';
                                    $userRePassword = '';  
                              
                                    echo "<script>";
                                    echo "swal({";
                                    echo "    title: 'Berhasil menambahkan user baru, Silahkan atur hak akses untuk user ini.',";
                                    echo "    type: 'success',";
                                    echo "    showCancelButton: false,";
                                    echo "    confirmButtonColor: 'Black',";
                                    echo "    confirmButtonText: 'Ya',";
                                    echo "    cancelButtonText: 'Tidak',";
                                    echo "    closeOnConfirm: false,";
                                    echo "    closeOnCancel: true";
                                    echo "},";
                                    echo "function (isConfirm) {";
                                    echo "    if (isConfirm) {";
                                    echo "        window.location.href = 'detail-user?k=".$last_id."';";
                                    echo "    }";
                                    echo "});";
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
                    echo "<strong>BERHASIL !</strong> Telah berhasil menambahkan user baru. User ini harus diaktifkan untuk bisa melakukan perubahan pada sistem. Lihat daftar user <a href='user'>disini</a>";
                    echo "</div>";
                }
            ?>
            <div class="row">
                <div class="col-md-6">
                    <form role="form" method="post" action="tambah-user" style="padding-bottom: 100px;">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control siku" name="userUsername" id="userUsername" onkeyup="removeError(this.id)" placeholder="Masukkan Username" value="<?php echo $userUsername;?>">
                            <?php
                                if ($usernameErr) {
                                    echo "<i class=\"validation-text\" id=\"val-userUsername\">" . $usernameErr . "</i>";
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control siku" type="password" name="userPassword" id="userPassword" onkeyup="removeError(this.id)" placeholder="Masukkan Password" value="<?php echo $userPassword;?>">
                            <?php
                                if ($passwordErr) {
                                    echo "<i class=\"validation-text\" id=\"val-userPassword\">" . $passwordErr . "</i>";
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Ulangi Password</label>
                            <input class="form-control siku" type="password" name="userRePassword" id="userRePassword" onkeyup="removeError(this.id)" placeholder="Ulangi Password" value="<?php echo $userRePassword;?>">
                            <?php
                                if ($repasswordErr) {
                                    echo "<i class=\"validation-text\" id=\"val-userRePassword\">" . $repasswordErr . "</i>";
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Cabang</label>
                            <select id="userCabang" name="userCabang" onchange="removeError(this.id)">
                                <option value="-1" disabled="">--- Pilih Cabang ---</option>
                                <option value="0" <?php echo $userCabang == "0" ? "selected" : ""; ?>>Semua Cabang</option>
                                <?php
                                require './connection.php';

                                $sql = "SELECT id, nama, created_at, updated_at FROM db_cabang Where status > 0 order by nama ASC;";

                                $result = $con->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $selected = "";
                                    while ($row = $result->fetch_assoc()) {
                                        $row['id'] == $userCabang ? $selected = "selected" : $selected = "";
                                        echo "<option " . $selected . " value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
                                    }
                                }
                                mysqli_close($con);
                                ?>
                            </select>
                            <?php
                            if ($cabangErr) {
                                echo "<i class=\"validation-text\" id=\"val-userCabang\">" . $cabangErr . "</i>";
                            }
                            ?>
                        </div>
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
