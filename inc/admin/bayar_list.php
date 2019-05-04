<title>List Pembayaran Siswa | PPDB SMK Walisongo Pecangaan</title>
<div class="row">
    <div class="col-md-6">
        <a href="?a=bayar&ke=tambah" class="btn btn-info"><i class="fa fa-plus"> Tambah Pembayaran</i></a>
        <a href="export.php?e=bayar" target="_blank" rel="noopener noreferrer" class="btn btn-success"><i class="fa fa-download"> Export Laporan Pembayaran</i></a>
    </div>
</div><br />
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-head">
                <h4 class="text-default">
                    <center>List Pembayaran Siswa Baru</center>
                </h4>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dt-data">
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
                                    <td><?= $n++ ?>.</td>
                                    <td><?= $g['nama_lengkap'] ?></td>
                                    <td><b><?= $g['jurusan1'] ?></b></td>
                                    <td><?= idr($g['totalSetor']) ?></td>
                                    <td style="width:3px;">
                                        <center>
                                            <a href="?a=bayar&ke=list&action=del&id=<?= $g['id_bayar'] ?>" onclick="return confirm('Yakin Menghapus?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>&nbsp;
                                            <!-- <a href="?a=bayar&ke=list&action=detail&siswa=<?= $g['id_casis'] ?>" clas="btn btn-xs btn-info" title="Detail Pembayaran Siswa"><i class="fa fa-location-arrow"></i> </a> -->
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
</div>