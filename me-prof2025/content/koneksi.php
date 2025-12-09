<?php
 
$isOnline=true;
if ($isOnline) { //parameter jika sudah dionlinekan
	$docroot=$_SESSION['docroot']="me-prof/";//pogi22/ letak folder saat online
	//$vDomain="aogin2022.com";	
	$vDomain="medicalevent.id";	
	$urlSystem=$folderHost="http://$vDomain/$docroot";
	$folderHostConfirm=$folderHost."registrasi/index.php?page=konfirmasi";
	if (!isset($pt)) $pt="../../"; //letak root direktori dari docroot
	 
	$mydb ="u8368269_bccog2025";//k2977410_pogi2016";
	$usr="u8368269_adm";
	$pss="diab20th#";
//	$pt=substr($pt,3,100);
} else { //parameter jika bleum online
	$docroot=$_SESSION['docroot']="167-bccog2025/registrasi/";//folder penyimpanan
	$vDomain="localhost";	
	$urlSystem=$folderHost="http://$vDomain/$docroot";
	$folderHostConfirm="$folderHost"."index.php?page=konfirmasi";
	if (!isset($pt)) $pt="../../";//dari folder penyimpanan menuju root
	$mydb="reg_bccog2025";
	$usr="root";
	$pss="1";
}

 