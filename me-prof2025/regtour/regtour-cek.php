<?php

cekvar("nama,namabelakang,email,telp,hp,basket");
$pes="";
$kosong="";
function addK($kt1,$kt2){
	global $kosong;
	$kosong.=($kosong==""?"":", ").translate($kt1,$kt2);
}

function addP($kt1,$kt2){
	global $pes;
	$pes.="<br>".translate($kt1,$kt2);
}

$kosong="";
$pes='';
if ($nama=='') addK("Nama","Firtname");//($lang=='id'?"Nama tidak boleh kosong":'Name cannot be empty');
if ($namabelakang=='') addK("Nama","Lastname");//($lang=='id'?"Nama tidak boleh kosong":'Name cannot be empty');
//if ($email=='') addK("Email","Email");//($lang=='id'?"Institusi tidak boleh kosong":'Institution cannot be empty');
if ($telp=='') addK("telp","Cellular Phone");//($lang=='id'?"Institusi tidak boleh kosong":'Institution cannot be empty');
if ($hp=='') addK("hp","Whatsapp Number");//($lang=='id'?"Institusi tidak boleh kosong":'Institution cannot be empty');

if ($email=='') 
	addK("Email","Email");//($lang=='id'?"E-mail tidak boleh kosong":'E-mail cannot be empty');
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	addP("Format Email salah",'Invalid email address');


if ($kosong!="") $pes.="<br>".$kosong.translate(" harus diisi"," cannot be empty")."";
if ($pmethod=='') addP("Pilih metode pembayaran",'Please choose Payment Methods');

$chtour=$chtrans='';
if (isset($_REQUEST['chtrans'])) {
	$chtrans=$_REQUEST['chtrans'];
	//$pes.=$chtour;
	$pes2="";
	cekvar("qty_1,tgltrans");
	$tgltour;
	if ($qty_1<=0) $pes2.="<br>Please Fill Transport Quantity";
	if ($tgltrans=="") $pes2.="<br>Please Fill Transport Date";
	if ($pes2!="") $pes.="<br>$pes2";
	
}
if (isset($_REQUEST['chtour'])) {
	$chtour=$_REQUEST['chtour'];
	//$pes.=$chtour;
	$pes2="";
	cekvar("qty_2,tgltour");
	$tgltour;
	if ($qty_1<=0) $pes2.="<br>Please Fill Tour Quantity";
	if ($tgltour=="") $pes2.="<br>Please Fill Tour Date";
	if ($pes2!="") $pes.="<br>$pes2";
	
}

//$pes.="<br>$ketbasket1 $ketbasket2 <br>$chtrans ".$chtour;
$pes.=$basket;


	echo $pes;
?>

