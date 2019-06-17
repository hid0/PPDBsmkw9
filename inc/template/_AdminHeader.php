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
    <link rel="stylesheet" href="<?= getCss() ?>dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>ionicons.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>AdminLTE.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>select2.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>select2-bootstrap.min.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
=======
    <link rel="stylesheet" href="<?= getCss() ?>sweetalert2.min.css">
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
    <script src="<?= getJS() ?>jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        textarea {
            resize: none;
        }
    </style>
    <script type="text/javascript">
        function alertSuccess() {
            swal({
                    title: "Changed!!!",
                    text: "Berhasil!!!",
                    type: "success"
                }),
                console.log('Echo');
        }
    </script>
</head>

<body class="fixed <?= $ez['theme'] ?>">
    <!-- sidebar-mini -->

    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="?a=index" class="logo">
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
                                <img src="<?= getImg() ?><?= $ez['profile'] ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><b>Account</b></span>
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
                        echo "<li><a href=\"?a=index&ke=dashboard\"><i class=\"fa fa-dashboard\"></i> <span>Dashboard</span></a></li><li><a href=\"?a=bayar&ke=list\"><i class=\"fa fa-money\"></i> Lihat Pembayaran</a></li><li><a href=\"?a=nagih\"><i class=\"fa fa-balance-scale\"></i>Tagihan</a></li><li><a href=\"?a=setting\"><i class=\"fa fa-gear\"></i><span>Setting</span></a></li><li><a href=\"?a=logout\"><i class=\"fa fa-sign-out\"></i><span> Logout</span></a></li>";
                    } elseif ($_SESSION['rol_log'] == 'keuangan') {
                        echo "<li><a href=\"?a=index&ke=dashboard\"><i class=\"fa fa-dashboard\"></i> <span>Dashboard</span></a></li><li><a href=\"?a=bayar&ke=list\"><i class=\"fa fa-money\"></i> Lihat Pembayaran</a></li><li><a href=\"?a=setting\"><i class=\"fa fa-gear\"></i><span>Setting</span></a></li><li><a href=\"?a=logout\"><i class=\"fa fa-sign-out\"></i><span> Logout</span></a></li>";
                    } elseif ($_SESSION['rol_log'] == 'tata-usaha') {
                        echo "<li><a href=\"?a=index&ke=dashboard\"><i class=\"fa fa-dashboard\"></i> <span>Dashboard</span></a></li><li><a href=\"?a=setting\"><i class=\"fa fa-gear\"></i><span>Setting</span></a></li><li><a href=\"?a=logout\"><i class=\"fa fa-sign-out\"></i><span> Logout</span></a></li>";
                    }
                    ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <!-- Berisi Konten Webnya -- >