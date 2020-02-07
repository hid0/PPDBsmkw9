<?php

require 'autoload.php';

if($core->get_session('user_admin') != 'empty' && $core->get_session('pass_admin') != 'empty' ) {
	require getPages().'template/_AdminHeader.php';
	require getPages().'admin/indexAdmin.php';
	require getPages().'template/_AdminFooter.php';
} else {
	require getInc().'admin/login.php';
}
?>