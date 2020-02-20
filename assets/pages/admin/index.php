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

        if (empty($_GET['act'])) {

            if ($_SESSION['rol_log'] == 'super-admin' || $_SESSION['rol_log'] == 'tata-usaha') {
                echo "<title>Dashboard | Penerimaan Peserta Didik Baru SMK Walisongo Pecangaan</title>";
                include getPages() . "admin/daftar_siswa.php";
                if (isset($_POST['status'])) {
                    $q = $db->update('new_students', ['status' => $_POST['status']], ['id' => $_POST['id']]);
                    $core->redirect('admin.php?page=dashboard');
                }
            } else if ($_SESSION['rol_log'] == 'keuangan') {

                echo "<title>Dashboard | Penerimaan Peserta Didik Baru SMK Walisongo Pecangaan</title>";
                include getPages() . "admin/dashboard.php";
                
            } else {
                echo "<title>Error 405 Access Denied!!!</title>";
                echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
            }

        } else if (@$_GET['act'] == 'del') {

            if ($_SESSION['rol_log'] == 'super-admin') {

                $db->delete('new_students', ['id' => $_GET['id']]);
                echo "<script>alert('Berhasil Terhapus!!!')</script>";
                $core->redirect('?page=dashboard');

            } elseif ($_SESSION['rol_log'] != 'super-admin') {

                echo "<script>alert('Selain Super Admin Tidak Menghapus!!!')</script>";
                $core->redirect('?page=dashboard');

            }
        } else if ($_GET['act'] == 'details') {

            require getPages().'admin/detail-siswa.php';
            
        }
        
    } else if ($_GET['page'] == 'auth') {

        if ($_GET['sign'] == 'in') {

            // require getPages().'admin/login.php';

        } else if ($_GET['sign'] == 'out') {

            session_destroy();
            $core->redirect('?');

        }
        
    } else if ($_GET['page'] == 'payments') {

        if ($_SESSION['rol_log'] == 'super-admin' || $_SESSION['rol_log'] == 'keuangan') {
            if (empty($_GET['act'])) {
                include getPages() . "admin/bayar_list.php";
                if (isset($_POST['save'])) {
                    $sis = $core->filter_xss($_POST['siswa']);
                    $tgl = $core->filter_xss($_POST['tgl_setor']);
                    $jml = $core->filter_xss($_POST['jml_setor']);
                    $pet = $core->filter_xss($_POST['petugas']);

                    $byr = array('', $sis, $tgl, $jml, $pet);

                    if ($db->insert('pembayaran', $byr)) {
                        echo "<script>alert('Pembayaran Telah Diterima');</script>";
                        $core->redirect('?page=payments');
                    } else {
                        echo "<script>alert('Gagal Nambah Data!!');</script>";
                    }
                }
            } else if (@$_GET['act'] == 'del') {
                $db->delete('pembayaran', ['id_bayar' => $_GET['id']]);
                $core->redirect('?page=payments');
            }
        } else {
            echo "<title>Error 405 Access Denied!!!</title>";
            echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
        }
        
    } else if ($_GET['page'] == 'setting') {
        // echo "ini halaman pengaturan ";
        echo "<title>Pengaturan | PPDB SMK Walisongo Pecangaan</title>";
        include getPages() . "admin/setting.php";

        if (isset($_POST['passku'])) {
            if ($_POST['pass1'] == $_POST['pass2']) {
                $db->update('padmin', ['password' => sha1($_POST['pass2'])], ['username' => $user]);
                echo "<script>alert('Password Telah diganti!!');</script>";
            } elseif ($_POST['pass1'] != $_POST['pass2']) {
                echo "<script>alert('Pastikan Password sama!!!');</script>";
            }
        } elseif (isset($_POST['theme'])) {
            $db->update('padmin', ['theme' => $_POST['theme']], ['username' => $user]);
            echo '<script type=\"text/javascript\">alertSuccess();</script>';
            $core->redirect('?page=setting');
        } elseif (isset($_POST['profile'])) {
            $db->update('padmin', ['profile' => $_POST['profile']], ['username' => $user]);
            // echo '<script type=\"text/javascript\">alert(\"Berhasil Ganti Profile!!!\");</script>';
            echo "<script>alert('Berhasil Ganti!!!');</script>";
            $core->redirect('?page=setting');
        }
    } else if ($_GET['page'] == 'invoice') {
        
        if ($_SESSION['rol_log'] == 'super-admin') {
            if (empty($_GET['act'])) {
                
                echo "<title>Daftar Tagihan Peserta Didik Baru | PPDB SMK Walisongo Pecangaan</title>";
                include getPages() . "admin/tagihan.php";
                if (isset($_POST['save'])) {
                    $nm  = $core->filter_xss($_POST['name']);
                    $rp  = $core->filter_xss($_POST['rp']);
                    $for = $core->filter_xss($_POST['for']);
                    $ket = $core->filter_xss($_POST['ket']);
                    // ! data tampung dalam array
                    
                    $dataTag = array('', $nm, $rp, $for, $ket);
                    
                    var_dump($dataTag);
                    
                    if ($db->insert('tagihan', $dataTag)) {
                        echo "<script>alert('Data Berhasil Tersimpan!!!');</script>";
                        // ? echo "<script>javascript:history.back();</script>";
                        $core->redirect('?page=invoice');
                    } else {
                        echo "<script>alert('Gagal Masukin Data');</script>";
                    }
                }
                
            } else if (@$_GET['act'] == 'del') {
                $db->delete('tagihan', ['id' => $_GET['id']]);
                $core->redirect('?page=invoice');
            }
        } else {
            echo "<title>Error 405 Access Denied!!!</title>";
            echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
        } 
    } else if ($_GET['page'] == 'users') {
        
        if ($_SESSION['rol_log'] == 'super-admin') {
            
            if (empty($_GET['act'])) {
                
                echo "<title>Daftar Akun | PPDB SMK Walisongo Pecangaan</title>";
                include getPages() . "admin/pengguna.php";
                // todo adding new username
                if (isset($_POST['save'])) {
                    
                    $nama = $core->filter_xss($_POST['name']);
                    $user = $core->filter_xss($_POST['uname']);
                    $pass = sha1($core->filter_xss($_POST['pass']));
                    $role = $core->filter_xss($_POST['role']);
                    $newUser = array('', $nama, $user, $pass, 'avatar1.png', 'skin-blue', $role);
                    
                    if ($db->insert('padmin', $newUser)) {
                        echo "<script>alert('Data Berhasil Tersimpan!!!');</script>";
                        // ? echo "<script>javascript:history.back();</script>";
                        $core->redirect('?page=users');
                    } else {
                        echo "<script>alert('Gagal Masukin Data');</script>";
                    }
                    // !var_dump($newUser);
                    
                }
                
            } else if ($_GET['act'] == 'reset') {
                
                $id = $_GET['id'];
                $db->update('padmin', ['password' => sha1('smkw9_jepara')], ['id' => $id]);
                $core->redirect('?page=users');
                
            } else if ($_GET['act'] == 'del') {
                
                // ? Delete Username by id
                $id = $_GET['id'];
                $db->delete('padmin', ['id' => $id]);
                $core->redirect('?page=users');
                
            }
        } else {
            echo "<title>Error 405 Access Denied!!!</title>";
            echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
        }
    }