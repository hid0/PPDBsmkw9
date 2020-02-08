<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="Faiz Hidayatulloh">
	<title>Login Admin | PPDB SMK Walisongo Pecangaan</title>
	<link rel="shortcut icon" href="<?= getImg(); ?>logo-smk.png" type="image/x-icon">
	<link rel="stylesheet" href="<?= getCss() ?>bootstrap.min.css">
	<link rel="stylesheet" href="<?= getCss() ?>font-awesome.min.css">
	<link rel="stylesheet" href="<?= getCss() ?>ionicons.min.css">
	<link rel="stylesheet" href="<?= getCss() ?>AdminLTE.min.css">
	<script src="<?= getJs() ?>jquery.min.js"></script>
	<script src="<?= getJs() ?>bootstrap.min.js"></script>
</head>

<body>

	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<b>SMK</b> Walisongo
			</div>
			<div class="login-box-body">
				<p class="login-box-msg">Sign in to admin Dashboard</p>

				<form action="" method="post">
					<div class="form-group has-feedback">
						<input type="text" name="username" class="form-control" placeholder="Username" autofocus>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
						</div>
					</div>
				</form><br />
	</body>

</html>
<?php
if (isset($_POST['submit'])) {
	$username = $core->filter_xss($_POST['username']);
	$password = $core->filter_xss(sha1($_POST['password']));

	$q = $db->query("SELECT * FROM padmin WHERE username='$username' AND password='$password' ");
	$n = $db->count_rows($q);
	$f = $db->fetch($q);

	if ($n > 0) {
		$_SESSION['user_admin'] = $f['username'];
		$_SESSION['pass_admin'] = $f['password'];
		$_SESSION['rol_log'] = $f['roles'];
		// $_SESSION['user_name'] = $f['name'];
		$core->redirect('admin.php?page=dashboard');
	} else {
		echo  "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Anda Gagal Login!!!</strong></div>";
		// $core->redirect('admin.php?error=1');
	}
}
?>