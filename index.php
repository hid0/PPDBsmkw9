<?php

require 'autoload.php';
require __DIR__.'/vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepencyException;

if(@$_GET['register'] == 'true') {

	require getPages().'reg.php';

	if (isset($_POST['daftar'])) {
		// echo "next selanjutnya";
		// data diri peserta didik baru
		$id      = Uuid::uuid4()->toString();
		$nik     = $core->filter_xss($_POST['nik']);
		$nama    = strtoupper($core->filter_xss($_POST['nama']));
		$jk      = $core->filter_xss($_POST['jk']);
		$pass    = sha1($core->filter_xss($_POST['passwd']));
		$lahir   = $core->filter_xss($_POST['lahir']);
		$tgl     = $core->filter_xss($_POST['tgl_lahir']);
		$agm     = $core->filter_xss($_POST['agm']);
		$alamat  = $core->filter_xss($_POST['desa'] . " RT." . $_POST['rt'] . " RW." . $_POST['rw'] . ", " . $_POST['kec'] . ", " . $_POST['kab']);
		// data ortu
		$trnsprt = $core->filter_xss($_POST['trns']);
		$hp      = $core->filter_xss($_POST['nohp']);
		$hp1     = $core->filter_xss($_POST['nohp1']);
		$ayah    = $core->filter_xss($_POST['ayah']);
		$k_ayah  = $core->filter_xss($_POST['krj_ayah']);
		$ibu     = $core->filter_xss($_POST['ibu']);
		$k_ibu   = $core->filter_xss($_POST['krj_ibu']);
		$wali    = $core->filter_xss($_POST['wali']);
		$k_wali  = $core->filter_xss($_POST['krj_wali']);
		$sdr     = $core->filter_xss($_POST['sdr']);
		$anakke  = $core->filter_xss($_POST['anakke']);
		// jenis & informasi pendaftaran
		$jalur   = $core->filter_xss($_POST['jalur']);
		$khus    = $core->filter_xss($_POST['khus']);
		$jur1    = $core->filter_xss($_POST['jur1']);
		$jur2    = $core->filter_xss($_POST['jur2']);
		$asal    = $core->filter_xss($_POST['sek_asal']);
		$al_asal = $core->filter_xss($_POST['sek_asal_des']. ", ".$_POST['sek_asal_kec']);
		$preak   = $core->filter_xss($_POST['preak']);
		$prenon  = $core->filter_xss($_POST['prenon']);
		// trespass
		$rokok   = $core->filter_xss($_POST['rokok']);
		$kbthn   = $core->filter_xss($_POST['kbthn']);
		$tato    = $core->filter_xss($_POST['tato']);
		$buta    = $core->filter_xss($_POST['buta']);
		$yatim   = $core->filter_xss($_POST['yatim']);
		$kip     = $core->filter_xss($_POST['kip']);
		$status  = "Tidak";
		$time    = date('Y-m-d H:i:s', time());
		// proccessing insert data
		$siswa_baru = array('', $id, $nik, $nama, $jk, $pass, $lahir, $tgl, $agm, $alamat, $hp, $hp1, $trnsprt, $ayah, $k_ayah, $ibu, $k_ibu, $wali, $k_wali, $sdr, $anakke, $jalur, $khus, $jur1, $jur2, $asal, $al_asal, $preak, $prenon, $rokok, $kbthn, $tato, $buta, $yatim, $kip, $status, $time);
		if ($db->insert('new_students', $siswa_baru)) {
			echo "<script>alert('Peserta Didik Baru Berhasil Terdaftarkan!!');</script>";
			echo "<script>document.location.href = 'index.php?register=done&id=$id';</script>";
			// $core->redirect('?register=done&id='.+$id);
		} else {
			echo "<script>document.location.href = 'index.php?register=failed';</script>";
			// echo "<script>alert('Data Gagal Ditambahkan!!');</script>";
		}
		// $check = $db->query("SELECT nik FROM `new_students` WHERE `new_students`.`nik`='$nik'");
		// $c = $db->count_rows($check);
		// if ($c > 0) {
		// 	echo "<script>alert('Nomor NIK sudah terdaftar!');</script>";
		// 	echo "<meta http-equiv='refresh' content='0; url=?register=true'>";
		// } else {
		// }
		var_dump($siswa_baru);
	}
	
} else if (@$_GET['register'] == 'done') {
	
	require getPages().'reg-done.php';
	// var_dump($siswa_baru);
	// echo "finish";
	
} else if (@$_GET['register'] == 'failed') {

	echo "Gagal";

} else {

	echo "<script>document.location.href = 'index.html';</script>";
	
}

?>