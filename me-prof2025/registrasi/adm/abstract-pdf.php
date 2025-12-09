<?php die("DEBUG: This is abstract-pdf.php. If you see this, the file is correct."); ?>
<?php
use setasign\Fpdi\Fpdi;
include_once("conf.php");
require_once($um_path."fpdf_html.php");
$nflocal=$toroot."adm/abstract-pdf-local.php";
if (file_exists($nflocal)) {
	include $nflocal;
} else {
// initiate FPDI
//$pdf = new Fpdi();
$nfKop=getHeaderPDFImage('pcl',0);	
/*
$nfpdf=$nmFileAttachment="abstrak_$id";
$outputPDF="F";
*/
$nmFilePDF=$temp_path.$nmFileAttachment; 
$print_page_1 = true;
$print_page_2 = true;
$brdr = 0;
$height = 5;
$lebar_kertas = 297; // mm
$top_margin = 31; // mm
$left_margin = 12; // mm
$right_margin = 15; // mm
$inner_width = $lebar_kertas - ($left_margin + $right_margin);
$debug = false;
	   
	//$pdf = new PDF('P', 'mm', 'A4');
	$pdf=new PDF_HTML();
		  
	$pdf->AliasNbPages();
	$pdf->SetTopMargin($top_margin);
	$pdf->SetLeftMargin($left_margin);
	$pdf->SetRightMargin($right_margin);
	#---[ HALAMAN 1]----------------------------------------------------------------
	$scalaHtml=0.3;
	$w1=50;
	$w2=145;
	$h=4.5;
	$align='L';
	$pdf->AddPage();
	$pdf->SetLineWidth(0.4);
	//$pdf->SetLink($link);
	//$pdf->Image($nfKop,$left_margin-8,5,200,0,'','');
	$pdf->Image($nfKop,$left_margin,1,180);
	$pdf->SetLeftMargin(15);
	$pdf->SetFontSize(12);/* KOP SURAT */
	$pdf->gantiFontNormal();
	$pdf->Cell($w1, $h, " ", 0, 0, $align);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$nourut=$r['id'];
	$pdf->Ln(); 
	$pdf->gantiFontJudul1();
	$pdf->Cell($w1+$w2, $h,translate("MAKALAH BEBAS",'ABSTRACT SUBMISSION'), $brdr, 0, "C");
//		$pdf->Ln(); 
//		$pdf->Cell($w1+$w2, $h, "TIPE : PEMBAYARAN ".$jenispy, $brdr, 0, "C");
	$pdf->gantiFontNormal();
	$pdf->Ln();
	//$pdf->Line($left_margin ,$pdf->GetY(), $w1 + $w2, $pdf->GetY());
	if ($r['id']*1!=0) {
		$pdf->Ln();
		$nmlengkap=$r['namaabs'];
		//if ($r['gelardepan']!='') $nmlengkap=$r['gelardepan'].". ".$nmlengkap;
		//if ($r['gelarbelakang']!='') $nmlengkap=$nmlengkap."  ".$r['gelarbelakang'];
		$pdf->Ln();
		$pdf->gantiFontNormal();
		$pdf->Cell($w1, $h,($lang=='en'?'Abstract No':"Nomor Abstrak"), $brdr, 0, $align);
		$pdf->Cell($w2, $h, ": $judulWebSingkat-00".$r['id'], $brdr, 0, $align);	
		$pdf->Ln();
		$pdf->Cell($w1, $h, ($lang=='en'?'Category':"Topik"), $brdr, 0, $align);
		$pdf->Cell($w2, $h, ": ".$r['topic'], $brdr, 0, $align);		
		$pdf->Ln();
		$pdf->Cell($w1, $h, ($lang=='en'?'Submission Date':"Tgl. Submit"), $brdr, 0, $align);
		$pdf->Cell($w2, $h, ": ". date("d M Y h:i:s",strtotime($r['tgl'])), $brdr, 0, $align);		
	 
		if (!isset($useNama)) $useNama=true;
		if ($useNama) {
			//memecah author
			$sau=$snamaau="";
			$aau=explode("#",$r['author']);
			$i=1;
			foreach($aau as $au) {
				$xau=explode("|",$au."|||");
				$auname=$xau[0];
				$aff="";
				if (strlen($xau[2])>2) $aff.=($aff==""?"":", ").$xau[2];
				if (strlen($xau[3])>2) $aff.=($aff==""?"":", ").$xau[3];
				if (strlen($xau[4])>2) $aff.=($aff==""?"":", ").$xau[4];
				//$snamaau.=($snamaau==""?"":",").$xau[0];
				$pdf->Ln();
				$pdf->Cell($w1, $h,($lang=='en'?'Author '.$i: "Peneliti ".$i), $brdr, 0, $align);
				$pdf->Cell($w2, $h, ": ".$auname, 0, $align);		
				$tit=pecahText($aff,67);
				$i=0;
				foreach($tit as $tut) {				
					$cap=($i==0?($lang=='en'?'Affiliation  ': "Afiliasi  "):"");
					$isit=($i==0?": ":"  ").$tut;
					$pdf->Ln();
					$pdf->Cell($w1, $h,$cap, $brdr, 0, $align);
					$pdf->Cell($w2, $h,$isit, $brdr, 0, $align);		
					$i++;
				}
				$i++;	
			}
		}
		
	 
		$tit=pecahText($r['title'],60);
		$i=0;
		 
		foreach($tit as $tut) {				
			$cap=($i==0?($lang=='en'?'Title':"Judul"):"");
			$isit=($i==0?": ":"  ").$tut;
			$pdf->Ln();
			$pdf->Cell($w1, $h,$cap, $brdr, 0, $align);
			$pdf->Cell($w2, $h,$isit, $brdr, 0, $align);		
			$i++;
		}

		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell($w1, $h, ($lang=='en'?'Abstract':"Abstrak"), $brdr, 0, $align);
		$pdf->Cell($w2, $h, ": ", $brdr, 0, $align);		
		$pdf->Ln();
		$pdf->Ln();
		// test some inline CSS
		//$pdf->write(0,$isi);
		//$pdf->WriteHTML($isi);
		//function MultiCell($w, $h, $txt, $border=0, $align='J', $fill=false)
		
		
		$aisi=explode("<br>",$r['isi']);
		foreach($aisi as $isi) {
			$isi=removetag($isi);
			if ($isi!='') $pdf->MultiCell($w1+$w2-15,$h,$isi, $brdr, 'J');
		}				 
		$pdf->Ln();
		$pdf->Cell($w1, $h, ($lang=='en'?'Keywords':"Kata Kunci"), $brdr, 0, $align);
		$pdf->Cell($w2, $h, ": ".$r['keywords'], $brdr, 0, $align);		
	}
	
// echo "file: <a href='$nmFileAttachment'>$nmFileAttachment </a><br>";
  if (!isset($outputPDF)) $outputPDF="F";
  //if (file_exists($nmFileAttachment)) kill($nmFileAttachment);

  
  $pdf->Output($nmFileAttachment, $outputPDF);
 
}
?>