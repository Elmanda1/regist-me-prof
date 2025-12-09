<?php
@session_start();
include_once "conf.php";
cekvar("det,page");
if ($page=='') $page='registrasi';
//include_once "main-info.php";

cekVar("contentOnly,showTitle");
if ($contentOnly==1) {
	include_once $toroot."content.php";
} else {
	$showHeader=2;
	$useJS=2;
	include $template."header.php";	
	include $template."mnu-atas.php"; 
	echo "<div id=maincontent  style='padding-top:0px;margin:0px' >";
	include $toroot."content.php";
 
	echo "</div>";
	echo "<link rel='stylesheet' type='text/css' href='$toroot"."css/style.css?$addRJS' >";
	include_once $template."footer.php";    
}
?>