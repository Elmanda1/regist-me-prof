<?php 
if (!isset($sJenisProfesi)) $sJenisProfesi="Specialist,General Practitioner,Resident,Fellow,Scientist,Nurse,Student";
if (!isset($sJenisTitle)) $sJenisTitle="Prof.,DR.,Dr.,Mr.,Mrs.,Ms.,Miss.";
$pProfesi= um412_isicombo5("R1:$sJenisProfesi","profesi","profesi","profesi",'- Choose One -' ,$profesi,"gantiProfesi($rnd)");	
$pSponsor= um412_isicombo5('select * from master_sponsor order by sponsor ',"sp_company","id","sponsor","- ".translate("TANPA SPONSOR","NO SPONSORSHIP")." -" ,$sp_company,"cekSponsor($rnd)");	
$hi=' <span class="harusisi">*</span>';
if ($idgroup*1!=0) 
	$p2Sponsor='';
else {
	$p2Sponsor='
	 	<div class="form-group">
			<div class="col-sm-4" class=tdcaption valign=top widthx=300 >'.$translate["alamat"].'</div>
			
			<div class="col-sm-8"   valign=top class=tdform2x>
			<input type=text name="sp_address" id="sp_address" size=50 value="'.$sp_address.'" >
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-4" class=tdcaption valign=top>E-Mail</div>
			
			<div class="col-sm-8"   valign=top class=tdform2x>
			<input type="text" name="sp_email" id="sp_email" size="35" value="'.$sp_email.'" />'.$hi.'
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4" class=tdcaption valign=top>'.$translate["telp"].'</div>
			
			<div class="col-sm-8"   valign=top class=tdform2x>
		  <input type=text id=addtelp3 name=addtelp3 class=addhp size="5" value="'.$addtelp3.'" >
			  <input type="text" name="sp_phone2" id="sp_phone2" size="35" value="'.$sp_phone2.'" />'.$hi.'</div>
		</div>
		 <div class="form-group">
			<div class="col-sm-4"  valign=top>Fax </div>
			
			<div class="col-sm-8"   valign=top class=tdform2x>
			<input id=addfax3 name=addfax3 size="5" class=addhp value="'.$addfax3.'" >
			<input type="text" name="sp_fax" id="sp_fax" size="35" value="'.$sp_fax.'" /></div>
		</div>
		 <div class="form-group">
			<div class="col-sm-4"  valign=top>Contact Person</div>
			<div class="col-sm-8"   valign=top class=tdform2x>
			<input type="text" name="sp_name" id="sp_name" size="35" value="'.$sp_name.'" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4"  valign=top>'.$capHP.'</div>
			<div class="col-sm-8"   valign=top class=tdform2x>
			<input type=text id=addhp3  class=addhp  name=addhp3 size="5" class=addhp value="'.$addhp3.'" >
			<input type="text" name="sp_phone1" id="sp_phone1" size="35" value="'.$sp_phone1.'" /></div>
		</div>
		</div>
		<div class="form-group">	  
			<div class="col-sm-8" class=tdform2x  valign=top>&nbsp;</div>
			<div class="col-sm-4"  valign=top>&nbsp;</div><div class="col-sm-8"   valign=top class=tdform2x>&nbsp;</div>
		</div> 
';	

}

$mandol="";
/*
if ($isAdmin) {
	$mandol="
	 <span style='text-align:right;width=200px'>
	<input type=checkbox id=mandon name=mandon $defmo onclick=\"bukaAjax('maincontent','$toroot"."adm/index.php?rep=registrasi&nohead=1&mandon=$clm');\" >Mandatory only...
	 </span>
	 ";
}	 
*/
 $formBiodata.=' 
<div class="form-group">
    <div class="col-sm-4"  valign=top><strong>'.$translate['tglreg'].'</strong></div>
    <div class="col-sm-8"  valign=top class=tdform2x colspan=2><strong>'. $tgl.' '.$mandol.'</strong></div></div>
<div class="form-group">
	<div class="col-sm-8" colspan="4" valign=top  >&nbsp;</div>
</div>
';

