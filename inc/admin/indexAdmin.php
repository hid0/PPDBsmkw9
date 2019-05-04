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
        } elseif ($_GET['ke'] == 'dashboard') {
            if ($_SESSION['rol_log'] == 'super-admin' || $_SESSION['rol_log'] == 'tata-usaha' || $_SESSION['rol_log'] == 'keuangan') {
                include getInc() . "admin/daftar_siswa.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
        } elseif ($_GET['ke'] == 'detail') {
            if ($_SESSION['rol_log'] == 'super-admin' || $_SESSION['rol_log'] == 'tata-usaha' || $_SESSION['rol_log'] == 'keuangan') {
                include getInc() . "admin/detail-siswa.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
        }
    } elseif ($_GET['a'] == 'bayar') {
        // Bersisi list data pembayaran dan tambah data pembayaran
        if ($_GET['ke'] == 'list') {
            if ($_SESSION['rol_log'] == 'super-admin' || $_SESSION['rol_log'] == 'keuangan') {
                include getInc() . "admin/bayar_list.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
        } elseif ($_GET['ke'] == 'tambah') {
            // echo "Tambah data pembayaran";
            if ($_SESSION['rol_log'] == 'super-admin' || $_SESSION['rol_log'] == 'keuangan') {
                echo "<title>Tambah Pembayaran Siswa | PPDB SMK Walisongo Pecangaan</title>";
                include getInc() . "admin/bayar_tambah.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
        }
    } elseif ($_GET['a'] == 'export') {
        if ($_GET['data'] == 'siswa') {
            include getInc() . "admin/exportSiswa.php";
        }
    } elseif ($_GET['a'] == 'logout') {
        session_destroy();
        $core->redirect('?');
    } elseif ($_GET['a'] == 'setting') {
        // echo "ini halaman pengaturan ";
        echo "<title>Halaman Setting | PPDB SMK Walisongo Pecangaan</title>";
        include getInc() . "admin/setting.php";
    } elseif ($_GET['a'] == 'nagih') {
        if ($_GET['ex'] == '' || $_GET['ex'] == 'index') {
            if ($_SESSION['rol_log'] == 'super-admin') {
                echo "<title>Daftar Tagihan Siswa Baru | PPDB SMK Walisongo Pecangaan</title>";
                include getInc() . "admin/tagihan/index.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
        } elseif ($_GET['ex'] == 'add') {
            if ($_SESSION['rol_log'] == 'super-admin') {
                echo "<title>Tambah Daftar Tagihan Siswa Baru | PPDB SMK Walisongo Pecangaan</title>";
                include getInc() . "admin/tagihan/add.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
        }
    }
    ?>