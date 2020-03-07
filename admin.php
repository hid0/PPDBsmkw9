<?php

require 'autoload.php';

if($core->get_session('user_admin') != 'empty' && $core->get_session('pass_admin') != 'empty' ) {
	require getPages().'admin/_header.php';
	require getPages().'admin/index.php';
	require getPages().'admin/_footer.php';
} else {
	// $core->redirect('?page=auth&sign=in');
	require getPages().'admin/login.php';
}
?>