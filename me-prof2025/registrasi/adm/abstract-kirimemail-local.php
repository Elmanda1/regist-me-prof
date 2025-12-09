<?php
$nflocal=$toroot."adm/abstract-kirimemail-localxx.php";
if (file_exists($nflocal)) {
	include $nflocal;	
} else {
	
	extractRecord("select *,ack as ackabs,tgl as tglsubmit from tbabstract where id='$idabs'" );

	$tkn=makeToken("ackabs=$ackabs");
	
	if ($showLK) {
	
		$tbLinkRevisi="
		<div style='padding:5px;width:100%;background:#ddd;border:#aaa;margin-top:10px;text-align:center'>
		".translate("Kode Akses Abstrak anda ","Your Abstract Access Key")." : <span style='font-size:14px;font-weight:bold;background:#eee;padding:2px'>$ackabs</span>.
		<br>".translate("Kode Akses Abstrak akan ditanyakan ketika akan melakukan revisi melalui website","Abstract Access key will be asked before make revision this abstract via website").". 
		<br>

		".translate("Perbaikan naskah dapat juga dilakukan dengan cara ","You can also make revision by click")."
		<a href='$folderReg"."?page=abstract&op=loginp&tkn=$tkn'>".translate("klik disini","this link")."</a>.
		</div>
		";
	} else 
		$tbLinkRevisi="";


	if ($lang=="id") {
		$xtglrevisi=tglIndo2($tglrevisi,'d M Y H:i:s');
		$xtglsubmit=tglIndo2($tglsubmit,'d M Y H:i:s');
	} else {
		$xtglrevisi=date("d M Y H:i:s",strtotime($tglrevisi));
		$xtglsubmit=date("d M Y H:i:s",strtotime($tglsubmit));
		$useTemplateEmail=false;
		
	}
	
	devalidasiInput2("keywords,sautor,ket,topic,title");	

	$linkKonf=$folderHost."$folderReg/index.php?page=abstract&op=login";
	$linkKonfirm=translate("Untuk perbaikan abstrak, silahkan ","For updating this abstract, please ")."
	<a href='$linkKonf' class='btn btn-success btn-md'  >".($lang=='id'?"klik di sini":"click here")."</a>";


	if (isset($ccc)) {
		if ($ccc=='') {
			$nfabstract=$ccc=str_replace("//","/",cariField("select nmfile from tbabstract where id='$idabs'"));
		}
	}
	//echo $nfabstract." select nmfile from tbabstract where id='$id' ";

	if ($idreg!=0)	{
		mysql_query("update registrasi set chabstract=1 where id='$idreg'");
		extractRecord("select id as idregabs,  nama as namaabs from registrasi where id='$idreg'");
	} else {
	}

	$nfKop=$folderHost."images/kop2.jpg";	


	$tds="td style='border: 1px solid #eee;padding:3px 5px;' ";
	$tdstb="td style='border: 1px solid #eee;padding:3px 5px ;font-weight:bold' ";

	$tbhead=" 
	<table width=100% align=center  border=0 class=tbemail cellspacing=0 cellpadding=0 >
	<tr><$tds colspan=2><img src='$nfKop' width=100%></td></tr>";
	$footm="

	Sincerely,<br><br><br>

			 
	$pjAbstract<br>
	(Chairman)<br><br><br>


	$signature2

	";
	$bodyMail="";
	$bodyMail.="
	<style>
	.titleform2 {
		font-size: 32px;
		margin: 20px 0 0px 0;
		font-weight: bold;
		color: #033;
	}
	.subtitleform2 {
		font-size: 24px;
		line-height: 40px;
		font-size: 16px;
		margin: 15px 0 10px 0;
		font-weight: bold;
		color: #033;
		border-bottom: #999 1px solid;
	}

	.tbemail td {
		border: 1px solid #ccc;	padding:3px;
	}

	</style>
	";


	//abstract masuk
	if (($jemail=="masuk")||($jemail=="kirimulang")||($jemail=="revisi")) {
		$subjectMail="[$judulWebSingkat] ".translate("Pengiriman Abstrak","Abstract Submission Letter"); 
		$trrev="";
		if ($jemail=="revisi") {
			$subjectMail="[$judulWebSingkat] ".translate("Perbaikan Abstrak","Abstract Submission Letter (Revision)"); 
			$trrev.="	<tr><$tdstb >".translate("Tanggal Revisi","Revision Date ")."</td><$tds> ".$xtglrevisi." ($rev) </td></tr>";
				 
		}
		
		$file = "";
		$fromName="Noreply-".$webmasterName;
		$fromMail=$noreply;//$webmasterMail;
		$msci=getConfig("email_sci");
		$mailTo=$emailabs.($msci==""?"":",".$msci);
		$bio="
			";
		if ($idregabs>0) $subjectMail.="(reg no:$idregabs-$namaabs) "; 
		
		//author
		if (!isset($sauthor)) $sauthor=$author;
		$sau="";
		$snama_au="";
		$aau=explode("#",$sauthor);
		$i=1;
		foreach($aau as $au) {
			$xau=explode("|",$au."|||");
			$sau.="
				<tr><$tds colspan=2><span style='font-weight:bold'>".translate("Peneliti","Author")." $i</span> </td></tr>
				<tr><$tds >".translate("Nama","Name")."</td><$tds>$xau[0] </td></tr>
				<tr><$tds >".translate("Email","Email")." </td><$tds>$xau[1] </td></tr>
			";
			if ($xau[2]!='') $sau.="<tr><$tds >".translate("Affiliasi 1","Affiliation 1")." </td><$tds>$xau[2] </td></tr>";
			if ($xau[3]!='') $sau.="<tr><$tds >".translate("Affiliasi 2","Affiliation 2")." </td><$tds>$xau[3] </td></tr>";
			if ($xau[4]!='') $sau.="<tr><$tds >".translate("Affiliasi 3","Affiliation 3")." </td><$tds>$xau[4] </td></tr>";
			$snama_au.=($snama_au==""?"":",").$xau[0];
			$i++;	
		}

		$isi=str_replace('\n','<br>',$isi);
		$isi=str_replace('-br-','<br>',$isi);
		$xisi="<div style='padding:5px;border:#e3dfdf solid 1px;background:#fffefe;'>$isi</div>";
		if ($lang=="en") {
			$bodyMail.="
				
				
				<table width=100% align=center  border=1 class=tbemail>
				$tbhead
				<tr><$tds colspan=2> Your abstract has been successfully submitted to $judulWebSingkat as below:</td></tr>
				<tr><$tdstb>Abstract No</td><$tds> $judulWebSingkat-$idabs</td></tr>
				<tr><$tdstb>Abstract Title</td><$tds> $title</td></tr>
				<tr><$tdstb>Presenting Author </td><$tds> $namaabs </td></tr>
				<tr><$tdstb>Author (s) </td><$tds> $snama_au </td></tr>
				<tr><$tdstb>Submision Date </td><$tds> $xtglsubmit</td></tr>
				$trrev
				<tr><$tdstb>Access Key</td><$tds><b>$ackabs</b></td></tr>
	 
				
				</table> <br><br>
				Thank you for submitting your abstract to the $judulWeb.<br>
				<div style='margin:5px 0px '>Selection of the abstract will be announced $xtglPengumumanAbs.<div>
				You can still edit your abstract submission by log in and fill in the access key given 
				before the abstract submission deadline ($xtglDeadlineAbs ).<br><br><br>
				
				$footm
				
			";
			
		} else {
			//
				
			$bodyMail.="
			<b >Pengiriman Abstrak $judulWeb</b>
			<br>
			<br>
				Terima kasih $namaabs atas partisipasinya dalam pengiriman abstrak <b>$title</b>
				<table width=600 align=center class=tbform2>
				<tr><$tds colspan=2><div class=subtitleform2><b>PENELITI</b></div></td></tr>
				$sau
				<tr><$tds colspan=2><div class=subtitleform2><b>PRESENTER</b></div></td></tr>
				<tr><$tds >Nama </td><$tds>$namaabs </td></tr>
				<tr><$tds >Email </td><$tds>$emailabs </td></tr>
				<tr><$tds >Institusi </td><$tds>$institusi </td></tr>
				<tr><$tds >Tanggal Pengiriman</td><$tds>$xtglsubmit</td></tr>
				$trrev
				<tr><$tds colspan=2><div class=subtitleform2><b>ABSTRAK</b></div></td></tr>
				<tr><$tds >Title</td><$tds>$title</td></tr>
				".($tbLinkRevisi==""?"":"<tr><$tds colspan=2>$tbLinkRevisi</td></tr>
				")."
				</table><br>
				 
			"; 
		}
	} elseif ($jemail="kirimstat") {
		
		$file = "";
		$fromName="Noreply-".$webmasterName;
		$fromMail=$webmasterMail;
		$msci=getConfig("email_sci");
		
		cekVar("emkirim");
		if ($emkirim=="")
			$mailTo=$emailabs.($msci==""?"":",".$msci);
		else
			$mailTo=$emkirim;
			
		//jika diterima
		if ($statpass=="Accepted") {
			$subjectMail="[$judulWebSingkat] Abstract Decision Letter";
			$bodyMail.="
			$tbhead
			<tr><$tdstb >Abstract No</td><$tds> $judulWebSingkat-$idabs</td></tr>
			<tr><$tdstb >Abstract Title</td><$tds> $title</td></tr>
			<tr><$tdstb >Status</td><$tds> Accepted – $pres_jenis</td><tr>
			</table><br><br>


			Dear $namaabs,<br><br>

			On behalf of the Program Committee of the $judulWeb, it is our pleasure to inform you that your abstract has been <b>accepted</b> and <b>selected for $pres_jenis</b>.
			Your abstract will also be published at our online proceeding book.<br>
			Further practical information (poster details) can be checked in our website ($webmasterWWWLink) and sent to you in a separated email.<br><br>

			The presenting author of the accepted abstract will be given free entrance for the $judulWeb symposium $tglSymposium. 
			<span style='color:#f00'>All presenting author must register before $tglBatasRegSympoAbs1</span>.<br>
			Should the registration process be incomplete by $tglBatasRegSympoAbs2, the abstract will not be published or displayed and will be <b>removed from the scientific programme</b>.<br><br>

			To register, please click the following link: <br>
			$linkRegis<br><br>

			If there is any question or inquiries, please email the event committee at $webmasterMail.<br><br>

			$footm
			"; 
		
		} elseif ($statpass="Rejected") {
			/*
			$subjectMail="[$judulWebSingkat] Abstract Decision Letter";
			$bodyMail.="

			$tbhead
			<tr><$tds >Abstract No</td><$tds>$judulWebSingkat-$idabs</td></tr>
			<tr><$tds >Abstract Title</td><$tds>$title</td></tr>
			<tr><$tds >Status</td><$tds>Rejected</td></<tr>
			</table><br><br> 

			Dear $namaabs,<br><br>

			On behalf of the Programme Committee of the 28th JDM 2019, we regret to inform you that <b>your abstract could not be selected</b> for presentation and thus will not be published our proceeding book.<br><br>

			<b>The fact that the Committee was unable to accept your abstract does not diminish the value of your work or its relevance to diabetes field</b>.<br><br>

			We would like to thank you for submitting your abstract and hope that you will, nevertheless, be able to attend the $judulWeb.<br><br>

			If you have not already registered, please register online at the following link:<br>
			$linkRegis<br><br>

			If there is any question or inquiries, please email the event committee at $webmasterMail<br><br>

			$footm
			";
			*/
			
			$subjectMail="[$judulWebSingkat] Status Penerimaan Abstrak ";
			include $toroot."adm/abstract-form-penolakan-local.php";
			
			
		}
	}

	if (!$isOnline) {
		echo $bodyMail;
	}

	include $um_path."kirim-email.php";
	//echo $komentar_email;
}

?>
  