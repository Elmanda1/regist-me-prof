<?php
$useJS=2;
$showHeader=2;

include_once "conf.php";

if (!isset($admpath))$admpath="adm/"; 
cekVar("page1,form");
 

//echo "form......$form ";
switch ($form) {
case "user":
	$op="cek";
	$nf=$um_path."usr-login.php";
	//echo $nf;
	break;
case "---":
	$nf=$um_path."ac_info_hotel.php";
	break;
case "vgroup":
	$nf=$um_path."profile-cek.php";
	//echo $nf;
	break;
case "stf":
	$opr="cek";
	$nf=$um_path."ac_transfer.php";
	break;
case "registrasi":
	$nf1=$um_path."biodata-cek.php";
	$nf2=$toroot."adm/biodata-cek-local.php";
	//echo "file 2".$nf2;
	$nf=(file_exists($nf2)?$nf2:$nf1);
	//echo "To Root $toroot<br> $nf ";
	//echo getcwd();
	break;case "abstract":	$nf=$um_path."abstract-cek.php"; 	break;
case "vpromosi":
	$nf=$um_path."promosi.php";
	//echo $nf;
	break;
default:
	include $um_path."validasi.php";	//echo 'nama form validasi belum diisi......';
	echo "";
	exit;
	break;
}
include $nf;

?>
 