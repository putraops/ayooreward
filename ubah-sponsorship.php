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

        <title>Ubah Sponsorship - ayooreward!</title>

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
<?php $currentpage = "sponsorship";?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php require 'profile-navigation.php'; ?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php require 'side-navigation.php'; ?>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <strong>UBAH SPONSORSHIP</strong>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <?php
                    require_once('connection.php');
                    $isError = false;
                    $succeed = false;
                    $namaErr = $descErr = $locationErr = $dateErr = "";
                    $sponsorName ='';
                    
                    $currentKode = $_GET['kode'];
                    
                    $sql = "Select kode, nama from db_sponsorship Where kode = '$currentKode'";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        
                        $sponsorName = $row['nama'];
                    
                    } else {
                        //echo false;
                    }
                    
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $sponsorName = isset($_POST['sponsorName']) ? $_POST['sponsorName'] : '';
                        
                        if (!$sponsorName) {
                            $namaErr = "Kolom Nama Sponsorship tidak boleh kosong";
                            $isError = true;
                        }
                        
                        if (isset($_POST["submit"])) {
                            if (!$isError) {
                                require './connection.php';
                                
                                $sql = "UPDATE db_sponsorship "
                                     . "SET nama= '$sponsorName', updated_at = now() "
                                     . "where kode = '$currentKode'";
                                
                                $con->query($sql);
                                
                                $succeed = true;
                            }
 
                            if ($succeed) {
                                echo "<script>";
                                echo "swal({";
                                echo "     title: \"Berhasil mengubah Sponsorship\",";
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
                                echo "         window.location.href = \"ubah-sponsorship?kode=".$currentKode."\";";
                                echo "     }";
                                echo " }); ";
                                echo "</script>";
                            }
                        }
                    }
                
                ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="post" action="ubah-sponsorship?kode=<?php echo $currentKode;?>"  style="min-height: 410px;">
                            <div class="form-group">
                                <label>Nama Sponsorship</label>
                                <input class="form-control siku" name="sponsorName" id="sponsorName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Sponsorship" value="<?php echo $sponsorName;?>">
                                <?php
                                    if ($namaErr) {
                                        echo "<i class=\"validation-text\" id=\"val-sponsorName\">" . $namaErr . "</i>";
                                    }
                                ?>
                            </div>
                            
                            <button type="submit" class="btn btn-default siku" name="submit"><i class="fa fa-save"> </i> Simpan</button>

                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    $( function() {
      //$( "#datepicker" ).datepicker();
    } );
  </script>
  
   <script type="text/javascript">
        function removeError(id){
            $("#val-" + id).remove();
        }
    </script>

</body>

</html>
