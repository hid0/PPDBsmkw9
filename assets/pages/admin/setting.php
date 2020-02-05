<?php
// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND data_casis.id_casis='$_GET[id]' ");
// $d = $db->fetch($q);
?>
<div class="row">
    <div class="col-md-3">
        <div class="pull-left">
            <a href="javascript:history.back()" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
                Back
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-1">
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">
                    Setting Password
                </h4>
                <form method="post" class="box-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-id-badge"></i>
                            </div>
                            <input type="text" id="name" class="form-control" value="<?= $ez['name'] ?>" readonly disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" id="username" class="form-control" value="<?= $ez['username'] ?>" readonly disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </div>
                            <input type="password" id="pass" name="pass1" class="form-control" placeholder="*********" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass">re-enter Password</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-unlock-alt"></i>
                            </div>
                            <input type="password" id="pass" name="pass2" class="form-control" placeholder="*********" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="passku" class="btn btn-danger btn-block">
                            <i class="fa fa-unlock"></i>
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box box-info">
            <div class="box-header with-border">
                <h4 class="box-title">Change Theme</h4>
            </div>
            <form method="post" class="box-body" onchange="this.submit()">
                <div class="form-group">
                    <select name="theme" id="theme" class="form-control">
                        <option value="skin-black" <?= $ez['theme'] == "skin-black" ? "selected" : null ?>>Black</option>
                        <option value="skin-blue" <?= $ez['theme'] == "skin-blue" ? "selected" : null ?>>Blue</option>
                        <option value="skin-green" <?= $ez['theme'] == "skin-green" ? "selected" : null ?>>Green</option>
                        <option value="skin-yellow" <?= $ez['theme'] == "skin-yellow" ? "selected" : null ?>>Yellow</option>
                        <option value="skin-red" <?= $ez['theme'] == "skin-red" ? "selected" : null ?>>Red</option>
                        <option value="skin-purple" <?= $ez['theme'] == "skin-purple" ? "selected" : null ?>>Purple</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">Change Photo Profile</h4>
            </div>
            <form method="post" class="box-body" onchange="this.submit()">
                <div class="form-group">
                    <img src="<?= getImg() ?><?= $ez['profile'] ?>" alt="" style="width: 128px;height: 128px;">
                </div>
                <div class="form-group">
                    <select name="profile" id="profile" class="form-control">
                        <option value="avatar1.png" <?= $ez['profile'] == "avatar1.png" ? "selected" : null ?>>Avatar 1</option>
                        <option value="avatar2.png" <?= $ez['profile'] == "avatar2.png" ? "selected" : null ?>>Avatar 2</option>
                        <option value="avatar3.png" <?= $ez['profile'] == "avatar3.png" ? "selected" : null ?>>Avatar 3</option>
                        <option value="avatar4.png" <?= $ez['profile'] == "avatar4.png" ? "selected" : null ?>>Avatar 4</option>
                        <option value="avatar5.png" <?= $ez['profile'] == "avatar5.png" ? "selected" : null ?>>Avatar 5</option>
                        <option value="user1-128x128.jpg" <?= $ez['profile'] == "user1-128x128.jpg" ? "selected" : null ?>>User 1</option>
                        <option value="user2-160x160.jpg" <?= $ez['profile'] == "user2-160x160.jpg" ? "selected" : null ?>>User 2</option>
                        <option value="user3-128x128.jpg" <?= $ez['profile'] == "user3-128x128.jpg" ? "selected" : null ?>>User 3</option>
                        <option value="user4-128x128.jpg" <?= $ez['profile'] == "user4-128x128.jpg" ? "selected" : null ?>>User 4</option>
                        <option value="user5-128x128.jpg" <?= $ez['profile'] == "user5-128x128.jpg" ? "selected" : null ?>>User 5</option>
                        <option value="user6-128x128.jpg" <?= $ez['profile'] == "user6-128x128.jpg" ? "selected" : null ?>>User 6</option>
                        <option value="user7-128x128.jpg" <?= $ez['profile'] == "user7-128x128.jpg" ? "selected" : null ?>>User 7</option>
                        <option value="user8-128x128.jpg" <?= $ez['profile'] == "user8-128x128.jpg" ? "selected" : null ?>>User 8</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
<?php

if (isset($_POST['passku'])) {
    if ($_POST['pass1'] == $_POST['pass2']) {
        $db->update('padmin', ['password' => sha1($_POST['pass2'])], ['username' => $user]);
        echo "<script>alert('Password Changed!!');</script>";
    } elseif ($_POST['pass1'] != $_POST['pass2']) {
        echo "<script>alert('Pastikan Password sama!!!');</script>";
    }
} elseif (isset($_POST['theme'])) {
    $db->update('padmin', ['theme' => $_POST['theme']], ['username' => $user]);
    echo '<script type=\"text/javascript\">alertSuccess();</script>';
    $core->redirect('?a=setting');
} elseif (isset($_POST['profile'])) {
    $db->update('padmin', ['profile' => $_POST['profile']], ['username' => $user]);
    // echo '<script type=\"text/javascript\">alert(\"Berhasil Ganti Profile!!!\");</script>';
    echo "<script>alert('Berhasil Ganti!!!');</script>";
    $core->redirect('?a=setting');
}
