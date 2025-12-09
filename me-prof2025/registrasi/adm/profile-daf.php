<?php
include "conf.php"; 
$admrep="tbprofile";
$hal2= $um_path."tbprofile-daf.php?";
$sq='select master_sponsor.sponsor as nmsponsor, tbprofile.* from tbprofile left join master_sponsor on tbprofile.sp_company=master_sponsor.id';
$nmtabel='tbprofile';
$idtabel='tbprofile.id';

$titlereport="DAFTAR PESERTA tbprofile";


$strfield='id,gelardepan,gelarbelakang,nama,namasert,alamat,kota,cat,provinsi,negara,telp,hp,email'; //, hotel, rekan_sekamar

$aksi=$_REQUEST['aksi'];
if ($aksi=='validasi') {
	$strfield.=",validasi";
	}

$jperpage=$record_per_page=50;
$jpperpage=15;
$tbsql= '';

$isvalid=$_REQUEST['isvalid'];


$opr=$_REQUEST['op'];
 
if ($opr=='hp') {
	$id=$_REQUEST['id'];
	$a=cariField(" select count(id) from reservasi_hotel where idprofile='$id' ")*1;
	$b=cariField(" select count(id) from reservasi_kongres_workshop where idprofile='$id' ")*1;
	$c=cariField(" select count(id) from konfirmasi_transfer where idprofile='$id' ")*1;
	$d=cariField(" select count(id) from reservasi_tour where idprofile='$id' ")*1;
	$e=cariField(" select count(id) from tbgroup where idprofile='$id' ")*1;
	
	$aa=($a==0?'':"hotel :$a ");
	$bb=($b==0?'':"wks/sympo :$b ");
	$cc=($c==0?'':"pembayaran :$c ");
	$dd=($d==0?'':"tour :$d ");
	$ee=($e==0?'':"group :$e ");
	$s=$aa.$bb.$cc.$dd.$ee;
	if ($s!='') {
		echo "Tidak bisa di hapus...., 
		<br/>untuk mengapus data tbprofile ini,<br> hapus dahulu data reservasi dan konfirmasi pembayaran yang ada<br>($s)";
		exit;
	}
	/*
	$a=mysql_query(" delete  from reservasi_hotel where idprofile='$id' ");
	$b=mysql_query(" delete  from reservasi_kongres_workshop where idprofile='$id' ");
	$c=mysql_query(" delete  from konfirmasi_transfer where idprofile='$id' ");
	$d=mysql_query(" delete  from reservasi_tour where idprofile='$id' ");
	$id='';
 	*/
}

$idpaket=$_REQUEST['idpaket']*1;
if ($idpaket!=0) {
	$tbsql.= ($tbsql==''?' where ':' and ')." idpaket='$idpaket'";
	$hal2.="&idpaket=$idpaket";
}

$cat=$_REQUEST['cat'];
if ($cat!="") {
	$tbsql.= ($tbsql==''?' where ':' and ')." cat='$cat'";
	$hal2.="&cat=$cat";
}

$idtour=$_REQUEST['idtour']*1;
if ($idtour!=0) {
	$tbsql.= ($tbsql==''?' where ':' and ')." idtour<>'0'";
	$hal2.="&idtour=$idtour";
}

//khusus aipkind
$jenis=$_REQUEST['jenis'];
if ($jenis=='tiket') {
	$tbsql.= ($tbsql==''?' where ':' and ')." idtour<>'0'";
	$hal2.="&idtour=$idtour";
	$titlereport="DAFTAR PESERTA tbprofile TIKET";
} else {
	$tbsql.= ($tbsql==''?' where ':' and ')." idtour='0'";
	$hal2.="&idtour=$idtour";
	
}

$idreservasi=$_REQUEST['idreservasi']*1;
if ($idreservasi!=0) {
	$tbsql.= ($tbsql==''?' where ':' and ')." reservasi_hotel.id='$idreservasi'";
	$hal2.="&idreservasi=$idreservasi";
}

$tipereg=$_REQUEST['tipereg'];
if ($tipereg!="") {
	$tbsql.= ($tbsql==''?' where ':' and ')." ( tbprofile.tipereg='$tipereg' or  tbprofile.tipereg=Null )";
	$hal2.="&tipereg=$tipereg";
}

