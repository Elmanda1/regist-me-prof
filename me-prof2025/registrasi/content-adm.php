<?php
@session_start();
$paramurl=$_SERVER['QUERY_STRING'];
//include_once  "conf.php";
cekVar("page,nohead");
$nf="";
switch ($page) {
case "registrasi":	//$nohead=1;	
	$nf="adm/registrasi-inp.php";
	break;
case "adm":		
	$nohead=1;
	$nf="adm/index.php";
	break;
case "adm2":		
	$nf="adm/index.php";
	break;
case "submitregistrasi":	
	$nf="adm/registrasi-opr.php";
	$nohead=1;
	break;
case "konfirmasi":	
	$nf="adm/ac.php";
	break; 
case "konfirmasi":	
	$nohead=1;	
	$nf="adm/ac.php";
	break;
case "news":
	$nf=$um_path."news-det.php";
	$nohead=1;
	break;
case "page":
	$nf=$um_path."page-det.php";
	$nohead=1;
	break;
default: 	//include "conf.php";
	if (!$isAdmin) {
		$nf=$um_path."page-det.php";
	} else {
		$nohead=0;
		$nf='kosong.php';
	}
	break;
}
if ($nohead==1) {
	include  $nf;	//setFooter(1);
} else {

	if ($isAdmin) {
		//include $um_path."head-adm.php";
		include $nf;
		//include $um_path."foot-adm.php";
	} else { 
		//include "h	ead2b.php";	
		include $nf;
		//include_once "foot1b.php";
	}
}
  
 ?>
