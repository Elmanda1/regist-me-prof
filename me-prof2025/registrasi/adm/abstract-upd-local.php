<?php
$useJS=2;
//include_once  "conf.php";
cekVar("nf,op,isAbstractClosed,idreg,isi,ket,rev,title,emailabs,idregabs,institusi");

$nflocal=$toroot."adm/abstract-upd-localxx.php";
if (file_exists($nflocal)) {
	include $nflocal;
} else {
 	//$idreg=$_SESSION["idreg"];
	 if (!function_exists("validasiAutor")) {
		 function validasiAuthor($txt){
			 $txt=str_replace("|","--gl--",$txt);
			 $txt=str_replace("#","--sharp--",$txt);
			 return $txt;		 
		 }
	 }
	$idabs=0;
	cekvar("tkn");
	if ($tkn!='') {
		 evalToken($tkn ) ;
	}
	$idabs*=1;

	$opr=$op;
	$ack="";
	//sauthor
	$sauthor="";
	$i=0;
	foreach ($_REQUEST["author"] as $au) {
		if ($au!="") $sauthor.=($sauthor==""?"":"#");	 
		//$sauthor.=$au;
		$sauthor.=validasiAuthor($au)."|";
		$sauthor.=validasiAuthor($_REQUEST["emauthor"][$i])."|";
		$sauthor.=validasiAuthor($_REQUEST["af1author"][$i])."|";
		$sauthor.=validasiAuthor($_REQUEST["af2author"][$i])."|";
		$sauthor.=validasiAuthor($_REQUEST["af3author"][$i]);
		$i++;
	}

	if ($opr=="hp"){
			kill_unauthorized_user();
			$s="delete from `tbabstract` where id='$id'";	
			mysql_query($s);
			echo "<BR /><center>abstract successfully deleted. <br><br>
			<a class=button href='$toroot"."index.php?page=konfirmasi'>click here</a><br>for refresh this page.</center><br>";
			exit;
	}

	$tbsql=$tbsql1=$tbsql2=$tbsql3="";
	//if (($opr=="tb") || ($opr=="ed")) {
	$nfabstract=$ccc="";
	//if ($nf!='') {
	if (isset($_FILES['uploaded'])) {
		$nf=basename($_FILES['uploaded']['name']);
		$ccc=uploadFile("uploaded",$target=$toroot."images",$tipe="abstract",$maxs=0,1,'Abstract_'.$namaabs."_".$nf);
		$nfabstract=str_replace("//","/",$folderHost."images/$ccc");
		$nfabstract=str_replace("http:/","http:/"."/",$nfabstract);
		if (substr($nfabstract,0,3)=='www') $nfabstract='http://'.$nfabstract;

		
		$tbsql1.=",nmfile='$nfabstract' ";
		$tbsql2.=",nmfile";
		$tbsql3.=",'$nfabstract'";
		
	}

	//echo $pes; 
	if ($ccc=="") {
			//$bodyMail="<BR /> 	<center>Abstract unsuccessfully submitted. <br><br> <a class=button href='$toroot"."index.php?page=konfirmasi'>click here</a><br>for refresh this page.</center><br>";
			//echo tampildialog($bodyMail,'ABSTRACT UNSUCCESSFULLY',700);
			//exit;
		}

	if ($idreg!=0) {
		$tbsql1.=",`id_registran`='$idreg'";
		$tbsql2.=",id_registran";
		$tbsql3.=",'$idreg'";
	}

	if (isset($idregabs)) {
		$idreg=$idregabs;
		$tbsql1.=",`idregabs`='$idregabs'";
		$tbsql2.=",idregabs";
		$tbsql3.=",'$idregabs'";
	}
	cekVar("jenis");
	validasiInput2("keywords,ket,topic,title,email,namaabs,kdevent,isi");	//sauthor,
	if ($idabs*1!=0) { 
		$rev=$rev*1+1;
		$tglrevisi=date("Y-m-d H:i:s");
		extractRecord("select tgl as tglsubmit, ack as ackabs from tbabstract where id='$idabs'");
		  $s="update `tbabstract`  set institusi='$institusi',tglrevisi='$tglrevisi',`jenis`='$jenis',`title`='$title',`topic`='$topic',
			`author`='$sauthor',namaabs='$namaabs',emailabs='$emailabs',hpabs='$hpabs',`ket`='$ket',`rev`='$rev',keywords='$keywords',isi='$isi' ,kdevent='$kdevent' $tbsql1 where id='$idabs'";
		$op="ed";
		$h=mysql_query($s) or die(mysql_error()."<br>$s");
	} else {
		$tglrevisi=$tglsubmit=date("Y-m-d H:i:s");
		$ackabs= generateAccessKey("tbabstract","AB","ack",2,6);

		$s="insert into`tbabstract`(institusi,ack,jenis,title,topic,isi, author,namaabs,emailabs,hpabs,ket,rev,keywords,tgl,kdevent $tbsql2) 
			values ('$institusi','$ackabs','$jenis' ,'$title' ,'$topic' ,'$isi' , '$sauthor','$namaabs','$emailabs','$hpabs','$ket','1','$keywords','$tglsubmit','$kdevent'  $tbsql3)";	
		$op="tb";	
		$h=mysql_query($s) or die(mysql_error()."<br>$s");
		$idabs=mysql_insert_id();
	}
	//echo $s;
	$kirim=false;
	if ($h) {
		$jemail=(op("ed")?"revisi":"masuk");
		//echo "jem $jemail";
		if (!$isAdmin || op("tb")) {
			$kirim=true;
			include $um_path."abstract-kirimemail.php";		
		}
		$result=1;
	} else 
		$result=0;
}  
