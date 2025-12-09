 
<?php
$useJS=2;
include_once "conf.php";
if ($_REQUEST["id"]!='') $id=strip_tags($_REQUEST["id"]);
if ($_REQUEST["idreg"]!='') $idreg=strip_tags($_REQUEST["idreg"]);
if ($_REQUEST["idprofile"]!='') $idprofile=strip_tags($_REQUEST["idprofile"]);
$title=strip_tags($_REQUEST["title"]);
$author=strip_tags($_REQUEST["author"]);
$topic=strip_tags($_REQUEST["topic"]);
$rev=strip_tags($_REQUEST["rev"]);
$isi=($_REQUEST["isi"]);
$jenis=strip_tags($_REQUEST["jenis"]);
$ket=strip_tags($_REQUEST["ket"]);
$nf=basename($_FILES['uploaded']['name']);

if ($_REQUEST["op"]!='') $opr=$_REQUEST["op"]; 

if ($opr=="hp"){
		kill_unauthorized_user();
		$s="delete from `tbgroup` where id='$id'";	
		mysql_query($s);
		echo "<BR /><center>group successfully deleted. <br><br>
 		<a class=button href='$toroot"."index.php?page=konfirmasi'>click here</a><br>for refresh this page.</center><br>";
		exit;
}

//if (($opr=="tb") || ($opr=="ed")) {
$ccc=uploadFile("uploaded",$target=$toroot."images",$tipe="group",$maxs=0,1,'group_'.$idreg."_".$nf);
$nfgroup=$folderHost."/images/$ccc";

//echo $pes; 

if (($ccc=="") && ($nf!='')) {
		$bodyMail="<BR /> 	<center>group unsuccessfully submitted. <br><br>
 <a class=button href='$toroot"."index.php?page=konfirmasi'>click here</a><br>for refresh this page.</center><br>";
		echo tampildialog($bodyMail,'group UNSUCCESSFULLY',700);
		exit;
	}
$tbsql=$tbsql1=$tbsql2=$tbsql3="";

if ($ccc!="") { 	
	//$isi="group File Attachment: <a href='$folderhost"."/$nfgroup'>$ccc</a>".$isi;
	$tbsql2=",nmfile";
	$tbsql3=",'$nfgroup'";
	$tbsql1=",nmfile='$nfgroup' ";
}

if ($id!=0) { 
	$s="update `tbgroup`  set `jenis`='$jenis',`title`='$title',`topic`='$topic',
		`isi`='$isi',`id_registran`='$idreg',`idprofile`='$idprofile',`author`='$author',`ket`='$ket',`rev`='$rev' $tbsql1 where id='$id'";
	$subjectMail="group Update "; 
} else {
	$s="insert into`tbgroup`(jenis,title,topic,isi,id_registran,author,ket,rev,idprofile $tbsql2) 
		values ('$jenis' ,'$title' ,'$topic' ,'$isi' ,'$idreg' ,'$author','$ket','$rev','$idprofile' $tbsql3)";	
	$subjectMail="New group Submitted"; 
}
$h=mysql_query($s);
echo "group successfully update....";
include "group-daf-det.php";
 
 
/*

if ($h) {	
	if ($pmethod==2) {
			if ($isOnline)
				$testDoku=false;
			else
				$testDoku=true;
			include $toroot."doku/doku-mulai.php";		
			exit;
	} 
	if ($id==0)	mysql_query("update registrasi set chgroup=1 where id='$idreg'");
	$hv2=mysql_query("select * from registrasi where id='$idreg'");
	$rv2=mysql_fetch_array($hv2);
	$file = "";
	$fromName=$webmasterName;
	$fromMail=$webmasterMail;
	$msci=cariField("select email_sci from tbconfig");
	$mailTo=$rv2['email'].",".$msci;
	
	$subjectMail.="(reg no:$idreg-".$rv2['nama'].") "; 
	$bodyMail="
		<CENTER>
		 
		$judulWeb
		</CENTER>
		<br>
		<br>
		<table width=700 align=center class=tbform2>
		<tr><td colspan=2 class=tdform2><div class=subtitleform2><b>$subjectMail</b></div></td></tr>
		<tr><td colspan=2 class=tdform2>&nbsp;</td></tr>
		<tr><td colspan=2 class=tdform2>Thank you for your group submission.....<br></td></tr>
		<tr><td colspan=2 class=tdform2>&nbsp;</td></tr>
		<tr><td colspan=2 class=tdform2>Contact Detail</td></tr>
		<tr><td class=tdform2 width=150>Registration Number</td><td class=tdform2>: $rv2[id]</td></tr>
		<tr><td class=tdform2 width=150>Full Name</td><td class=tdform2>: $rv2[nama]</td></tr>
		<tr><td colspan=2 class=tdform2>&nbsp;</td></tr>
		<tr><td colspan=2 class=tdform2>Institution</td></tr>
		<tr><td class=tdform2 width=150>Name</td><td class=tdform2>: $rv2[institusi]</td></tr>
		<tr><td class=tdform2 width=150>Address</td><td class=tdform2>: $rv2[alamat2]</td></tr>
		<tr><td class=tdform2 width=150>City/Province/Country</td><td class=tdform2>: $rv2[kota2]/$rv2[provinsi2]/$rv2[negara2]</td></tr>
		<tr><td class=tdform2 width=150>Phone</td><td class=tdform2>: $rv2[telp2])</td></tr>
		<tr><td class=tdform2 width=150>Email</td><td class=tdform2>: $rv2[email2]</td></tr>
		<tr><td colspan=2 class=tdform2>&nbsp;</td></tr>
		<tr><td colspan=2 class=tdform2>group</td></tr>
		<tr><td class=tdform2 width=150>Title</td><td class=tdform2>: $title</td></tr>
		<tr><td class=tdform2 width=150>Topic</td><td class=tdform2>: $topic</td></tr>
		<tr><td class=tdform2 width=150>Author</td><td class=tdform2>: $author</td></tr>
		<tr><td class=tdform2 width=150>File Attachment</td><td class=tdform2>: <a href='$nfgroup' target=_blank >$ccc</a></td></tr>
		<tr><td class=tdform2 width=150>Revision</td><td class=tdform2>: $rev</td></tr>
		<tr><td class=tdform2 width=150>Confirm Date</td><td class=tdform2>: ".date('M/d/y')."</td></tr>
		<tr><td class=tdform2 width=150>Submit Date</td><td class=tdform2>: ".date('M/d/y')."</td></tr>
		<tr><td colspan=2 class=tdform2>&nbsp;</td></tr>
		<tr><td  class=tdform2>&nbsp;</td></tr>
		<tr><td class=tdform2>&nbsp;</td></tr>
		<tr><td  colspan=2 align=right class=tdform2>Indonesia,".date('M d, y')."</td></tr>
		<tr><td  colspan=2 align=right class=tdform2>Congress Secretariat</td></tr>
		</table><br>
	"; //<tr><td class=tdform2 colspan=2>Content:<br>$isi</td></tr>
		
		if ($isAdmin) 
			echo "Admin tidak mengirim email..... atas edit data group....<br>";
		else
			include $um_path."kirim-email.php";
		//include_once "head1.php";
		$bodyMail.="<BR /> 	<center>group successfully submitted. <br><br>
 <a class=button href='$toroot"."index.php?page=konfirmasi'>click here</a><br>for refresh this page.</center><br>";
		echo tampildialog($bodyMail,'GROUP SUBMISSION',700);
		exit;
}
	else 
		echo "Error.... $s";
		//redirection($toroot.'index.php?page=konfirmasi',1);
*/
?>
  