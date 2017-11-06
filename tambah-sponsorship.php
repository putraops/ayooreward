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

        <title>Tambah Sponsorship - ayooreward!</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS /// NO NEED -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
                       
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
                            <strong>TAMBAH SPONSORSHIP</strong>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <?php
                    $isError = false;
                    $succeed = false;
                    $namaErr = $descErr = $locationErr = $dateErr = "";
                    $sponsorName = isset($_POST['sponsorName']) ? $_POST['sponsorName'] : '';
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (!$sponsorName) {
                            $namaErr = "Kolom Nama Sponsorship tidak boleh kosong";
                            $isError = true;
                        }
                        
                        
                        if (isset($_POST["submit"])) {
                            if (!$isError) {
                                require './connection.php';
                                
                                $sql = "INSERT INTO db_sponsorship (nama, status, created_at, updated_at) "
                                     . "VALUES ('$sponsorName', 'A',  now(), now())";
                                $con->query($sql);
                                
                                $sponsorName = '';
                                $succeed = true;
                            }
                        }
                    }
                
                ?>
                
                <?php
                    if ($succeed) {
                        echo "<div class=\"alert alert-success alert-dismissible siku\" id=\"tambah-vendor-berhasil\" role=\"alert\">";
                        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                        echo "<strong>BERHASIL !</strong> Telah berhasil menambahkan sponsorship baru. Lihat daftar sponsorship <a href='sponsorship'>disini</a>";
                        echo "</div>";
                    }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="post" action="tambah-sponsorship" style="min-height: 410px;">
                            <div class="form-group">
                                <label>Nama Sponsorship</label>
                                <input class="form-control siku" name="sponsorName" id="spnsorName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Sponsor" value="<?php echo $sponsorName;?>">
                                <?php
                                    if ($namaErr) {
                                        echo "<i class=\"validation-text\" id=\"val-sopnsorName\">" . $namaErr . "</i>";
                                    }
                                ?>
                            </div>
<!--                            <div class="form-group">
                                <label>Lokasi Event</label>
                                <input class="form-control" name="eventLocation" id="eventLocation" onkeyup="removeError(this.id)" placeholder="Masukkan Lokasi Event" value="<?php echo $eventLocation;?>">
                                <?php
                                    if ($locationErr) {
                                        echo "<i class=\"validation-text\" id=\"val-eventLocation\">" . $locationErr . "</i>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input class="form-control" name="eventDate" id="eventDate" onclick="removeError(this.id)" placeholder="Pilih Tanggal Event" value="2017-04-04" >
                                <?php
                                    if ($dateErr) {
                                        echo "<i class=\"validation-text\" id=\"val-eventDate\">" . $dateErr . "</i>";
                                    }
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="eventDescription" id="eventDescription" onkeyup="removeError(this.id)" rows="3" name="description" placeholder="Tambahkan keterangan dari event"><?php echo $eventDescription; ?></textarea>
                                <?php
                                    if ($descErr) {
                                        echo "<i class=\"validation-text\" id=\"val-eventDescription\">" . $descErr . "</i>";
                                    }
                                ?>
                            </div>-->
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
      $( "#datepicker" ).datepicker();
    } );
  </script>
  
   <script type="text/javascript">
        function removeError(id){
            $("#val-" + id).remove();
        }
    </script>

</body>

</html>
