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

    <title>Form Login - ayooreward!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script src="sweetalert/dist/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
    
    <style>
        body {
            background-color: white;
        }
            body{
                width: 100%;
                height: 100%;
                background-color: whitesmoke;
            }
            .container-fluid {
                background-color: whitesmoke;
                height: 100%;
            }
            #logo {
                margin-bottom: 0px;
                font-size: 30pt;
            }
            .login-form {
                background-color: white;
                border-radius: 0px;
                padding: 15px;
                margin-top: 100px;
            }  
            .login-form input, .login-form button{
                border-radius: 0px;
                height: 40px;
                margin-bottom: 20px;
            }
            .login-form button{
                width: 100%;
                background-color: black;
                color: white;
            }
             .login-form button:hover{
                background-color: white;
                color: black;
            }
            .full-width {
                width: 100%;
            }
            #val-login {
                
            }
            
        </style>
</head>

<body>
    <div class="container-fluid">
        <div class="container text-center">
            <?php
                $isError = false;
                $succeed = true;
                $usernameErr = $passwordErr = "";
                $loginKode = "";
                $user_active = true;
                $loginUsername = isset($_POST['loginUsername']) ? $_POST['loginUsername'] : '';
                $loginPassword = isset($_POST['loginPassword']) ? $_POST['loginPassword'] : '';
                $idLoginUsername = $nameLoginUsername = "";
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!$loginUsername) {
                        $usernameErr = "USERNAME TIDAK BOLEH KOSONG";
                        $isError = true;
                    }
                    if (!$loginPassword) {
                        $passwordErr = "PASSWORD TIDAK BOLEH KOSONG";
                        $isError = true;
                    }
                    
                    if (isset($_POST["submit"])) {
                        if (!$isError) {
                            try {
                                require './connection.php';
                                $passwordMd5 = md5($loginPassword);
                                
                                $sql = "Select username, kode, name, status, jabatan From db_user where lower(username) = lower('$loginUsername') AND password = '$passwordMd5' AND status = 1 AND isdelete = 0;";
                                $result = $con->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $idLoginUsername = $row['kode'];
                                        $nameLoginUsername = $row['name'];
                                        $jabatanLoginUsername = $row['jabatan'];

                                        if ($row['status'] == 1) {
                                            $sql = "UPDATE db_user SET last_login = now() WHERE lower(username) = lower('$loginUsername');";
                                            $con->query($sql);
                                            $_SESSION["usernamelogin"] = $loginUsername;
                                            $_SESSION["usernameloginname"] = $nameLoginUsername;
                                            $_SESSION["kodeLogin"] = $idLoginUsername;
                                            $_SESSION["roleLogin"] = $jabatanLoginUsername;

                                            echo "<script>localStorage.setItem('session_login_ayooklik', '" . $loginUsername . "');</script>";
                                            echo "<script>localStorage.setItem('session_login_id_ayooklik', '" . $idLoginUsername . "');</script>";
                                            echo "<script>localStorage.setItem('session_login_role_ayooklik', '" . $jabatanLoginUsername . "');</script>";
                                            echo "<script>";
                                            echo "window.location.href = 'rewards';";
                                            echo "</script>";
                                        } else {
                                            $user_active = false;
                                            $isError = true;
                                        }
                                    }
                                } else {
                                    $isError = true;
                                    $succeed = false;
                                }
                            } catch (Exception $ex) { }
                        } 
                    }
                }
            ?>
            <form action="" method="POST" class="col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4 text-center login-form">
                <div id="logo"><i class="sqfont sqfont-2 sqfont-logo"></i>Form Login</div>
                <?php
                    if ($isError)
                    {
                        echo "<div class=\"form-group text-left\" style='background-color: whitesmoke; padding: 10px; letter-spacing: 1px; border-left: 5px solid black;'>";
                        if (!$user_active) {
                            echo "<span>User belum aktif, Silahkan hubungi admin.</span>";
                        } else if ($usernameErr && $passwordErr) {
                            echo "<span>USERNAME DAN PASSWORD TIDAK BOLEH KOSONG</span>";
                        } else if ($usernameErr) {
                            echo "<span>". $usernameErr ."</span>";
                        } else if ($passwordErr) {
                            echo "<span>". $passwordErr ."</span>";
                        } else if (!$succeed) {
                            echo "<span>Username atau Password salah</span>";
                        }
                        echo "</div>";
                    } 
                ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="loginUsername" id="loginUsername" placeholder="Masukkan Username" onkeypress="handle(event)" onkeyup="removeError(this.id)">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="loginPassword" id="loginPassword" placeholder="Masukkan Password" onkeypress="handle(event)" onkeyup="removeError(this.id)">
                </div>
                <button type="submit" name="submit" class="btn btn-default">MASUK</button>
            </form>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    
    <script type="text/javascript">
        var username_session = localStorage.getItem('session_login_ayooklik');
        var id_session = localStorage.getItem('session_login_id_ayooklik');
        
        if (username_session !== "" && id_session !== "") {
            //window.location.assign('beranda');
        }
        
        //alert(session);
        $(document).ready(function(){
            //$('#loginPassword').attr('type', 'password');  
        });
        function handle(e){
            if(e.keyCode === 13){
                $("form").submit();
            } 
        }
        function removeError(id){
            $("#val-login").remove();
            $('#loginPassword').attr('type', 'password');  
        }
    </script>
    
    
    
    
    
    </body>
</html>
