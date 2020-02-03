<?php

require 'autoload.php';

if($core->get_session('user_siswa') != 'empty' && $core->get_session('pass_siswa') != 'empty' )
{
    require getTemplate().'_header.php';
	require getInc().'siswa/dashboard.php';
    require getTemplate().'_footer.php';
    // echo "Berhasil Login!!!";
}else{
	require getInc().'siswa/login.php';
}
?>