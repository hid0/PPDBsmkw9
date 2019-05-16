<title>Detail Biodata Peserta Didik Baru | PPDB SMK Walisongo Pecangaan</title>
<!-- <div class="row">
</div> -->
<?php
$q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND data_casis.id_casis='$_GET[id]' ");
$d = $db->fetch($q);
// while ($q = $db->fetch($q)) {
?>
<div class="pull-left">
    <a href="?a=index&ke=dashboard" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    <a href="export.php?e=single&id=<?= $d['id_casis'] ?>" target="_blank" class="btn btn-info"><i class="glyphicon glyphicon-print"></i> Export Data</a>
    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#passLogin"><i class="fa fa-random"></i> Ubah Password</a>
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
                    <input type="text" name="id_reg" id="id_reg" value="<?= date('Y') . '-' . $d['id_reg'] ?>" class="form-control" readonly disabled>
                </div>
                <div class="form-group">
                    <label class="control-label">Tgl. Pendaftaran</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="tgl_dftr" id="tgl" value="<?= $d['tgl_dftr'] ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label">Nama Lengkap</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="nama" id="nama" value="<?= $d['nama_lengkap'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">TTL</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="ttl" id="ttl" value="<?= $d['ttl'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Jenis Kelamin</label>
                    <!-- <p class="form-control-static"></p> -->
                    <select name="jk" id="jk" class="form-control" required>
                        <option value=""> -- Jenis Kelamin --</option>
                        <option value="L" <?= $d['jenkel'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                        <option value="P" <?= $d['jenkel'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Agama</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="agm" id="agm" value="<?= $d['agama'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Alamat</label>
                    <!-- <p class="form-control-static"></p> -->
                    <textarea name="alamat" id="alm" cols="15" rows="2" class="form-control" required><?= $d['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Transportasi</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="trans" id="trans" value="<?= $d['transportasi'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">No.HP</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="hp" id="hp" value="<?= $d['hp'] ?>" maxlength="14" minlength="10" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="email" name="email" id="email" value="<?= $d['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Nama Ayah</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="bokap" id="bokap" value="<?= $d['nama_ayah'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Pekerjaan Ayah</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="krjBokap" id="krjb" value="<?= $d['pekerjaan_ayah'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Nama Ibu</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="nyokal" id="nyokap" value="<?= $d['nama_ibu'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Pekerjaan Ibu</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="krjNyokap" id="krjn" value="<?= $d['pekerjaan_ibu'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Nama Wali</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="wali" id="wali" value="<?= $d['nama_wali'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Pekerjaan Wali</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="krjw" id="krjw" value="<?= $d['pekerjaan_wali'] ?>" class="form-control" required>
                <div class="form-group">
                    <label class="control-label">Anak Ke-</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="number" name="an" id="an" value="<?= $d['anakke'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Jumlah Saudara</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="number" name="sdr" id="sdr" value="<?= $d['saudara'] ?>" class="form-control">
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
                    <select name="jenis" id="jenis" class="form-control">
                        <option value="">-- Pilih satu--</option>
                        <option value="baru" <?= $d['jenis_pendaftaran'] == 'baru' ? 'selected' : '' ?>>Baru</option>
                        <option value="pindahan" <?= $d['jenis_pendaftaran'] == 'pindahan' ? 'selected' : '' ?>>Pindahan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Jalur Pendaftaran</label>
                    <!-- <p class="form-control-static"></p> -->
                    <select name="jalor" id="jalor" class="form-control">
                        <option value="">-- Pilih satu--</option>
                        <option value="umum" <?= $d['jalur_pendaftaran'] == 'umum' ? 'selected' : '' ?>>Umum</option>
                        <option value="khusus" <?= $d['jalur_pendaftaran'] == 'khusus' ? 'selected' : '' ?>>Khusus</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Jurusan 1</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="jur1" id="jur1" value="<?=$d['jurusan1']?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Jurusan 2</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="jur2" id="jur2" value="<?= $d['jurusan2'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Asal Sekolah</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="asalsek" id="asalsek" value="<?= $d['asal_sekolah'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Alamat Asal Sekolah</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="almsekas" id="almsekas" value="<?= $d['alamat_asal_sekolah'] ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Prestadi Akademik</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="presak" id="presak" value="<?= $d['prestasi_akademik'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Prestadi Nonakademik</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="text" name="presnon" id="presnon" value="<?= $d['prestasi_nonakademik'] ?>" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <!-- NIlai UN -->
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <span class="fa fa-dollar"></span>
                    Daftar Nilai UN
                </h4>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label">Matematika</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="number" name="mtk" id="mtk" value="<?= $d['mtk'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Bahasa Indonesia</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="number" name="bindo" id="bindo" value="<?= $d['bindo'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Bahasa Inggris</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="number" name="bing" id="bing" value="<?= $d['bing'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">IPA</label>
                    <!-- <p class="form-control-static"></p> -->
                    <input type="number" name="ipa" id="ipa" value="<?= $d['ipa'] ?>" class="form-control">
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
                        <option value="IYA" <?= $d['merokok'] == 'IYA' ? 'selected' : '' ?>>IYA</option>
                        <option value="TIDAK" <?= $d['merokok'] == 'TIDAK' ? 'selected' : '' ?>>TIDAK</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Bertato</label>
                    <!-- <p class="form-control-static"></p> -->
                    <select name="rokok" id="rokok" class="form-control" required>
                        <option value="">-- Pilih Satu --</option>
                        <option value="IYA" <?= $d['bertato'] == 'IYA' ? 'selected' : '' ?>>IYA</option>
                        <option value="TIDAK" <?= $d['bertato'] == 'TIDAK' ? 'selected' : '' ?>>TIDAK</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Berkebutuhan Khusus</label>
                    <!-- <p class="form-control-static"><?= $d['bk'] ?></p> -->
                    <select name="rokok" id="rokok" class="form-control" required>
                        <option value="">-- Pilih Satu --</option>
                        <option value="IYA" <?= $d['bk'] == 'IYA' ? 'selected' : '' ?>>IYA</option>
                        <option value="TIDAK" <?= $d['bk'] == 'TIDAK' ? 'selected' : '' ?>>TIDAK</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Buta Warna</label>
                    <!-- <p class="form-control-static"><?= $d['bw'] ?></p> -->
                    <select name="rokok" id="rokok" class="form-control" required>
                        <option value="">-- Pilih Satu --</option>
                        <option value="IYA" <?= $d['bw'] == 'IYA' ? 'selected' : '' ?>>IYA</option>
                        <option value="TIDAK" <?= $d['bw'] == 'TIDAK' ? 'selected' : '' ?>>TIDAK</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-md-12">
    <button type="submit" name="savekabeh" class="btn btn-success btn-block"><i class="fa fa-save"></i> Simpan Data</button>
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
                            <input type="hidden" name="iduser" value="<?= $d['id_reg'] ?>">
                            <input type="text" class="form-control" value="<?= $d['no_nik'] ?>" readonly>
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