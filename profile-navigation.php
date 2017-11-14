<?php
require './connection.php';
$iduserlogin = "";
$usernamelogin = "";
$nameuserlogin = "";
$kodeLogin = "";
$jabatanUserLogin = "";
$cabangUserLogin = 0;
if (isset($_SESSION["usernamelogin"])) {
    $usernamelogin = $_SESSION["usernamelogin"];
    $nameuserlogin = $_SESSION["usernameloginname"];
    $kodeLogin = $_SESSION["kodeLogin"];
} else {
    echo "<script>";
    echo "window.location.assign('index');";
    echo "</script>";
}
$read_status = $read_user = $read_vendor = $read_barang = $read_purchase = $read_reward = $read_jenis_reward = $read_contactperson = "0_0";
$update_status = $update_user = $update_privileges = $update_vendor = $update_barang = $update_purchase = $update_reward = $update_jenis_reward = $update_contactperson = "0_0";
$create_status = $create_user = $create_vendor = $create_barang = $create_purchase = $create_reward = $create_jenis_reward = $create_contactperson = "0_0";
$delete_vendor = $delete_barang = $delete_purchase = $delete_reward = $delete_jenis_reward = $delete_contactperson = "0_0";

$set_user_active = "0_0";
$create_laporan = "0_0";
$create_laporan_reward = "0_0";

$sql = "SELECT pd.id_privileges as priv, pd.id_user as user, u.name as namalogin, u.jabatan as jabatan, u.id_cabang as idcabang, u.kode as id_user ";
$sql .= "FROM db_privileges p ";
$sql .= "RIGHT JOIN db_privileges_detail pd ON pd.id_privileges = p.id ";
$sql .= "RIGHT JOIN db_user u ON u.kode = pd.id_user ";
$sql .= "WHERE u.username = '$usernamelogin' ORDER BY pd.id_privileges asc";


//echo $sql; exit;

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $iduserlogin = $row['id_user'];
        $namalogin = $row['namalogin'];
        $cabangUserLogin = $row['idcabang'];
        $jabatanUserLogin = $row['jabatan'];
            
        if ($row['jabatan'] == "admin") {
            $read_status = $read_user = $read_vendor = $read_barang = $read_purchase = $read_reward = $read_jenis_reward = $read_contactperson = "1_1";
            $update_status = $update_user = $update_privileges = $update_vendor = $update_barang = $update_purchase = $update_reward = $update_jenis_reward = $update_contactperson = "1_1";
            $create_status = $create_user = $create_vendor = $create_barang = $create_purchase = $create_reward = $create_jenis_reward = $create_contactperson = "1_1";
            $delete_vendor = $delete_barang = $delete_purchase = $delete_reward = $delete_jenis_reward = $delete_contactperson = "1_1";

            $set_user_active = "1_1";
            $create_laporan = "1_1";
            $create_laporan_reward = "1_1";
        } else {
            $row['priv'] == 1 ? $read_status = $row['priv'] . "_1" : "";
            $row['priv'] == 2 ? $create_status = $row['priv'] . "_1" : "";
            $row['priv'] == 3 ? $update_status = $row['priv'] . "_1" : "";

            $row['priv'] == 4 ? $read_user = $row['priv'] . "_1" : "";
            $row['priv'] == 5 ? $create_user = $row['priv'] . "_1" : "";
            $row['priv'] == 30 ? $update_user = $row['priv'] . "_1" : "";
            $row['priv'] == 6 ? $update_privileges = $row['priv'] . "_1" : "";
            $row['priv'] == 7 ? $set_user_active = $row['priv'] . "_1" : "";

            $row['priv'] == 8 ? $read_vendor = $row['priv'] . "_1" : "";
            $row['priv'] == 9 ? $create_vendor = $row['priv'] . "_1" : "";
            $row['priv'] == 10 ? $update_vendor = $row['priv'] . "_1" : "";
            $row['priv'] == 11 ? $delete_vendor = $row['priv'] . "_1" : "";

            $row['priv'] == 12 ? $read_barang = $row['priv'] . "_1" : "";
            $row['priv'] == 13 ? $create_barang = $row['priv'] . "_1" : "";
            $row['priv'] == 14 ? $update_barang = $row['priv'] . "_1" : "";
            $row['priv'] == 15 ? $delete_barang = $row['priv'] . "_1" : "";

            $row['priv'] == 16 ? $read_purchase = $row['priv'] . "_1" : "";
            $row['priv'] == 17 ? $create_purchase = $row['priv'] . "_1" : "";
            $row['priv'] == 18 ? $update_purchase = $row['priv'] . "_1" : "";
            $row['priv'] == 19 ? $delete_purchase = $row['priv'] . "_1" : "";

            $row['priv'] == 20 ? $create_laporan = $row['priv'] . "_1" : "";

            $row['priv'] == 21 ? $read_reward = $row['priv'] . "_1" : "";
            $row['priv'] == 22 ? $create_reward = $row['priv'] . "_1" : "";
            $row['priv'] == 23 ? $update_reward = $row['priv'] . "_1" : "";
            $row['priv'] == 24 ? $delete_reward = $row['priv'] . "_1" : "";

            $row['priv'] == 25 ? $create_laporan_reward = $row['priv'] . "_1" : "";

            $row['priv'] == 26 ? $read_jenis_reward = $row['priv'] . "_1" : "";
            $row['priv'] == 27 ? $create_jenis_reward = $row['priv'] . "_1" : "";
            $row['priv'] == 28 ? $update_jenis_reward = $row['priv'] . "_1" : "";
            $row['priv'] == 29 ? $delete_jenis_reward = $row['priv'] . "_1" : "";
            
            $row['priv'] == 30 ? $read_contactperson = $row['priv'] . "_1" : "";
            $row['priv'] == 31 ? $create_contactperson = $row['priv'] . "_1" : "";
            $row['priv'] == 32 ? $update_contactperson = $row['priv'] . "_1" : "";
            $row['priv'] == 33 ? $delete_contactperson = $row['priv'] . "_1" : "";
        }
    }
}

