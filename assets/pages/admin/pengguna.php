<div class="row">
    <div class="col-md-12">
        <div class="pull-left">
            <a data-toggle="modal" data-target="#user" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        </div>
    </div>
</div><br>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-success">
            <div class="box-header">
                <div class="box-title">Daftar Akun Pengguna</div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dt-data">
                        <thead>
                            <tr>
                                <th style="width:3px;">#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th style="width:90px;">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            $q = $db->query('SELECT * FROM `padmin`');

                            while ($cok = $db->fetch($q)) { ?>

                                <tr>
                                    <td><?=$n++?></td>
                                    <td><?=$cok['name']?></td>
                                    <td><?=$cok['username']?></td>
                                    <td><?=$cok['roles']?></td>
                                    <td style="width:3px;">
                                        <center>
                                            <a href="?page=users&act=del&id=<?= $cok['id'] ?>" onclick="return confirm('Yakin Menghapus?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>&nbsp;
                                            <a href="?page=users&act=reset&id=<?= $cok['id'] ?>" onclick="return confirm('Yakin Mereset Sandi?')" class="btn btn-xs btn-warning"><i class="fa fa-refresh"></i></a>&nbsp;
                                        </center>
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
</div>

<div id="user" class="modal fade">
    <div class="modal-dialog">
        <form method="post" action="" class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"  style="font-weight: bold;text-align: center;">Tambah Pengguna</h4>
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
                            <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</i></button>
                    </div>
                    <div class="pull-right">
                        <button type="submit" name="save" class="btn btn-block btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>