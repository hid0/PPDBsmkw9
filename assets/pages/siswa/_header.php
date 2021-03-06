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
    <link rel="stylesheet" href="<?= getCss() ?>AdminLTE.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="<?= getJS() ?>jquery.min.js"></script>
</head>

<body class="hold-transition skin-green fixed">

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
                        <li class="dropdown messages-menu">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= getImg() ?>avatar5.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">Account</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <?php
                                $nik = $_SESSION['user_siswa'];
                                $q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`nik`='$nik' ");
                                $d = $db->fetch($q);
                                ?>
                                <li class="user-header">
                                    <img src="<?= getImg() ?>avatar5.png" class="img-circle" alt="User Image">
                                    <p>
                                        <?= $d['nama'] ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="?page=setting" class="btn btn-default btn-flat disabled">Setting</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="?page=logout" onclick="return confirm('Apakah ingin Keluar?')" class="btn btn-default btn-flat">Logout</a>
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
                        <img src="<?= getImg() ?>avatar5.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p style="font-size: 12px;"><?= $d['nama'] ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="<?=$_GET['page'] == 'dashboard' ? "active" : null ?>">
                        <a href="?page=dashboard">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <!-- <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span> -->
                        </a>
                    </li>
                    <li class="treeview <?=$_GET['page'] == 'payments' ? "active menu-open" : null ?>">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Pembayaran</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?=$_GET['a'] == "history" ? 'active' : null ;?>"><a href="?page=payments&a=history"><i class="fa fa-line-chart"></i> Riwayat Pembayaran</a></li>
                            <li class="<?=$_GET['a'] == "invoice" ? 'active' : null ;?>"><a href="?page=payments&a=invoice"><i class="fa fa-money"></i> Daftar Tagihan</a></li>
                            <!-- <script src="<?= getJS() ?>jquery.min.js"></script> -->
                        </ul>
                    </li>
                    <li>
                        <a href="?page=logout">
                            <i class="fa fa-sign-out"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <!-- Berisi Konten Webnya -->