if ($idgroup*1!=0) {
	
} else {
	$ymd=($sp_name==""?0:1);
	if ($useSponsor!=2) {
		$jpendaftar=($lang=='id'?"Diri sendiri;0,Didaftarkan;1":"Self Registration;0,Sponsor;1");
		
		$formBiodata.='
		<div class="form-group">
			<div class="col-sm-12" colspan="4" valign=top >
			<div class=titlepage>'.($lang=='id'?'YANG MENDAFTARKAN ':"PARTICIPANT/SPONSORSHIP REGISTRATION").'</div>
			</div>			
		</div>
	 
		<div class="form-group">
			<div class="col-sm-4"  valign=top>'.($lang=='id'?'Didaftarkan oleh':'Registered by').' </div>
			<div class="col-sm-8"  valign=top>
				'.um412_isicombo5("R:$jpendaftar","ymd","","","","$ymd","hidePendaftar($rnd);").'
			</div>
		</div>			
 
		<div id=tymd2_'.$rnd.' style="display:'.($ymd==0?'none':'').'">
			<div class="form-group">
					<div class="col-sm-4"  valign=top>'.translate('Nama Pendaftar','Register Name').'</div>
					<div class="col-sm-8"   valign=top class=tdform2x>
						<input type="text" name="sp_name" id="sp_name" size="35" value="'.$sp_name.'" />'.$hi.'
					</div>
			</div>
		
			<div class="form-group">
				<div class="col-sm-4"  valign=top>'.$translate['hp'].'</div>
				<div class="col-sm-8"  valign=top class=tdform2x>
					<input type="text" name="sp_phone1" id="sp_phone1" size="15" value="'.$sp_phone1.'" />'.$hi.'
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-4"  valign=top>E-Mail</div>
				<div class="col-sm-8"  valign=top class=tdform2x>
					<input type="text" name="sp_email" id="sp_email" size="30" value="'.$sp_email.'" />'.$hi.'
				</div>
			</div>
		
			<div class="form-group">
				<div class="col-sm-4"  valign=top>'.$translate["namaperusahaan"].'</div>
				<div class="col-sm-8"  valign=top class=tdform2x>
				'.$pSponsor.'
				<input type=text style="display:none" name=spother id="spother_'.$rnd.'" place-holder="nama sponsor" id=spother_'.$rnd.' size=30 value="'.$sp_company.'" >
					
				</div>
			</div>
			
		</div>
		';
	
	}//useSponsor
	
	
}//idgroup
$formBiodata.='	
<div class="form-group">
	<div class="col-sm-12" colspan="4" valign=top  > 
		<div class=titlepage>'.($lang=='id'?'DATA PESERTA':'PARTICIPANT').' </div>
	</div>
</div>';

//if (!isset($needRegKemenkes)) $needRegKemenkes=true;
 

if ($id==0) {
	
} else {
	$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top>Reg. No. </div>
		<div class="col-sm-8"  valign=top class=tdform2x colspan=2 >'.($id==0?"[generate automaticaly]":$id).'
			
		</div>    
	</div>';
}

$stid='';
if ($useForeignParticipant) {
	$pilFR= um412_isicombo6("R:Foreign Participant;en,Local Participant;id","neg","gantiFR($rnd)"); 
	$formBiodata.='
	<div class="form-group">
	  <div class="col-sm-4"  valign=top>Foreign/Local Participant</div>  
	  <div class="col-sm-8"  valign=top colspan="2" valign=top >'.$pilFR.'</div>
	</div>
	';
	$stid="display:none;";
	///$useNegara=1;
} else {
	$ahf[]=["neg",'id'];
	$ahf[]=["negara",'Indonesia'];
	$useNegara=2;
}

//if ($needRegKemenkes) {
	//style="'.$stid.'"
/*
$formBiodata.='	
<div class="form-group">
	<div class="col-sm-12" colspan="4" valign=top  > 
		<div class=coment style="
		background: #fbfdde;
		padding: 5px;
		font-weight: bold;
		border: 1px solid #000;
		margin-bottom:10px;
	">
		
<ul>		<li>PESERTA WAJIB memiliki akun di Plataran Sehat Kemenkes
		<br>(tidak terdapat pembelajaran dengan status “Sedang Berjalan” saat kegiatan berlangsung).</li>
		<li>Apabila belum memiliki, mohon untuk membuat akun terlebih dahulu.</li>
<li>Identitas Peserta (Nama, NIK, E-mail) harus sesuai yang terdaftar di Plataran Sehat Kemenkes.</li>
</ul>

		
		
	</div>
</div>';


*/
if ($showstatreg) {
	$formBiodata.='
	<div class="form-group">
	  <div class="col-sm-4"  valign=top>Status</div>  
	  <div class="col-sm-8"  valign=top colspan="2" valign=top >'.$pilstatReg.'</div>
	</div>
	';
} else $formBiodata.=$pilstatReg;
	
