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

    <title>Profile - ayooreward!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    
    <script src="sweetalert/dist/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
    
    <style>
        
    </style>
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
                        <strong>PROFILE USER</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <?php
                require './connection.php';
                ## Username Login = profile-navigation.php
                $name = $email = $telp = $lastlogin = "";
                
                $sql = "SELECT name, email, telp, username, status, last_login, created_at, updated_at "
                     . "FROM db_user "
                     . "Where status = 1 AND username = '$usernamelogin'";
                //echo $sql;
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    $temp = explode(" ", $row['last_login']);
                    $lastlogin = tanggal_indo($temp[0]) . " " . $temp[1];
                    $name = $row['name'];
                    $email = $row['email'];
                    $telp = $row['telp'];
                } else {
                    
                }
            ?>
            <div class="row">
                <div class="col-lg-12" style="font-size: 13pt;">
                    <address>
                        <strong><i class="fa fa-user"></i> <?php echo $name; ?></strong><br>
                        <i class="fa fa-envelope-o"></i> <a href="mailto:#"><?php echo $email;?></a><br>
                        <abbr title="Telp / No Handphone"><i class="fa fa-phone"></i></abbr> <?php echo $telp;?><br /><br />
                        <i class="fa fa-sign-in"></i> <span>Login Terakhir : </span> <?php echo $lastlogin;?>
                    </address>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
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
        
    </script>

</body>

</html>
