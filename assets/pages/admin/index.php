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
            include getPages() . "admin/bayar_list.php";
        } else {
            echo "<title>Error 405 Access Denied!!!</title>";
            echo "<h1 class=\"text-danger\">Anda tidak punya akses</h1>";
        }
        
    }