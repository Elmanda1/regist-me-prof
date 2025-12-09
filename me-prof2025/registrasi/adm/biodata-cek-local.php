<?php
$useJS=2;
//include_once  "conf.php";
if (!isset($isAdd)) $isAdd=false;//add existing registration
if (!isset($form)) $form='';


$nf=$toroot."adm/biodata-cek-localddd.php";
if (file_exists($nf)) {
	include $nf;
}
else {
//extractRequest();
cekVar('ymd,noagg,jregis,pmethod,sp_company,spother');
$pes='';
if ($form=='registrasi-add') $isAdd=true;

if (!$isAdd) {
	if ($ymd==1) {
		if ($sp_name=='') $pes.=($lang=='id'?"Nama yang mendaftarkan tidak boleh kosong<br>":'Register Name cannot be empty<br>');
		if ($sp_phone1=='') $pes.=($lang=='id'?"HP yang mendaftarkan tidak boleh kosong<br>":'Register phone cannot be empty<br>');
		if ($sp_email=='') 
			$pes.=($lang=='id'?"Email yang mendaftarkan tidak boleh kosong<br>":'Register email cannot be empty<br>');
		elseif (!filter_var($sp_email, FILTER_VALIDATE_EMAIL)) 
			$pes.=($lang=='id'?"Email yang mendaftarkan tidak valid<br>":'Register email invalid<br>');
		
	}
	
	
	if ($nama=='') $pes.=($lang=='id'?"Nama tidak boleh kosong<br>":'Name cannot be empty<br>');
	if ($useCertName) if ($namasert=='') $pes.=($lang=='id'?"Nama di sertifikat tidak boleh kosong<br>":'Name on Sertificate cannot be empty<br>');
	
	if ($noagg=='') $pes.=($lang=='id'?"NIK tidak boleh kosong<br>":'NIK cannot be empty<br>');


	if ($useAddress) if ($alamat=='') $pes.=($lang=='id'?"Alamat tidak boleh kosong<br>":'Address cannot be empty<br>');
	if ($email=='') 
		$pes.=($lang=='id'?"E-mail tidak boleh kosong<br>":'E-mail cannot be empty<br>');
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		$pes.=($lang=='id'?"Format Email salah<br>":'Invalid email Address<br>');
	if ($hp=='') 
		$pes.=($lang=='id'?"Nomor HP  harus diisi<br>":'Mobile phone cannot be empty<br>');
	if (($sp_company==2) && ($spother=='')) {
		$pes.="Isikan nama perusahaan sponsor<br>";
	}
	if ($profesi=='')  $pes.=translate('Profesi harus dipilih','Please choose profession')."<br>";

}
if ($jregis!='') { 
	if ($refpay=='') {
		$pes.=($lang=='id'?"Referensi pembayaran Harus diisi<br>":'Payment reference cannot be empty<br>');
	}
}


$spilih="";
if (isset($_REQUEST['aidp'])) {
	$jpilih=0;
	$aidp=$_REQUEST['aidp'];
	foreach($aidp as $idpaket) {
		if (isset($_REQUEST['ch_'.$idpaket])) {
			$jpilih++;
			$spilih.=($spilih==''?'':'#').$_REQUEST['ch_'.$idpaket];
		}
	}
	$pes.=cekValidasiSisaPendaftar($_REQUEST['aidp']);
} else {
	//if ($debugMode) $pes.='Err:aidp<br>';
}

if ($spilih=='') {
	$pespilih=translate('Simposium/Workshop harus dipilih','Please choose at least one symposium or workshop option')."<br>";
	if (!$isAdmin) {
		$pes.=$pespilih;
	} else {
		if (isset($_REQUEST['idkamar_rate'])) {
			cekvar("jumkamar");
			if ($jumkamar==0) {
				$pes.=$pespilih;
				
			}
		} else {
			$pes.=$pespilih;
			
		}
	}
}


/*
if (!$isAdd) {
	if (strstr(strtolower($spilih),"symposium")=='') $pes.='Pleace choose your symposium options<br>';
	//$pes.='Pilih minimal salah satu symposium atau workshop<br>';
}

*/
if (!isset($pmethod)) $pmethod="";
if ($pmethod=='') $pes.=($lang=='id'?"Metode pembayaran harus dipilih<br>":'Please choose payment method<br>');

	//echo $spilih;
if ($ketTNC!='') {
	cekvar("chtnc");
	if ($chtnc!="on") {
		$pes.= translate("Peserta harus menyetujui syarat dan ketentuan"."Registran need to agree the term and condition")."<br>";
	}
}

if ($pes=='') {
	
	/*
	$sy1=$k1='';
	$sy1.=" and (lockbayar='' or lockbayar='1' or lockbayar='3') "; //3 success online payment
	//	$sy1.=" or IDAI Member with NO.ID: $noagg";
	if (!$isAdd) {
		if ($isOnline) {
			$sq1="select nama from registrasi where (nama='$nama' and hp='$hp' ) ".$sy1;
			$v1=cariField($sq1); 
			if ($v1!='') {
				if ($lang!='id')
					$pes.="Participant on behalf of $nama with mobile phone number $hp already registered....";
				else 
					$pes.="Peserta dengan nama $nama (dengan nomor hp $hp) sudah pernah mendaftar..";
			}
		}
	}
	*/
}
//CEK PENDAFTAR
if (($useDoku==1) && (!$isAdmin)) {
	//development
	if (($pmethod==2) ||($pmethod==15) ||($pmethod==35)|($pmethod==36)||($pmethod==4)){
		 //$pes.="Doku Payment Gateway is  still in development mode. please use manual transfer  ";
	 }
}

	if ($pes!='') {
		if (substr($pes,-3)=="br>") {
			$pes=substr($pes,0,-4);
		} else {
			//$pes.="aaa".substr($pes,-5);
		}

		$pes=str_replace("<br>","<br><i class='fa fa-times-circle'></i>&nbsp;","<br>".$pes);
	}
	echo $pes;


} //bukan local