$idhotel=$_REQUEST['idhotel']*1;
if ($idhotel!=0) {
	$tbsql.= ($tbsql==''?' where ':' and ')." reservasi_hotel.hotel='$idhotel'";
	$hal2.="&idhotel=$idhotel";
}
$idsponsor=$_REQUEST['idsponsor']*1;
if ($idsponsor!=0) {
	$tbsql.= ($tbsql==''?' where ':' and ')." t_idsponsor='$idsponsor'";
	$hal2.="&idsponsor=$idsponsor";
}

$isconfirm=$_REQUEST['isconfirm']*1;
if ($isconfirm!=0) {
	$tbsql.= ($tbsql==''?' where ':' and ')." year(t_tglkonfirmasi)>1900";
	$hal2.="&isconfirm=$iskonfirm";
}

$chgroup=$_REQUEST['chgroup'];
if ($chgroup=='true') {
	$tbsql.= ($tbsql==''?' where ':' and ')." chgroup=1";
	$hal2.="&chgroup=$chgroup";
}
 
$order=$_REQUEST['order'];
if ($order!='') {
	$orderby="order by $order ";
	$hal2.="&order=$order";
} else
$orderby='order by tbprofile.nama';

 
$isicombo="Nama;nama,No tbprofile;tbprofile.id,Alamat;tbprofile.alamat,Kota;tbprofile.kota,Provinsi;provinsi,Institusi;Institusi,Sponsor;master_sponsor.sponsor,Tanggal;tgl";

//if ($lang=='id')
//	$isi="Peserta,Panitia,Pembicara,Moderator,Instruktur,Delegasi";
//else
$isi="Participant,Committee,Speaker,Moderator,Instructor,Delegation";
	
$addInput="Tipe Peserta: ".um412_isicombo5("$isi",'tipereg','','','All',$tipereg); 
$addOutput="&tipereg='+tipereg.value+'";

$addInput.="<br><input type=checkbox name=chgroup >group/Free Paper Participant Only </br>"; 
$addOutput.="&chgroup='+chgroup.checked+'";

$addInput.="Urutan Tabel: ".um412_isicombo5("$isicombo",'order','','','',$order); 
$addOutput.="&order='+encodeURI(order.value)+'";

include "frmreport.php";

