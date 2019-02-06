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

    if (empty($_GET['ke'])) {
        $core->redirect('?a=index&ke=dashboard');
    }

    if ($_GET['ke'] == 'dashboard') {
        include getInc()."admin/daftar_siswa.php";
    }

    if ($_GET['ke'] == 'detail') {
        include getInc()."admin/detail-siswa.php";
    }

} elseif($_GET['a'] == 'bayar') {
    // Bersisi list data pembayaran dan tambah data pembayaran
    if ($_GET['ke'] == 'list') {
        include getInc()."admin/bayar_list.php";
    } elseif ($_GET['ke'] == 'tambah') {
        // echo "Tambah data pembayaran";
        include getInc()."admin/bayar_tambah.php";
    }
} elseif ($_GET['a'] == 'export') {
    if ($_GET['data'] == 'siswa') {
        include getInc()."admin/exportSiswa.php";
    }
} elseif ($_GET['a'] == 'logout') {
    session_destroy();
    $core->redirect('?');
}
?>