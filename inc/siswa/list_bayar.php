<?php
$nik = $_SESSION['user_siswa'];
$q = $db->query("SELECT id_casis, nama_lengkap, jurusan1, tanggal, SUM(setor) AS totalSetor FROM `registrasi` RIGHT JOIN `data_casis` USING(id_reg) RIGHT JOIN `pembayaran` USING(id_casis) WHERE registrasi.id_reg=data_casis.id_reg AND data_casis.id_casis=pembayaran.id_casis AND registrasi.no_nik='$nik' ");
// $q = $db->query('SELECT id_casis, nama_lengkap, jurusan1, SUM(setor) AS totalSetor FROM registrasi RIGHT JOIN data_casis USING(id_reg) RIGHT JOIN pembayaran USING(id_casis) WHERE registrasi.no_nik="$f"');
// $q = $db->query("SELECT id_casis, nama_lengkap, no_nik, SUM(setor) AS totalSetor FROM registrasi RIGHT JOIN data_casis USING(id_reg) RIGHT JOIN pembayaran USING(id_casis) WHERE registrasi.no_nik='$nik'");
$gt = $db->fetch($q);
?>
<title>Histori Pembayaran | PPDB SMK Walisongo Pecangaan</title>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header">
                <div class="box-title"><i class="fa fa-money"></i> Riwayat Pembayaran <?=$gt['nama_lengkap']?></div>
            </div>
            <div class="box-body">
                <div class="table-responsive" style="position: abosulute;scroll-snap-points-y: inherit;">
                    <table class="table table-bordered table-striped table-hover" id="riwayat">
                        <thead>
                            <tr>
                                <th style="width: 3px;">No.</th>
                                <th>Tanggal Pembayaran</th>
                                <th style="width: 20em;">Setoran</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $n = 1;
                        $nik = $_SESSION['user_siswa'];
                        $c = $db->query("SELECT id_casis, nama_lengkap, jurusan1, tanggal, setor, SUM(setor) AS totalSetor FROM `registrasi` RIGHT JOIN `data_casis` USING(id_reg) RIGHT JOIN `pembayaran` USING(id_casis) WHERE registrasi.no_nik='$nik' ");
                        while ($b = $db->fetch($c)) { ?>
                            <tr>
                                <td><?=$n++?>.</td>
                                <td><?=localdate($b['tanggal'])?></td>
                                <td><?=idr($b['setor'])?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;">Jumlah</td>
                                <td style="text-align: left;color: red;"><?=idr($gt['totalSetor'])?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $("#riwayat").dataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]

        });
    });
</script>