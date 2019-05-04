<!DOCTYPE html>
<html>
<head>
	<title>:: PPDB SMK WALISONGO JEPARA ::</title>
	<meta charset="utf-8">
	<meta name="author" content="Alin Koko Mansuby">
	<meta name="description" content="PPDB SMK WALISONGO JEPARA">
	<link rel="icon" type="text/css" href="assets/img/logo-smk.png">
</head>
<style type="text/css">
	*{
		box-sizing: border-box;
	}
	body, html{
		font-family: sans-serif;
		font-size: 16px;
		margin: 0;
		padding: 0;
		scroll-behavior: smooth;
	}
	nav{
		background: #444;
		margin: 0;
		padding: 0;
		overflow: hidden;
		position: fixed;
		top: 0;
		width: 100%;
	}
	nav a.brand{
		float: left;
		display: block;
		padding: 14px 16px;
		text-decoration: none;
		color: #fff;
	}
	nav .menu{
		float: right;
	}
	nav .menu a{
		display: inline-block;
		padding: 14px 16px;
		color: #fff;
		text-decoration: none;
	}
	.container-full{
		width: 100%;
	}
	header.padding-64{
		background: #4CAF50;
		padding: 200px 0;
		text-align: center;
		color: #fff;
		height: 700px;
	}
	header.padding-64 h4{
		font-size: 22px;
		font-weight: 100;
		margin: 16px 0 8px 0;
		padding: 0;
	}
	header.padding-64 h1{
		font-weight: 100%;
		font-family: serif;
		margin: 20px 0 20px 0;
	}
	header.padding-64 small{
		margin: 16px 0 16px 0;
		font-size: 14px;
	}
	a.btn{
		background: #444;
		color: #fff;
		padding: 16px 32px;
		text-decoration: none;
		border-radius: 4px;
	}
	a.btn:hover{
		background: #555;
	}
</style>
<body>
	<nav class="navbar">
		<a href="#" class="brand">
			<b>SMK WALISONGO PECANGAAN</b>
		</a>
		<div class="menu">
			<a href="#infoDaftar">Info pendaftaran</a>
			<a href="#banner">Program jurusan</a>
			<a href="http://smkw9jepara.sch.id">Website Sekolah</a>
			<a href="index.php?register=yea">PPDB</a>
			<a href="siswa.php">Login Siswa</a>
		</div>
	</nav>
	<tag id="refresh"></tag>
	<script type="text/javascript">
		function openDaftar()
		{
			document.getElementById('refresh').innerHTML="<meta http-equiv='refresh' content='3;url=index.php?register=yea'>";
		}
	</script>
	<div class="container-full">
		<header class="padding-64">
			<h4>selamat datang di PPDB</h4>
			<h1>SMK WALISONGO PECANGAAN JEPARA</h1>
			<small>Jl. Kauman No.1 Pecangaan 59462</small><br><br><br><br>
			<a href="index.php?register=yea" onclick="openDaftar();" class="btn">Daftar Sekarang</a>
		</header>
		<div id="infoDaftar">
			<img src="alur.jpg" style="width: 100%;height: 100%;">
		</div>
		<div style="margin: 0 auto;width: 100%" id="banner">
		<img src="img1.png" style="width: 100%;height: 100%;">
		<img src="img.png" style="width: 100%;height: 100%;">
	</div>
	</div>
</body>
</html>