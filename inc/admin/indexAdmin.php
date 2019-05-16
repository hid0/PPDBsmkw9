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
                echo "<title>Dashboard Admin | PPDB SMK Walisongo</title>";
                include getInc() . "admin/daftar_siswa.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
            if ($_GET['act'] == 'hapus') {
                if ($_SESSION['rol_log'] == 'super-admin') {
                    $db->delete('data_casis', ['id_reg' => $_GET['idr']]);
                    $db->delete('trespass', ['id_casis' => $_GET['idc']]);
                    $db->delete('nilai_un', ['id_reg' => $_GET['idr']]);
                    $core->redirect('?a=index');
                    echo "<script>alert('Berhasil Terhapus!!!')</script>";
                } elseif ($_SESSION['rol_log'] != 'super-admin') {
                    $core->redirect('?a=index');
                    echo "<script>alert('Ente Bukan Admin....')</script>";
                }
            }
            if ($_GET['act'] == 'hapus') {
                if ($_SESSION['rol_log'] == 'super-admin') {
                    $db->delete('data_casis', ['id_reg' => $_GET['idr']]);
                    $db->delete('trespass', ['id_casis' => $_GET['idc']]);
                    $db->delete('nilai_un', ['id_reg' => $_GET['idr']]);
                    echo "<script>alert('Berhasil Terhapus!!!')</script>";
                    $core->redirect('?a=index');
                } else {
                    $core->redirect('?a=index');
                    echo "<script>alert('Ente Bukan Admin....')</script>";
                }
            }
        } elseif ($_GET['ke'] == 'detail') {
            if ($_SESSION['rol_log'] == 'super-admin' || $_SESSION['rol_log'] == 'tata-usaha' || $_SESSION['rol_log'] == 'keuangan') {
                include getInc() . "admin/detail-siswa.php";
                if (isset($_POST['gentiGan'])) {
                    // $q = $db->update('registrasi',['status' => $_POST['status']],['id_reg' => $_POST['id']]);
                    if ($_POST['newPass'] == $_POST['newPass1']) {
                        $db->update('registrasi', ['password_login' => md5($_POST['newPass1'])], ['id_reg' => $_POST['iduser']]);
                        echo "<script>alert('Changed!!!')</script>";
                    } elseif ($_POST['newPass'] != $_POST['newPass1']) {
                        echo "<script>alert('Password Tidak Cocok!!!')</script>";
                    } else {
                        echo "<script>alert('Error!!!')</script>";
                    }
                }
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
                echo "<title>Daftar Tagihan Peserta Didik Baru | PPDB SMK Walisongo Pecangaan</title>";
                include getInc() . "admin/tagihan/index.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
        } elseif ($_GET['ex'] == 'add') {
            if ($_SESSION['rol_log'] == 'super-admin') {
                echo "<title>Tambah Daftar Tagihan Peserta Didik Baru | PPDB SMK Walisongo Pecangaan</title>";
                include getInc() . "admin/tagihan/add.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
        }
    }
    ?>