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
?>
<title>Dashboard Admin | PPDB SMK Walisongo</title>
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pendaftar</span>
                <span class="info-box-number"><small>? Siswa</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        <div class="panel-head">
            <h4 class="text-default"><center><b>Data Peserta Didik Baru 2019 / 2020</b></center></h4>
        </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover" id="gg">
                    <thead>
                        <tr>
                            <th style="width:3px;">#</th>
                            <th>Nama</th>
                            <th style="width:2px;">L/P</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $q = $db->query('SELECT * FROM registrasi,data_casis,trespass WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis ');
                    while ($d = $db->fetch($q)) { ?>

                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$d['nama_lengkap']?></td>
                            <td><?=$d['jenkel']?></td>
                            <td><?=$d['ttl']?></td>
                            <td><?=$d['alamat']?></td>
                            <td><b><?=$d['jurusan1']?></b><br /><i><?=$d['jurusan2']?></i></td>
                            <td>
                                <?php
                                if ($d['status'] == 'lulus') { ?>

                                <form onchange="this.submit()" method="post">
                                    <select name="status" class="form-control">
                                        <option value="lulus" selected>LULUS</option>
                                        <option value="tidak">TIDAK LULUS</option>
                                    </select>
                                    <input type="hidden" name="id" value="<?=$d['id_reg']?>">
                                </form>

                                <?php
                                } else { ?>

                                <form onchange="this.submit()" method="post">
                                    <select name="status" class="form-control">
                                        <option value="lulus">LULUS</option>
                                        <option value="tidak" selected>TIDAK LULUS</option>
                                    </select>
                                    <input type="hidden" name="id" value="<?=$d['id_reg']?>">
                                </form>

                                <?php
                                }
                                if(isset($_POST['status']))
                                {
                                    $q = $db->update('registrasi',['status' => $_POST['status']],['id_reg' => $_POST['id']]);
                                    $core->redirect('admin.php?a=index');  }
                                ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-info"><i class="fa fa-info"></i></a>
                                <a href="#" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Anda Yakin ingin menghapus data ini ?')" href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $("#gg").dataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
        });
    });
