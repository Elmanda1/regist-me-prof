<?php

//kill_unauthorized_user();
$id=$idregtour;
extractRecord("select * from regtour where id=".$id);
$vbiodata="
	<table class=tbform2 align=center border=0>
	  <tr><td colspan=3 class=tdtitleform1> DATA REGTOUR</td></tr>
      <tr><td colspan=3 class=tdspaceform1>  </td></tr>
	  <tr><td>Your Book ID</td><td>:</td><td>$transid</td></tr>
	  <tr><td>First Name</td><td>:</td><td>$nama</td></tr>
	  <tr><td>Last Name</td><td>:</td><td>$namabelakang</td></tr>
	  <tr><td>Email</td><td>:</td><td>$email</td></tr>
	  <tr><td>Cellular Phone</td><td>:</td><td>$telp</td></tr>
	  <tr><td>Whatsapp Number</td><td>:</td><td>$hp</td></tr>
	  <tr><td>Book Date</td><td>:</td><td>".date("d M Y",strtotime($tglentry))."</td></tr>
	</table>
	
	
";
$vbiodata.="
<br><b>Book Detail</b>

".htmlspecialchars_decode($ketbasket2);
echo $vbiodata;
	  