<?php

require 'autoload.php';


if(@$_GET['register'] == 'yea' || isset($_GET['a']))
{
	require getAsset().'header.php';
	require getInc().'register.php';
	require getAsset().'footer.php';

}else{
	require 'static.php';
}

?>