<div class="row">
    <div class="col-md-12">
        <div class="pull-left">
            <a href="?a=nagih&ex=add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        </div>
    </div>
</div><br>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-success">
            <div class="box-header">
                <div class="box-title">Daftar Tagihan Siswa Baru</div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dt-data">
                        <thead>
                            <tr>
                                <th style="width:3px;">#</th>
                                <th>Nama Tagihan</th>
                                <th>Jumlah Nilai</th>
                                <th>Untuk</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            $bh = $db->query('SELECT * FROM tagihan');

                            while ($cok = $db->fetch($bh)) { ?>

                                <tr>
                                    <td><?= $n++ ?>.</td>
                                    <td><?= $cok['nama_tagihan'] ?></td>
                                    <td><?= idr($cok['jml_tag']) ?></td>
                                    <td><?= $jk = ($cok['utk'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                                    <td><?= $cok['ket'] ?></td>
                                    <td style="width:3px;">
                                        <center>
                                            <a href="?a=nagih&act=del&id=<?= $cok['id'] ?>" onclick="return confirm('Yakin Menghapus?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>&nbsp;
                                        </center>
                                    </td>
                                </tr>

                            <?php
                        }
                        if (@$_GET['act'] == 'del') {
                            $db->delete('tagihan', ['id' => $_GET['id']]);
                            $core->redirect('?a=nagih&ex=index');
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>