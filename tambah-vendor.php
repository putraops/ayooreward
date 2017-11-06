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

        <title>Vendor - ayooreward!</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS /// NO NEED -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <style>
            textarea {
                resize: none;
            }
        </style>
    </head>

    <body>
        <?php $currentpage = "vendor"; ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php require 'profile-navigation.php'; ?>
            <?php
            echo "<script>";
            if ($create_vendor == "0_0") {
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
                            <strong>TAMBAH VENDOR</strong> 
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <?php

                function validate_mobile($mobile) {
                    return preg_match('/^[0-9]{10}+$/', $mobile);
                }

                $isError = false;
                $succeed = false;
                $lastid = "";
                $target_dir_image = "upload_img/gallery/";
                $target_dir_thumb = "upload_img/thumb_450/";
                $target_dir_thumb_900 = "upload_img/thumb_900/";

                $namaErr = $descErr = $emailErr = $telpErr = $addressErr = $npwpErr = $namaCPErr = $descErr = $emailCPErr = $telpCPErr = $imageErr = "";
                $vendorName = isset($_POST['vendorName']) ? $_POST['vendorName'] : '';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!$vendorName) {
                        $namaErr = "Kolom Nama Vendor tidak boleh kosong";
                        $isError = true;
                    }

                    if (isset($_POST["submit"])) {
                        if (!$isError) {
                            require './connection.php';

                            $sql = "INSERT INTO db_vendor (nama, email, telp, alamat, npwp, nama_cp, email_cp, telp_cp, keterangan, ext, width, height, status_hapus, created_at, updated_at) "
                                    . "VALUES ('$vendorName', '', '', '', '', '', '', '', '', '-', '0', '0', 0, now(), now())";
                            $con->query($sql);
                            
                            $last_id = $con->insert_id; 
                            
                            $vendorName = '';
                            $vendorTelp = '';
                            $vendorEmail = '';
                            $vendorAddress = '';
                            $vendorDescription = '';
                            $vendorNamaCP = '';
                            $vendorEmailCP = '';
                            $vendorTelpCP = '';
                            $succeed = true;
                        }
                    }
                }
                ?>
                <?php
                if ($succeed) {
                    echo "<div class=\"alert alert-success alert-dismissible siku\" id=\"tambah-vendor-berhasil\" role=\"alert\">";
                    echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                    echo "<strong>BERHASIL !</strong> Telah berhasil menambahkan vendor baru. Lengkapi data vendor <a class='btn btn-default btn-sm siku' href='edit-vendor?q=". $last_id."'>disini</a>";
                    echo "</div>";
                }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" enctype="multipart/form-data" action="#">
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control siku" name="vendorName" id="vendorName" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Vendor" value="<?php echo $vendorName; ?>">
                                <?php
                                if ($namaErr) {
                                    echo "<i class=\"validation-text\" id=\"val-vendorName\">" . $namaErr . "</i>";
                                }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <button type="submit" name="submit" class="btn btn-default siku"><i class="fa fa-save"> </i> Simpan</button>
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

        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script type="text/javascript" src="datepicker/js/jquery.datepicker.js"></script>

        <script type="text/javascript">
                                    function removeError(id) {
                                        $("#val-" + id).remove();
                                    }

                                    function openFile() {
                                        $('#kz-input-file').click();
                                        $("#val-vendorImage").remove();
                                    }

                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function (e) {
                                                console.log(e);
                                                //$('#blah').attr('src', e.target.result);
                                                $('#preview-upload-photo img').remove();
                                                $('#preview-upload-photo').append('<img src="' + e.target.result + '" style="width: 100%; height: 100%;">');
                                                $('#preview-upload-photo span div').html('CHOOSE ANOTHER PICTURE');
                                                $('#preview-upload-photo span').css('color', 'white');
                                                $('#preview-upload-photo span').css('text-shadow', '2px 2px #535353');

                                                //$("#kz-input-file").val(e.target.result);
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                    window.URL = window.URL || window.webkitURL;
                                    var elBrowse = document.getElementById("kz-input-file"),
                                            useBlob = false && window.URL; // `true` to use Blob instead of Data-URL
                                    function readImage(file) {
                                        var reader = new FileReader();
                                        reader.addEventListener("load", function () {
                                            var image = new Image();
                                            image.addEventListener("load", function () {
                                                $("#kz-input-file-height").val(image.height);
                                                $("#kz-input-file-width").val(image.width);
                                            });
                                            image.src = useBlob ? window.URL.createObjectURL(file) : reader.result;
                                            if (useBlob) {
                                                window.URL.revokeObjectURL(file); // Free memory
                                            }
                                        });
                                        reader.readAsDataURL(file);
                                    }

                                    elBrowse.addEventListener("change", function () {
                                        $('#validation-form').remove();
                                        var files = this.files;
                                        var errors = "";
                                        if (!files) {
                                            //errors += "File upload not supported by your browser.";
                                        }
                                        if (files && files[0]) {
                                            for (var i = 0; i < files.length; i++) {
                                                var file = files[i];
                                                if ((/\.(png|jpeg|jpg|gif)$/i).test(file.name)) {
                                                    readImage(file);
                                                } else {
                                                    //errors += file.name +" Unsupported Image extension\n";  
                                                }
                                            }
                                        }
                                        if (errors) {
                                            alert(errors);
                                        }
                                    })

                                    $("#kz-input-file").change(function () {
                                        readURL(this);
                                    });
        </script>

        <!--     Morris Charts JavaScript 
            <script src="js/plugins/morris/raphael.min.js"></script>
            <script src="js/plugins/morris/morris.min.js"></script>
            <script src="js/plugins/morris/morris-data.js"></script>-->

    </body>

</html>
