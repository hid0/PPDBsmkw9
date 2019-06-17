<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer" style="height: 45px !important;">
    <!-- <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div> -->
    <strong>Copyright &copy; 2018 - <?= date('Y') ?> <a target="_blank" href="http://smkw9jepara.sch.id">SMK Walisongo Pecangaan</a>.</strong> All rights
    reserved.
</footer>

</div>

</body>
<script src="<?= getJS() ?>jquery.dataTables.min.js"></script>
<script src="<?= getJS() ?>dataTables.bootstrap.min.js"></script>
<script src="<?= getJs() ?>select2.min.js"></script>
<script src="<?= getJs() ?>sweetalert2.min.js"></script>
<script src="<?= getJS() ?>bootstrap.min.js"></script>
<script src="<?= getJS() ?>adminlte.min.js"></script>
<!-- <script src="<?= getJs() ?>Chart.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<?php
$kt = $db->query("SELECT * FROM registrasi WHERE jurusan1 = 'KT'");
$num_kt = $db->count_rows($kt);
$tkr = $db->query("SELECT * FROM registrasi WHERE jurusan1 = 'TKR'");
$num_tkr = $db->count_rows($tkr);
$tkj = $db->query("SELECT * FROM registrasi WHERE jurusan1 = 'TKJ'");
$num_tkj = $db->count_rows($tkj);
$pbs = $db->query("SELECT * FROM registrasi WHERE jurusan1 = 'PBS'");
$num_PBS = $db->count_rows($pbs);
?>
<script>
    $(document).ready(function() {
        $("#dt-data").DataTable({
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "All"]
            ],
            "targets": 'no-sort',
            "bSort": false,
            "order": []
        });
    });
    var ctx = document.getElementById('Donut').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Kriya Tekstil', 'Teknik Kendaraan Ringan', 'Teknik Komputer dan Jaringan', 'Perbankan Syari\'ah'],
            datasets: [{
                label: '',
                data: [<?=$num_kt?>, <?=$num_tkr?>, <?=$num_tkj?>, <?=$num_pbs?>],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
</html>