<?php
$nflocal=$toroot."adm/abstract-conf-localxxxxxxx.php";
if (file_exists($nflocal)) {
	include $nflocal;
} else {

		
	if (!isset($sTopicAbstract)) {
		$sTopicAbstract=array (
			array("Original Article","Introduction,Method,Result,Discussion"),
			array("Systematic Review","Introduction,Method,Result,Discussion"),
			array("Case Report","Introduction,Method,Result,Discussion"),
			array("EBCR","Introduction,Method,Result,Discussion")
		);
	}

	if (isset($opcek)) {
		//cekking
		 $pes="";
		 cekVar("emailabs,institusi,hpabs,namaabs,emailabs,title,isi,keywords");
		 $author=$_REQUEST['author'];
		 //var_dump($author);
		 if ($author=="") $pes.="<br>".translate("Nama peneliti harus diisi","Name required");
		 if ($namaabs=="") $pes.="<br>".translate("Nama Presenter harus diisi","Name (Presenting Author) required");
		 if ($emailabs=="") $pes.="<br>".translate("Email Presenter harus diisi","Email (Presenting Author) required");
		 if ($institusi=="") $pes.="<br>".translate("Institusi Presenter harus diisi","Institution (Presenting Author) required");
		 if ($hpabs=="") $pes.="<br>".translate("Nomor telepon presenter harus diisi","Phone number (Corespondence)  required");
		 $akata=explode(" ",trim($title));
		 if ((count($akata)>20)|| (trim($title)=="")) {
			$pes.="<br>".translate("Judul abstrak harus diisi, Maksimal 20 kata","Title required, maximum :20 words ");
		 }
		 $akata=explode(" ",trim($isi));
		 if ((count($akata)<300)|| (trim($isi)=="")||(count($akata)>600)) {
			$pes.="<br>".translate("Isi abstrak harus diisi,300 - 600 kata","Abstract required, 300 - 600 words ");
		 }
		 $akata=explode(",",trim($keywords));
		 if ((count($akata)>3)|| (trim($keywords)=="")) {
			 $pes.="<br>".translate("Kata kunci harus diisi, maksimal 3 kata kunci dipisahkan dengan koma","Keyword required, maximum 3 keywords");
		 }
		 if ($pes!="") echo $pes;
	}	

}