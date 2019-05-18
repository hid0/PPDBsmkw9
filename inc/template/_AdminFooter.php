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
        // console.log('Berhasil');
    });
</script>
<script src="<?= getJS() ?>jquery.dataTables.min.js"></script>
<script src="<?= getJS() ?>dataTables.bootstrap.min.js"></script>
<script src="<?= getJs() ?>select2.min.js"></script>
<script src="<?= getJs() ?>sweetalert2.min.js"></script>
<script src="<?= getJS() ?>bootstrap.min.js"></script>
<script src="<?= getJS() ?>adminlte.min.js"></script>

</html>