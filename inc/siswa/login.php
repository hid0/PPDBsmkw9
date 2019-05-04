<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Faiz Hidayatulloh">
    <title>Login Siswa | PPDB SMK Walisongo Pecangaan</title>
    <link rel="shortcut icon" href="<?= getImg(); ?>logo-smk.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= getCss() ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>ionicons.min.css">
    <link rel="stylesheet" href="<?= getCss() ?>AdminLTE.min.css">
    <script src="<?= getJs() ?>jquery.min.js"></script>
    <script src="<?= getJs() ?>bootstrap.min.js"></script>
    <script src="<?= getAsset() ?>iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</head>

<body>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <b>SMK</b> Walisongo
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to Siswa Dashboard</p>

                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" name="nik" class="form-control" placeholder="NIK" autofocus required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                        </div>
                    </div>
                </form>

    </body>

</html>
<?php
if (isset($_POST['submit'])) {
	$nik = $core->filter_xss($_POST['nik']);
	$password = $core->filter_xss(md5($_POST['password']));

	$q = $db->query("SELECT * FROM registrasi WHERE no_nik='$nik' AND password_login='$password' ");
	$n = $db->count_rows($q);
	$f = $db->fetch($q);

	if ($n > 0) {
		$_SESSION['user_siswa'] = $f['no_nik'];
		$_SESSION['pass_siswa'] = $f['password_login'];
		$core->redirect('siswa.php?a=index');
	} else {
		$core->redirect('siswa.php?error=1');
	}
}
?>
<!--
<form class="w3-container" method="post">
<label>Username</label>
<input class="w3-input w3-border" type="text" placeholder="Username" name="username">
<label>Password</label>
<input class="w3-input w3-border" type="password" placeholder="password" name="password"><br/>
<input type="submit" name="submit" value="Masuk" class="w3-btn w3-teal">
</form>
</div> --> 