if ($cetak=='xls') {
	$nmFileXLS=$temp_path.'Daftar_Peserta_rec_'.$lima.'_sd_'.$limb.'.xls'; 
	
	if ($_REQUEST['showbutton']==1) {
		echo "<div align=center class='frmreport' >
				<br>CETAK FILE KE FORMAT MICROSOFT EXCEL<br><br>";
		for ($i=0;$i<$jlhpage;$i++) {
			$uxs=$i+1;
			$limb=$i*$record_per_page;		
			$tempat="cetak".$uxs;
			$links=$hal2."&cetak=xls&lim=".$limb;
			echo "<span id=$tempat>";
			echo "<a class=button style='width:40px' 
					href=# onclick=javascript:bukaAjax('$tempat','$links');>Hal $uxs</a>";
			echo '</span>';
		}
		echo '<br><br></div>';
		exit;
	}


	error_reporting(E_ALL);
	 
//	require_once  $lib_path.'PHPExcel/PHPExcel.php';
	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator('um412')
							 ->setLastModifiedBy('um412')
							 ->setTitle('Office 2007 XLSX Test Document')
							 ->setSubject('Office 2007 XLSX Test Document')
							 ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
							 ->setKeywords('office 2007 openxml php')
							 ->setCategory('Test result file');

	
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('DAFTAR');
	$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
	
	$w_xls=array(6,10,14,20,25,30,10,15,11,11,20,13,13,10,15,11,11,11,9,11,11,7,8,22,8,16,42,22,15,22);

	// garis tepi
	$styleThinBlackBorderOutline = array(
		'borders' => array(
			'outline' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('argb' => 'FF000000'),
			),
		),
	);
 

	$objPHPExcel->getActiveSheet()->mergeCells('A1:'.$lastcol.'1');
	$objPHPExcel->getActiveSheet()->mergeCells('A2:'.$lastcol.'2');
	$objPHPExcel->getActiveSheet()->mergeCells('A3:'.$lastcol.'3');
		 
	$rx=1;//rowexcel
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rx, $judul1);$rx++;
	
	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Arial');
	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13);
	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setUnderline(PHPExcel_Style_Font::UNDERLINE_SINGLE);
	 
 	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rx, $judul2);$rx++; 
 	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rx, $judul3a);$rx++; 
 	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rx, $tglcetak);$rx++; 
 
	$rx++;
	$rx++;
	//SetFont('Arial', 'B', 9);	
	$row_heading=$rx;//baris heading	
	$range_heading='A'.$row_heading.':'.$lastcol.$row_heading;
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$rx, 'No'); 
	 
	for ($i = 0; $i < $jlhfield; $i++) {
		$objPHPExcel->getActiveSheet()->getColumnDimension("$crx[$i]")->setWidth($w_xls[$i]);
	   	$objPHPExcel->getActiveSheet()->setCellValue("$crx[$i]".$rx, strtoupper($afield[$i])); 	 
	}
	
	 $rx++;
	
	//warna
	$objPHPExcel->getActiveSheet()->getStyle($range_heading)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	$objPHPExcel->getActiveSheet()->getStyle($range_heading)->getFill()->getStartColor()->setARGB('FF808080');

	//echo $aksi;
	$h=mysql_query($sql);
	$br=0;
	 while ($v= mysql_fetch_array($h)){
	  $br++;	 
		if ($aksi=='validasi') {
			$isv=substr($v['t_tglvalidasi'],0,4)*1;
			if ($isv==0) {
			$stat="Belum Divalidasi";
			} else {
			$stat="Sudah Divalidasi";
			}
		}

		$objPHPExcel->getActiveSheet()->setCellValue('A'.$rx, $br+$lim); 
	  for ($i = 0; $i<$jlhfield; $i++) {
		$nmfield=trim($afield[$i]);
			$objPHPExcel->getActiveSheet()->setCellValue("$crx[$i]".$rx, $v[$nmfield]);		
	  	}
	  $rx++;
	}//persiswa
	
	$lastrow=$br+$row_heading;
	$range_content='A'.$row_heading.':'.$lastcol.$lastrow;
	$range_jumlah='A'.($lastrow+1).':'.$lastcol.($lastrow+1);
	 
	$objPHPExcel->getActiveSheet()->getStyle($range_content)->applyFromArray($styleThinBlackBorderOutline);
	$objPHPExcel->getActiveSheet()->getStyle($range_content)->getFont()->setSize(8);     
	
	$objPHPExcel->getActiveSheet()->getStyle($range_jumlah)->applyFromArray($styleThinBlackBorderOutline);
	$objPHPExcel->getActiveSheet()->getStyle($range_jumlah)->getFont()->setSize(8);     
	
	$objPHPExcel->setActiveSheetIndex(0);
	
	@unlink($nmFileXLS); //hapus file
	error_reporting(E_ALL);
	
	date_default_timezone_set('Europe/London');  
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save(str_replace('.php', '.xls', $nmFileXLS));
	echo "<br><a href=adm/$nmFileXLS>Download File</a>...<br>";
	exit;
}

