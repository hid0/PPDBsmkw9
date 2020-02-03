<?php
require 'autoload.php';
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$getKet = $db->fetch($db->select('jadwal'));
$secret = explode("|",base64_decode($_GET['secret']));
$username = $secret[0];
$password = $secret[1];

$q = $db->query("SELECT * FROM registrasi,data_casis WHERE registrasi.id_reg=data_casis.id_reg AND registrasi.id_reg='$_GET[idr]' AND data_casis.id_casis='$_GET[ids]' ");
$d = $db->fetch($q);
if($d['jenkel'] == 'L')
{
	$jk = "Laki-Laki";
}elseif($d['jenkel'] == 'P')
{
	$jk = "Perempuan";
}else{
	$jk = "Unknown";
}

$c =
'<style type="text/css">
	<!--
	.content{width: 100%;margin:  0 auto;}
	.tabel1,.tabel2,.tabel3{width:800px;margin: 0 auto;}.tabel2{border: 1px solid #000;border-collapse: collapse;width: 800px;}.tabel3{width: 800px;text-align: center;}
	.td1{border-bottom: 2px solid #000}.td2{text-align: center;}.td3{text-align: center;width: 200px}.td4{padding: 10px}
	.tr1{background: #eee;color: #000;border: 1px solid #000;width: 800px}
	.fieldset1{width:157px;height:236px;border: 1px solid #000;text-align: center}
	-->
</style>
<div class="content">
<table class="tabel1" align="center" style="width: 800px">
	<tr><td><img src="assets/img/logo-smk.png"></td><td align="center">
		<h2>PENERIMAAN PESERTA DIDIK BARU</h2>
		<h3>SMK WALISONGO PECANGAAN JEPARA</h3>
		<h4>Tahun Ajaran 2018/2019</h4>
	</td></tr>
	<tr><td colspan="2" class="td1"></td></tr>
	<tr><td colspan="2" class="td2">
			<br>
			<h1>BUKTI PENDAFTARAN</h1>
			<br>
	</td></tr>
</table>
<table class="tabel2" align="center">
	<tr class="tr1">
				<td class="td3">Nomor pendaftaran<br><br>
					<b>'.$d['id_reg'].'</b>
				</td><td class="td3">Pilihan jurusan<br><br>
					<b>1. '.$d['jurusan1'].' | 2. '.$d['jurusan2'].'</b></td><td class="td3">Tanggal daftar<br><br>
						<b>'.$core->IndoTgl().'</b></td></tr>
			<tr><td colspan="3" class="td4"></td></tr>
			<tr><td>Nama Lengkap :</td><td>'.$d['nama_lengkap'].'</td></tr>
			<tr><td>Tempat,Tgl. Lahir</td><td>'.$d['ttl'].'</td></tr>
			<tr><td>Jenis kelamin</td><td>'.$jk.'</td></tr>
			<tr><td>Alamat</td><td  style="width:200px;word-wrap:break-word;"><p style="word-wrap:break-word;">'.$d['alamat'].'</p></td></tr>
			<tr><td>Sekolah asal</td><td>'.$d['asal_sekolah'].'</td></tr>
			<tr><td colspan="3"><br><br></td></tr>
</table>

		<br><br><br><br>
<table class="tabel3" align="center">
		<tr><td colspan="3"><p align="left">Mengetahui,</p></td></tr>
		<tr><td colspan="3"><br><br></td></tr>
		<tr><td class="td3"><b>Calon Siswa</b></td><td class="td3"><b>Orang tua/Wali</b></td><td class="td3"><b>Panitia PPDB</b></td></tr>
		<tr><td colspan="3"><br><br><br></td></tr>
		<tr><td class="td3">'.$d['nama_lengkap'].'</td><td class="td3">..........</td><td class="td3">..........</td></tr>
</table>
<br>
<p><font color=red>*</font> NB : Cetak/Print Dokumen ini dan bawa persyaratan pendaftaran di bawah ini saat daftar ulang :</p>
<ul>
	<li>Fotocopy Kartu Keluarga (KK)</li>
	<li>Fotocopy Ijazah SMP/MTs.</li>
	<li>Fotocopy Ijazah SD/MI</li>
	<li>Fotocopy Surat Keterangan Kelulusan</li>
</ul>
<hr style="border:1px solid dashed">
<table align="center">
	<tr><td colspan="3" style="border-bottom: 1px solid #000;" align="center"><b> INFORMASI LOGIN | PPDB SMK WALISONGO PECANGAAN</b></td></tr>
	<tr><td rowspan="4"><img src="assets/img/logo-smk.png"></td><td>USERNAME :</td><td>'.$username.'</td></tr>
	<tr><td>PASSWORD</td><td>'.$password.'</td></tr>
	<!--<tr><td>TANGGAL/JAM</td><td>'.$getKet['tanggal'].' / '.$getKet['jam'].'</td></tr>
	<tr><td>ONLINE </td><td>'.$getKet['homepage'].'</td></tr>-->
</table>
</div>';

$content = require('./assets/pdf.php');


$html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P','A4','en', false, 'UTF-8');
$html2pdf->writeHTML($content);
$html2pdf->output();
