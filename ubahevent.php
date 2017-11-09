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

        <title>SB Admin - Bootstrap Admin Template</title>

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
<?php $currentpage = "event";?>
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
                            <strong>UBAH EVENT</strong>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <?php
                    require_once('connection.php');
                    $isError = false;
                    $succeed = false;
                    $namaErr = $descErr = $locationErr = $dateErr = "";
                    $eventName ='';
                    $eventLocation = '';
                    $eventDate = '';
                    $eventDescription = '';
                    
                    $currentKode = $_GET['kode'];
                    
                    $sql = "Select kode, nama, tanggal, lokasi, keterangan, status From db_event Where kode = '$currentKode'";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        
                        $eventName = $row['nama'];
                        $eventLocation = $row['lokasi'];
                        $eventDate = $row['tanggal'];
                        $eventDescription = $row['keterangan'];
                    
                    } else {
                        //echo false;
                    }
                    
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $eventName = isset($_POST['eventName']) ? $_POST['eventName'] : '';
                        $eventLocation = isset($_POST['eventLocation']) ? $_POST['eventLocation'] : '';
                        $eventDate = isset($_POST['eventDate']) ? $_POST['eventDate'] : '';
                        $eventDescription = isset($_POST['eventDescription']) ? $_POST['eventDescription'] : '';
                        if (!$eventName) {
                            $namaErr = "Kolom Nama Event tidak boleh kosong";
                            $isError = true;
                        }
                        if (!$eventLocation) {
                            $locationErr = "Kolom Lokasi Event tidak boleh kosong";
                            $isError = true;
                        }
                        if (!$eventDescription) {
                            $descErr = "Kolom Keterangan tidak boleh kosong";
                            $isError = true;
                        }
                        if (!$eventDate) {
                            $dateErr = "Kolom Tanggal tidak boleh kosong";
                            $isError = true;
                        }
                        
                        
                        if (isset($_POST["submit"])) {
                            if (!$isError) {
                                require './connection.php';
                                
                                $sql = "UPDATE db_event "
                                     . "SET nama= '$eventName', tanggal = '$eventDate', lokasi = '$eventLocation', keterangan = '$eventDescription', updated_at = now() "
                                     . "where kode = '$currentKode'";
                                
                                $con->query($sql);
                                
                                $eventName = '';
                                $eventDate = '';
                                $eventLocation = '';
                                $eventDescription = '';
                                $succeed = true;
                            }
 
                            if ($succeed) {
                                echo "<script>";
                                echo "swal({";
                                echo "     title: \"Berhasil mengubah event\",";
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
                                echo "         window.location.href = \"ubahevent?kode=".$currentKode."\";";
                                echo "     }";
                                echo " }); ";
                                echo "</script>";
                            }
                        }
                    }
                
                ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="post" action="ubahevent?kode=<?php echo $currentKode;?>">
                            <div class="form-group">
                                <label>Nama Event</label>
                                <input class="form-control siku" name="eventName" id="eventName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Event" value="<?php echo $eventName;?>">
                                <?php
                                    if ($namaErr) {
                                        echo "<i class=\"validation-text\" id=\"val-eventName\">" . $namaErr . "</i>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
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
                            </div>
                            <button type="submit" class="btn btn-default siku" name="submit">Simpan</button>

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
