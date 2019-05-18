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
            if (@$_GET['ac'] == 'del') {
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
        } elseif ($_GET['ke'] == 'detail') {
            if ($_SESSION['rol_log'] == 'super-admin' || $_SESSION['rol_log'] == 'tata-usaha' || $_SESSION['rol_log'] == 'keuangan') {
                include getInc() . "admin/detail-siswa.php";
                if (isset($_POST['savekabeh'])) {
                    // biodata
                    $tgl  = $core->filter_xss($_POST['tgl_dftr']); //tgl_dftr
                    $nama = $core->filter_xss($_POST['nama']); //nama_lengkap
                    $ttl  = $core->filter_xss($_POST['ttl']); //ttl
                    $jk   = $core->filter_xss($_POST['jk']); //jenkel
                    $agm  = $core->filter_xss($_POST['agm']); //agama
                    $alam = $core->filter_xss($_POST['alamat']); // alamat
                    $trans= $core->filter_xss($_POST['trans']); // transportasi
                    $hp   = $core->filter_xss($_POST['hp']); // hp
                    $email= $core->filter_xss($_POST['email']); //email
                    $bokap= $core->filter_xss($_POST['bokap']); //nama_ayah
                    $krj1 = $core->filter_xss($_POST['krjBokap']); // pekerjaan_ayah
                    $nyoka= $core->filter_xss($_POST['nyokap']); // nama_ibu
                    $krj2 = $core->filter_xss($_POST['krjNyokap']); //pekerjaan_ibu
                    $wali = $core->filter_xss($_POST['wali']); // wali
                    $krjw = $core->filter_xss($_POST['krjw']); // pekerjaan_wali
                    $ank  = $core->filter_xss($_POST['an']); // anakke
                    $sdr  = $core->filter_xss($_POST['sdr']); // saudara
                    // informasi pendaftaran
                    $jalor = $core->filter_xss($_POST['jalor']); // jalur_pendaftaran
                    $jur1  = $core->filter_xss($_POST['jur1']); // jurusan1
                    $jur2  = $core->filter_xss($_POST['jur2']); // jurusan2
                    $asal  = $core->filter_xss($_POST['asalsek']); // asal_sekolah
                    $alms  = $core->filter_xss($_POST['almsekas']); // alamat_asal_sekolah
                    $presak= $core->filter_xss($_POST['presak']); //prestasi_akademik
                    $presno= $core->filter_xss($_POST['presnon']); //prestasi_nonakademik
                    // nilai un
                    $mtk   = $core->filter_xss($_POST['mtk']);
                    $bindo = $core->filter_xss($_POST['bindo']);
                    $bing  = $core->filter_xss($_POST['bing']);
                    $ipa   = $core->filter_xss($_POST['ipa']);
                    // trespass
                    $rokok = $core->filter_xss($_POST['rokok']); // merokok
                    $tato  = $core->filter_xss($_POST['tato']); // bertato
                    $bk    = $core->filter_xss($_POST['bk']); // bk // berkebutuhan khusus
                    $bw    = $core->filter_xss($_POST['bw']); //bw // buta warna
                    $id_casis = $_GET['id'];
                    $idreg = $_GET['idr'];

                    $db->query("UPDATE data_casis SET nama_lengkap='$nama', jenkel='$jk', ttl='$ttl', agama='$agm', alamat='$alam', transportasi='$trans', hp='$hp', email='$email', nama_ayah='$bokap', pekerjaan_ayah='$krj1', nama_ibu='$nyoka', pekerjaan_ibu='$krj2', wali='$wali', pekerjaan_wali='$krjw', anakke='$ank', saudara='$sdr' WHERE id_casis='$id_casis' AND id_reg='$idreg'");
                    $db->query("UPDATE registrasi SET tgl_dftr='$tgl', jalur_pendaftaran='$jalor', jurusan1='$jur1', jurusan2='$jur2', asal_sekolah='$asal', alamat_asal_sekolah='$alms', prestasi_akademik='$presak', prestasi_nonakademik='$presno' WHERE id_reg='$idreg'");
                    $db->query("UPDATE trespass SET merokok='$rokok', bertato='$tato', bk='$bk', bw='$bw' WHERE id_casis='$id_casis'");
                    $db->query("UPDATE nilai_un SET mtk='$mtk', bindo='$bindo', bing='$bing', ipa='$ipa' WHERE id_casis='$id_casis'");
                    $core->redirect('?a=index');

                } elseif (isset($_POST['gentiGan'])) {
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