?>
  

       <div id=tcari>
       <div id=cetak0></div> 

     <?php
	 	$_SESSION['back']= $um_path."index.php?&rep=tbprofile-daf&bl=1&".$_SERVER['QUERY_STRING'];

     if ($nr>0) {
	 ?>
     <center ><a href=# onclick="bukaAjax('cetak0','<?=$hal2?>&showbutton=1&cetak=xls')" class=button2>Cetak XLS </a>
     <?=$lh?> 
     </center>
     <table  border=0 class=tbreport cellspacing=0 align=center  >
	 
     <tr>  
	 <td class=tdjudul>No</td>
	 <td class=tdjudul>No.Reg</td>
     <td class=tdjudul>Nama</td>
     <td class=tdjudul width=200>Alamat<br>E-mail</td>
     <td class=tdjudul width=3>Telp</td>     
     <td class=tdjudul>Inst/Cab/Daerah</td>   
     <td class=tdjudul>Sponsor</td>   
     <td class=tdjudul>Access Key</td>
     <td class=tdjudul>Reservasi</td>  
  	 <td class=tdjudul style='min-width:60px'><?php echo ($aksi=='validasi'?"Validasi":"Operasi"); ?></td></tr>
	<tr>
	 <?php
	  $jumlah=0;
	  $br=0;
	  while ($r=mysql_fetch_array($h)) {
		  $idrecord=$r[id];
		  $idt="rd_".$r['id'];

		  $br++;
		  $jumlah=$jumlah+$jlh[0];
		  $troe=(($br%2)==0?'trevenform2':'troddform2');

	//generate if empty
	if ($r[access_key]=="") {
		$acck= encod(generateAccessKey());
		mysql_query(" update tbprofile set access_key='$acck' where id='$r[id]'");
		}
	else $acck=$r["access_key"];

	$kol1=decod($acck);
	$opsiWin="height=700,width=1000,left=12,top=30,scrollbars=yes,location=no ";
	$ack="<a href=# onclick=\"mwreg=window.open('index.php?page=konfirmasi&id=$r[id]','biodata','$opsiWin');mwreg.focus();return false;\" title='klik di sini untuk melihat detail registran'>$kol1 </a>";
	
	$tgltransfer=$r[t_tgltransfer];	if ($tgltransfer=='0000-00-00') $tgltransfer="&nbsp;";
	
	//reservasi
 	$rsa=cariField(" select id from reservasi_hotel where idprofile='$r[id]' ");
	$rsb=cariField(" select id from tbgroup where idprofile='$r[id]'  ");
	$rsc=cariField(" select id from reservasi_kongres_workshop where idprofile='$r[id]' and jenis='symposium' ");
	$rsd=cariField(" select id from reservasi_kongres_workshop where idprofile='$r[id]' and jenis='workshop' ");
	$rse=cariField(" select id from reservasi_kongres_workshop where idprofile='$r[id]' and jenis='pendamping' ");
	$rsf=cariField(" select id from reservasi_kongres_workshop where idprofile='$r[id]' and jenis='pre' ");
	$rsg=cariField(" select id from reservasi_kongres_workshop where idprofile='$r[id]' and jenis='tour' ");
	$rsh=cariField(" select id from reservasi_kongres_workshop where idprofile='$r[id]' and jenis='social program' ");
	$rsi=cariField(" select id from reservasi_kongres_workshop where idprofile='$r[id]' and jenis='tiket' ");
	$res="";
	$tt=" title='klik di sini untuk melihat detail reservasi'";

	if  (($usr_nm=='hotel') || ($usr_nm=='admin') ){
		if ($rsa*1!=0) $res.="<a href=# onclick=\"bukaAjax('$idt','$um_path"."res-hotel-daf.php?idprofile=$r[id]&cari=cari',1);return false;\" $tt> H </a>";
	}
	if  (($usr_nm=='group') || ($usr_nm=='admin') ){
		if ($rsb*1!=0) $res.="<a href=# onclick=\"bukaAjax('$idt','$um_path"."group-daf.php?idprofile=$r[id]&cari=cari',1);return false;\" $tt> A </a>";
	}
	
	$ahr="<a href=# onclick=\"bukaAjax('$idt','$um_path"."res-paket-daf.php?idprofile=$r[id]&cari=cari&jenis";
	
	if  (($usr_nm=='sekretariat') ||($usr_nm=='tbprofile') || ($usr_nm=='admin') ){
		if ($rsc*1!=0) $res.="$ahr=symposium',1);return false;\" $tt> S </a>";
		if ($rsd*1!=0) $res.="$ahr=workshop',1);return false;\" $tt> W </a>";
		if ($rse*1!=0) $res.="$ahr=pendamping',1);return false;\" $tt> P </a>";
		if ($rsf*1!=0) $res.="$ahr=pre',1);return false;\" $tt> R </a>";
		if ($rsg*1!=0) $res.="$ahr=tour',1);return false;\" $tt> T </a>";
		if ($rsh*1!=0) $res.="$ahr=social+program',1);return false;\" $tt> C </a>";
		if ($rsi*1!=0) $res.="$ahr=tiket',1);return false;\" $tt> I </a>";
		
 	}
			  ?>
		<tr  <?php echo "class='$troe' id='m_".$idt."' " ?>>
		<td ><?=($br+$lim)?></td> 
		<td ><?=$r[id] ?></td> 
		<td ><?=$r[nama]."<br>(".SQLtotgl($r[tgl]).")"?></td>
		<td ><?=$r[alamat]?><br><?=$r[email]?></td>
		<td ><?=$r[telp]?><br><?=$r[hp]?></td> 
		<td ><?=$r[institusi]." ".$r[cat]." ".$r[provinsi]?></td> 
		<td ><?=$r[nmsponsor]?></td> 
		<td ><?=$ack?></td>
		<td ><?=$res?></td>
        
<td  style='width:70;text-align:center'><center>  
<?php echo tboperasi( $um_path."tbprofile",$idrecord,'id','admin',$idt,'001' ); 
?></center>
</td>
</tr>
<tr><td colspan=11><div id='<?=$idt?>'  class='idt' ></div></td></tr>
<?php 
 	  }
	  ?> </table> <?php
	 }	 else { //jika tidak ketemu
		echo '<center><br>Data tidak ditemukan</center>';
	}
?>
<a name="tvedit1" />
<center><div id='tvedit' style="width:97%; border:#666 2px solid; "></div></center>
<a name="tvedit2" />
</div>

  