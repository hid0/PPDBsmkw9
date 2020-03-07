<?php
require 'autoload.php';
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$getKet = $db->fetch($db->select('jadwal'));
$secret = explode("|",base64_decode($_GET['secret']));
$username = $secret[0];
$password = $secret[1];

$q = $db->query("SELECT * FROM registrasi,data_casis WHERE registrasi.id_reg=data_casis.id_reg AND registrasi.id_reg='$_GET[idr]' AND data_casis.id_casis='$_GET[ids]' ");
$d = $db->fetch($q);
if($d['jenkel'] == 'L')
{
	$jk = "Laki-Laki";
}elseif($d['jenkel'] == 'P')
{
	$jk = "Perempuan";
}else{
	$jk = "Unknown";
}

$content = require('./assets/pdf.php');


$html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P','A4','en', false, 'UTF-8');
$html2pdf->writeHTML($content);
$html2pdf->output();
