<title>List Pembayaran Siswa | PPDB SMK Walisongo Pecangaan</title>
<div class="row">
    <div class="col-md-6">
        <a data-toggle="modal" data-target="#bayar" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</a>
        <a href="export.php?e=bayar" target="_blank" rel="noopener noreferrer" class="btn btn-success"><i class="fa fa-download"></i> Export</a>
    </div>
</div><br />
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-head" style="text-align: center;">
                <h4 class="text-default">List Pembayaran Siswa Baru</h4>
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
<div id="bayar" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"  style="font-weight: bold;text-align: center;">Tambah Tagihan</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama Siswa Baru</label>
                    <!-- <input type="text" name="id_casis" id="id_casis" class="form-control" autofocus required> -->
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </div>
                        <select name="siswa" id="nama" class="form-control select2" style="width: 100%;">
                            <option>-- Pilih --</option>
                            <?php

                            $sis = $db->query('SELECT * FROM `new_students` ORDER BY `new_students`.`nama` ASC');
                            while ($a = $db->fetch($sis)) { ?>

                                <option value="<?= $a['nik'] ?>"><?= $a['nama'] ?></option>
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
                        <input type="date" name="tgl_setor" value="<?= date('Y-m-d') ?>" id="tgl_setor" class="form-control date" required style="line-height: 17px !important;">
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
                            <option value="Administrator" <?= $_SESSION['user_admin'] == 'admin' ? "selected" : '' ?>>Administrator</option>
                            <option value="Keuangan" <?= $_SESSION['user_admin'] == 'ku' ? "selected" : '' ?>>Keuangan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>Tutup</i></button>
                </div>
                <div class="pull-right">
                    <button type="submit" name="smpn" class="btn btn-block btn-primary"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>