<?php
// exporter | coded by : alin koko mansuby
// modified | coded by : Faiz Hidayatulloh


require 'autoload.php';
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

function title($s,$format) {
	$ganti = array(' ','.',',');
	$diganti = array('-');
	$get = str_replace($ganti,$diganti,$s);
	$get = strtoupper(substr($get,0,10));
	$get = $get.'-SMKW9.'.$format;
	return $get;
}
if(isset($_GET['e'])) {
	if($_GET['e'] == 'single') {
		$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`id_pd`='$_GET[id]' ");
		$d = $db->fetch($q);
		if ($d['jk'] == 'L') {
			$jk     = "PUTRA";
			$jilbab = "-";
			$peci   = "35.000";
			$total  = "708.000";
		} elseif($d['jk'] == 'P') {
			$jk     = "PUTRI";
			$jilbab = "100.000";
			$peci   = "-";
			$total  = "773.000";
		} else {
			$jk = "";
		}
		$username = $d['nik'];
		$password = 'smkw9_jepara';
		if ($d['khusus'] == 'yatim') {
			$khusus = 'Yatim';
		} else if ($d['khusus'] == 'mts/smp w9') {
			$khusus = 'SMP/MTs W9';
		} else if ($d['khusus'] == 'saudara 1 unit') {
			$khusus = 'Sdr Se-Yysan';
		} else if ($d['khusus'] == 'pa/pi guru/karyawan') {
			$khusus = 'PutraGuru/Karyawan';
		} else if ($d['khusus'] == 'tahfidz') {
			$khusus = 'Hafidz';
		}
		$content = require('./assets/pages/pdf.php');
		
		$html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P','F4','en', false, 'UTF-8');
		$html2pdf->writeHTML($content);
		$html2pdf->output();
		// $core->export_word(title($get_data['id_casis'].$get_data['nama'],'docx'));

	} elseif($_GET['e'] == 'data') {
		if ($_GET['method'] == 'all') {

			$q = $db->query("SELECT * FROM `new_students` GROUP BY `new_students`.`nik`");
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
				<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('AllData-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'ngam') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`jalur_daftar`='umum' GROUP BY `new_students`.`nik`");
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataUmum-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'industri') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`jalur_daftar`='industri' GROUP BY `new_students`.`nik`");
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
						<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataIndustri-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'khos') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`jalur_daftar`='khusus' GROUP BY `new_students`.`nik`");
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
					<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataKhusus-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'kt') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`jur_pertama`='KT' GROUP BY `new_students`.`nik`");
			// $q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jur_pertama='KT' GROUP BY `new_students`.`nik`");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
					<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataKT-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'tkr') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`jur_pertama`='TKR' GROUP BY `new_students`.`nik`");
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
					<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataTKR-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'tkj') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`jur_pertama`='TKJ' GROUP BY `new_students`.`nik`");
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
					<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataTKJ-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'pbs') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`jur_pertama`='PBS' GROUP BY `new_students`.`nik`");
			// $q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jur_pertama='PBS' GROUP BY `new_students`.`nik`");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
					<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataPBS-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'hafidz') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`khusus`='tahfidz' GROUP BY `new_students`.`nik`");
			// $q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='tahfidz' GROUP BY `new_students`.`nik`");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
					<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataKhusus-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'yatim') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`khusus`='yatim' GROUP BY `new_students`.`nik`");
			// $q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='yatim' GROUP BY `new_students`.`nik`");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
					<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataYatim-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'anakGrKrywn') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`khusus`='pa/pi guru/karyawan' GROUP BY `new_students`.`nik`");
			// $q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='pa/pi guru/karyawan' GROUP BY `new_students`.`nik`");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
					<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('Data_pIp_AguruKrywn-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'w9') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`khusus`='mts/smp w9' GROUP BY `new_students`.`nik`");
			// $q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='mts/smp w9' GROUP BY `new_students`.`nik`");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
					<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<?php
			$core->export_excel('DataSmpMtsW9-PPDBSMKW9'.date('Y').'-'.time().'.xls');

		} elseif ($_GET['method'] == 'seYyysn') {

			$q = $db->query("SELECT * FROM `new_students` WHERE `new_students`.`khusus`='saudara 1 unit' GROUP BY `new_students`.`nik`");
			// $q = $db->query("SELECT * FROM registrasi,data_casis,trespass,nilai_un WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis AND nilai_un.id_casis=data_casis.id_casis AND registrasi.jalur_DaftarKhusus='saudara 1 unit' GROUP BY `new_students`.`nik`");
			//$get_data = $db->fetch($q);
			//print_r($get_data);
			?>
			<table border="1" style="width: 100%;border-collapse:collapse;">
			<thead>
					<tr>
						<th style="width:3px">No.</th>
						<th>NIK</th>
						<th>Nama lengkap</th>
						<th>Jurusan 1</th>
						<th>Jurusan 2</th>
						<th>JK</th>
						<th>Tempat Lahir</th>
						<th>Tgl Lahir</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>HP</th>
						<th>Transportasi</th>
						<th>Nama Ayah</th>
						<th>Pekerjaan Ayah</th>
						<th>Nama Ibu</th>
						<th>Pekerjaan Ibu</th>
						<th>Nama Wali</th>
						<th>Pekerjaan Wali</th>
						<th>Saudara</th>
						<th>Anakke</th>
						<th>Jalur Pendaftaran</th>
						<th>Asal Sekolah</th>
						<th>Alamat Asal Sekolah</th>
						<th>Prestasi Akademik</th>
						<th>Prestasi Nonakademik</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while($get_data = $db->fetch($q)){ ?>
					<tr>
					<td><?=$n++?></td>
						<td>'<?=$get_data['nik']?></td>
						<td><?=$get_data['nama']?></td>
						<td><?=$get_data['jur_pertama']?></td>
						<td><?=$get_data['jur_kedua']?></td>
						<td><?=$get_data['jk']?></td>
						<td><?=$get_data['tempat_lahir']?></td>
						<td><?=$get_data['tgl_lahir']?></td>
						<td><?=$get_data['agama']?></td>
						<td><?=$get_data['alamat']?></td>
						<td><?=$get_data['hp_ortu']?></td>
						<td><?=$get_data['kendaraan']?></td>
						<td><?=$get_data['ayah']?></td>
						<td><?=$get_data['kerjaan_ayah']?></td>
						<td><?=$get_data['ibu']?></td>
						<td><?=$get_data['kerjaan_ibu']?></td>
						<td><?=$get_data['wali']?></td>
						<td><?=$get_data['kerjaan_wali']?></td>
						<td><?=$get_data['jml_saudara']?></td>
						<td><?=$get_data['anakke']?></td>
						<td><?=$get_data['jalur_daftar']?></td>
						<td><?=$get_data['sekolah_asal']?></td>
						<td><?=$get_data['alamatnya']?></td>
						<td><?=$get_data['akademik']?></td>
						<td><?=$get_data['nonakademik']?></td>
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
		$er = $db->query('SELECT id_reg, nik, nama, jur_pertama, SUM(setor) AS totalSetor FROM `new_students` USING(nik) RIGHT JOIN `pembayaran` USING(nik) GROUP BY id_reg ASC');
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
					<td><?=$g['nama']?></td>
					<td><b><?=$g['jur_pertama']?></b></td>
					<td><?=idr($g['totalSetor'])?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php
		$core->export_excel('DataPembayaran'.time().'.xls');

	}
}