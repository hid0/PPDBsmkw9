<title>Detail Biodata Peserta Didik Baru | PPDB SMK Walisongo Pecangaan</title>
<?php
$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`id_pd`='$_GET[id]' ");
$d = $db->fetch($q);
?>
<div class="pull-left">
    <a href="?page=dashboard" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    <a href="export.php?e=single&id=<?= $d['id_pd'] ?>" target="_blank" class="btn btn-info"><i class="glyphicon glyphicon-print"></i> Export</a>
    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#passLogin"><i class="fa fa-random"></i> Ubah Password</a>
    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#histori"><i class="fa fa-dollar"></i> Riwayat Pembayaran</a>
</div><br /><br />
<form action="" method="post">
<div class="row">
    <!-- Berisi Data Peserta Didik Baru Lengkap -->
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <span class="fa fa-user-circle"></span>
                    Biodata Peserta Didik Baru
                </h4>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">No.Pendaftaran</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="id_reg" id="id_reg" value="<?=str_pad(@$d['id_reg'], 3, '0', STR_PAD_LEFT)?>" class="form-control" readonly disabled>
                </div>
                <div class="form-group">
                    <label class="control-label">Tgl. Pendaftaran</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="tgl_dftr" id="tgl" value="<?= localdate($d['timestamp']) ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label">Nama Lengkap</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="nama_lengkap" id="nama" value="<?= $d['nama'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">TTL</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="ttl" id="ttl" value="<?= $d['tempat_lahir'] ?>, <?= $d['tgl_lahir'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Jenis Kelamin</label>
                    <!-- <p class="form-control-static"></p> -->
                    <select name="jenkel" id="jk" class="form-control" required>
                        <option value=""> -- Jenis Kelamin --</option>
                        <option value="L" <?= $d['jk'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                        <option value="P" <?= $d['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Agama</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="agama" id="agm" value="<?= $d['agama'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Alamat</label>
                    <!-- <p class="form-control-static"></p> -->
                    <textarea name="alamat" id="alm" cols="15" rows="2" class="form-control" required><?= $d['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Transportasi</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="transportasi" id="trans" value="<?= $d['kendaraan'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">No.HP</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="hp" id="hp" value="<?= $d['hp_ortu'] ?>" maxlength="14" minlength="10" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Nama Ayah</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="nama_ayah" id="bokap" value="<?= $d['ayah'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Pekerjaan Ayah</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="pekerjaan_ayah" id="krjb" value="<?= $d['kerjaan_ayah'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Nama Ibu</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="nama_ibu" id="nyokap" value="<?= $d['ibu'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Pekerjaan Ibu</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="pekerjaan_ibu" id="krjn" value="<?= $d['kerjaan_ibu'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Nama Wali</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="nama_wali" id="wali" value="<?= $d['wali'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Pekerjaan Wali</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="pekerjaan_wali" id="krjw" value="<?= $d['kerjaan_wali'] ?>" class="form-control" required>
                <div class="form-group">
                    <label class="control-label">Jumlah Saudara</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="number" name="saudara" id="sdr" value="<?= $d['jml_saudara'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Anak Ke-</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="number" name="anakke" id="an" value="<?= $d['anakke'] ?>" class="form-control" required>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Informasi Pendaftaran -->
    <div class="col-md-6 pull-right">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="box-title">
                    <span class="fa fa-eye"></span>
                    Informasi Pendaftaran
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Jalur Pendaftaran</label>
                    <!-- <p class="form-control-static"></p> -->
                    <select name="jalor" id="jalor" class="form-control">
                        <option value="">-- Pilih satu--</option>
                        <option value="umum" <?= $d['jalur_daftar'] == 'umum' ? 'selected' : '' ?>>Umum</option>
                        <option value="khusus" <?= $d['jalur_daftar'] == 'khusus' ? 'selected' : '' ?>>Khusus</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Jurusan 1</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="jur1" id="jur1" value="<?=$d['jur_pertama']?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Jurusan 2</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="jur2" id="jur2" value="<?= $d['jur_kedua'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Asal Sekolah</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="asalsek" id="asalsek" value="<?= $d['sekolah_asal'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Alamat Asal Sekolah</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="almsekas" id="almsekas" value="<?= $d['alamatnya'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Prestadi Akademik</label>
                    <textarea name="akademik" id="aka" cols="4" rows="3" class="form-control"><?= $d['akademik'] ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Prestadi Nonakademik</label>
                    <textarea name="nonakademik" id="nonaka" cols="4" rows="3" class="form-control"><?= $d['nonakademik'] ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <!-- Trespass -->
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <span class="fa fa-envelope"></span>
                    Trespass List
                </h4>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Merokok</label>
                    <!-- <p class="form-control-static"></p> -->
                    <select name="rokok" id="rokok" class="form-control" required>
                        <option value="">-- Pilih Satu --</option>
                        <option value="Iya" <?= $d['merokok'] == 'Iya' ? 'selected' : '' ?>>Iya</option>
                        <option value="Tidak" <?= $d['merokok'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Bertato</label>
                    <select name="tato" id="tato" class="form-control" required>
                        <option value="">-- Pilih Satu --</option>
                        <option value="Iya" <?= $d['bertato'] == 'Iya' ? 'selected' : '' ?>>Iya</option>
                        <option value="Tidak" <?= $d['bertato'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Berkebutuhan Khusus</label>
                    <select name="bk" id="bk" class="form-control" required>
                        <option value="">-- Pilih Satu --</option>
                        <option value="Iya" <?= $d['butuh_khusus'] == 'Iya' ? 'selected' : '' ?>>Iya</option>
                        <option value="Tidak" <?= $d['butuh_khusus'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Buta Warna</label>
                    <select name="bw" id="bw" class="form-control" required>
                        <option value="">-- Pilih Satu --</option>
                        <option value="Iya" <?= $d['buta_warna'] == 'Iya' ? 'selected' : '' ?>>Iya</option>
                        <option value="Tidak" <?= $d['buta_warna'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Memiliki KIP</label>
                    <select name="bw" id="bw" class="form-control" required>
                        <option value="">-- Pilih Satu --</option>
                        <option value="Iya" <?= $d['kip'] == 'Iya' ? 'selected' : '' ?>>Iya</option>
                        <option value="Tidak" <?= $d['kip'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Yatim / Yatim Piatu</label>
                    <select name="bw" id="bw" class="form-control" required>
                        <option value="">-- Pilih Satu --</option>
                        <option value="Iya" <?= $d['yatim'] == 'Iya' ? 'selected' : '' ?>>Iya</option>
                        <option value="Tidak" <?= $d['yatim'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-md-12">
    <button type="submit" name="savekabeh" class="btn btn-success btn-block" disabled><i class="fa fa-save"></i> Simpan Data</button>
</div><br /><br />
</form>

<!-- MOdal ganti password -->

<div id="passLogin" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ganti Password Login</h4>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="fa fa-user"></span>
                            </div>
                            <input type="hidden" name="iduser" value="<?= $d['id_pd'] ?>">
                            <input type="text" class="form-control" value="<?= $d['nik'] ?>" readonly>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="fa fa-lock"></span>
                            </div>
                            <input type="password" name="newPass" maxlength="30" class="form-control" placeholder="Masukan Password Baru">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="fa fa-unlock"></span>
                            </div>
                            <input type="password" name="newPass1" maxlength="30" class="form-control" placeholder="Ulangi Password Baru">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                        <button type="submit" name="gentiGan" class="btn btn-success">
                            <i class="fa fa-unlock"></i> Change Password
                        </button>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-default pull-right" data-dismiss="modal">
                            <i class="fa fa-close"></i> Close
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Riwayat Pembayaran -->
<div id="histori" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Riwayat Pembayaran</h4>
            </div>
            <form action="" method="post">
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="5">No.</th>
                                <th>Tanggal</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        $sql = $db->query("SELECT * FROM `pembayaran`");
                        while ($res = $db->fetch($sql)) {
                        ?>
                        <tbody>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=localdate($res['tgl'])?></td>
                                <td><?=idr($res['setor'])?></td>
                            </tr>
                        </tbody>
                        <?php 
                        }
                        $sql = $db->query("SELECT SUM(setor) AS totalSetor FROM pembayaran");
                        $data = $db->fetch($sql);
                        ?>
                        <tfoot>
                            <tr style="font-weight: bold;">
                                <td colspan="2" style="text-align: right;">Jumlah Total</td>
                                <td><?=idr($data['totalSetor'])?></td>
                            </tr>
                        </tfoot>
                    </table> 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default pull-right" data-dismiss="modal">
                        <i class="fa fa-close"></i> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>