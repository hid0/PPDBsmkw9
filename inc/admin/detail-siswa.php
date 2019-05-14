<title>Detail Biodata Siswa</title>
<!-- <div class="row">
</div> -->
<?php
$q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND data_casis.id_casis='$_GET[id]' ");
$d = $db->fetch($q);
// while ($q = $db->fetch($q)) {
?>
<div class="row">
    <!-- Berisi Data Siswa Lengkap -->
    <div class="col-md-8">
        <div class="pull-left">
            <a href="?a=index&ke=dashboard" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            <a href="export.php?e=single&id=<?= $d['id_casis'] ?>" target="_blank" class="btn btn-info"><i class="glyphicon glyphicon-print"></i> Export Data</a>
        </div><br /><br />
        <div class="box box-danger">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <span class="fa fa-user-circle"></span>
                    Biodata Siswa
                </h4>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-4 control-label">No.Pendaftaran</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= date('Y') . '-' . $d['id_reg'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Tgl. Pendaftaran</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['tgl_dftr'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['nama_lengkap'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">TTL</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['ttl'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <?php
                        if ($d['jenkel' == 'L']) {
                            $jk = 'Laki-laki';
                        } else {
                            $jk = 'Perempuan';
                        }
                        ?>
                        <p class="form-control-static"><?= $jk ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Agama</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['agama'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['alamat'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Transportasi</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['transportasi'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">No.HP</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['hp'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['email'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Ayah</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['nama_ayah'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Pekerjaan Ayah</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['pekerjaan_ayah'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Ibu</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['nama_ibu'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Pekerjaan Ibu</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['pekerjaan_ibu'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Wali</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['nama_wali'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Pekerjaan Wali</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['pekerjaan_wali'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Anak Ke-</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['anakke'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Jumlah Saudara</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['saudara'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- NIlai UN -->
    <div class="col-md-4"><br /><br />
        <div class="box box-info">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <span class="fa fa-dollar"></span>
                    Daftar Nilai UN
                </h4>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-6 control-label">Matematika</label>
                    <div class="col-sm-6" style="text-align: right;">
                        <p class="form-control-static"><?= $d['mtk'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Bahasa Indonesia</label>
                    <div class="col-sm-6" style="text-align: right;">
                        <p class="form-control-static"><?= $d['bindo'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Bahasa Inggris</label>
                    <div class="col-sm-6" style="text-align: right;">
                        <p class="form-control-static"><?= $d['bing'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">IPA</label>
                    <div class="col-sm-6" style="text-align: right;">
                        <p class="form-control-static"><?= $d['ipa'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trespass -->
    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <span class="fa fa-envelope"></span>
                    Trespass List
                </h4>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-8 control-label">Merokok</label>
                    <div class="col-sm-4" style="text-align: right;">
                        <p class="form-control-static"><?= $d['merokok'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 control-label">Bertato</label>
                    <div class="col-sm-4" style="text-align: right;">
                        <p class="form-control-static"><?= $d['bertato'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 control-label">Berkebutuhan Khusus</label>
                    <div class="col-sm-4" style="text-align: right;">
                        <p class="form-control-static"><?= $d['bk'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 control-label">Buta Warna</label>
                    <div class="col-sm-4" style="text-align: right;">
                        <p class="form-control-static"><?= $d['bw'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Informasi Pendaftaran -->
    <div class="col-md-8">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="box-title">
                    <span class="fa fa-eye"></span>
                    Informasi Pendaftaran
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-6 control-label">Jalur Pendaftaran</label>
                    <div class="col-sm-6">
                        <p class="form-control-static"><?= $d['jenis_pendaftaran'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Jalur Pendaftaran</label>
                    <div class="col-sm-6">
                        <p class="form-control-static"><?= $d['jalur_pendaftaran'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Jurusan 1</label>
                    <div class="col-sm-6">
                        <p class="form-control-static"><?= $d['jurusan1'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Jurusan 2</label>
                    <div class="col-sm-6">
                        <p class="form-control-static"><?= $d['jurusan2'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Asal Sekolah</label>
                    <div class="col-sm-6">
                        <p class="form-control-static"><?= $d['asal_sekolah'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Alamat Asal Sekolah</label>
                    <div class="col-sm-6">
                        <p class="form-control-static"><?= $d['alamat_asal_sekolah'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Prestadi Akademik</label>
                    <div class="col-sm-6">
                        <p class="form-control-static"><?= $d['prestasi_akademik'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-6 control-label">Prestadi Nonakademik</label>
                    <div class="col-sm-6">
                        <p class="form-control-static"><?= $d['prestasi_nonakademik'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Passwot -->
    <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <span class="fa fa-lock"></span>
                    Ganti Password Login Siswa
                </h4>
            </div>
            <div class="box-body">
                <form action="" method="post" class="form-horizontal">
                    <input type="hidden" name="iduser" value="<?= $d['id_casis'] ?>">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <input type="text" class="form-control" value="<?= $d['no_nik'] ?>" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-lock"></span>
                                </div>
                                <input type="password" name="newPass" maxlength="30" class="form-control" placeholder="Masukan Password Baru">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                                <button type="submit" name="gentiGan" class="btn btn-success btn-flat btn-block">
                                    <i class="fa fa-unlock"></i>
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['gentiGan'])) {
                        // $q = $db->update('registrasi',['status' => $_POST['status']],['id_reg' => $_POST['id']]);
                        $q = $db->update('registrasi', ['password_login' => md5($_POST['newPass'])], ['id_casis' => $_POST['iduser']]);
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
// }
?>