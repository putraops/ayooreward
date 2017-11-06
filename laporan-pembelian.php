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

        <title>Laporan Pembelian - ayooreward!</title>

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
            
            #my-table th, #my-table tr, #my-table td {
                 border: 1px solid #8c8c8c;
            }
            #label-total-pembelian {
                color: red;
            }
          
        </style>
                
    </head>

<body>
    <?php $currentpage = "event";?>
    <?php $arrayStatus = array(); ?>
    
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php require 'profile-navigation.php'; ?>
        <?php 
            echo "<script>";
            if ($create_laporan == "0_0") {
                echo "window.location.href = 'beranda';";
            }
            echo "</script>";
        ?> 
    </nav>
    
    <div id="page-wrapper" style="margin-top: -30px;">

        <div class="container-fluid" style="margin-bottom: 50px;">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <strong>BUAT LAPORAN PEMBELIAN</strong>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-inline">
                        <div class="form-group">
                            <label>Filter Tanggal Beli : </label>
                            <div class="input-group">
                                <input class="form-control siku" id="m_tanggal-awal" data-select="datepicker" accept="" readonly="true" onkeyup="removeError(this.id)" placeholder="Tanggal Awal" style="background-color: White; cursor: pointer;" />
                                <div class="input-group-addon siku" style="border-left: 0px; border-right: 0px;">sampai</div>
                                <input class="form-control siku" id="m_tanggal-akhir" data-select="datepicker" accept="" readonly="true" onkeyup="removeError(this.id)" placeholder="Tanggal Akhir" style="background-color: White; cursor: pointer;" />
                            </div>
                        </div>
                    </form>
                    <form class="form-inline" style="margin: 5px 0px 5px 0px;">
                        <div class="form-group">
                            <label>Pilih Status : </label>
                            <div class="input-group">
                                <select class="form-control" id="status-laporan" onclick="removeErrorText(this.id)">
                                    <option value="2">Semua Pembelian</option>
                                    <option value="3">Sudah Selesai</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn btn-info siku" onclick="show_report()">Tampilkan</button>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="pull-left"><strong>Hasil Laporan</strong></h4>
                    <h4 class="pull-right"><strong id="label-total-pembelian">Total Pembelian: Rp 0</strong></h4>
                </div>
                <div class="col-md-12" id="section-report">
                    <table class="table table-hover table-responsive" id="my-table"> 
                        <thead> 
                            <tr style="background-color: #DDD;"> 
                                <th>No Order</th>
                                <th>Nama Pembelian</th>
                                <th>No Invoice</th>
                                <th>No PO</th>
                                <th>No DO</th>
                                <th>Tanggal Beli</th>
                                <th style="width: 20%;">Barang</th>
                                <th class="text-center">Total Beli</th>
                                <th class="text-center">Status</th>
                            </tr> 
                        </thead> 
                        <tbody id="table-body-vendor"> 
                        </tbody> 
                    </table>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary siku" id="btnExport" onclick="fnExcelReport();" style="display: none;"> EXPORT KE EXCEL </button>
                </div>
            </div>
            <hr/>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    
    
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
                
        });
        
        function removeError(id) {
            $("#val-" + id).remove();
        }
        function removeErrorText(id) {
            $("#val-" + id).html("");
        }
        
        function show_report() {
            $("#btnExport").css("display", "none");
            //var firstdate = "";
            //var lastdate = "";
            var firstdate = $("#m_tanggal-awal").val();
            var lastdate = $("#m_tanggal-akhir").val();
            var status = $("#status-laporan").val();
            
            
            firstdate = firstdate.split("/");
            lastdate = lastdate.split("/");
            var final_firstdate = firstdate[2] + "-" + firstdate[1] + "-" + firstdate[0];
            var final_lastdate = lastdate[2] + "-" + lastdate[1] + "-" + lastdate[0];
            var totalpurchase = 0;
            
            console.log(final_firstdate);
            console.log(final_lastdate);
                           
            $.ajax({
                url: 'ajax/select-purchase-filter.php',
                data: {
                   action: "bydate",
                   firstdate: final_firstdate,
                   lastdate: final_lastdate,
                   status: status
                },
                success: function(data, textStatus, jqXHR) {
                    var temp = "";
                    var obj = $.parseJSON(data);
                    console.log(obj);
                    
                    if (obj === 0) {
                        swal("Tidak ada data pembelian untuk periode ini.");
                    } else {
                        for (var i = 0; i < obj.length; i++) {
                            temp += "<tr>";
                            temp += "<td>" + obj[i][0] + "</td>";
                            temp += "<td>" + obj[i][1] + "</td>";
                            temp += "<td>" + (obj[i][4] === "" ? "-" : obj[i][4]) + "</td>";
                            temp += "<td>" + (obj[i][5] === "" ? "-" : obj[i][5]) + "</td>";
                            temp += "<td>" + (obj[i][6] === "" ? "-" : obj[i][6]) + "</td>";
                            temp += "<td>" + obj[i][9] + "</td>";
                            
                            //--- Generate Details purchase
                            var length_item = obj[i][13].length;
                            if (parseInt(length_item) > 0) {
                                temp += "<td>";
                                for (var j = 0; j < length_item; j++) {
                                    temp += obj[i][13][j][0];
                                    if (obj[i][13][j][1] !== "") {
                                        temp += " [" + obj[i][13][j][1] + "]";
                                    }
                                    if (length_item-1 !== j) {
                                        temp += ", ";
                                    }
                                }
                                temp += "</td>";
                            } else {
                                temp += "<td>Tidak ada data</td>";
                            }
                            
                            temp += "<td class=\"text-right\">" + addCommas(obj[i][10]) + "</td>";
                            temp += "<td class=\"text-center\">" + obj[i][8] + "</td>";
                            temp += "</tr>";
                            totalpurchase += parseInt(obj[i][10]);
                        }
                        $("#btnExport").css("display", "block");
                        $("#btnExport").addClass("pull-right");
                    }
                    $("#table-body-vendor").html(temp);  
                    $("#label-total-pembelian").html("Total Pembelian: Rp " + addCommas(totalpurchase));
                },
            }); 
        }
        
        
        function fnExcelReport()
        {
            //==== Cara 1
//            var tab_text="<table border='2px'><tr bgcolor='red'>";
//            var textRange; var j=0;
//            tab = document.getElementById('my-table'); // id of table
//
//            for(j = 0 ; j < tab.rows.length ; j++) 
//            {     
//                tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
//                //tab_text=tab_text+"</tr>";
//            }
//
//            tab_text=tab_text+"</table>";
//            tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
//            tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
//            tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
//
//            var ua = window.navigator.userAgent;
//            var msie = ua.indexOf("MSIE "); 
//
//            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
//            {
//                txtArea1.document.open("txt/html","replace");
//                txtArea1.document.write(tab_text);
//                txtArea1.document.close();
//                txtArea1.focus(); 
//                sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
//            }  
//            else                 //other browser not tested on IE 11
//                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
//
//            return (sa);

            //==== CARA 2 WITH FILENAME CHANGE
            var dt = new Date();
            var day = dt.getDate();
            var month = dt.getMonth() + 1;
            var year = dt.getFullYear();
            //var hour = dt.getHours();
            //var mins = dt.getMinutes();
            var postfix = day + "-" + month + "-" + year;
            //creating a temporary HTML link element (they support setting file names)
            var a = document.createElement('a');
            //getting data from our div that contains the HTML table
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('my-table');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            //console.log(table_html);
            a.href = data_type + ', ' + table_html;
            //setting the file name
            a.download = 'Laporan Pembelian - ' + postfix + '.xls';
            //triggering the function
            a.click();
            //just in case, prevent default behaviour
            e.preventDefault();
        }
        
        function addCommas(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
            }
            return x1 + x2;
        }
        
    </script>

</body>

</html>
