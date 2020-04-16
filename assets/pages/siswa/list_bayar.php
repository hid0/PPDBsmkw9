<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <div class="box-title"><i class="fa fa-money"></i> Riwayat Pembayaran <?= $d['setor'] ?></div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped table-hover">
                    <div class="table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 2.5px;">#</th>
                                <th>Tanggal Pembayaran</th>
                                <th style="width: 20em;">Setoran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            $nik = $_SESSION['user_siswa'];
                            $c = $db->query("SELECT * FROM pembayaran WHERE nik=$nik");
                            while ($b = $db->fetch($c)) { ?>
                            <tr>
                                <td><?= $n++ ?>.</td>
                                <td><?= localdate($b['tgl']) ?></td>
                                <td><?= idr($b['setor']) ?></td>
                            </tr>
                            <?php

} ?>
                        </tbody>
                        <tfoot>
                            <tr style="font-weight: bold;">
                                <td colspan="2" style="text-align: right;">Jumlah</td>
                                <?php
                                $nik = $_SESSION['user_siswa'];
                                $c = $db->query("SELECT SUM(setor) AS totalSetor FROM pembayaran WHERE nik=$nik");
                                $data = $db->fetch($c);
                                ?>
                                <!-- <td style="text-align: left;color: red;"><?= idr($gt['totalSetor']) ?></td> -->
                                <td style="text-align: left;color: red;"><?= idr($data['totalSetor']) ?></td>
                            </tr>
                        </tfoot>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // $("#riwayat").dataTable({
        //     "lengthMenu": [
        //         [5, 10, 15, -1],
        //         [5, 10, 15, "All"]
        //     ]

        // });
    });
</script>