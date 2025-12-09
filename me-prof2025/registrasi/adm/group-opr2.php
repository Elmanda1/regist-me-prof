<?php
$useJS=2;
include_once "conf.php"; 
cekVar("id,op,pmethod,addhp1,addhp2,vhotel,sp_mail,op2,hp,idgroup");	

$thp=$hp;
 
$adds="";
$idgroup=$_SESSION['idprofile'];
 
  
if (($pmethod==2) ||($pmethod==4)){
	if ($isOnline)
		$testDoku=$test=false;
	else
		$testDoku=$test=true;
	include $toroot."doku/doku-mulai.php";		
} 
else if ($pmethod==8) {

	include $um_path."registrasi-group-view-umum.php";	
	extractRecord("select nama,email,alamat,kota,kodepos  from tbprofile where id='$idgroup'");
	
	
	$sendMe=1;
	$file = $nmFileAttachment='';
	$fromName=$webmasterName;
	$fromMail=$webmasterMail;
	$subjectMail="Group Registration Invoice on behalf of $nama (Group.No:$idgroup) - $judulWeb";
	$mailTo="$email,$fromMail";
	if ($sp_mail!='') $mailto.=",$sp_email";
	

	include $um_path."kirim-email.php";
	kirimEmail2($filename=$file, $path="", $mailto=$mailTo, $from_mail=$fromMail, $from_name=$fromName, $replyto="", $subject=$subjectMail, $message=$bodyMail);
	
	include $toroot."veritrans/vt-mulai.php";		
} 
else {
	
	include $um_path."registrasi-group-view-umum.php";	
	extractRecord("select nama,email,alamat,kota,kodepos  from tbprofile where id='$idgroup'");
	
	
	$sendMe=1;
	$file = $nmFileAttachment='';
	$fromName=$webmasterName;
	$fromMail=$webmasterMail;
	$subjectMail="Group Registration Invoice on behalf of $nama (Group.No:$idgroup) - $judulWeb";
	$mailTo="$email,$fromMail";
	echo $bodyMail;
	
	include $um_path."kirim-email.php";
	kirimEmail2($filename=$file, $path="", $mailto=$mailTo, $from_mail=$fromMail, $from_name=$fromName, $replyto="", $subject=$subjectMail, $message=$bodyMail);
}


?>