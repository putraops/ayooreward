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

            <title>Daftar Pembelian - ayooreward!</title>

            <!-- Bootstrap Core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="css/sb-admin.css" rel="stylesheet">

            <!-- Morris Charts CSS /// NO NEED -->
            <link href="css/plugins/morris.css" rel="stylesheet">

            <!-- Custom Fonts -->
            <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

            <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

            <link href="datepicker/css/jquery.datepicker.css" rel="stylesheet" type="text/css"/>	

            <script src="sweetalert/dist/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">

            <style>
                .fade-scale {
                  transform: scale(0);
                  opacity: 0;
                  -webkit-transition: all 0.2s linear;
                  -o-transition: all 0.2s linear;
                  transition: all 0.2s linear;
                }

                .fade-scale.in {
                  opacity: 1;
                  transform: scale(1);
                }   
                .hyperlink {
                    color: blue;
                    cursor: pointer;
                }

                .sweet-alert.showSweetAlert, .sweet-alert .confirm {
                    border-radius: 0px;
                }
                .sweet-alert .confirm {
                    background-color: black !important; 
                    color: white;
                    margin-top: 0px;
                }
                .btn-action {
                    min-width: 42px;
                    max-width: 42px;    
                }

                .datepicker {
                    z-index: 9999 !important;
                }
                #m-input-reward-label {
                    margin-top: -5px;
                }

            </style>

        </head>

    <body>
        <?php 
            require './connection.php';  
            $arrayStatus = array();
            $currentpage = "event";
            $firstdate = isset($_GET['dfirst']) ? $con->real_escape_string($_REQUEST['dfirst']) : '';
            $lastdate = isset($_GET['dlast']) ? $con->real_escape_string($_REQUEST['dlast']) : '';
            $param_firstdate = $param_lastdate = "";
            
            $temp_firstdate = explode("-", $firstdate);
            $temp_lastdate = explode("-", $lastdate);
            
            if ($firstdate != "" && $lastdate != "") {
                $param_firstdate = $temp_firstdate[2] . "/" . $temp_firstdate[1] . "/" . $temp_firstdate[0];
                $param_lastdate = $temp_lastdate[2] . "/" . $temp_lastdate[1] . "/" . $temp_lastdate[0];
            }
        ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php require 'profile-navigation.php'; ?>
            <?php 
            echo "<script>";
            if ($read_purchase == "0_0") {
                echo "window.location.href = 'beranda';";
            }
            echo "</script>";
            ?>
        </nav>


        <div id="page-wrapper">

            <div class="container-fluid" style="margin-bottom: 50px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <strong>DAFTAR PEMBELIAN</strong>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <?php if ($create_purchase != "0_0"): ?>
                        <a href="tambah-pembelian" type="button" class="btn btn-info siku pull-left"><strong>+</strong> Buat Pesanan Baru</a><br/><br/>
                        <?php endif;?>
                        
                        <?php if ($create_laporan != "0_0"):?>
                        <div class="pull-left" style="margin: 15px 0px 25px 0px;">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>Periode Pembelian : </label>
                                    <div class="input-group">
                                        <input class="form-control siku" id="m_tanggal-awal" value="<?php echo $param_firstdate;?>" data-select="datepicker" accept="" readonly="true" onkeyup="removeError(this.id)" placeholder="Tanggal Awal" style="background-color: White; cursor: pointer;" />
                                        <div class="input-group-addon siku" style="border-left: 0px; border-right: 0px;">sampai</div>
                                        <input class="form-control siku" id="m_tanggal-akhir" value="<?php echo $param_lastdate;?>" data-select="datepicker" accept="" readonly="true" onkeyup="removeError(this.id)" placeholder="Tanggal Akhir" style="background-color: White; cursor: pointer;" />
                                    </div>
                                    <button type="button" class="btn btn-default siku" onclick="set_filter()">Tampilkan</button>
                                </div>
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ORDER</th>
                                        <th>TANGGAL BELI</th>
                                        <th>NAMA PEMBELIAN</th>
                                        <th>VENDOR</th>
                                        <th>NO INVOICE</th>
                                        <th>NO PO</th>
                                        <th>NO DO</th>
                                        <th>TOTAL BELI</th>
                                        <th>LUNAS</th>
                                        <th>STATUS</th>
                                        <?php if ($update_purchase != "0_0" || $delete_purchase != "0_0"): ?>
                                        <th>AKSI</th>
                                        <?php endif;?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //echo tanggal_indo('2016-03-20'); // 20 Maret 2016

                                    $sql = "Select dbp.no_order as noorder, dbp.subject as subject, dbv.kode as kodevendor, dbv.nama as namavendor, dbp.no_invoice as noinvoice, dbp.no_po as nopo,
                                                    dbp.no_do as nodo, dbp.status_order as statusorder, dbs.nama as statusnama, dbp.tanggal_beli as tanggalbeli, dbp.tanggal_lunas as tanggallunas, dbp.reward as reward, 
                                                    dbp.total_beli as totalbeli
                                            from db_purchase dbp
                                            INNER JOIN db_status dbs ON dbp.status_order = dbs.kode
                                            INNER JOIN db_vendor dbv ON dbv.kode = dbp.kode_vendor
                                            where isDelete = 0 ";
                                    if ($firstdate && $lastdate) {
                                        $sql .= "and dbp.tanggal_beli between '$firstdate' AND '$lastdate' ";
                                    }
                                    $sql .= "order by noorder asc";                            
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $nomor = 1;
                                        $lastid = "";
                                        
                                        while ($row = $result->fetch_assoc()) {
                                            //echo "<td>" . $nomor . "</td>";
                                            if ($lastid != $row['noorder']) {
                                                echo "<tr>";   
                                                echo "<td><span class='hyperlink' onclick='showdetail(" . $row['noorder'] . ", 0, \"itemdetail\");'>" . $row['noorder'] . "</span></td>";
                                                echo "<td><span class='hyperlink' onclick='showdetail(" . $row['noorder'] . ", \"" . $row['tanggalbeli'] . "\", \"itemtanggal\");'>" . tanggal_indo($row['tanggalbeli']) . "</span></td>";
                                                echo "<td>" . $row['subject'] . "</td>";
                                                echo "<td id='coloumn-vendor-". $row['noorder'] ."'><span class='hyperlink' onclick='showdetail(" . $row['noorder'] . ", \"" . $row['kodevendor'] . "\", \"itemvendor\");'>" . ($row['namavendor']) . "</span></td>";
                                                echo "<td>" . ($row['noinvoice'] == "" ? "-" : $row['noinvoice']) . "</td>";
                                                echo "<td>" . ($row['nopo'] == "" ? "-" : $row['nopo']) . "</td>";
                                                echo "<td>" . ($row['nodo'] == "" ? "-" : $row['nodo']) . "</td>";
                                                echo "<td class='text-right'>" . number_format($row['totalbeli']) . "</td>";
                                                echo "<td><span class='hyperlink' onclick='showdetail(" . $row['noorder'] . ", \"" . $row['tanggallunas'] . "\", \"itemtanggal\");'>" . ($row['tanggallunas'] == "0000-00-00" ? "Belum Lunas" : tanggal_indo($row['tanggallunas'])) . "</span></td>";
                                                echo "<td class='text-center' id='coloumn-status-". $row['noorder'] ."'>";
                                                    if ($update_purchase != "0_0") {
                                                        echo "<span class='hyperlink' onclick='showdetail(" . $row['noorder'] . ", \"" . $row['statusorder'] . "\", \"itemstatus\");'>" . ($row['statusnama']) . "</span>";
                                                    } else {
                                                        echo "<span class=''>" . ($row['statusnama']) . "</span>";
                                                    }
                                                echo "</td>";
    //                                            echo "<td id='row-". $row['noorder'] ."'>"
    //                                               . "  <div class='text-center'><span class='label label-info siku' onclick='showdetail(" . $row['noorder'] . ", 0, \"itembeli\");' style='cursor: pointer;'>LIHAT BARANG</span></div>"
    //                                               . "</td>";

                                                if ($update_purchase != "0_0" || $delete_purchase != "0_0") {
                                                    echo "<td class='text-center'>";
                                                    if ($update_purchase != "0_0") {
                                                        echo "<button class=\"btn btn-primary btn-action btn-xs siku\" onclick='showdetail(" . $row['noorder'] . ", 0, \"itemdetail\");'>Ubah </button><br/>";
                                                    }
                                                    if ($delete_purchase != "0_0") {
                                                        echo "<button class=\"btn btn-danger btn-action btn-xs siku\" onclick=\"deleteevent(". $row['noorder'] .")\">Hapus</button>";
                                                    }
                                                    echo "</td>";
                                                }
                                                echo "</tr>";
                                            }
                                            $lastid = $row['noorder'] . "";
                                            $nomor++;
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>


        <div class="modal fade-scale" id="modal-information-by-vendor" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document" style="width: 90%;">
                <div class="modal-content siku">
                    <div class="modal-header" style="padding: 10px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: 7px;"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-size: 18pt; letter-spacing: 0.5px;">DETAIL PEMBELIAN VENDOR</h4>
                    </div>
                    <div class="modal-body" style="font-size: 11pt; letter-spacing: 0px; color: #666;">
                        <table class="table table-hover"> 
                            <thead> 
                                <tr> 
                                    <th>No Order</th>
                                    <th>Nama Pembelian</th>
                                    <th>No Invoice</th>
                                    <th>No PO</th>
                                    <th>No DO</th>
                                    <th>Tanggal Beli</th>
                                    <th class="text-center">Total Beli</th>
                                    <th class="text-center">Status</th>
                                </tr> 
                            </thead> 
                            <tbody id="table-body-vendor"> 
                            </tbody> 
                        </table>
                    </div>
                    <div class="modal-footer" style="margin-top: -33px;">
                        <button type="button" class="btn btn-default siku" data-dismiss="modal"style="background-color: black; width: 70px; color: white">Tutup</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade-scale" id="modal-information" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content siku">
                    <div class="modal-header" style="padding: 10px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: 7px;"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-size: 18pt; letter-spacing: 0.5px;">DETAIL PEMBELIAN</h4>
                    </div>
                    <div class="modal-body" style="font-size: 12pt; letter-spacing: 1px; color: #666;">
                        <strong>-</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default siku" data-dismiss="modal"style="background-color: black; width: 70px; color: white">Tutup</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        
        <div class="modal fade-scale" id="modal-change-status" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content siku">
                    <div class="modal-header" style="padding: 10px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: 7px;"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-size: 18pt; letter-spacing: 0.5px;">UBAH STATUS</h4>
                    </div>
                    <div class="modal-body" style="font-size: 12pt; letter-spacing: 1px; color: #666;">
                        <div class="form-group col-md-12">
                            <label>Status</label>
                            <select class="form-control" class="cbo-status-invoice" id="status-invoice" onclick="removeErrorText(this.id)">
                                <option value="0">Pilih Status</option>
                                <?php
                                    $sql = "Select kode, nama from db_status WHERE no_urut != 0 ORDER BY no_urut ASC";                            

                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $nomor = 1;
                                        $lastid = "";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option id='status-". $row['kode'] ."' value='". $row['kode'] ."'>" . $row['nama'] . "</option>"; 
                                            array_push($arrayStatus, array($row['kode'], $row['nama']));
                                        }
                                    }
                                    //print_r($arrayStatus);
                                ?>
                            </select>
                            <i class="validation-text" id="val-status-invoice" style="letter-spacing: 0px;"></i>
                        </div>
                        <div class="text-right" style="padding: 15px;">
                            <button type="button" class="btn btn-default siku" onclick="ubahstatusbeli()" style="background-color: black; width: 70px; color: white"> Ubah </button>
                            <button type="button" class="btn btn-default siku" data-dismiss="modal"> Batal </button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script type="text/javascript" src="datepicker/js/jquery.datepicker.js"></script>

        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript">
           var idstatuschange = 0;
           //var namestatuschange = "";
           var arrayStatus = "";
           $(document).ready(function(){
               $('#myTable').DataTable();
                //$('#modal-change-status').modal('show');
                //$("#modal-information-by-noorder").modal('show');
                //console.log(arrayStatus);
                arrayStatus = <?php echo json_encode($arrayStatus);?>;

            });

            function removeError(id) {
                $("#val-" + id).remove();
            }
            function removeErrorText(id) {
                $("#val-" + id).html("");
            }

            function showdetail(id, param, act) {
                //alert(act);
                if (act === "itembeli") {
                    $("#modal-information .modal-title").html("DETAIL BARANG DARI NO ORDER " + id);
                    var url = 'ajax/select-detail-barang.php?noorder=' + id;
                    $("#modal-information .modal-body").html("<div class='text-center'><i class=\"fa fa-spinner fa-spin fa-3x fa-fw\"></i></div>");
                    $.ajax({
                        url: url,
                        success: function(data, textStatus, jqXHR) {
                            //console.log(data);
                            var temp = "";
                            if (data == 0) {
                                $("#modal-information .modal-body").html("tidak ada data pembelian barang");
                            } else {
                                var obj = $.parseJSON(data);
                                console.log(obj);
                                for (var i = 0; i < obj.length; i++) {
                                    temp += ((i+1) + "." + obj[i][0] + "<br/><strong>Keterangan: </strong>" + (obj[i][1] === "" ? "-" : obj[i][1]) + "<br/>");
                                }
                                $("#modal-information .modal-body").html(temp);
                            }
                            $('#modal-information').modal('show');
                        },
                    }); 
                } else if (act === "itemstatus") {
                    //namestatuschange = $("#coloumn-status-" + id + " .hyperlink").html();
                    $("#modal-change-status .modal-title").html("UBAH STATUS PEMBELIAN  " + id);
                    $("#status-" + param).attr("selected", "selected");
                    $('#modal-change-status').modal('show');
                } else if (act === "itemvendor") {
                    var namavendor = $("#coloumn-vendor-" + id + " span").html();
                    $("#modal-information-by-vendor .modal-title").html("Daftar Pembelian Pada Vendor " + namavendor);
                    //$("#modal-information-by-vendor .modal-body").html("<div class='text-center'><i class=\"fa fa-spinner fa-spin fa-3x fa-fw\"></i></div>");

                    $.ajax({
                        url: 'ajax/select-purchase-by-vendor.php',
                        data: {
                           kodevendor: param,
                        },
                        success: function(data, textStatus, jqXHR) {
                            console.log(data);
                            var temp = "";
                            if (data == 0) {
                                $("#modal-information-by-vendor .modal-body").html("tidak ada data pembelian barang pada vendor " + namavendor);
                            } else {
                                var obj = $.parseJSON(data);
                                console.log(obj);
                                for (var i = 0; i < obj.length; i++) {
                                    temp += "<tr>";
                                    temp += "<td>" + obj[i][0] + "</td>";
                                    temp += "<td>" + obj[i][1] + "</td>";
                                    temp += "<td>" + (obj[i][4] === "" ? "-" : obj[i][4]) + "</td>";
                                    temp += "<td>" + (obj[i][5] === "" ? "-" : obj[i][5]) + "</td>";
                                    temp += "<td>" + (obj[i][6] === "" ? "-" : obj[i][6]) + "</td>";
                                    temp += "<td>" + obj[i][9] + "</td>";
                                    temp += "<td class=\"text-right\">" + addCommas(obj[i][10]) + "</td>";
                                    temp += "<td class=\"text-center\">" + obj[i][8] + "</td>";
                                    temp += "</tr>";
                                }
                                $("#table-body-vendor").html(temp);
                            } 
                            $('#modal-information-by-vendor').modal('show');
                        },
                    }); 
                } else if (act === "itemdetail") {
                    $("#modal-information-by-noorder .modal-title").html("Detail Pembelian Nomor Order " + id);

                    $.ajax({
                        url: 'ajax/select-purchase-by-noorder.php?noorder=' + id,
                        data: {
                           noorder: id,
                        },
                        success: function(data, textStatus, jqXHR) {
                            var temp = "";
                            var obj = $.parseJSON(data);
                            console.log(obj);
                            if (obj.length >= 1) {
                                $("#modal-information-by-noorder #m-subject").html("Pembelian: " + obj[0][1]);
                                $("#modal-information-by-noorder #m-tanggal-beli").html("<strong>Tanggal Beli: </strong>" + obj[0][9]);
                                $("#modal-information-by-noorder #m-vendor").html("<strong>Vendor: </strong>" + obj[0][3]);
                                $("#modal-information-by-noorder #m-total-beli").html("<strong>Total Beli: </strong>Rp. " + addCommas(obj[0][10]));

                                var tempDate = obj[0][12];
                                tempDate = tempDate.split("-");
                                var datepurchase = tempDate[2] + "/" + tempDate[1] + "/" + tempDate[0]; 

                                $("#m-input-noinvoice").val(obj[0][4]);
                                $("#m-input-nopo").val(obj[0][5]);
                                $("#m-input-nodo").val(obj[0][6]);
                                $("#status-invoice-bynoorder").val();
                                if (datepurchase == "00/00/0000") {
                                    $("#m_tanggal-lunas").val('');
                                } else {
                                    $("#m_tanggal-lunas").val(datepurchase);
                                }

                                var isReward = obj[0][13];
                                if (isReward === "0") {
                                    $("#m-input-reward").hide();
                                    $("#m-input-reward-label").show();
                                } else {
                                    $("#m-input-reward").show();
                                    $("#m-input-reward-label").hide();
                                }
                                $("#m-input-reward").val(obj[0][11]);


                                $(".cbo-status-invoice option").removeAttr("selected");    

                                $(".cbo-status-invoice").html("");
                                for (var i = 0; i < arrayStatus.length; i++) {
                                    $(".cbo-status-invoice").append("<option id='kodestatus-"+ arrayStatus[i][0] +"' value='"+ arrayStatus[i][0] +"'>" + arrayStatus[i][1] + "</option>");
                                }

                                $("#status-invoice-bynoorder #kodestatus-" + obj[0][7]).attr("selected", "true");

                                var arrayBarang = obj[0][14];
                                var temp = "";
                                console.log(arrayBarang);
                                if (arrayBarang.length > 0) {
                                    //console.log(arrayBarang);
                                    for(var i = 0 ; i < arrayBarang.length; i++) {
                                        var nama = arrayBarang[i][0];
                                        var ket = arrayBarang[i][1];
                                        temp += "<tr>"; 
                                        temp += "<td>" + (i+1) + "</td>";
                                        temp += "<td>" + nama + "</td>";
                                        temp += "<td>" + ket + "</td>";
                                        temp += "</tr>";
                                    }
                                    //alert();
                                    console.log(temp);
                                } else {
                                    temp += "<tr class='text-center'><td>-</td><td>Tidak ada data pembelian</td><td>-</td></tr>";
                                }
                                $("#m-table-by-order tbody").html(temp);

                                $('#modal-information-by-noorder').modal('show');
                            }
                        },
                    }); 
                }
                idstatuschange = id;

            }


            function ubahstatusbeli() {
                //console.log("No order yang status mau diubah " + idstatuschange);
                var status = $("#status-invoice").val();
                var statusname = $("#status-invoice option:selected").text();
                if (status === "0") {
                    $("#val-status-invoice").html("Silahkan pilih untuk mengubah status pesanan");
                } else {
                    url = "ajax/edit-status-pembelian.php",
                    $.ajax({
                        url: url,
                        data: {
                           kode: idstatuschange,
                           status: status
                        },
                        success: function(data, textStatus, jqXHR) {
                            if (data === "1") {
                                $("#coloumn-status-" + idstatuschange).html("<span class='hyperlink' onclick='showdetail(" + idstatuschange + ", \"" + status + "\", \"itemstatus\");'>" + statusname + "</span>");
                                $('#modal-change-status').modal('hide');
                                //dataTable.ajax.reload();
                                //swal("Berhasil mengubah status pembelian untuk Nomor Order: " + idstatuschange + " menjadi " + statusname + "", "", "success");
                                swal({
                                    title: "Berhasil mengubah status pembelian untuk Nomor Order: " + idstatuschange + " menjadi " + statusname + "",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "Black",
                                    confirmButtonText: "Ya",
                                    cancelButtonText: "Tidak",
                                    closeOnConfirm: false,
                                    closeOnCancel: true
                                },
                                function(isConfirm) {
                                    if (isConfirm) {  
                                        window.location.href = "pembelian";
                                    }
                                });  
                            }
                        }
                    });
                }
            }

            function ubahdetailpembelian() {
                var noorder = idstatuschange; //--- Variabel Global
                var noinvoice = $("#m-input-noinvoice").val().trim();
                var nopo = $("#m-input-nopo").val().trim();
                var nodo= $("#m-input-nodo").val().trim();
                var statusbeli = $("#status-invoice-bynoorder").val().trim();
                var tanggallunas = $("#m_tanggal-lunas").val().trim();
                var reward = $("#m-input-reward").val().trim();
                var isError = false;

                var tempDate = tanggallunas.split("/");
                var datepurchase = tempDate[2] + "-" + tempDate[1] + "-" + tempDate[0]; 

                console.log(noinvoice);
                console.log(nopo);
                console.log(nodo);
                console.log(statusbeli);
                console.log(tempDate);
                console.log(reward);

                if (!isError) {
                    url = "ajax/edit-detail-pembelian.php",
                    $.ajax({
                        url: url,
                        data: {
                           noorder: noorder,
                           noinvoice: noinvoice,
                           nopo: nopo,
                           nodo: nodo,
                           status: statusbeli,
                           reward: reward,
                           tanggallunas: datepurchase
                        },
                        success: function(data, textStatus, jqXHR) {
                            var result = data.replace(/\s/g,'');
                            console.log(data);
                            if (result === "1"){
                                swal({
                                    title: "Berhasil mengubah detail pembelian",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "Black",
                                    confirmButtonText: "Ya",
                                    cancelButtonText: "Tidak",
                                    closeOnConfirm: false,
                                    closeOnCancel: true
                                },
                                function(isConfirm) {
                                    if (isConfirm) {  
                                        window.location.href = "pembelian";
                                    }
                                });   
                            } else {
                                alert("Ada kesalahan perubahan data.");
                            }
                        }
                    });
                } else {
                    //window.scrollTo(0,0);
                }

            }


            function addCommas(nStr) {
                nStr += '';
                var x = nStr.split('.');
                var x1 = x[0];
                var x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }

        </script>
        <script>
            function set_filter() {
                var firstdate = $("#m_tanggal-awal").val();
                var lastdate = $("#m_tanggal-akhir").val();
                var isError = false;

                if (!firstdate || !lastdate) {
                    isError = true;
                }

                if (!isError) {
                    firstdate = firstdate.split("/");
                    lastdate = lastdate.split("/");
                    var final_firstdate = firstdate[2] + "-" + firstdate[1] + "-" + firstdate[0];
                    var final_lastdate = lastdate[2] + "-" + lastdate[1] + "-" + lastdate[0];

                    console.log(final_firstdate);
                    console.log(final_lastdate);
                    
                    if (parseInt(firstdate[2] + "" + firstdate[1] + "" + firstdate[0]) > parseInt(lastdate[2] + "" + lastdate[1] + "" + lastdate[0])) {
                        swal("Tanggal awal tidak boleh lebih besar dari tanggal awal. ", "", "warning");
                    } else {
                        window.location.href = "pembelian?dfirst="+ final_firstdate +"&dlast=" + final_lastdate; 
                    }
                }
            }
        </script>

    </body>

    </html>