</script>
<?php
} elseif($_GET['a'] == 'bayar') {
    // Bersisi list data pembayaran dan tambah data pembayaran
    if ($_GET['ke'] == 'list') { ?>
        <!--// list pembayaran
        // echo "Pembayaran";-->
        <title>List Pembayaran Siswa | PPDB SMK Walisongo Pecangaan</title>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-head">
                    <h4 class="text-default"><center>List Pembayaran Siswa Baru</center></h4>
                </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-hover" id="tbl-listBayar">
                            <thead>
                                <tr>
                                    <th style="width:3px;">#</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jurusan</th>
                                    <th>Saldo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 1;
                                $er = $db->query('SELECT id_casis, nama_lengkap, jurusan1, SUM(setor) AS totalSetor FROM registrasi RIGHT JOIN data_casis USING(id_reg) RIGHT JOIN pembayaran USING(id_casis) GROUP BY id_casis ASC');

                                while ($g = $db->fetch($er)) { ?>

                                <tr>
                                    <td><?=$n++?>.</td>
                                    <td><?=$g['nama_lengkap']?></td>
                                    <td><b><?=$g['jurusan1']?></b></td>
                                    <td><?=idr($g['totalSetor'])?></td>
                                    <td style="width:3px;">
                                        <center>
                                        <a href="?a=bayar&ke=list&action=del&id=<?=$g['id_bayar']?>" onclick="return confirm('Yakin Menghapus?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>&nbsp;
                                        <a href="?a=bayar&ke=list&action=detail&siswa=<?=$g['id_casis']?>" clas="btn btn-xs btn-info" title="Detail Pembayaran Siswa"><i class="fa fa-location-arrow"></i> </a>
                                        </center>
                                    </td>
                                </tr>

                                <?php
                                }
                                if (@$_GET['action'] == 'del') {
                                    $db->delete('pembayaran', ['id_bayar' => $_GET['id']]);
                                    $core->redirect('?a=bayar&ke=list');
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready( function () {
                $("#tbl-listBayar").DataTable({
                    "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
                });
                // console.log('Berhasil');
            });
        </script>
    <?php
    } elseif ($_GET['ke'] == 'tambah') {
        // echo "Tambah data pembayaran";
    ?>
        <title>Tambah Pembayaran Siswa | PPDB SMK Walisongo Pecangaan</title>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-head">
                    <h4 class="text-default"><center>Tambah Pembayaran Siswa Baru</center></h4>
                </div>
                    <div class="panel-body">
                        <div class="col-md-6 col-md-offset-3">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="namaS">Nama Siswa Baru</label>
                                    <!-- <input type="text" name="id_casis" id="id_casis" class="form-control" autofocus required> -->
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </div>
                                        <select name="siswa" id="namaS" class="form-control">
                                        <?php

                                        $sis = $db->query('SELECT * FROM data_casis ORDER BY nama_lengkap ASC');
                                        while ($a = $db->fetch($sis)) { ?>

                                            <option value="<?=$a['id_casis']?>"><?=$a['nama_lengkap']?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_setor">Tanggal Setor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" name="tgl_setor" value="<?=date('Y-m-d')?>" id="tgl_setor" class="form-control date" required style="line-height: 17px !important;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jml_setor">Jumlah Setor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <input type="number" name="jml_setor" id="jml_setor" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group" style="display:none;">
                                    <label for="Petugas">Petugas</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-vcard"></i>
                                        </div>
                                        <select name="petugas" id="petugas" class="form-control">
                                            <option value="Administrator"<?=$_SESSION['user_admin'] == 'admin' ? "selected" : '' ?>>Administrator</option>
                                            <option value="Keuangan"<?=$_SESSION['user_admin'] == 'ku' ? "selected" : '' ?>>Keuangan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-left">
                                    <button type="submit" name="tambahBayar" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                                </div>
                                <div class="pull-right">
                                    <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function () {
            $.fn.select2.defaults.set( "theme", "bootstrap" );
            $('#namaS').select2({
                theme: "bootstrap"
            });
            // $("#namaS").select2();
        });
        </script>

    <?php

    if (isset($_POST['tambahBayar'])) {
        $c = $core->filter_xss($_POST['siswa']);
        $tgl = $core->filter_xss($_POST['tgl_setor']);
        $jml = $core->filter_xss($_POST['jml_setor']);
        $p = $core->filter_xss($_POST['petugas']);

        // $z = $db->query('SELECT pembayaran.saldo, SUM(pembayaran.saldo) AS total_saldo FROM `pembayaran` WHERE `id_casis`=$c ORDER BY `id_bayar` DESC');
        // $x = $db->fetch($z);
        // $id = $_POST['siswa']; // nangkap id
        // $aw = $_POST['jml_setor']; // nangkap setoran membayar
        // $z = $db->query('SELECT pembayaran.id_casis,pembayaran.setor, SUM(pembayaran.setor) AS totalSetor FROM `pembayaran` WHERE id_casis=$id GROUP BY pembayaran.di_casis DESC');
        // $end = $aw + $x['totalSetor'];
        // while ($x = $db->fetch($z)) {
        //     $x = $x['totalSetor'];
        // }

        $dataByr = array('',$c,$tgl,$jml,$jml,$p);
        if ($db->insert('pembayaran',$dataByr)) {
            // $q = $db->update('registrasi',['status' => $_POST['status']],['id_reg' => $_POST['id']]);
            $z = $db->query('SELECT pembayaran.id_casis,pembayaran.setor,SUM(pembayaran.setor) AS totalSetor WHERE pembayaran.id_casis=$_POST[siswa]');
            $t = $db->fetch($z);
            $t = $t['totalSetor']/6;
            $jmlSaldo = $db->update('pembayaran',['saldo' => $t],['id_casis' => $c]);
            $core->redirect('?a=bayar&ke=list');
        } else {
            echo "<script>alert('Gagal Menambah Data!!')</script>";
        }

    }

    }
} elseif ($_GET['a'] == 'logout') {
    session_destroy();
    $core->redirect('?');
}
?>