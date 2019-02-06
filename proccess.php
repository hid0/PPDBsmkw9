<?php

// coded by : alin koko mansuby

require 'autoload.php';
//require 'config/q&a.php';

if(!empty($_GET['step']))
{
	if($_GET['step'] == '1')
	{

		//** collect data **//

		$jenis_daftar = $core->filter_xss($_POST['jp']);
		$jalur	= $core->filter_xss($_POST['jap']);
		$jl_khusus = $core->filter_xss($_POST['jl_khusus']);
		$jurusan1 = $core->filter_xss($_POST['jurusan1']);
		$jurusan2 = $core->filter_xss($_POST['jurusan2']);
		$asal_sekolah = $core->filter_xss($_POST['asal_sekolah']);
		$alamat_asal = $core->filter_xss($_POST['alamat_asal_sekolah']);
		$no_nik = $core->filter_xss($_POST['no_nik']);
		$p_akademik = $core->filter_xss($_POST['pakademik']);
		$p_nonakademik = $core->filter_xss($_POST['pnonakademik']);

		$check = $db->query("SELECT * FROM registrasi WHERE no_nik='$no_nik' ");
		$check = $db->count_rows($check);
		if($check > 0)
		{
			echo "<script>alert('Nomor NIK anda sudah terdaftar!');window.location.href='index.php?register=yea'</script>";

		}else if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
				echo "<script>alert('CAPTCHA SALAH !!');window.location.href='index.php?register=yea'</script>";
		}else{

		// insert to table user
		$pw = 'smkw9_'.substr($no_nik,6,11);
        $mk_pw = md5($pw);
        $_SESSION['unuser'] = $no_nik;
        $_SESSION['pwuser'] = $pw;
		$data = array('',$jenis_daftar,$jalur,$jl_khusus,$jurusan1,$jurusan2,$asal_sekolah,$alamat_asal,$no_nik,$mk_pw,$p_akademik,$p_nonakademik,'tidak');

		$data_user = array($no_nik,$mk_pw,'siswa');
		if($db->insert('registrasi',$data))
		{
			//$db->insert('user',$data_user);
			$regid = $db->fetch($db->query("SELECT * FROM registrasi WHERE no_nik='$no_nik' "))['id_reg']; // get ID
			$core->redirect('./?a=step2&regid='.base64_encode($regid));
		}else{
				print_r($db->error());
			exit("<h1> Error. Server sedang error</h1>".$db->error());
		}
	}
	}elseif($_GET['step'] == '2')
	{
		//** collect data dude. **.///
		// coded by : alin koko mansuby
		$regid = $core->filter_xss($_POST['id_reg']);
		$nama = $core->filter_xss($_POST['nama_lengkap']);
		$jk = $core->filter_xss($_POST['jk']);
		$ttl = $core->filter_xss($_POST['tmpt_lahir'].', '.$core->input_date($_POST['tgl_lahir']));
		$alamat = $core->filter_xss("RT:".$_POST['rt'].", RW:".$_POST['rw'].", Desa : ".$_POST['desa'].", Kecamatan : ".$_POST['kecamatan'].", Kabupaten/Kota : ".$_POST['kabupaten']);
		$tinggal = $core->filter_xss($_POST['tempat_tinggal']);
		$transport = $core->filter_xss($_POST['transportasi']);
		$hp = $core->filter_xss($_POST['hp']);
		$email = $core->filter_xss($_POST['email']);
		// ayah
		$ayah = $core->filter_xss($_POST['nama_ayah']);
		$kerja_ayah = $core->filter_xss($_POST['pekerjaan_ayah']);
		// ibu
		$ibu = $core->filter_xss($_POST['nama_ibu']);
		$kerja_ibu = $core->filter_xss($_POST['pekerjaan_ibu']);
		//wali
		$wali = $core->filter_xss($_POST['nama_wali']);
		$kerja_wali = $core->filter_xss($_POST['pekerjaan_wali']);

		$anak = $core->filter_xss($_POST['anakke']);
		$saudara = $core->filter_xss($_POST['saudara']);

		$data = array('',$regid,$nama,$jk,$ttl,'Islam',$alamat,$tinggal,$transport,$hp,$email,$ayah,$kerja_ayah,$ibu,$kerja_ibu,$wali,$kerja_wali,$anak,$saudara);


		$data_siswa = array($_SESSION['unuser'],$nama,$alamat,'Islam');
		if($db->insert('data_casis',$data))
		{
			$db->insert('siswa',$data_siswa);
			$db->insert('detail_kelas',[$_SESSION['unuser'],'8']);
			$idsis = $db->fetch($db->query("SELECT * FROM data_casis WHERE id_reg='$regid' "))['id_casis']; // get ID
			$core->redirect('./?a=step3&idreg='.base64_encode($regid).'&idsis='.base64_encode($idsis));
		}else{
			exit("<h1> Error. Server sedang error</h1>");
		}

	}elseif($_GET['step'] == '3')
	{
		$idsis = $_POST['idsis'];
		$idreg = $_POST['idreg'];

		$nilai = array('',$idsis,$idreg,$_POST['mtk'],$_POST['bindo'],$_POST['bing'],$_POST['ipa']);
		$qna = array('',$idsis,$_POST['rokok'],$_POST['tato'],$_POST['bk'],$_POST['bw'],$_POST['info'],$_POST['info0'],$_POST['info1'],$_POST['info2'],$_POST['info3'],$_POST['info4'],$_POST['info5'],$_POST['rekom'],$_POST['nm_siswa'],$_POST['nm_guru']);


		// insert nilai
		@$db->insert('nilai_un',$nilai);
		@$db->insert('trespass',$qna);
		$core->redirect('./?a=done&c='.base64_encode(str_rot13($core->get_session('unuser').'|'.$core->get_session('pwuser').'|'.$idsis.'|'.$idreg)));

	}
}

 ?>