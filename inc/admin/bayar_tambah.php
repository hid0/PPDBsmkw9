<title>Tambah Pembayaran Siswa | PPDB SMK Walisongo Pecangaan</title>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-head">
                    <h4 class="text-default"><center>Tambah Pembayaran Siswa Baru</center></h4>
                </div>
                    <div class="panel-body">
                        <div class="col-md-6 col-md-offset-3">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="namaS">Nama Siswa Baru</label>
                                    <!-- <input type="text" name="id_casis" id="id_casis" class="form-control" autofocus required> -->
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </div>
                                        <select name="siswa" id="namaS" class="form-control">
                                        <?php

                                        $sis = $db->query('SELECT * FROM data_casis ORDER BY nama_lengkap ASC');
                                        while ($a = $db->fetch($sis)) { ?>

                                            <option value="<?=$a['id_casis']?>"><?=$a['nama_lengkap']?></option>
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
                                        <input type="date" name="tgl_setor" value="<?=date('Y-m-d')?>" id="tgl_setor" class="form-control date" required style="line-height: 17px !important;">
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
                                            <option value="Administrator"<?=$_SESSION['user_admin'] == 'admin' ? "selected" : '' ?>>Administrator</option>
                                            <option value="Keuangan"<?=$_SESSION['user_admin'] == 'ku' ? "selected" : '' ?>>Keuangan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-left">
                                    <button type="submit" name="tambahBayar" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                                </div>
                                <div class="pull-right">
                                    <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function () {
            $.fn.select2.defaults.set( "theme", "bootstrap" );
            $('#namaS').select2({
                theme: "bootstrap"
            });
            // $("#namaS").select2();
        });
        </script>

    <?php

    if (isset($_POST['tambahBayar'])) {
        $c = $core->filter_xss($_POST['siswa']);
        $tgl = $core->filter_xss($_POST['tgl_setor']);
        $jml = $core->filter_xss($_POST['jml_setor']);
        $p = $core->filter_xss($_POST['petugas']);

        // $z = $db->query('SELECT pembayaran.id_casis,pembayaran.setor,SUM(pembayaran.setor) AS totalSetor WHERE pembayaran.id_casis=$_POST[siswa]');
        $z = $db->query('SELECT id_casis, nama_lengkap, jurusan1, SUM(setor) AS totalSetor FROM registrasi RIGHT JOIN data_casis USING(id_reg) RIGHT JOIN pembayaran USING(id_casis) WHERE id_casis=$c GROUP BY id_casis ASC');
        $t = $db->fetch($z);
        $t = $t['totalSetor'] + $jml;
        // $jmlSaldo = $db->update('pembayaran',['saldo' => $t],['id_casis' => $c]);

        $dataByr = array('',$c,$tgl,$jml,$t,$p);
        if ($db->insert('pembayaran',$dataByr)) {
            // $q = $db->update('registrasi',['status' => $_POST['status']],['id_reg' => $_POST['id']]);
            $core->redirect('?a=bayar&ke=list');
        } else {
            echo "<script>alert('Gagal Menambah Data!!')</script>";
        }

    }