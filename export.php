<?php
// exporter | coded by : alin koko mansuby


require 'autoload.php';
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

function title($s,$format)
{
	$ganti = array(' ','.',',');
	$diganti = array('-');
	$get = str_replace($ganti,$diganti,$s);
	$get = strtoupper(substr($get,0,10));
	$get = $get.'-SMKW9.'.$format;
	return $get;
}
if(isset($_GET['e']))
{
	if($_GET['e'] == 'single')
	{
		$q = $db->query("SELECT * FROM registrasi,data_casis,trespass WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND data_casis.id_casis='$_GET[id]' ");
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
		$username = $d['no_nik'];
		$password = 'smkw9_' . substr($username, 6, 11);
		//print_r($get_data);
		//$core->export_excel(title($get_data['id_casis'].$get_data['nama_lengkap'],'xls'));
		$content = require('./assets/pdf.php');
		
		$html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P','A4','en', false, 'UTF-8');
		$html2pdf->writeHTML($content);
		$html2pdf->output();
		// $core->export_word(title($get_data['id_casis'].$get_data['nama_lengkap'],'docx'));
	} elseif($_GET['e'] == 'data')
	{
		if ($_GET['method'] == 'all') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis ");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('AllData-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'ngam') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_pendaftaran='umum' ");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_pendaftaran='umum' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataUmum-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'khos') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_pendaftaran='khusus' ");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_pendaftaran='khusus' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataKhusus-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'kt') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jurusan1='KT' ");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jurusan1='KT' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataKT-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'tkr') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jurusan1='TKR'");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jurusan1='TKR' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataTKR-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'tkj') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jurusan1='TKJ' ");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jurusan1='TKJ' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataTKJ-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'pbs') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jurusan1='PBS'");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jurusan1='PBS' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataPBS-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'hafidz') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='tahfidz' ");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='tahfidz' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataKhusus-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'yatim') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='yatim' ");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='yatim' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataYatim-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'anakGrKrywn') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='pa/pi guru/karyawan' ");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='pa/pi guru/karyawan' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('Data_pIp_AguruKrywn-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'w9') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='mts/smp w9' ");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='mts/smp w9' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataSmpMtsW9-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'seYyysn') {

			// $q = $db->query("SELECT * FROM `registrasi`,`data_casis`,`trespass`,`nilai_un` WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='saudara 1 unit' ");
			$q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='saudara 1 unit' GROUP BY data_casis.id_casis");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>Nama lengkap</th>
						<th>JK</th>
						<th>TTL</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Transportasi</th>
						<th>HP</th>
						<th>Email</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Anakke</th>
						<th>saudara</th>
						<th>MTK</th>
						<th>B.Indo</th>
						<th>B.Inggris</th>
						<th>IPA</th>
						<th>Jenis Pendaftaran</th>
						<th>Jalur Pendaftaran</th>
						<th>Jalur Khusus</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
						<th>Merokok</th>
						<th>Berkebutuhan khusus</th>
						<th>Bertato</th>
						<th>Buta warna</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->assoc($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td><?=$get_data['no_nik']?></td>
						<td><?=$get_data['jurusan1']?></td>
						<td><?=$get_data['jurusan2']?></td>
						<td><?=$get_data['nama_lengkap']?></td>
						<td><?=$get_data['jenkel']?></td>
						<td><?=$get_data['ttl']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['transportasi']?></td>
						<td><?=$get_data['hp']?></td>
						<td><?=$get_data['email']?></td>
						<td><?=$get_data['nama_ayah']?></td>
						<td><?=$get_data['pekerjaan_ayah']?></td>
						<td><?=$get_data['nama_ibu']?></td>
						<td><?=$get_data['pekerjaan_ibu']?></td>
						<td><?=$get_data['nama_wali']?></td>
						<td><?=$get_data['pekerjaan_wali']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['saudara']?></td>
						<td><?=$get_data['mtk']?></td>
						<td><?=$get_data['bindo']?></td>
						<td><?=$get_data['bing']?></td>
						<td><?=$get_data['ipa']?></td>
						<td><?=$get_data['jenis_pendaftaran']?></td>
						<td><?=$get_data['jalur_pendaftaran']?></td>
						<td><?=$get_data['jalur_DaftarKhusus']?></td>
						<td><?=$get_data['asal_sekolah']?></td>
						<td><?=$get_data['alamat_asal_sekolah']?></td>
						<td><?=$get_data['prestasi_akademik']?></td>
						<td><?=$get_data['prestasi_nonakademik']?></td>
						<td><?=$get_data['merokok']?></td>
						<td><?=$get_data['bk']?></td>
						<td><?=$get_data['bertato']?></td>
						<td><?=$get_data['bw']?></td>
						<td><?=strtoupper($get_data['status'])?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('Data_SeYysn-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		}
	} elseif ($_GET['e'] == 'bayar') {
		$n = 1;
		$er = $db->query('SELECT id_casis, nama_lengkap, jurusan1, SUM(setor) AS totalSetor FROM registrasi RIGHT JOIN data_casis USING(id_reg) RIGHT JOIN pembayaran USING(id_casis) GROUP BY id_casis ASC');
		?>
		<h3>Laporan Pembayaran PPDB 2019</h3>
		<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
				<tr>
					<th style="width:3%x;">#</th>
					<th>Nama Lengkap</th>
					<th>Jurusan</th>
					<th>Saldo</th>
				</tr>
			</thead>
			<tbody>
			<?php
			while ($g = $db->fetch($er)) { ?>
				<tr>
					<td><?=$n++?>.</td>
					<td><?=$g['nama_lengkap']?></td>
					<td><b><?=$g['jurusan1']?></b></td>
					<td><?=idr($g['totalSetor'])?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php
		$core->export_excel('DataPembayaran'.time().'.xls');

	} elseif($_GET['e'] == 'get_all')
	{
		$q = $db->query("SELECT * FROM registrasi,data_casis,trespass WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis ");
		//$get_data = $db->fetch($q);
		//print_r($get_data);
		?>
		<table border="1" style="width: 100%;border-collapse:collapse;">
	<thead>
		<tr>
			<th style="width:8%">No.</th><th>Nama lengkap</th><th>Merokok</th><th>Berkebutuhan khusus</th><th>Bertato</th><th>Buta warna</th><th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$n = 1;
		while($get_data = $db->fetch($q)){
		echo "<tr><td>".$n++."</td><td>".$get_data['nama_lengkap']."</td>
		<td>".$get_data['merokok']."</td>
		<td>".$get_data['bk']."</td>
		<td>".$get_data['bertato']."</td>
		<td>".$get_data['bw']."</td>
		<td>".strtoupper($get_data['status'])."</td>
		</tr>";
	}
	?>
	</tbody>
</table>
<?php
		$core->export_excel('AllData-PPDBSMKW9'.time().'.xls');


	}elseif ($_GET['e'] == 'get_ujian') {
		error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
require 'ujian/panel/pages/PHPExcel.php';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")->setLastModifiedBy("Maarten Balliauw")->setTitle("Office 2007 XLSX Test Document")->setSubject("Office 2007 XLSX Test Document")->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")->setKeywords("office 2007 openxml php")->setCategory("Test result file");


  //  $objPHPExcel->getActiveSheet()->getStyle("A1:M1")->applyFromArray($style);


//cellColor('A', 'e7e7e7');
//cellColor('A30:Z30', 'F28A8C');

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);

// Add some data
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:A2')->setCellValue('A1','NOMER UJIAN')->mergeCells('B1:B2')->setCellValue('B1','NAMA SISWA')->mergeCells('C1:C2')->setCellValue('C1','NIS')->mergeCells('D1:D2')->setCellValue('D1','SESI UJIAN')->mergeCells('E1:E2')->setCellValue('E1','RUANG UJIAN')->setCellValue('F1', 'KODE LEVEL')->setCellValue('F2','Baca comment')->setCellValue('G1', 'KODE KELAS')->setCellValue('G2','Baca comment')->mergeCells('H1:H2')->setCellValue('H1','JENIS KELAMIN')->mergeCells('I1:I2')->setCellValue('I1','PASSWORD')->setCellValue('J1', 'JURUSAN')->setCellValue('J2','Baca comment')->mergeCells('K1:K2')->setCellValue('K1','FOTO')->mergeCells('L1:L2')->setCellValue('L1','AGAMA')->mergeCells('M1:M2')->setCellValue('M1','PILIHAN');

$getSiswa = $db->query("SELECT * FROM registrasi,data_casis WHERE registrasi.id_reg=data_casis.id_reg");
$baris = 3;
$no=0;
while ($d = $db->fetch($getSiswa)) {
		$no_ujian = $d['no_ujian'];
		$nama = $d['nama_lengkap'];
		$nis = $d['nis'];
		$sesi = '1';
		$ruang = 'DIMANA SAJA';
		$kode = 'X';
		$kelas = 'XPSB';
		$jk = $d['jenkel'];
		$pass = 'smkw9_'.substr($no_ujian,0,4);
		$jur = $d['jurusan1'];
		$agama = 'ISLAM';
		$pilihan = 'UMUM';

		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$baris, $no_ujian)->setCellValue("B".$baris, $nama)->setCellValue("C".$baris, $nis)->setCellValue("D".$baris, $sesi)->setCellValue("E".$baris, $ruang)->setCellValue("F".$baris, $kode)->setCellValue("G".$baris, $kelas)->setCellValue("H".$baris, $jk)->setCellValue("I".$baris, $pass)->setCellValue("J".$baris, $jur)->setCellValue("L".$baris, $agama)->setCellValue("M".$baris, $pilihan);
     	$baris = $baris+1;

}
$objPHPExcel->getActiveSheet()->setTitle('DATA SISWA');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="DataSiswaPSB-'.date('dmY').'.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit;

}

}