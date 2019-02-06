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
function idr($idr)
{
	$idr = "Rp. ".number_format($idr,0,',','.');
	return $idr;
}
function getAsset(){
	return "assets/";
}
function getCss()
{
	return getAsset()."css/";
}
function getJs()
{
	return getAsset()."js/";
}
function getImg()
{
	return getAsset()."img/";
}
function getInc()

{
	return "inc/";
}

function getTemplate()
{
	return getInc()."template/";
}
function localdate($tgl)
{
	$date = substr($tgl, 8, 2);
	$month = substr($tgl, 5, 2);
	$years = substr($tgl, 0, 4);

	return $date."/".$month."/".$years;
}
?>