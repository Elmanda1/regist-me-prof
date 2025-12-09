<?php

//pengiriman email
extractRecord("select nama,email,transamount,transid,pmethod from regtour where id='$idregtour'");
$idreg=$idregtour;
include "regtour-view.php";	
$stt= "IDR ".maskRp($transamount,0,0) ;

//infobayar
extractRecord("select inforeg,bank as infobank,bankmanual as infobank0,bankusd from tbconfig $syConfig");
$infobank0=trim(str_replace("<p>","",str_replace("</p>","",$infobank0)));
$infobank=trim(str_replace("<p>","",str_replace("</p>","",$infobank)));
$infobankusd=trim(str_replace("<p>","",str_replace("</p>","",$bankusd)));

$infb=(strlen($infobank0)>10?$infobank0:($matauang=="usd"?$infobankusd:$infobank));

$infobayar=$inforeg;
$infobayar.="
<div style='margin-top:10px'>
	<div style='font-size:16px;font-weight:bold'>".($lang=='en'?'BANK INFORMATION':'INFORMASI BANK')."</div>
	<div style='font-size:14px;font-weight:bold'>".$infb."</div>
</div>
";



$sTotInvoice="
<br>
<br>
<span style='font-size:16px;font-weight:bold;text-align:center;'>Total ".($lang=='id'?"Tagihan":"Invoice")." : $stt</span>";

$bodyMail="
<center>
<br>
$vbiodata
<center>$sTotInvoice</center><br />
<br />
<br />
$infobayar <br /> 	

<center>";


$sendMe=1;
$fromName="Noreply-$webmasterName";
$fromMail=$webmasterMail;
$subjectMail="Tour Registration Invoice on behalf of $nama (Regtour.No:$idreg) - $judulWeb";
$mailTo="$email,$fromMail";


include $um_path."kirim-email.php";
if ($pmethod!=1) {
	echo $bodyMail;
}
if (!$isOnline) echo $komentar_email;
