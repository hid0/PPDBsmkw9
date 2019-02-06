<?php

require 'autoload.php';

if($core->get_session('user_admin') != 'empty' && $core->get_session('pass_admin') != 'empty' )
{
	// require getAsset().'header.php';
	// require getInc().'admin/dashboard.php';
	// require getAsset().'footer.php';
	require getTemplate().'_AdminHeader.php';
	require getInc().'admin/indexAdmin.php';
	require getTemplate().'_AdminFooter.php';
}else{
	require getInc().'admin/login.php';
}
?>