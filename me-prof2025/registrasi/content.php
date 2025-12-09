<?php 
$showHeader=2;
$useJS=2;
include_once "conf.php";
cekVar('pg,targetPage,idpage,noHead,contentOnly');
$isi="";
$nf=$judulP="";
if (($systemOnly) &&($page==''))$page='registrasi';
if ($nf=='') {
	switch ($page) {
	case  'symposium1':	
		$judulP="Simposium";
		$nf=$toroot."page/sympo.php";
		break;	
		
	case  'symposium2':	
		$judulP="Simposium";
		$nf=$toroot."page/sympo.php";
		break;	
	case  'symposium3':	
		$judulP="Simposium";
		$nf=$toroot."page/sympo.php";
		break;	
	case  'workshop':	
		$judulP="Simposium";
		$nf=$toroot."page/workshop.php";
		break;	
	case "fpay":	 
		$useFormTfPay=true;
		$nf=$um_path."form_pay.php";
		//echo "$tfpay";
		break;
	case "cekstatbca":	 
		 
		$nf=$um_path."api-bca.php";
		//echo "$tfpay";
		include $nf;
		exit;
		break;
	default:
	


		include $um_path."index-guest.php";		
		$judulP="Welcome";
		if ($nf=="") $nf="page.php";
		break;
	} 
}
if ($nf!='' ){	
	$showHeader=2;
	if (isset($showTitle)) {
		if (($showTitle=='')&&
			 ($useJS!=2)){
			$titlePage=$judulP.'-'.$judulWeb ;
			include "title.php";
		}
	}	
	include $nf;
} else 
	include $toroot."page.php";
?>