<!-- Info boxes -->
<?php
$nik = $_SESSION['user_siswa'];
$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`nik`='$nik'; ");
$d = $db->fetch($q);
?>
<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <div class="box-title">Biodata Siswa</div>
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
                        <p class="form-control-static"><?= localdate($d['timestamp']) ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['nama'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">TTL</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['tempat_lahir'] ?>, <?=($d['tgl_lahir'])?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <?php
                        if($d['jk'] == 'L') {
                            $jk = "Laki-Laki";
                        }elseif($d['jk'] == 'P') {
                            $jk = "Perempuan";
                        }else {
                            $jk = "Unknown";
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
                        <p class="form-control-static"><?= $d['kendaraan'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">No.HP</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['hp_ortu'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Ayah</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['ayah'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Pekerjaan Ayah</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['kerjaan_ayah'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Ibu</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['ibu'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Pekerjaan Ibu</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['kerjaan_ibu'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Wali</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['wali'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Pekerjaan Wali</label>
                    <div class="col-sm-8">
                        <p class="form-control-static"><?= $d['kerjaan_wali'] ?></p>
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
                        <p class="form-control-static"><?= $d['jml_saudara'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="text-align: center;">
        <div class="box box-info">
            <div class="box-header">
                <div class="box-title">Informasi Pendaftaran Gelombang</div>
            </div>
            <div class="box-body">
                <?php
                // anda terdaftar pada gel 1, segera daftar ulang maksimal 31 Mei 2019 untuk mendapatkan 20% potongan seragam
                if ($d['timestamp'] >= '01-01-2020' && $d['timestamp'] <= '30-04-2020') {
                    // echo "gel 1";
                    echo "<div class=\"alert alert-info\">Anda Terdaftar Sebagai Calon Peserta Didik Gelombang Ke-1, \n segera daftar ulang, bagi 100 pendaftar PERTAMA berhak mendapatkan 1 stel seragam</div>";
                }elseif ($d['timestamp'] >= '01-05-2020' && $d['timestamp'] <= '05-06-2020') {
                    // echo "gel 2";
                    echo "<div class=\"alert alert-info\">Anda Terdaftar Sebagai Calon Peserta Didik Gelombang Ke-2</div>";
                } else {
                    // echo "gel 3";
                    echo "<div class=\"alert alert-info\">Anda Terdaftar Sebagai Calon Peserta Didik Gelombang Ke-3</div>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header">
                <div class="box-title" style="text-align: center;">Informasi Penerimaan Peserta Didik Baru SMK Walisongo</div>
            </div>
            <div class="box-body">
                <?php
                if ($d['status'] == 'lulus') { ?>

                    <div class="alert alert-success">
                        Selamat Anda Diterima menjadi Calon Peserta Didik di SMK Walisongo Pecangaan
                    </div>
                    <?php
                } else if ($d['status'] == 'Tidak') { ?>
                    <div class="alert alert-danger">
                        Anda Belum Diterima menjadi Peserta Didik di SMK Walisongo Pecangaan
                    </div>
                    <?php
                }
                ?>
                
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-default">
            <div class="box-header">
                <div class="box-title"><span class="fa fa-lock"></span> Ganti Password Login</div>
            </div>
            <div class="box-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <div class="fa fa-key"></div>
                            </div>
                            <input type="password" name="passw" class="form-control" placeholder="Masukan Password Baru" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <div class="fa fa-mail-reply-all"></div>
                            </div>
                            <input type="password" name="passw_confirm" class="form-control" placeholder="Masukan Konfirmasi Password Baru" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <button type="submit" name="gantosPass" class="btn btn-success"><i class="fa fa-unlock"></i> Ganti Password Saya</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<?php
if (isset($_POST['gantosPass'])) {
    if ($_POST['passw'] == $_POST['passw_confirm']) {
        $q = $db->update('registrasi', ['password_login' => md5($_POST['passw'])], ['no_nik' => $_SESSION['user_siswa']]);
        echo "<script>alert('Password Telah Ganti!!!')</script>";
    } else {
        echo "<script>alert('Password yang anda input tidak sama, silahkan ulangi kembali!!!')</script>";
    }
}
