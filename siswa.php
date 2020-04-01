<?php

require 'autoload.php';

if($core->get_session('user_siswa') != 'empty' && $core->get_session('pass_siswa') != 'empty' )
{
    require getPages().'siswa/_header.php';
	require getPages().'siswa/index.php';
    require getPages().'siswa/_footer.php';
    // echo "Berhasil Login!!!";
}else{
	require getPages().'siswa/login.php';
}
?>