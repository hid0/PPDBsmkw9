<div class="row">
    <div class="col-md-12">
        <div class="pull-left">
            <a data-toggle="modal" data-target="#tagihan" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
                                <th style="width:50px;">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            $q = $db->query('SELECT * FROM `tagihan`');

                            while ($cok = $db->fetch($q)) { ?>

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

<div id="tagihan" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"  style="font-weight: bold;text-align: center;">Tambah Tagihan</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="Nama Tagihan" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <!-- <i class="fa fa-dollar"></i> -->
                            <span>Rp</span>
                        </div>
                        <input type="text" name="rp" class="form-control" placeholder="100000" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-users"></i>
                        </div>
                        <select name="for" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-comments"></i>
                        </div>
                        <textarea name="ket" id="ket" cols="30" rows="3" class="form-control"></textarea>
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
</div>