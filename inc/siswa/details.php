<!-- Info boxes -->
<?php
$nik = $_SESSION['user_siswa'];
$q = $db->query("SELECT * FROM `registrasi`,`data_casis` WHERE registrasi.id_reg=data_casis.id_reg AND registrasi.no_nik='$nik' ");
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
                        <p class="form-control-static"><?= localdate($d['tgl_dftr']) ?></p>
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
    <div class="col-md-4" style="text-align: center;">
        <div class="box box-info">
            <div class="box-header">
                <div class="box-title">Informasi Pendaftaran Gelombang</div>
            </div>
            <div class="box-body">
                <?php
                // anda terdaftar pada gel 1, segera daftar ulang maksimal 31 Mei 2019 untuk mendapatkan 20% potongan seragam
                if ($d['tgl_dftr'] >= '2019-05-02' && $d['tgl_dftr'] <= '2019-06-14') {
                    // echo "gel 1";
                    echo "<div class=\"alert alert-info\">Anda Terdaftar Sebagai Siswa Gelombang Ke-1, \nsegera daftar ulang maksimal 31 Mei 2019 untuk mendapatkan 20% potongan seragam</div>";
                }elseif ($d['tgl_dftr'] >= '2019-06-15' && $d['tgl_dftr'] <= '2019-07-11') {
                    // echo "gel 2";
                    echo "<div class=\"alert alert-info\">Anda Terdaftar Sebagai Siswa Gelombang Ke-2</div>";
                } else {
                    // echo "gel 3";
                    echo "<div class=\"alert alert-info\">Anda Terdaftar Sebagai Siswa Gelombang Ke-3</div>";
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
                        Selamat Anda Diterima menjadi Siswa di SMK Walisongo Pecangaan
                    </div>

                <?php
            } elseif ($d['status'] == 'tidak') { ?>

                    <div class="alert alert-danger">
                        Anda Belum Diterima menjadi Siswa di SMK Walisongo Pecangaan
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
