<?php

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
}

$filename = isset($_GET['filename']) ? ($_GET['filename']) : '';


//echo $sql;

//echo $filename;
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=".$filename.".xls");
// Tambahkan table
include 'data-report.php';

?>