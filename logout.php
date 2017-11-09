<?php
// Start the session
session_start();
?>
<?php
    unset($_SESSION['usernamelogin']);
    unset($_SESSION['usernameloginname']);
    unset($_SESSION['kodeLogin']);
    echo "<script>";
    echo "localStorage.setItem('session_login_ayooklik', '');";
    echo "localStorage.setItem('session_login_ayooklik', '');";
    echo "window.location.assign('index');";
    echo "</script>";
?>