if (sizeof($_SESSION) < 1) {
    echo "<script>window.location.assign('index');</script>";
}

function tanggal_indo($tanggal) {
    $bulan = array(1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
}
?>
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="rewards">ayooreward</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right">  

            <?php if ($read_reward != "0_0") : ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tags"></i>&nbsp;&nbsp;Reward <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="rewards"><i class="fa fa-fw fa-tags"></i> Daftar Reward</a>
                        </li>
                        <?php if ($create_laporan_reward != "0_0"): ?>
                            <li class="divider"></li>
                            <li>
                                <a href="laporan-rewards"><i class="fa fa-fw fa-file-text-o"></i> Laporan</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>   
            <?php endif; ?>

            <?php if ($read_jenis_reward != "0_0") : ?>
                <li class="">
                    <a href="jenis-reward" ><i class="fa fa-bookmark-o"></i>&nbsp;&nbsp;Jenis Reward</a>
                </li>
            <?php endif; ?>

            <?php if ($read_vendor != "0_0") : ?>
                <li class="">
                    <a href="vendor" ><i class="fa fa-building-o"></i>&nbsp;&nbsp;Vendor</a>
                </li>  
            <?php endif; ?>
                <li class="">
                    <a href="brand" ><i class="fa fa-tags"></i>&nbsp;&nbsp;Brand</a>
                </li> 

            <?php if ($read_user != "0_0") : ?>
                <li class="">
                    <a href="user" ><i class="fa fa-users"></i>&nbsp;&nbsp;User</a>
                </li>  
            <?php endif; ?>

            <?php if ($jabatanUserLogin == "admin") : ?>
                <li class="">
                    <a href="cabang"><i class="fa fa-tags"></i>&nbsp;&nbsp;Cabang</a>
                </li>  
            <?php endif; ?>
                
            <?php if ($read_contactperson != "0_0") : ?>
                <li class="">
                    <a href="contactperson"><i class="fa fa-tags"></i>&nbsp;&nbsp;Kontak Person</a>
                </li>  
            <?php endif; ?>

            <?php if ($read_status != "0_0") : ?>
                <li class="">
                    <a href="status" ><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp; Master Status</a>
                </li>   
            <?php endif; ?>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="" style="cursor: help !important;">
                        <a style="padding-top: 10px; padding-bottom: 10px; cursor: help !important;" id="nama-user-login"><i class="fa fa-fw fa-user"></i> Hai, <?php echo $nameuserlogin; ?></a>
                    </li>
                    <li>
                        <a href="change-password" style="padding-top: 10px; padding-bottom: 10px; cursor: pointer !important"><i class="fa fa-fw fa-gears"></i> Ubah Password </a>
                    </li>
                    <!--                <li class="divider"></li>-->
                    <li>
                        <a style="padding-top: 10px; padding-bottom: 10px;" accesskey=""href="logout"><i class="fa fa-fw fa-power-off"></i> Keluar</a>
                    </li>
                </ul>
            </li>  
        </ul>
    </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->