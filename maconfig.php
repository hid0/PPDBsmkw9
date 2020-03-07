<?php
/**
* MaFrame Library, Usefull library database and much more for php.
*
* @version 1.0
* @author Alin Koko Mansuby < alinkokomansuby@gmail.com >
* @copyright 2018
*
*/

/*Setting Up Your configuration if needed here*/
$config = [
'default_path' => __DIR__.'/lib/',
'plugins_path' => __DIR__.'/3party/',
'db_class_name' => 'db.class.php',
'core_class_name' => 'core.class.php',
'autoload_path' => __DIR__.'/',
'autoload_name' => 'autoload.php',
'error_reporting' => true,
];



/*Checking configuration */

if(!file_exists($config['default_path'].$config['db_class_name']))
	die("ERROR : ".$config['default_path'].$config['db_class_name']." Not Exists !");
if(!file_exists($config['default_path'].$config['core_class_name']))
	die("ERROR : ".$config['default_path'].$config['core_class_name']." Not Exists !");
if(!file_exists($config['autoload_path'].$config['autoload_name']))
	die("ERROR : ".$config['autoload_path'].$config['autoload_name']." Not Exists !");

/* add */
function idr($idr) {
	$idr = "Rp. ".number_format($idr,0,',','.');
	return $idr;
}
function getAsset() {
	return "./assets/";
}
function getCss() {
	return getAsset()."css/";
}
function getJs() {
	return getAsset()."js/";
}
function getImg() {
	return getAsset()."img/";
}
function getPages() {
	return getAsset()."pages/";
}
function localdate($tgl) {
	$date = substr($tgl, 8, 2);
	$month = substr($tgl, 5, 2);
	$years = substr($tgl, 0, 4);
	
	return $date."/".$month."/".$years;
}
function formatID($tgl) {
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
	$tglnow = date('d');
	$tahun = date('Y');
	// if ($jam === true) {
	// 	$returnkan = $tglnow." ".$bln." ".$tahun." , ".date('H:i:s');
	// } else{ 
	// 	$returnkan = $tglnow." ".$bln." ".$tahun;
	// }
	// return $returnkan;
	// $return = $
}
?>