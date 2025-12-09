<?php
cekVar('aksi,rekap');
if ($rekap==1) {
	include $toroot."../regtour/regtour-rekap.php";
	exit;
} 
cekvar("op");
if (op("inv")) {
	$idregtour=$id;
	include "regtour-inv.php";
}elseif (op("confirm")) {
	$idregtour=$idres=$idreg=$id;
	$jenis="regtour";
	
	include $um_path."form_pay.php";
	echo fbe("alert(1);");
	exit;
}
	//default
	$sq="select regtour.*  from regtour";
	$strfield="id,nama,namabelakang,email,telp,hp,tglentry,ketbasket1,ketbasket2,transid,transamount,stat";
	$idtabel='regtour.id';
	$nmtabel='regtour';
	$jperpage=$record_per_page=100;
	$jpperpage=15;
	$tbsql= '';
	$orderby=' order by regtour.id desc';

	$afield = explode(',',$strfield);
	$jlhfield=count($afield);
	$jlhcol=$jlhfield+1;
	
	//cetak
	/*
	$tglcetak=tglIndo();
	$crx=explode(',' , 'B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,AA,AB,AC,AD,AE,AF');
	$lastcol=$crx[$jlhfield-1];
	$scalaHtml=25;
	$scalaPDF=20;
	$scalaXLS=20;
	$w=array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
	$w_xls=$w_html=$w_pdf=$w;
	*/


$titlereport=("Daftar Registrasi Transport dan Tour");
$isicombo="Nama;nama,No ID;regtour.id";

$admrep="regtour";
$hal2="index.php?rep=regtour-daf&contentOnly=1";


include $um_path."frmreport.php";
 
 //cetak ke excel
?> 
<?php

//pencetakan
if ($cetak=='xls') {
	$nmFileXLS=$temp_path.'Daftar_regtour_rec_'.$lima.'_sd_'.$limb.'.xls'; 
	include $um_path.'cetak-xls-head.php'; 
	 
	/*
	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator('um412')
							 ->setLastModifiedBy('um412')
							 ->setTitle('Office 2007 XLSX Test Document')
							 ->setSubject('Office 2007 XLSX Test Document')
							 ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
							 ->setKeywords('office 2007 openxml php')
							 ->setCategory('Test result file');

	
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('regtour');
	$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
	
	//$ defHtml 
	
	//lebar 
	for ($i = 0; $i <= $jlhfield; $i++) {
		$w_xls[$i]=$w[$i]*$scalaXLS;
	}

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
	   	$objPHPExcel->getActiveSheet()->setCellValue("$crx[$i]".$rx, strtoupper($afield[$i])); 	 }     
	 $rx++;
	
	//warna
	$objPHPExcel->getActiveSheet()->getStyle($range_heading)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	$objPHPExcel->getActiveSheet()->getStyle($range_heading)->getFill()->getStartColor()->setARGB('FF808080');
	
	*/
	//DAFTAR 
	//$sq="select id,nama,namabelakang,email,telp,hp,tglentry,sbook from regtour";
	$h=mysql_query($sql);
	$br=0;
	 while ($v= mysql_fetch_array($h)){
	  $br++;	 
	  $objPHPExcel->getActiveSheet()->setCellValue('A'.$rx, $br+$lim); 
	  for ($i = 0; $i<$jlhfield; $i++) {
		$nmfield=$afield[$i];
		 $objPHPExcel->getActiveSheet()->setCellValue("$crx[$i]".$rx, trim($v[$nmfield]));		
	  } 
	  $rx++;
	}//persiswa
	
	include $um_path."cetak-xls-foot.php";
/*
	$lastrow=$br+$row_heading;
	$range_content='A'.$row_heading.':'.$lastcol.$lastrow;
	$range_jumlah='A'.($lastrow+1).':'.$lastcol.($lastrow+1);
	 
	$objPHPExcel->getActiveSheet()->getStyle($range_content)->applyFromArray($styleThinBlackBorderOutline);
	$objPHPExcel->getActiveSheet()->getStyle($range_content)->getFont()->setSize(8);     
	
	$objPHPExcel->getActiveSheet()->getStyle($range_jumlah)->applyFromArray($styleThinBlackBorderOutline);
	$objPHPExcel->getActiveSheet()->getStyle($range_jumlah)->getFont()->setSize(8);     
	
	$objPHPExcel->setActiveSheetIndex(0);
	
	@unlink($nmFileXLS); //hapus file
	
	
	date_default_timezone_set('Europe/London');  
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save(str_replace('.php', '.xls', $nmFileXLS));
	echo "<br><a href=../adm/nmFileXLS>Download File</a>...<br>";
	exit;
	*/
}

?> <?php

