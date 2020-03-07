<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box">
            <div class="box-header" style="text-align: center;">
                <h5 class="box-title">Tagihan yang belum dibayar</h5>
            </div>
            <div class="box-body table-responsive" style="text-align: left;">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 5px;">#</th>
                            <th>Tagihan</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <?php
                    $n = 1;
                    $jk = $d['jenkel'];
                    $tgh = $db->query("SELECT *, SUM(jml_tag) AS totale FROM `tagihan` WHERE '$jk' = tagihan.utk");
                    while ($getD = $db->fetch($tgh)) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?=$n++?>.</td>
                            <td><?=$getD['nama_tagihan']?></td>
                            <td><?=idr($getD['jml_tag'])?></td>
                            <td><?=$getD['ket']?></td>
                        </tr>
                    </tbody>
                    <?php
                    }
                    $tot = $db->query("SELECT jml_tag, utk, SUM(jml_tag) AS totale FROM `tagihan` WHERE '$jk' = tagihan.utk");
                    $z = $db->fetch($tot);
                    ?>
                    <tfoot style="text-align: right; font-weight: bold;">
                        <tr>
                            <td colspan="2">Total</td>
                            <td><?=idr($z['totale'])?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>