<?php 
    $sidemenu_beranda = "";
    $sidemenu_user = "";
    $sidemenu_event = "";
    $sidemenu_vendor = "";
    $sidemenu_sponsorship = "";
    $sidemenu_transaction = "";
    
    if ($currentpage == "beranda") {
        $sidemenu_beranda = "active";
    }
    if ($currentpage == "user") {
        $sidemenu_user = "active";
    }
    if ($currentpage == "event") {
        $sidemenu_event = "active";
    }
    if ($currentpage == "vendor") {
        $sidemenu_vendor = "active";
    }
    if ($currentpage == "sponsorship") {
        $sidemenu_sponsorship = "active";
    }
    if ($currentpage == "transaction") {
        $sidemenu_transaction = "active";
    }
?>
<li class="<?php echo $sidemenu_beranda;?>">
    <a href="beranda">Dashboard</a>
</li>
<!--<li class="">
    <a href="forms">Form</a>
</li>-->
<li class="<?php echo $sidemenu_user;?>">
    <a href="user">User</a>
</li>
<li class="<?php echo $sidemenu_event;?>">
    <a href="event">Event</a>
</li>
<li class="<?php echo $sidemenu_vendor;?>">
    <a href="vendor">Vendor</a>
</li>
<li class="<?php echo $sidemenu_sponsorship;?>">
    <a href="sponsorship">Sponsorship</a>
</li>
<li class="<?php echo $sidemenu_transaction;?>">
    <a href="transaction">Transaction</a>
</li>