//cetak ke pdf
//? >$htmlPDF< ? php


//echo $sql;
$tempatv="tv$rnd";
	?>
	<div id='tdialogreport_<?=$rnd?>' ></div>
      <div id=tcari>
	  <div id=cetak0></div>
     <?php
	 echo "<div id=$tempatv></div>";
     if ($nr>0) {
	 ?>
     
	 <?php echo '<p><center>'.$cxls.'</center></p>' ?>
	 
	 <table  border=0 class=tbreport align=center cellpadding=0 >
	 <tr><td  class=tdjudul>NO</td>
	 <td class=tdjudul>ID</td>
		<td class=tdjudul>NAMA <br>EMAIL</td> 
		<td class=tdjudul>TELP/WA</td>
		<td class=tdjudul>TANGGAL</td>
		<td class=tdjudul>DETAIL ORDER</td>
		
		<td class=tdjudul>TRANS ID <BR>AMOUNT</td>
		<td class=tdjudul>STAT</td> 
		
	<td class=tdjudul>OPERASI</td></tr>
	<tr>
	 
	 
	 <?php
	 //$ tdJudul 
	 $jumlah=0;
	  $br=0;
	  while ($r=mysql_fetch_array($h)) {
		  $id=$r['id'];
		  $idt="gtou_".$r['id'];
		  $rndx=$rnd.$id;
		  $br++;
		  $troe=(($br%2)==0?'trevenform2':'troddform2');
		  $jumlah=$jumlah+$jlh[0];
			?>
			<tr class='<?=$troe?>' id='m_<?="".$idt?>'  >
			<td><?=($br+$lim)?><span id=$idt></span></td>
	<td><?=$r['id']?></td>
		<td><?=$r['nama'].' '.$r['namabelakang'].'<br>'.$r['email']?></td>
		<td><?=$r['telp'].'<br>'.$r['hp']?></td>
		<td><?=tglIndo2($r['tglentry'],'d x Y')?></td>
		<td><?php
			echo htmlspecialchars_decode($r['ketbasket2']);
		
		//$stat=$r['stat'];
		$stat=cekStatBayar($idreg=$r['id'],$idres=$r['id'],$jenis="regtour",$cost=$r['transamount'],$showlink=true,$update=false,$curstat=$r['stat']);
		if ($stat=='Belum Dibayar') {
		
			$links="index.php?rep=regtour-daf&op=confirm&id=$id&newrnd=$rndx";
		$stat.= "<br><a  href=# onclick=\"bukaAjaxD('$tempatv','$links','width:500','awalEdit($rndx)');\" class='btn btn-xs btn-mini btn-primary'>Confirm Payment</a>";
			
		}
		/*
		if (($stat=='paid')||($stat=='not validated yet')) {
			$idbayar='';
			extractRecord("select id as idbayar from konfirmasi_transfer where ref='$r[transid]' or (id_registran='$r[id]' and jenis='regtour') ",1,1,1);
			if ($idbayar!='') {
				$links=$toroot."adm/index.php?rep=transfer-daf&id=$idbayar&cari=cari";
				$stat="
				<a  href=# onclick=\"bukaAjaxD('$tempatv','$links','width:wMax-100');\"> > $r[stat] ($idbayar) </a>
							";
			}
		} else {
			//$stat="Belum Dibayar";
			
			$links="index.php?rep=regtour-daf&op=confirm&id=$id&newrnd=$rndx";
		$stat.= "<br><a  href=# onclick=\"bukaAjaxD('$tempatv','$links','width:500','awalEdit($rndx)');\" class='btn btn-xs btn-mini btn-info'>Confirm Payment</a>";
		}
		*/
		?></td>
		<td><?=$r['transid'].'<BR>'.maskRp($r['transamount'])?></td>
		<td><?=$stat?></td>
		
	 <?php
	echo "<td width=100>"; 
	echo "<span id=$idt></span>";
	echo tboperasi2('regtour',$r['id'],'id','admin,sa',$idt); 
	
	$links="index.php?rep=regtour-daf&op=inv&id=$id";
	echo "<a  href=# onclick=\"bukaAjaxD('$tempatv','$links','width:wMax-100');\" class='btn btn-xs btn-mini btn-warning'>inv</a>
							";
	if ($r['stat']=='') {
		
	
	}
	echo "</td></tr>"; 
	
	
		}
 	 
	  ?> </table> <?php
	 }	 else { //jika tidak ketemu
		$idt='idtku'.$rnd;
		echo '<center><br>Data tidak ditemukan</center>';
		echo "<span id=$idt></span>";
			 echo tboperasi2('regtour',$r['id'],'id','all',$idt);  
		
	}
?>
</div>  