$formBiodata.='
<div class="form-group" id="ttprofesi_'.$rnd.'">
    <div class="col-sm-4"  valign=top  valign=top>'.$translate["profesi"].'</div>
    <div class="col-sm-8" valign=top class=tdform2x colspan=2 id="tprofesi_'.$rnd.'">'.$pProfesi.'</div>
 </div>
	';

$isiSociety=um412_isicombo6("Indonesian Society of Respirology (PDPI);PDPI,Indonesia Association of Thoracic and Cardiovascular Surgeons (HBTKVI);HBTKVI,The Indonesian Society of Radiology (PDSRI);PDSRI,Indonesian Neurological Association (PERDOSSI);PERDOSSI,Indonesian Heart Association (PERKI);PERKI,The Indonesian Society of Anesthesiology and Intensive Therapy (PERDATIN);PERDATIN,The Indonesian of Physical Medicine and Rehabilitation Association (PERDOSRI);PERDOSRI,Indonesian Pediatric Society (IDAI);IDAI,The Indonesia Otorhinolaryngological Head and Neck Surgery Society (PERHATI-KL);PERHATI-KL,Indonesian Association of Clinical Pathologist (PATKLIN);PATKLIN,The Indonesian Physician of Community Medicine and Public Health Association (PDK3MI);PDK3MI,Indonesian Sport Medicine Association (PDSKO);PDSKO,Indonesian Society Clinical Microbiology (PAMKI);PAMKI,Indonesian Association of Obstetrics and Gynecology (POGI);POGI","cat, style='width: 620px;max-width: 100%;'");
$formBiodata.='
<div class="form-group" id="tsoc_'.$rnd.'" style="display:none">
    <div class="col-sm-4"  valign=top  valign=top>Society</div>
    <div class="col-sm-8" valign=top class=tdform2x colspan=2>'.$isiSociety.'</div>
 </div>
	';

$useGelar=false;
if ($useGelar) {
	$formBiodata.='
	<div class="form-group">
    <div class="col-sm-4"  valign=top  valign=top>'.$translate["title"].' </div>
    <div class="col-sm-8" valign=top class=tdform2x> 
    '. um412_isiCombo5("C:$sJenisTitle","gelardepan","","",$gelardepan).'</div>
	</div>';
} else {
	$ahf[]=["gelardepan",''];
}

if ($useCertName) {
	$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top  valign=top>'.$translate["namalengkap"].' </div>
		<div class="col-sm-8" valign=top class=tdform2x> 
		<input type=text name=nama id=nama size=32 value="'.$nama.'"  onkeyup=cekNama(this.value) >
		 '.$hi.' (Sesuai Akun LMS)
		<div id=tnama_reg style="display:nones;z-index:1000"></div>
		</div>
	</div>';

	$formBiodata.='<div class="form-group">
		<div class="col-sm-4"  valign=top valign=top>'.
		($lang=='id'?'Nama yang akan dicetak di sertifikat<br>(lengkap dengan gelar)':
		'Full Name with Title <br>(Name will be printed on Certificate)').
		'</div>
		<div class="col-sm-8" valign=top class=tdform2x> 
		<input type=text name=namasert id=namasert size=32 value="'.$namasert.'" onfocus="autoFillNamaCert('.$rnd.')" >
		<span class="harusisi">*</span>
		</div>
	</div>';
} else {
	$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top  valign=top>'.$translate["namalengkapdangelar"].' </div>
		<div class="col-sm-8" valign=top class=tdform2x> 
		<input type=text name=nama id=nama size=32 value="'.$nama.'"  onkeyup=cekNama(this.value) >
		<span class="harusisi">*</span><div id=tnama_reg style="display:none;z-index:1000"></div></div>
	</div>';

	$ahf[]=["namasert",''];
}


$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top  valign=top>
				'.translate('Nomor Induk Kependudukan (NIK)','NIK/Identity Id').'
		</div>
		<div class="col-sm-8" valign=top class=tdform2x> 
			<input type=text name=noagg id=noagg size=22 value="'.$noagg.'"> <span class="harusisi">*</span>
		</div>
	</div>';
	

