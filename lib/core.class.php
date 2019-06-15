<?php 
/**
* MaFrame Library, Usefull library database and much more for php.
*
* @version 1.0
* @author Alin Koko Mansuby < alinkokomansuby@gmail.com >
* @copyright 2018
*
*/



Class Core_ko{

	public function __construct()
	{
		$dissalow_useragent = ['sqlmap','bot','curl'];
		if(preg_match("/".implode("|",$dissalow_useragent)."/",$_SERVER['HTTP_USER_AGENT']))
		{
			exit('Error.');
		}
	}
	public function filter_xss($filter)
	{
		$str = addslashes(stripslashes(strip_tags(htmlspecialchars($filter))));
		return $str;
	}
	public function filter_sqli($id)
	{
		$tolak = ['union','select','group','concat','order by'];
		$p = str_replace(implode("|",$tolak),"",$id);
		$p = abs($id);
		return $p;
	}
	public function create_session($data = array()){
		$np = "";
		if(is_array($data))
		{
			foreach($data as $name => $val)
			{
				$np.= $_SESSION[''.$name.''] = $val;
			}
		}
		return $np;
	}
	public function get_session($name)
	{
		if(empty($_SESSION[''.$name.'']))
		{
			$result = "empty";
		}
		else
		{
			$result = $_SESSION[''.$name.''];
		}

		return $result;
	}
	public function del_session()
	{
		return session_destroy();
	}
	public function hashm($str,$type = 'sha1')
	{
		if($type == 'sha1')
		{
			$h = sha1($str);
		}elseif($type == 'md5')
		{
			$h = md5($str);
		}elseif($type == 'shamd')
		{
			$h = sha1(md5($str));
		}elseif($type == 'mdsha')
		{
			$h = md5(sha1($str));
		}
		return $h;
	}
	public function export_excel($filename)
	{
	@header("Content-type: application/vnd-ms-excel");
    @header("Content-Disposition: attachment; filename=".$filename);
    // echo $content;
	}
	public function export_word($filename)
	{
	@header("Content-type: application/msword");
	@header("Content-disposition: inline; filename=".$filename);
	}
	public function redirect($kmn)
	{
		header('location:'.$kmn);
		ob_end_flush();
	}
	public function IndoTgl($jam=false)
	{
		switch (ceil(date('m'))) {
			case 1:
				$bln = "Januari";
				break;
			case 2:
				$bln = "Februari";
				break;
			case 3:
				$bln = "Maret";
				break;
			case 4:
				$bln = "April";
				break;
			case 5:
				$bln = "Mei";
				break;
			case 6:
				$bln = "Juni";
				break;
			case 7:
				$bln = "Juli";
				break;
			case 8:
				$bln = "Agustus";
				break;
			case 9:
				$bln = "September";
				break;
			case 10:
				$bln = "Oktober";
				break;
			case 11:
				$bln = "November";
				break;
			case 12:
				$bln = "Desember";
				break;
		}
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
		$hari = $seminggu[date('w')];
		$tglnow = date('d'); $tahun = date('Y');
		if($jam === true){
			$returnkan = $hari.", ".$tglnow." ".$bln." ".$tahun." , ".date('H:i:s');
		}else{ 
			$returnkan = $hari.", ".$tglnow." ".$bln." ".$tahun;
		}
		return $returnkan;
	}
	public function input_date($dt)
	{
		$e = explode("-",$dt);
		$tahun = $e[0];
		$bulan = $e[1];
		$tanggal = $e[2];
		switch (ceil($bulan)) {
			case 1:
				$bln = "Januari";
				break;
			case 2:
				$bln = "Februari";
				break;
			case 3:
				$bln = "Maret";
				break;
			case 4:
				$bln = "April";
				break;
			case 5:
				$bln = "Mei";
				break;
			case 6:
				$bln = "Juni";
				break;
			case 7:
				$bln = "Juli";
				break;
			case 8:
				$bln = "Agustus";
				break;
			case 9:
				$bln = "September";
				break;
			case 10:
				$bln = "Oktober";
				break;
			case 11:
				$bln = "November";
				break;
			case 12:
				$bln = "Desember";
				break;
		}
		return $tanggal.' '.$bln.' '.$tahun;
	}
	public function welcome() {
		print "<!DOCTYPE html><html><head><title>MaFrame Priv8 Library by Alinko.</title></head><body style='background:#eee;color:#888'><div style='max-width:500px;margin:0 auto;'><center><h1 style='color:#888;font-size:300%;margin-top:200px;font-family:courier'>Welcome MaFrame</h1></center></div></body></html>";
	}

}

?>