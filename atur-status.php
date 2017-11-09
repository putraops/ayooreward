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

        <title>Master Status - ayooreward!</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
        <script src="sweetalert/dist/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
        
        
        <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
        <style>
            #sortable { list-style-type: none; padding: 0; width: 100%; }
        </style>
        <script src="jquery-ui/jquery-1.12.4.js"></script>
        <script src="jquery-ui/jquery-ui.js"></script>
        
                
    </head>

<body>
    <?php $currentpage = "sponsorship";?>

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
                        <strong>ATUR STATUS</strong>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-8" style="padding-left: 0px; padding-right: 0px;">
                    <div class="col-lg-12">
                        <div class="alert alert-success siku" role="alert" >
                            <strong>Perhatikan!!!!</strong><br/>
                            <span style="letter-spacing:  1px;">Untuk melakukan pengurutan status, bisa dilakukan dengan melakukan "drag" pada masing-masing status. Urutan status dimulai dari atas sampai ke bawah.</span>
                        </div>
                        <ul class="list-group" id="sortable">
                            <?php

                            require './connection.php';

                            $sql =  "SELECT kode, nama, no_urut FROM
                                    (
                                        SELECT kode, nama, no_urut
                                        FROM db_status where no_urut != 0 order by no_urut asc
                                    ) as first
                                    UNION
                                    SELECT * FROM
                                    (
                                        SELECT kode, nama, no_urut
                                        FROM db_status where no_urut = 0 order by no_urut asc
                                    ) as second
                                    ORDER BY no_urut asc";    
                                    

                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                $nomor = 1;
                                while ($row = $result->fetch_assoc()) {
                                    $temp_nourut = $row['no_urut'];
                                    if ($row['no_urut'] == 0) {
                                        //$temp_nourut = "Tidak ada no urut";
                                    }
                                    echo "<li id='id-" . $row['kode'] . "' class=\"list-group-item siku\" >";
                                    echo $row['nama'];
                                    echo "</li>";
                                }
                            } 
                            ?>
                        </ul>
                    </div>
                    <?php
                        $sql = "SELECT kode, nama, no_urut, created_at, updated_at "
                                . "FROM db_status where no_urut = 0 order by no_urut asc";                            

                        $result = $con->query($sql);
                    ?>

                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary siku" onclick="orderstatus()">&nbsp;&nbsp;&nbsp;SIMPAN&nbsp;&nbsp;&nbsp;</button>
                        <a href="status" type="button" class="btn btn-danger siku">&nbsp;&nbsp;&nbsp;BATAL&nbsp;&nbsp;&nbsp;</a>
                    </div>

                    
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    

    <!-- jQuery -->
<!--    <script src="js/jquery.js"></script>-->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  
    <script type="text/javascript">
       $(document).ready(function(){
            //$('#myTable').DataTable();
            //$("#modalEditBarang").modal('show');
        });
        function removeError(id){
            $("#val-" + id).html('');
        }
        
        
        var arrOrder = new Array();
        function orderstatus() {
            var index = 0;
            var panjang = ($("#sortable").children());
            //console.log(panjang);
            for (var i = 0; i < panjang.length; i++) {
                //-- Get id by ordinal number (loop index) 
                var id = $("#sortable").children()[i].id.split("-");
                
                arrOrder[index] = new Array(id[1], (i+1));
                index++;
            }
            console.log(arrOrder);
            
            url = "ajax/edit-order-number-status.php",
            $.ajax({
                url: url,
                data: {
                   arrOrder: arrOrder
                },
                success: function(data, textStatus, jqXHR) {
                    console.log(data);
                    var result = data.replace(/\s/g,'');;
                    if (result === "1"){
                        swal({
                            title: "Berhasil melakukan pengurutan untuk semua status",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "Black",
                            confirmButtonText: "Kembali ke Daftar Status",
                            cancelButtonText: "Tidak",
                            closeOnConfirm: false,
                            closeOnCancel: true
                        },
                        function(isConfirm) {
                            if (isConfirm) {  
                                window.location.href = "status";
                            }
                        });   
                    } else {
                        alert("Ada kesalahan dalam penginputan data.");
                    }
                }
            });
            
        }
    </script>
    <script>
        $( "#sortable" ).sortable({
            connectWith  : "#sortable",
            stop         : function(event,ui) { /* Do it here */ }
         });
        $( "#sortable" ).disableSelection();
    </script>

</body>

</html>
