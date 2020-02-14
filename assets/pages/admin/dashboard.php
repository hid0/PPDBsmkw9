<?php
$kt = $db->count_rows($db->query('SELECT * FROM `new_students` WHERE `new_students`.`jur_pertama`="KT"'));
$tkr = $db->count_rows($db->query('SELECT * FROM `new_students` WHERE `new_students`.`jur_pertama`="TKR"'));
$tkj = $db->count_rows($db->query('SELECT * FROM `new_students` WHERE `new_students`.`jur_pertama`="TKJ"'));
$pbs = $db->count_rows($db->query('SELECT * FROM `new_students` WHERE `new_students`.`jur_pertama`="PBS"'));
?>
<div class="row">
    <div class="col-md-3 col-sm-6 col-xl-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fa fa-object-group"></i>
            </span>
            <div class="info-box-content">
                <div class="info-box-text">Batik Kreatif dan Tekstil</div>
                <div class="info-box-number"><?=$kt?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xl-12">
        <div class="info-box">
            <span class="info-box-icon bg-red">
                <i class="fa fa-motorcycle"></i>
            </span>
            <div class="info-box-content">
                <div class="info-box-text">Teknik Kendaraan Ringan Otomotif</div>
                <div class="info-box-number"><?=$tkr?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xl-12">
        <div class="info-box">
            <span class="info-box-icon bg-green">
                <i class="fa fa-sitemap"></i>
            </span>
            <div class="info-box-content">
                <div class="info-box-text">Teknik Komputer Jaringan</div>
                <div class="info-box-number"><?=$tkj?></div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xl-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue">
                <i class="fa fa-bank"></i>
            </span>
            <div class="info-box-content">
                <div class="info-box-text">Sampah Total</div>
                <div class="info-box-number"><?=$pbs?></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-head" style="font-weight: bold;text-align: center;">
                <h4 class="text-default">
                    Data Peserta Didik Baru 2020 / 2021
                </h4>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dt-data">
                    <thead>
                        <tr>
                            <th style="width:3px;">#</th>
                            <th>Nama</th>
                            <th style="width:2px;">L/P</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                            <th>Status</th>
                            <th style="width:80px;">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        // $q = $db->query('SELECT * FROM registrasi,data_casis,trespass WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis ORDER BY data_casis.id_casis ASC');
                        $q = $db->query('SELECT * FROM new_students');
                        while ($res = $db->assoc($q)) { ?>

                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $res['nama'] ?></td>
                                <td><?= $res['jk'] ?></td>
                                <td><?= $res['alamat'] ?></td>
                                <td><b><?= $res['jur_pertama'] ?></b><br /><i><?= $res['jur_kedua'] ?></i></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>