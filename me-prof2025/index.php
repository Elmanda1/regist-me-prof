<?php
//$useJS=2;
include_once "conf.php";
//include_once $template."index.php";

cekvar("page");
if ($page=='') {
	redirection("registrasi/index.php");
} else 
	include_once "registrasi/index.php";



?>