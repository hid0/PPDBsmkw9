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
    echo "<title>Dashboard Siswa | PPDB SMK Walisongo</title>";
} elseif ($_GET['a'] == 'pembayaran') {
    if ($_GET['ke'] == 'history') {
        echo "<title>Riwayat Pembayaran | PPDB SMK Walisongo Pecangaan</title>";
        include getInc()."siswa/list_bayar.php";
    } elseif ($_GET['ke'] == 'tagihan') {
        // echo "Ini halaman nageh utang";
        echo "<title>Halaman Tagihan Siswa Baru | PPDB SMK Walisongo Pecangaan";
        include getInc()."siswa/tagihan.php";
    }
} elseif ($_GET['a'] == 'logout') {
    session_destroy();
    $core->redirect('?');
}


?>