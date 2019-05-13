<div class="row">
    <div class="col-md-3">
        <div class="pull-left">
            <a href="?a=nagih" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
                Back
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-success">
            <div class="box-header with-border">
                <h4 class="box-title">
                    Tambah Data Tagihan
                </h4>
            </div>
            <div class="box-body">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Nama Tagihan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <!-- <i class="fa fa-dollar"></i> -->
                                <span>Rp</span>
                            </div>
                            <input type="text" name="rp" class="form-control" placeholder="Jumlah Contoh = 100000" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-users"></i>
                            </div>
                            <select name="for" class="form-control" required>
                                <option value="">-- Select Only One --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-comments"></i>
                            </div>
                            <textarea name="ket" id="ket" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="smpn" class="btn btn-block btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['smpn'])) {
    $nm = $core->filter_xss($_POST['name']);
    $rp = $core->filter_xss($_POST['rp']);
    $for = $core->filter_xss($_POST['for']);
    $ket = $core->filter_xss($_POST['ket']);
    // data tampung dalam array

    $dataTag = array('', $nm, $rp, $for, $ket);

    // var_dump($dataTag);

    if ($db->insert('tagihan', $dataTag)) {
        echo "<script>alert('Data Berhasil Tersimpan!!!');</script>";
        // echo "<script>javascript:history.back();</script>";
        $core->redirect('?a=nagih');
    } else {
        echo "<script>alert('Gagal Masukin Data.....');</script>";
    }
}
