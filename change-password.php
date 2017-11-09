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

        <title>Ubah Password - ayooreward!</title>

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
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <strong>UBAH PASSWORD</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <?php
                $isError = false;
                $succeed = false;
                
                $oldPassword = "";
                $oldPasswordErr = "";
                
                $newPassword = "";
                $newPasswordErr = "";
                
                $repeatNewPassword = "";
                $repeatNewPasswordErr = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $oldPassword = isset($_POST['oldPassword']) ? $_POST['oldPassword'] : '';
                    $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';
                    $repeatNewPassword = isset($_POST['repeatNewPassword']) ? $_POST['repeatNewPassword'] : '';
                
                    if (!$oldPassword) {
                        $oldPasswordErr = "Password lama tidak boleh kosong";
                        $isError = true;
                    }
                    if (!$newPassword) {
                        $newPasswordErr = "Password baru tidak boleh kosong";
                        $isError = true;
                    } else if (strlen($newPassword) < 5) {
                        $newPasswordErr = "Password baru minimal 5 karakter";
                        $isError = true;
                    }
                    
                    if (!$repeatNewPassword) {
                        $repeatNewPasswordErr = "Ulangi Password tidak boleh kosong";
                        $isError = true;
                    } else if ($newPassword != $repeatNewPassword && $newPassword && !$isError) {
                        $repeatNewPasswordErr = "Password dan Ulangi Password harus sama";
                        $isError = true;
                    }
                    
                    if (isset($_POST["submit"])) {
                        if (!$isError) {
                            try {
                                require './connection.php';
                                $passwordMd5 = md5($oldPassword);
                                $newPasswordMd5 = md5($newPassword);
                                $sql = "Select password 
                                        From db_user 
                                        where kode = '$kodeLogin' AND password = '$passwordMd5';";
                                $result = $con->query($sql); 
                                
                                if ($result->num_rows > 0) {
                                    ## update to database
                                    ## Kode login dari profile-navigation.php
                                    $sql = "UPDATE db_user 
                                            SET password = '$newPasswordMd5', 
                                            updated_at = now() 
                                            where kode = '$kodeLogin'";
                                     
                                    $con->query($sql);
                                    $succeed = true;
                                } else {
                                    $oldPasswordErr = "Password yang dimasukkan salah.";
                                    $isError = true;
                                }
                                
                                if ($succeed) {
                                    $oldPassword = '';
                                    $newPassword = '';
                                    $repeatNewPassword = '';
                        
                                    echo "<script>";
                                    echo "swal('Berhasil mengubah password', '', 'success');";
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
                    echo "<strong>BERHASIL !</strong> Telah berhasil mengubah password";
                    echo "</div>";
                }
            ?>
            <div class="row">
                <div class="col-md-6">
                    <form role="form" method="post" action="change-password" style="padding-bottom: 100px;">
                        <div class="panel panel-default siku">
                            <div class="panel-footer siku" style="background-color: white">
                                <div class="form-group">
                                    <label style="margin-bottom: 5px;">Password Lama</label>
                                    <input type="password" class="form-control siku" name="oldPassword" id="oldPassword" onkeyup="removeError(this.id)" placeholder="Password Lama" value="<?php echo $oldPassword; ?>">
                                    <?php
                                    if ($oldPasswordErr) {
                                        echo "<i class=\"validation-text\" id=\"val-oldPassword\">" . $oldPasswordErr . "</i>";
                                    }
                                    ?>
                                </div> 
                                <div class="form-group" style="margin-top: 10px;">
                                    <label style="margin-bottom: 5px;">Password Baru</label>
                                    <input type="password" class="form-control siku" name="newPassword" id="newPassword" onkeyup="removeError(this.id)" placeholder="Password Baru" value="<?php echo $newPassword; ?>">
                                    <?php
                                    if ($newPasswordErr) {
                                        echo "<i class=\"validation-text\" id=\"val-newPassword\">" . $newPasswordErr . "</i>";
                                    }
                                    ?>
                                </div> 
                                <div class="form-group" style="margin-top: 10px;">
                                    <label style="margin-bottom: 5px;">Ulangi Password Baru</label>
                                    <input type="password" class="form-control siku" name="repeatNewPassword" id="repeatNewPassword" onkeyup="removeError(this.id)" placeholder="Ulangi Password Baru" value="<?php echo $repeatNewPassword; ?>">
                                    <?php
                                    if ($repeatNewPasswordErr) {
                                        echo "<i class=\"validation-text\" id=\"val-repeatNewPassword\">" . $repeatNewPasswordErr . "</i>";
                                    }
                                    ?>
                                </div> 
                                <button type="submit" class="btn btn-primary siku" name="submit">Ubah</button>
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
  
   <script type="text/javascript">
        function removeError(id){
            $("#val-" + id).remove();
        }
    </script>

</body>

</html>
