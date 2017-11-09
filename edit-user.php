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

        <title>Edit User - ayooreward!</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS /// NO NEED -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!--        <link href="datepicker/css/jquery.datepicker.css" rel="stylesheet" type="text/css"/>	-->

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
        </style>
    </head>

    <body>
        <?php $currentpage = "user"; ?>

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
                            <strong>EDIT DATA USER</strong>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <?php
                require './connection.php';
                $isError = false;
                $succeed = false;

                # currently login user
                $currentlyUsername = $_SESSION["usernamelogin"];
                $currentlyName = $_SESSION["usernameloginname"];
                $changeItself = false;

                $nameErr = $emailErr = $telpErr = $cabangErr = $usernameErr = $passwordErr = $repasswordErr = "";
                $userUsername = $userPassword = $userName = $userEmail = $userTelp = $userCabang = "";

                $kode = isset($_GET['k']) ? $_GET['k'] : '';
                if ($kode == "") {
                    echo "<script>window.location.assign('user');</script>";
                }

                $sql = "Select u.name as name, u.email as email, u.telp as telp, u.username as username, c.id as id_cabang, c.nama as namacabang 
                        From db_user u
                        LEFT JOIN db_cabang c ON c.id = u.id_cabang
                        where kode = '$kode'";
                $result = $con->query($sql);


                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $userUsername = $row['username'];
                    $userName = $row['name'];
                    $userEmail = $row['email'];
                    $userTelp = $row['telp'];
                    $userCabang = $row['id_cabang'];

                    if ($currentlyUsername == $userUsername) {
                        $changeItself = true;
                    }
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $userUsername = isset($_POST['userUsername']) ? trim($_POST['userUsername']) : '';
                    $userName = isset($_POST['userName']) ? trim($_POST['userName']) : '';
                    $userEmail = isset($_POST['userEmail']) ? trim($_POST['userEmail']) : '';
                    $userTelp = isset($_POST['userTelp']) ? trim($_POST['userTelp']) : '';
                    $userCabang = isset($_POST['userCabang']) ? trim($_POST['userCabang']) : '';

                    if (!$userUsername) {
                        $usernameErr = "Kolom Username tidak boleh kosong";
                        $isError = true;
                    }

                    if (!$userName) {
                        $nameErr = "Kolom Nama tidak boleh kosong";
                        $isError = true;
                    }

                    if ($userCabang == "-1") {
                        $cabangErr = "Cabang harus dipilih dahulu";
                        $isError = true;
                    }

                    if (!$userEmail) {
                        $emailErr = "Kolom Username tidak boleh kosong";
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
                        if (!is_numeric($userTelp)) {
                            $telpErr = "No Telp / No Handphone harus berupa angka";
                            $isError = true;
                        } else {
                            if (strlen($userTelp) < 9) {
                                $telpErr = "No Telp / No Handphone tidak boleh kurang dari 9 karakter";
                                $isError = true;
                            } else if (strlen($userTelp) > 12) {
                                $telpErr = "No Telp / No Handphone tidak boleh lebih dari 12 karakter";
                                $isError = true;
                            }
                        }
                    }

                    if (isset($_POST["submit"])) {
                        if (!$isError) {
                            try {
                                $sql = "UPDATE db_user 
                                    SET name= '$userName', 
                                    username = '$userUsername',
                                    email = '$userEmail',
                                    telp = '$userTelp',
                                    id_cabang = '$userCabang',
                                    updated_at = now() 
                                    where kode = '$kode'";

                                $con->query($sql);

                                if ($changeItself) {
                                    echo "<script>alert()</script>";
                                    $_SESSION["usernamelogin"] = $userUsername;
                                    $_SESSION["usernameloginname"] = $userName;
                                }


                                $userUsername = "";
                                $userName = $userEmail = $userTelp = $userCabang = "";
                                $succeed = true;


                                if ($succeed) {
                                    $succeed = false;
                                    echo "<script>";
                                    echo "swal({";
                                    echo "     title: \"Berhasil mengubah data user\",";
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
                                    echo "         window.location.assign('edit-user?k=" . $kode . "');";
                                    echo "     }";
                                    echo " }); ";
                                    echo "</script>";
                                }
                            } catch (Exception $ex) {
                                
                            }
                        }
                    }
                }
                ?>

                <div class="row">
                    <div class="col-md-6">
                        <form role="form" method="post" action="edit-user?k=<?php echo $kode; ?>" style="padding-bottom: 100px;">
                            <!--                        <div class="form-group">
                                                        <label>Username</label> : <?php echo $userUsername; ?>
                                                    </div>-->
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control siku" name="userUsername" id="userUsername" onkeyup="removeError(this.id)" placeholder="Masukkan Username" value="<?php echo $userUsername; ?>">
<?php
if ($usernameErr) {
    echo "<i class=\"validation-text\" id=\"val-userUsername\">" . $usernameErr . "</i>";
}
?>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control siku" name="userName" id="userName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama" value="<?php echo $userName; ?>">
<?php
if ($nameErr) {
    echo "<i class=\"validation-text\" id=\"val-userName\">" . $nameErr . "</i>";
}
?>
                            </div>
                            <div class="form-group">
                                <label>Cabang</label>
                                <select id="userCabang" name="userCabang" onchange="removeError(this.id)">
                                    <option value="-1" disabled="true">--- Pilih Cabang ---</option>
                                    <option value="0" <?php echo $userCabang == 0 ? "selected" : ""; ?>>Semua Cabang</option>
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
                                <label>Email</label>
                                <input class="form-control siku" name="userEmail" id="userEmail" onkeyup="removeError(this.id)" placeholder="Masukkan Email" value="<?php echo $userEmail; ?>">
<?php
if ($emailErr) {
    echo "<i class=\"validation-text\" id=\"val-userEmail\">" . $emailErr . "</i>";
}
?>
                            </div>
                            <div class="form-group">
                                <label>Telp / No Handphone</label>
                                <input class="form-control siku" name="userTelp" id="userTelp" onkeyup="removeError(this.id)" placeholder="Masukkan No Telp / No Handphone" value="<?php echo $userTelp; ?>">
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

        <script type="text/javascript" src="datepicker/js/jquery.datepicker.js"></script>

        <script src="select-filter/js/select2.min.js"></script>

        <script type="text/javascript">
                                    $('select').select2();
        </script>

        <script type="text/javascript">
            function removeError(id) {
                $("#val-" + id).remove();
            }
        </script>

    </body>

</html>