/*

$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top  valign=top>
				'.translate('NIK','NIK/Identity Id').'
		</div>
		<div class="col-sm-8" valign=top class=tdform2x> 
			<input type=text name=noagg id=noagg size=22 value="'.$noagg.'"> <span class="harusisi">*</span>
		</div>
	</div>';
	
	
if ($namaorg!="") { 
	$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top  valign=top>'.$translate["nomor anggota"]." $namaorg".' </div>
		<div class="col-sm-8" valign=top class=tdform2x> 
		<input type=text name=noagg id=noagg_'.$rnd.' size=15 value="'.$noagg.'"   > (Kosongkan jika bukan anggota)
	 </div>
	</div>';
} 
*/

if ($useUmur!=2) {
	$formBiodata.='	
	<div class="form-group">
	  <div class="col-sm-4" >'.$translate['tgllahir'].'</div>
	  <div class="col-sm-8" >'."
		<input name='tgllahir' id='tgllahir_$rnd' size='10' onmouseover='bukaTgl(this.id)' type='text' onchange='gantiProfesi($rnd);' />
		</div>
	</div>";
		
}

if ($useAddress) {
$formBiodata.='
<div class="form-group">
	<div class="col-sm-4"  valign=top  valign=top>'.$translate["alamat"].'</div>
	<div class="col-sm-8"   valign=top class=tdform2x>
	<input name=alamat id=alamat size=50 value="'.$alamat.'" type=text ><span class="harusisi">*</span></div>
</div> ';
} else {
	$ahf[]=['alamat',''];
} 
//if ($lang=='id') {
	


//}




/*
if ($useNegara!=2) {
	$pn1 =$pn1a=$translate["negara"];
	$pn2 =um412_isicombo5('select * from master_negara order by id','negara',"negara","negara","- Select One -",$negara,""); 
	$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top  valign=top>'.$pn1.'</div>
		<div class="col-sm-8"   valign=top class=tdform2x>'.$pn2.' <span class="harusisi">*</span></div>
	</div>';
	$ahf[]=["provinsi",'-'];
}
else {
	$ahf[]=["negara",'Indonesia'];
	
	$pp1 = $pp1a=$translate["provinsi"];
	$pp2 =um412_isicombo5('select * from master_provinsi order by provinsi','provinsi',"provinsi","provinsi",translate("-Pilih-","- Select One -"),$provinsi,"gantiProvinsi($rnd)"); 
	$pp2a=um412_isicombo5('select * from master_provinsi order by provinsi','provinsi2',"provinsi","provinsi",translate("-Pilih-","-Select One-"),$provinsi2,""); 
	$formBiodata.='

	<div class="form-group">
	<div class="col-sm-4"  valign=top  valign=top>'.$pp1.'</div>
	<div class="col-sm-8"   valign=top class=tdform2x>'.$pp2.' <span class="harusisi">*</span></div>
	</div>
	';

}
*/
if ($useNegara!=2) {
	$pn1 =$pn1a=$translate["negara"];
	$pn2 =um412_isicombo5('select * from master_negara order by id','negara',"negara","negara","- Select One -",$negara,""); 
	$formBiodata.='
	<div class="form-group" id=tnegara_'.$rnd.' style="display:none" >
		<div class="col-sm-4"  valign=top  valign=top>'.$pn1.'</div>
		<div class="col-sm-8"   valign=top class=tdform2x>'.$pn2.' <span class="harusisi">*</span></div>
	</div>';
}
$pp1 = $pp1a=$translate["provinsi"];
$pp2 =um412_isicombo5('select * from master_provinsi order by provinsi','provinsi',"provinsi","provinsi",translate("-Pilih-","- Select One -"),$provinsi,"gantiProvinsi($rnd)"); 
$pp2a=um412_isicombo5('select * from master_provinsi order by provinsi','provinsi2',"provinsi","provinsi",translate("-Pilih-","-Select One-"),$provinsi2,""); 
$formBiodata.='

<div class="form-group" id=tprovinsi_'.$rnd.' >
<div class="col-sm-4"  valign=top  valign=top>'.$pp1.'</div>
<div class="col-sm-8"   valign=top class=tdform2x>'.$pp2.' <span class="harusisi">*</span></div>
</div>
';


$formBiodata.='
<div class="form-group">
    <div class="col-sm-4"  valign=top  valign=top>'.$translate["kota"].'</div>
    <div class="col-sm-8"   valign=top class=tdform2x> 
		<span id=tkota_'.$rnd.'>
			<input type=text name=kota id=kota_'.$rnd.' size=35 value="'.$kota.'"></span>
		<span class="harusisi">*</span>
	</div>
