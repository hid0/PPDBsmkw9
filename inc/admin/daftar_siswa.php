<div class="row">
    <div class="col-md-12">
        <div class="btn-group">
            <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-print"></i> Export <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="export.php?e=data&method=all" target="_blank" rel="noopener noreferrer">All Data</a></li>
                <li><a href="export.php?e=data&method=ngam" target="_blank" rel="noopener noreferrer">Umum</a></li>
                <li><a href="export.php?e=data&method=khos" target="_blank" rel="noopener noreferrer">Khusus</a></li>
                <li class="divider" role="separator"></li>
                <li><a href="export.php?e=data&method=kt" target="_blank" rel="noopener noreferrer">KT</a></li>
                <li><a href="export.php?e=data&method=tkr" target="_blank" rel="noopener noreferrer">TKR</a></li>
                <li><a href="export.php?e=data&method=tkj" target="_blank" rel="noopener noreferrer">TKJ</a></li>
                <li><a href="export.php?e=data&method=pbs" target="_blank" rel="noopener noreferrer">PBS</a></li>
                <li class="divider" role="separator"></li>
                <li><a href="export.php?e=data&method=hafidz" target="_blank" rel="noopener noreferrer">Hafidz</a></li>
                <li><a href="export.php?e=data&method=yatim" target="_blank" rel="noopener noreferrer">Yatim</a></li>
                <li><a href="export.php?e=data&method=w9" target="_blank" rel="noopener noreferrer">SMP/MTs Walisongo</a></li>
                <li><a href="export.php?e=data&method=seYyysn" target="_blank" rel="noopener noreferrer">Saudara Se-Yayasan</a></li>
                <li><a href="export.php?e=data&method=anakGrKrywn" target="_blank" rel="noopener noreferrer">Putra Guru/Karyawan</a></li>
            </ul>
        </div>
    </div>
</div><br />
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-head" style="font-weight: bold;text-align: center;">
                <h4 class="text-default">
                    Data Peserta Didik Baru 2019 / 2020
                </h4>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="dt-data">
                        <thead>
                            <tr>
                                <th style="width:3px;">#</th>
                                <th>Nama</th>
                                <th style="width:2px;">L/P</th>
                                <th>TTL</th>
                                <th>Alamat</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $q = $db->query('SELECT * FROM registrasi,data_casis,trespass WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis ORDER BY data_casis.id_casis ASC');
                            while ($d = $db->assoc($q)) { ?>

                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d['nama_lengkap'] ?></td>
                                    <td><?= $d['jenkel'] ?></td>
                                    <td><?= $d['ttl'] ?></td>
                                    <td><?= $d['alamat'] ?></td>
                                    <td><b><?= $d['jurusan1'] ?></b><br /><i><?= $d['jurusan2'] ?></i></td>
                                    <td>
                                        <?php
                                        if ($d['status'] == 'lulus') { ?>

                                            <form onchange="this.submit()" method="post">
                                                <select name="status" class="form-control">
                                                    <option value="lulus" selected>LULUS</option>
                                                    <option value="tidak">TIDAK LULUS</option>
                                                </select>
                                                <input type="hidden" name="id" value="<?= $d['id_reg'] ?>">
                                            </form>

                                        <?php
                                    } else { ?>

                                            <form onchange="this.submit()" method="post">
                                                <select name="status" class="form-control">
                                                    <option value="lulus">LULUS</option>
                                                    <option value="tidak" selected>TIDAK LULUS</option>
                                                </select>
                                                <input type="hidden" name="id" value="<?= $d['id_reg'] ?>">
                                            </form>

                                        <?php
                                    }
                                    if (isset($_POST['status'])) {
                                        $q = $db->update('registrasi', ['status' => $_POST['status']], ['id_reg' => $_POST['id']]);
                                        $core->redirect('admin.php?a=index');
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <!-- <a href="#" class="btn btn-xs btn-info"><i class="fa fa-info"></i></a> -->
                                        <a href="export.php?e=single&id=<?= $d['id_casis'] ?>" target="_blank" class="btn btn-xs btn-success"><i class="fa fa-print"></i></a>
                                        <a href="?a=index&ke=detail&idr=<?= $d['id_reg'] ?>&id=<?= $d['id_casis'] ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="?a=index&ke=dashboard&ac=del&idr=<?= $d['id_reg'] ?>&idc=<?= $d['id_casis'] ?>" onclick="return confirm('Anda Yakin ingin menghapus data ini ?')" href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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