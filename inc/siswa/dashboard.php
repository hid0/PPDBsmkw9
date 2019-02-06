<section class="content-header">
    <!-- <h1>
        Dashboard
        <small>Version 2.0</small>
    </h1> -->
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol> -->
</section>
<!-- Main content -->
<section class="content">

<?php

if (empty($_GET['a']) || $_GET['a'] == 'index') {

    include getInc()."siswa/details.php";

} elseif ($_GET['a'] == 'pembayaran') {
    if ($_GET['ke'] == 'history') {
        include getInc()."siswa/list_bayar.php";
    } elseif ($_GET['ke'] == 'tagihan') {
        echo "Ini halaman nageh utang";
    }
} elseif ($_GET['a'] == 'logout') {
    session_destroy();
    $core->redirect('?');
}


?>