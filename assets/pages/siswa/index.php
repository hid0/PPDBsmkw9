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

if (empty($_GET['page']) || $_GET['page'] == 'dashboard') {
    include getPages()."siswa/dashboard.php";
    echo "<title>Dashboard Siswa | PPDB SMK Walisongo</title>";
} elseif ($_GET['page'] == 'payments') {
    if ($_GET['a'] == 'history') {
        echo "<title>Riwayat Pembayaran | PPDB SMK Walisongo Pecangaan</title>";
        include getPages()."siswa/list_bayar.php";
    } elseif ($_GET['a'] == 'invoice') {
        // echo "Ini halaman nageh utang";
        echo "<title>Halaman Tagihan Siswa Baru | PPDB SMK Walisongo Pecangaan</title>";
        include getPages()."siswa/tagihan.php";
    }
} else if (@$_GET['page'] == 'logout') {
    // ? echo "<script>document.location.href = '?';</script>";
    session_destroy();
    $core->redirect('?');
}


?>