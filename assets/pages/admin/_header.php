<?php
$user = $_SESSION['user_admin'];
$qu = $db->query("SELECT * FROM padmin WHERE username='$user'");
$ez = $db->fetch($qu);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Faiz Hidayatulloh">
    <link rel="shortcut icon" href="<?= getImg() ?>logo-smk.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= getCss() ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>ionicons.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>select2.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>AdminLTE.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>skins/_all-skins.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" /> -->
    <script src="<?= getJS() ?>jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        textarea {
            resize: none;
        }
        .select2-container--default .select2-results>.select2-results__options {
            max-height: 500px !important;
        }
    </style>
</head>

<body class="fixed <?= $ez['theme'] ?>">
    <!-- sidebar-mini -->

    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="?page=dashboard" class="logo">
                <span class="logo-mini"><b>PSB</b></span>
                <span class="logo-lg"><b>PPDB</b> SMK Walisongo</span>
            </a>

            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= getImg() ?><?= $ez['profile'] ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><b>Akun</b></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <?php
                                // $q = $db->query('SELECT * FROM padmin');
                                // $n = $db->fetch($q);
                                ?>
                                <li class="user-header">
                                    <img src="<?= getImg() ?><?= $ez['profile'] ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?= $ez['name'] ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="?a=setting" class="btn btn-default btn-flat">Setting</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="?a=logout" onclick="return confirm('Apakah ingin Keluar?')" class="btn btn-default btn-flat">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= getImg() ?><?= $ez['profile'] ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p style="font-size: 12px;"><?= $ez['name'] ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                <?php
                if ($_SESSION['rol_log'] == 'super-admin') {
                ?>
                    <li class="<?=$_GET['page'] == 'dashboard' ? "active" : null ?>">
                        <a href="?page=dashboard">
                            <i class="fa fa-dashboard"></i>&nbsp;
                            <span>Halam Depan</span>
                        </a>
                    </li>
                    <li class="<?=$_GET['page'] == 'payments' ? "active" : null ?>">
                        <a href="?page=payments">
                            <i class="fa fa-money"></i> 
                            <span>Pembayaran</span>
                        </a>
                    </li>
                    <li class="<?=$_GET['page'] == 'invoice' ? "active" : null ?>">
                        <a href="?page=invoice">
                            <i class="fa fa-balance-scale"></i>&nbsp;
                            <span>Tagihan</span>
                        </a>
                    </li>
                    <li class="<?=$_GET['page'] == 'users' ? "active" : null ?>">
                        <a href="?page=users">
                            <i class="fa fa-users"></i>&nbsp;
                            <span>Pengguna</span>
                        </a>
                    </li>
                    <li class="<?=$_GET['page'] == 'setting' ? "active" : null ?>">
                        <a href="?page=setting">
                            <i class="fa fa-gear"></i>&nbsp;
                            <span>Pengaturan</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=auth&sign=out" onclick="return confirm('Yakin Ingin Keluar?')">
                            <i class="fa fa-sign-out"></i>&nbsp;
                            <span>Keluar</span>
                        </a>
                    </li>
                <?php
                } elseif ($_SESSION['rol_log'] == 'keuangan') {
                ?>
                    <li class="<?=$_GET['page'] == 'dashboard' ? "active" : null ?>">
                        <a href="?page=dashboard">
                            <i class="fa fa-dashboard"></i>&nbsp;
                            <span>Halam Depan</span>
                        </a>
                    </li>
                    <li class="<?=$_GET['page'] == 'payments' ? "active" : null ?>">
                        <a href="?page=payments">
                            <i class="fa fa-money"></i> 
                            <span>Pembayaran</span>
                        </a>
                    </li>
                    <li class="<?=$_GET['page'] == 'setting' ? "active" : null ?>">
                        <a href="?page=setting">
                            <i class="fa fa-gear"></i>&nbsp;
                            <span>Pengaturan</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=auth&sign=out" onclick="return confirm('Yakin Ingin Keluar?')">
                            <i class="fa fa-sign-out"></i>&nbsp;
                            <span>Keluar</span>
                        </a>
                    </li>
                <?php
                } elseif ($_SESSION['rol_log'] == 'tata-usaha') {
                ?>
                    <li class="<?=$_GET['page'] == 'dashboard' ? "active" : null ?>">
                        <a href="?page=dashboard">
                            <i class="fa fa-dashboard"></i>&nbsp;
                            <span>Halam Depan</span>
                        </a>
                    </li>
                    <li class="<?=$_GET['page'] == 'setting' ? "active" : null ?>">
                        <a href="?page=setting">
                            <i class="fa fa-gear"></i>&nbsp;
                            <span>Pengaturan</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=auth&sign=out" onclick="return confirm('Yakin Ingin Keluar?')">
                            <i class="fa fa-sign-out"></i>&nbsp;
                            <span>Keluar</span>
                        </a>
                    </li>
                <?php
                }
                ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
        <!-- Berisi Konten Webnya -- >