</div>
';
	
//onkeyup="tvmail1.innerHTML=(validasiEmail(this.value)==0?\' <blink> Email Invalid</blink>\':\'ok\');"

/*
$formBiodata.='
<tr  '." $stmandon class=".(++$notr%2==0?"trevenform2x":"troddform2x").'>
    <td class=tdcaption valign=top  valign=top>'.$translate["telp"].'</td>
    <td class=tddevider1>:</td><td colspan="2" valign=top class=tdform2x>
        <input id=addtelp1 name=addtelp1 value="'.$addtelp1.'" size="5" onchange="gantiTelp(1)" class=addhp >
		<input type=text name=telp id=telp size=15 value="'.$telp.'" > </td>
</tr>
<tr  '." $stmandon class=".(++$notr%2==0?"trevenform2x":"troddform2x").'>
    <td class=tdcaption valign=top  valign=top>Fax</td>
    <td class=tddevider1>:</td><td colspan="2" valign=top class=tdform2x> 
     <input id=addfax1 name=addfax1 size="5" value="'.$addfax1.'" class=addhp >
	 <input type="text" name="fax" id="fax" size="15" value="'.$fax.'" /></td>
</tr>';
*/

	//if ($lang=='id')
	//	$isi="Peserta,Panitia,Pembicara,Moderator,Instruktur,Delegasi";
	//else
/*
if (!isset($sStatusReg)) 
$sStatusReg=$ssr;
else
*/	
if( $sStatusReg=='') {
	$sStatusReg="Participant,Committee,Speaker,Moderator,Instructor,Delegation,Faculty,Jury";
}
$aStatusReg=explode(",",$sStatusReg);


if ($useDocquity) {
	$capHP=translate("HP (untuk whatsapp dan akun Docquity)","Mobile Number (for Whatsapp and docquity Account)");
	$capEmail="E-Mail (".translate("untuk registrasi,login Docquity, pembagian sertifikat","for registration,login and certificate Docquity").")";
	$capDoc=translate("Sudah Punya Akun Docquity","Do you have Docquity Account");
	$isiDoc=translate("R:Sudah;1,Belum;0","R:Yes;1,No;0");
	
	$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top  valign=top>'.$capDoc.'?</div>
		<div class="col-sm-8"   valign=top class=tdform2x>
		'.um412_isicombo5($isiDoc,'akun_docquity').'		
		<span class="harusisi">*</span></div>
	</div>

	';
}

$formBiodata.='
<div class="form-group">	  
    <div class="col-sm-4"  valign=top  valign=top>'.$capHP.'</div>
    <div class="col-sm-8"   valign=top class=tdform2x> 
    <input type=hidden id=addhp1 name=addhp1 size="5" value="'.$addhp1.'" class=addhp > 
	<input type=text name=hp id=hp size=15 value="'.$hp.'"> <span class="harusisi">*</span></div>
</div>

<div class="form-group">
    <div class="col-sm-4"  valign=top  valign=top>'.$capEmail.'</div>
    <div class="col-sm-8"   valign=top class=tdform2x> 
    <input type=text name=email id=email_$rnd size=30 value="'.$email.'" >
    <span class="harusisi">*</span>  (Sesuai Akun LMS)  
	</div>
</div>
'.$addInpBio.'
<div class="form-group">
    <div class="col-sm-4"  valign=top>Access Key</div>
    <div class="col-sm-8"   valign=top class=tdform2x>'.((($id==0)||($thlalu==1))?"[generate automaticaly]":$xaccess_key).'&nbsp;</div>
</div>

<div class="form-group">
    <div class="col-sm-12"  colspan="4" valign=top  >&nbsp;</div>
</div>
';
 
