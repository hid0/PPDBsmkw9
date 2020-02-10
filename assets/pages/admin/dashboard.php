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
</row>