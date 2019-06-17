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
<<<<<<< HEAD
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
                    $tgl            = $core->filter_xss($_POST['tgl_dftr']); //tgl_dftr
                    $nama_lengkap   = $core->filter_xss($_POST['nama_lengkap']); //nama_lengkap
                    $ttl            = $core->filter_xss($_POST['ttl']); //ttl
                    $jenkel         = $core->filter_xss($_POST['jenkel']); //jenkel
                    $agama          = $core->filter_xss($_POST['agama']); //agama
                    $alamat         = $core->filter_xss($_POST['alamat']); // alamat
                    $transportasi   = $core->filter_xss($_POST['transportasi']); // transportasi
                    $hp             = $core->filter_xss($_POST['hp']); // hp
                    $email          = $core->filter_xss($_POST['email']); //email
                    $nama_ayah      = $core->filter_xss($_POST['nama_ayah']); //nama_ayah
                    $pekerjaan_ayah = $core->filter_xss($_POST['pekerjaan_ayah']); // pekerjaan_ayah
                    $nama_ibu       = $core->filter_xss($_POST['nama_ibu']); // nama_ibu
                    $pekerjaan_ibu  = $core->filter_xss($_POST['pekerjaan_ibu']); //pekerjaan_ibu
                    $nama_wali      = $core->filter_xss($_POST['nama_wali']); // nama_wali
                    $pekerjaan_wali = $core->filter_xss($_POST['pekerjaan_wali']); // pekerjaan_wali
                    $anakke         = $core->filter_xss($_POST['anakke']); // anakke
                    $saudara        = $core->filter_xss($_POST['saudara']); // saudara
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

                    $db->query("UPDATE data_casis SET nama_lengkap='$nama_lengkap', jenkel='$jenkel', ttl='$ttl', agama='$agama', alamat='$alamat', transportasi='$transportasi', hp='$hp', email='$email', nama_ayah='$nama_ayah', pekerjaan_ayah='$pekerjaan_ayah', nama_ibu='$nama_ibu', pekerjaan_ibu='$pekerjaan_ibu', nama_wali='$nama_wali', pekerjaan_wali='$pekerjaan_wali', anakke='$anakke', saudara='$saudara' WHERE id_casis='$id_casis'");
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
=======
        } elseif ($_GET['ke'] == 'detail') {
            if ($_SESSION['rol_log'] == 'super-admin' || $_SESSION['rol_log'] == 'tata-usaha' || $_SESSION['rol_log'] == 'keuangan') {
                include getInc() . "admin/detail-siswa.php";
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
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
<<<<<<< HEAD
                echo "<title>Daftar Tagihan Peserta Didik Baru | PPDB SMK Walisongo Pecangaan</title>";
=======
                echo "<title>Daftar Tagihan Siswa Baru | PPDB SMK Walisongo Pecangaan</title>";
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
                include getInc() . "admin/tagihan/index.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
        } elseif ($_GET['ex'] == 'add') {
            if ($_SESSION['rol_log'] == 'super-admin') {
<<<<<<< HEAD
                echo "<title>Tambah Daftar Tagihan Peserta Didik Baru | PPDB SMK Walisongo Pecangaan</title>";
=======
                echo "<title>Tambah Daftar Tagihan Siswa Baru | PPDB SMK Walisongo Pecangaan</title>";
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
                include getInc() . "admin/tagihan/add.php";
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }
        }
    }
    ?>