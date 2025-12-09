<?php
$tglsekarang=date('d-m-Y');
//$tbatas=date('09-04-2014 23:59:09');
$tbatas=date('10-04-2015');
$tisekarang=strtotime($tglsekarang);
$tibatas=strtotime($tbatas);

if ($tisekarang>=$tibatas) {
	echo "
	<span class=titlepage>Online Registration has closed......</span> 
	Onsite registration will be served on April 17,2014 at venue  <br />
	for detail information about registration, 
	<a onclick=\"bukaAjax('','../include_lib/um412/page-det.php?nohead=1&pg=Registration');hid('mkanan',false);return false; \" href=\"index.php?page=page&nohead=1&pg=Registration\">click here</a><br />
	for more information about APCHF2014,please <a  onclick=\"bukaAjax('','../include_lib/um412/page-det.php?nohead=1&pg=Contact+Us');hid('mkanan',false);return false; \" href=\"index.php?page=page&nohead=1&pg=Contact+Us\">contact us</a>";
	exit;
	}
?>