<!DOCTYPE html>
<html>
<head>
	<title> PPDB SMK WALISONGO PECANGAAN JEPARA</title>
	<meta charset="utf-8">
	<meta name="author" content="Alin Koko Mansuby">
	<meta name="viewport" content="widht=device-width,initial-scale=1">
  <link rel="icon" type="text/css" href="<?=getImg();?>logo-smk.png">
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/js/dataTables.jqueryui.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/w3.css">
  <link rel="stylesheet" type="text/css" href="assets/css/dataTables.jqueryui.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">

</head>
<body>
	<div class="w3-container">
<header class="w3-panel w3-border" style="height:100%;margin: 0 ;">
  <div class="w3-row">
    <div class="w3-col m3 l3 s12"><img src="<?=getImg();?>logo-smk.png"></div>
    <div class="w3-col m9 l9 s12">
	<h1 >SMK WALISONGO PECANGAAN JEPARA</h1>
  <p>PPDB ONLINE - PENDAFTARAN PESERTA DIDIK BARU</p>
</div>
</div>
</header>
<div class="w3-bar w3-teal">
  <a href="?" class="w3-bar-item w3-button">Home</a>
  <?php
  if($core->get_session('user_admin') != "empty" && $core->get_session('pass_admin') != "empty")
  {
    ?>
    <a href="ujian" class="w3-bar-item w3-button" target="_blank">Halaman Ujian</a>
    <a href="?a=setdat" class="w3-bar-item w3-button">Setting jadwal ujian</a>
    <a href="#" class="w3-bar-item w3-button">Ubah username & password</a>
    <a href="?a=logout" class="w3-bar-item w3-button w3-right w3-red" >Logout</a>
    <?php
  }else{
  if(@$_GET['a'] == 'step1' || empty($_GET['a']))
  {
?>
  <a href="#" class="w3-bar-item w3-button w3-green">Langkah 1</a>
  <a href="#" class="w3-bar-item w3-button">Langkah 2</a>
  <a href="#" class="w3-bar-item w3-button">Langkah 3</a>
  <a href="#" class="w3-bar-item w3-button">Selesai</a>
  <?php
}elseif($_GET['a'] == 'step2')
{
  ?>
    <a href="#" class="w3-bar-item w3-button">Langkah 1</a>
  <a href="#" class="w3-bar-item w3-button w3-green">Langkah 2</a>
  <a href="#" class="w3-bar-item w3-button">Langkah 3</a>
  <a href="#" class="w3-bar-item w3-button">Selesai</a>
<?php
}elseif($_GET['a'] == 'step3')
{
  ?>
   <a href="#" class="w3-bar-item w3-button">Langkah 1</a>
  <a href="#" class="w3-bar-item w3-button">Langkah 2</a>
  <a href="#" class="w3-bar-item w3-button w3-green">Langkah 3</a>
  <a href="#" class="w3-bar-item w3-button">Selesai</a>
  <?php
}elseif($_GET['a'] == 'done')
{
  ?>
    <a href="#" class="w3-bar-item w3-button">Langkah 1</a>
  <a href="#" class="w3-bar-item w3-button">Langkah 2</a>
  <a href="#" class="w3-bar-item w3-button">Langkah 3</a>  
  <a href="#" class="w3-bar-item w3-button w3-green">Selesai</a>
<?php
}
}
?>
</div>
</div>
<script type="text/javascript">
            $(function() {
                $("#siswa").DataTable({
                  "bSort" : false
                });
            });
        </script>
<script language="javascript">
  function toggle(pilih) {
    checkboxes = document.getElementsByName('pilih[]');
    for(var i=0; n=checkboxes.length;i++) {
    checkboxes[i].checked = pilih.checked;
    }
  }
</script>