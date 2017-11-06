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

        <title>New Order - ayooreward!</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS /// NO NEED -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <link href="datepicker/css/jquery.datepicker.css" rel="stylesheet" type="text/css"/>	
        
        <script src="sweetalert/dist/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
        
        
        <link href="select-filter/css/select2.min.css" rel="stylesheet" />
        
        <style>
            .form-group .select2-container {
                width: 100% !important;
            }
            .form-group .select2-selection {
                height: 35px;
                padding-top: 3px;
                border: 1px solid #ccc;
                border-radius: 0px;
                
            }
            #inp_reward, #val-reward {
                display: none;
            }
            .validation-text {
                font-style: italic;
            }
            
            #myInput {
                background-image: url('assets/search-icon.png');
                background-position: 10px 12px;
                background-repeat: no-repeat;
                background-size: 25px;
                background-position-y: 15px;
                width: 100%;
                font-size: 16px;
                padding: 15px;
                padding-left: 40px;
                border: 1px solid #ddd;
                margin-bottom: 12px;
            }
            #myUL {
                font-size: 15px;
            }
        </style>         
    </head>

<body>
    <?php $currentpage = "sponsorship";?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php require 'profile-navigation.php'; ?>
        <?php 
            echo "<script>";
            if ($create_purchase == "0_0") {
                echo "window.location.href = 'beranda';";
            }
            echo "</script>";
        ?> 
    </nav>

    <div id="page-wrapper" style="padding-bottom: 100px;">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <strong>NEW ORDER</strong>
                    </h1>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default siku">
                        <div class="panel-heading">
                          <h3 class="panel-title">DAFTAR BARANG</h3>
                        </div>
                        <div class="panel-body">
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari berdasarkan nama barang..." title="Type in a name">
                            <ul id="myUL" class="list-group siku" style="max-height: 250px; overflow-y: auto;">
  
                            <?php

                            require './connection.php';

                            $sql = "SELECT id, kode_barang, nama, deskripsi, created_at, updated_at "
                                    . "FROM db_barang where isDelete = 0;";                            

                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                $nomor = 1;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<li class=\"list-group-item siku\"> <a class=\"badge badge-item\" id='item-" . $row['id'] . "' onclick='setPicked(this.id)' style='cursor: pointer;'>Pilih</a>";
                                    echo "<span id='item-name-" . $row['id'] . "'>" . $row['nama'] . "</span>";
                                    echo "</li>";
                                }
                            }
                            
                            mysqli_close($con);
                            ?>
                            </ul>
                            
                            <div class="">
                                <label>Keterangan Pembelian Barang</label>
                                <textarea class="form-control" id="cart-keterangan" placeholder="Tambahkan keterangan pembelian barang" style="margin-bottom: 10px; resize: none;"></textarea>
                                <button type="button" class="btn btn-default siku full-width" name="submit"  onclick="addtocart()"><i class="fa fa-shopping-cart"> </i> Tambahkan ke Pembelian</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default siku">
                        <div class="panel-heading">
                          <h3 class="panel-title">DATA PEMBELIAN</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="status" style="">
                                <div class="form-group col-md-4">
                                    <label>Tanggal Beli</label>
                                    <input class="form-control siku" id="inp_tanggal-beli" data-select="datepicker" accept="" readonly="true" onclick="removeError(this.id)" placeholder="Pilih Tanggal Beli" style="background-color: White; cursor: pointer;" />
                                    <i class="validation-text" id="val-inp_tanggal-beli"></i>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Nama Pembelian</label>
                                    <input class="form-control siku" id="inp_nama-beli" onkeyup="removeError(this.id)" placeholder="Masukkan Nama Pembelian">
                                    <i class="validation-text" id="val-inp_nama-beli"></i>
                                </div>
                                <div class="row"></div>
                                <div class="form-group col-md-4">
                                    <label>No Invoice</label>
                                    <input class="form-control siku" id="inp_noinvoice" onkeyup="removeError(this.id)" placeholder="Masukkan Nomor Invoice">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>No PO</label>
                                    <input class="form-control siku" id="inp_nopo" onkeyup="removeError(this.id)" placeholder="Masukkan Nomor PO">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>No DO</label>
                                    <input class="form-control siku" id="inp_nodo" onkeyup="removeError(this.id)" placeholder="Masukkan Nomor DO">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Vendor</label>
                                    <select id="inp_vendor" onchange="removeError(this.id)">
                                        <option value="0">Pilih Vendor</option>
                                        <?php
                                    
                                        require './connection.php';

                                        $sql = "SELECT kode, nama, email, telp, alamat, keterangan, status_hapus, created_at, updated_at 
                                                FROM db_vendor 
                                                Where status_hapus = 0 
                                                order by nama ASC;";                            

                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='". $row['kode'] ."'>" . $row['nama'] . "</option>";
                                            }
                                        }
                                        mysqli_close($con);
                                        ?>
                                    </select>
                                    <i class="validation-text" id="val-inp_vendor"></i>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Total Pembelian</label>
                                    <input class="form-control siku" id="inp_totalbeli" onkeyup="removeError(this.id)" placeholder="Masukkan Total Pembelian">
                                    <i class="validation-text" id="val-inp_totalbeli"></i>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Reward</label>
                                    <br/>
                                    <label class="radio-inline">
                                        <input type="radio" name="rdo_reward" id="rdo-noreward" value="0" onclick="toggleReward(0)"> Tidak Ada Reward
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rdo_reward" id="rdo-reward" value="1" onclick="toggleReward(1)"> Ada Reward
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="rdo_reward" id="rdo-notsurereward" value="2" onclick="toggleReward(2)"> Belum Tentu Ada Reward
                                    </label>
                                    <textarea class="form-control" id="inp_reward" placeholder="Reward dari pembelian" rows="3" style="margin-top: 7px; resize: none;"></textarea>
                                    <div class="validation-text" id="val-reward"><i>Silahkan pilih ketentuan Reward terlebih dahulu.</i></div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Daftar Barang yang dibeli</label>
                                    <ul class="list-group siku" id="list-cart-item"></ul>
                                </div>
                                <div class="form-group col-md-12" style="margin-top: 0px;">
                                    <button type="button" class="btn btn-primary siku full-width" name="submit" onclick="savePurchase()"><i class="fa fa-save"> </i> Simpan Pembelian</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
    
    <script type="text/javascript" src="datepicker/js/jquery.datepicker.js"></script>
    <script src="select-filter/js/select2.min.js"></script>
    
    <script type="text/javascript">
        $('select').select2();
    </script>
    
    <script>
    function myFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("span")[0];
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";

            }
        }
    }
    </script>
    <script>
        var arrCart = new Array();
        var index = 0; 
        var getCodeItem = "";
        var getNameItem = "";
        function addtocart() {
            getDescItem = $("#cart-keterangan").val().trim();
            if (getCodeItem === "") {
                alert("Pilih Barang yang dibeli");
            } else {
                $(".badge-item").html("Pilih");    
                $(".badge-item").css("background-color", "#777");
                
                arrCart[index] = new Array(getCodeItem, getNameItem, getDescItem, "1");
                
                var temp =  "<li class=\"list-group-item siku\" id=\"cart-item-"+ index +"\">";
                    temp += "    <span class=\"badge\" style=\"background-color: #d9534f; cursor: pointer;\" onclick='deleteArray("+index+")'>Hapus</span>" + getNameItem + "<br/>";
                    temp += "    <strong>Keterangan:</strong> " + getDescItem;
                    temp += "</li>";
                $("#list-cart-item").append(temp);

            
                $("#cart-keterangan").val("");
                getCodeItem = "";
                getNameItem = "";
                getDescItem = "";
                index++;
                
                console.log(arrCart);
            }
            
        }
        function setPicked(id) {
            var temp = id.split('-');
            getCodeItem = temp[1];
            getNameItem = $("#item-name-" + temp[1]).html();
            
            
            $(".badge-item").html("Pilih");    
            $(".badge-item").css("background-color", "#777");
            
            $("#" + id).html("Dipilih");            
            $("#" + id).css("background-color", "#5cb85c");
            
            //console.log(temp[1]);
        }
        
        function deleteArray(index) {
            arrCart[index][3] = "0";
            $("#cart-item-" + index).remove();
            
            console.log(arrCart);
        }
        
        function savePurchase(){
            var subject       = $("#inp_nama-beli").val().trim();
            var vendor        = $("#inp_vendor").val().trim();
            var tanggalbeli   = $("#inp_tanggal-beli").val().trim();
            var namapembelian = $("#inp_nama-beli").val().trim();
            var noinvoice     = $("#inp_noinvoice").val().trim();
            var nopo          = $("#inp_nopo").val().trim();
            var nodo          = $("#inp_nodo").val().trim();
            var totalbeli     = $("#inp_totalbeli").val().trim().replace(/,/g, '');;
            
            var reward        = $("#inp_reward").val().trim();
            var valuereward   = $('input[name=rdo_reward]:checked').val();
            var tempDate = tanggalbeli.split("/");
            var datepurchase = tempDate[2] + "-" + tempDate[1] + "-" + tempDate[0]; 
            
            var isError = false;
            var isExistItem = 0;
            
            if (tanggalbeli === "") {
                $("#val-inp_tanggal-beli").html("Tanggal beli harus diisi.");
                isError = true;
            }
            if (!namapembelian) {
                $("#val-inp_nama-beli").html("Nama pembelian harus diisi.");
                isError = true;
            }
            if (!totalbeli) {
                $("#val-inp_totalbeli").html("Total Pembelian harus diisi.")
                isError = true;
            }
            if (valuereward === undefined) {
                $("#val-reward").css("display", "block");                
                isError = true;
            } 
            if (vendor === "0") {
                $("#val-inp_vendor").html("Silahkan pilih vendor pembelian.");
                isError = true;
            }
            
            
            
            if (arrCart.length <= 0) {
                isError = true;
                //alert("Keranjang kosong");
                swal("Gagal !! Harus ada minimal 1 barang yang ditambahkan dalam pembelian.");
            } else {
                for(var i = 0; i < arrCart.length; i++) {
                    if (arrCart[i][3] === "1") {
                        isExistItem++;
                    }
                }
                if (isExistItem === 0) {
                    swal("Gagal !! Harus ada minimal 1 barang yang ditambahkan dalam pembelian.")
                    isError = true;
                }
            }
            
            //alert(reward);
            //alert(valuereward);
            console.log(arrCart);
            
            
            var id_session = localStorage.getItem('session_login_id_ayooklik');
           
            if (!isError) {
                url = "ajax/create_purchase.php",
                $.ajax({
                    url: url,
                    data: {
                       subject: subject,
                       vendor: vendor,
                       tanggalbeli: datepurchase,
                       namapembelian: namapembelian,
                       noinvoice: noinvoice,
                       nopo: nopo,
                       nodo: nodo,
                       totalbeli: totalbeli,
                       reward: reward,
                       valuereward: valuereward,
                       iduser: id_session,
                       arrCart: arrCart
                    },
                    success: function(data, textStatus, jqXHR) {
                        var result = data.replace(/\s/g,'');;
                        if (result != "0"){
                            swal({
                                title: "Berhasil buat pembelian baru",
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
                                    var url = window.location.href;   
                                    window.location.href = "tambah-pembelian";
                                    window.open(url + '-report' + "?q=" + result);
                                }
                            });   
                        } else {
                            alert("Ada kesalahan dalam penginputan data.");
                        }
                    }
                });
            } else {
                //window.scrollTo(0,0);
            }
        }
    </script>
    
    <script type="text/javascript">
        $('#inp_totalbeli').keyup(function(event){
            if (event.which >= 96 && event.which <= 105) {
                var $this = $(this);
                //=== Remove 0 on the front
                var num = $this.val().replace(/^0+/, '');
                //=== Remove ","
                num = num.replace(/,/g, '');
                $this.val(thousandSeparator(num));
            } else {
                event.preventDefault();
            }
        });
    </script>
  
    <script type="text/javascript">
        function toggleReward(value) {
            $("#val-reward").css("display", "none");
            if (value === 0) {
                $("#inp_reward").val("");
                $("#inp_reward").css("display", "none");
            } else {
                $("#inp_reward").css("display", "block");
            }
        }
    </script>
    
    <script>
        function thousandSeparator(nStr) {
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
    
    <script type="text/javascript">
        function removeError(id){
            $("#val-" + id).html("");
        }
    </script>

</body>

</html>