if ($usePassport!=2) {
	cekVar("pssno,pssnama,psstglexp,psstpkeluar,psstempat,psstgllahir");
	$formBiodata.='
	<div class="form-group">
		<div class="col-sm-12" colspan="4" valign=top ><div class=titlepage >DATA PASSPORT<br>hanya diisi jika berencana mengikuti tour di SINGAPURA atau MALAYSIA</div></div>
	</div>';
	
	$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top>No. Passport</div>
		<div class="col-sm-8"   valign=top class=tdform2x><input type="text" name="pssno" id="pssno" size="30" value="'.$pssno.'"   /></div>
	</div>';
	
	$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top>Nama di Passport</div>
		<div class="col-sm-8"   valign=top class=tdform2x>
			<input type="text" name="pssnama" id="pssnama" size="45" value="'.$pssnama.'"   />
		</div>
	</div>';
	
	$formBiodata.='
	<div class="form-group">
		<div class="col-sm-4"  valign=top>Tgl. Expired</div>	
		<div class="col-sm-8"   valign=top class=tdform2x>
			<input type="text" name="psstglexp" id="psstglexp" size="15" value="'.$psstglexp.'" class="dtpicker"   />
		</div>
	</div>';


	$formBiodata.='<div class="form-group">
		<div class="col-sm-4"  valign=top>Tempat pengeluaran Passport</div>
		<div class="col-sm-8"   valign=top class=tdform2x>
			<input type="text" name="psstpkeluar" id="psstpkeluar" size="35" value="'.$psstpkeluar.'" class="dtpicker"   />
		</div>
	</div>';

	$formBiodata.='<div class="form-group">
		<div class="col-sm-4"  valign=top>Tempat & Tgl Lahir</div>
		<div class="col-sm-8"   valign=top class=tdform2x>
			<input type="text" name="psstempat" id="psstempat" size="20" value="'.$psstempat.'"  />
			<input type="text" name="psstgllahir" id="psstgllahir" size="15" value="'.$psstgllahir.'" class="dtpicker" />
		</div>
	</div>';

	$formBiodata.='<div class="form-group"><div class="col-sm-4"  valign=top colspan=4>&nbsp;</div></div>';
} //usepassport

if ($useTransportation!=2) {
	$formBiodata.='
		<div class="form-group">
		  <div class="col-sm-4">Media Transportasi</div>
		  <div class="col-sm-8" >'."<input name='mtrans' id='rtrans1' onchange='gantitrans()' value='1' type='radio' />
			Kereta Api
			<input name='mtrans' id='rtrans2' onchange='gantitrans()' value='2' type='radio' />
			Mobil
			<input name='mtrans' id='rtrans3' onchange='gantitrans()' value='3' type='radio' />
			Udara </div>
		</div>";
	$formBiodata.='	
		<div class="form-group">
		  <div class="col-sm-12" ></div>
		</div>
		<div class="form-group">
		  <div class="col-sm-4">Kedatangan</div>
		  <div class="col-sm-8" > Tanggal :'."
			<input name='tgldatang' id='tgldatang' size='10' onmouseover='bukaTgl(this.id)' type='text' />
			Jam :        
			<input name='jamdatang' id='jamdatang' size='10' type='text' /></div>
		</div>";
		
	$formBiodata.='	
		<div class="form-group">
		  <div class="col-sm-4">Kepulangan</div>
		  <div class="col-sm-8" > Tanggal :'."
			<input name='tglpulang' id='tglpulang' onmouseover='' size='10' type='text' />
			Jam :
			<input name='jampulang' id='jampulang' size='10' type='text' /></div>
		</div>";
}
  
 
if ($useInstitusi!=2) {
$formBiodata.='
	<div class="form-group">
		<div class="col-sm-8" colspan="4" valign=top ><div class=titlepage >'.strtoupper($translate["institusi"]).'</div></div>
	</div>
	<div class="form-group">
		<div class="col-sm-4"  valign=top>'.$translate["nama"].'</div>
		<div class="col-sm-8"   valign=top class=tdform2x>
			<input type="text" name="institusi" id="institusi" size="35" value="'.$institusi.'"   />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-4"  valign=top>'.$translate["alamat"].'</div>
		<div class="col-sm-8"   valign=top class=tdform2x>
		<input type=text name="alamat2" id="alamat2" size=50 value="'.$alamat2.'" >
		</div>
	</div>';
			
} //useinstitusi

/*
//submit
if ($mandon==1) {
	$formBiodata.='
	<div class="form-group">	  
		<div class="col-sm-12"  colspan=4 valign=top align=center><input  type=submit value="Submit" class="btn btn-primary">
		</div>
	</div>';
} 
*/
//spasi setelah submit 
$formBiodata.='
<div class="form-group">	  
    <div class="col-sm-12"  valign=top>&nbsp;</div>
</div>
';


if (!isset($addf)) $addf="";
$addf.="gantiProfesi($rnd);";	
if ($showForm) echo $formBiodata;