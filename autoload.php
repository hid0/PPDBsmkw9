<?php 
/**
* MaFrame Library, Usefull library database and much more for php.
*
* @version 1.0
* @author Alin Koko Mansuby < alinkokomansuby@gmail.com >
* @copyright 2018
*
*/

session_start();
ob_start();

// Checking PHP version

/*if(phpversion() < "7.0.0"){
 die("PHP ".phpversion()." TIDAK SUPPORT SILAHKAN UPDATE KE PHP 7\r\n");
}*/

require_once 'maconfig.php';
require_once $config['default_path'].$config['db_class_name'];
require_once $config['default_path'].$config['core_class_name'];
if(@opendir($config['plugins_path']))
{
	$s=scandir($config['plugins_path']);
	
	$kecuali = ['.','..','index.html','index.php']; // Files except to require.

	foreach($s as $file)
	{if(in_array($file,$kecuali))continue;
		require_once $config['plugins_path'].$file;
	}
}

if($config['error_reporting'] === true)
{
	error_reporting(E_ALL);
}else{
	error_reporting(0);
}

$db = new DB_ko;
$core = new Core_ko;
?>