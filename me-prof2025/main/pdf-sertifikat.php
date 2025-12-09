<?php
$useJS=2;
include_once('conf.php');
//$nfg="swk.jpg";
if (!isset($addLeftMargin)) $addLeftMargin=5;	
if (!isset($marginTopNama)) $marginTopNama=13.5;	
if (!isset($marginTopAs)) $marginTopAs=21;	
extractRequest();
require_once($lib_path.'/fpdf/fpdf.php');
	$nmFilePDF=$temp_path."sertifikat_$idreg"."_".date('hms').".pdf"; 
	$print_page_1 = true;
	$print_page_2 = true;
	$border = 0;
	$height = 5;
	$lebar_kertas = 297; // mm
	$top_margin = 32; // mm
	if (!isset($left_margin)) $left_margin = 45; // mm
	$right_margin = 15; // mm
	$inner_width = ($lebar_kertas - ($left_margin + $right_margin));
	$w1=$inner_width-37+$addLeftMargin;
	$debug = false;	


	$pdf = new FPDF('L', 'mm', 'A4');
	
	$pdf->AliasNbPages();
	$pdf->SetTopMargin($top_margin);
	$pdf->SetLeftMargin($left_margin);
	$pdf->SetRightMargin($right_margin);
	$pdf->SetAutoPageBreak(0,0);
	
	//require($lib_path.'/fpdf/makefont/makefont.php');
	//MakeFont($lib_path.'/fpdf/font/MTCORSVA.TTF','cp1252');
	
	         // line width in user unit
$pdf->AddFont('MonotypeCorsiva','','MTCORSVA.php');

	
	#---[ HALAMAN 1]----------------------------------------------------------------
		$scalaHtml=0.3;
		$border=0;
		$align='L';
		$pdf->AddPage();

	$pdf->Image($nfg,5,5,287,200,'JPG');
	//$sskp=carifield("select skp from reservasi_kongres_workshop inner join master_data on reservasi_kongres_workshop.id_master_data=master_data.id   where reservasi_kongres_workshop.id='$idres'");
	//$askp=explode("|",$sskp."||||");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell($w1, 13.5, "", $border, 1, "C");
	$pdf->Ln();
	
	
	
	$pdf->SetFont('MonotypeCorsiva', '', 28);
	$pdf->Cell($w1, $marginTopNama, $namaLengkap, $border, 1, "C");
	$pdf->SetFont('Arial', $styAs, $fontSizeAs);
	$pdf->Cell($w1, $marginTopAs, $pas, $border, 0, "C");
	
	$pdf->Ln();
 
	//$pdf->SetFont('arial', '', 6);
	$pdf->SetLineWidth(3);
	//$pdf->Cell($w1, $h, $pas, $border, 0, "C");
	//$pdf->Cell($w1, $h, "$certas", $border, 0, "C");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial', '', 6);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial', '', 8); 
	//$pdf->Cell($w1, $h, "$askp[0]", $border, 0, "C");
	$pdf->Ln();
	//$pdf->Cell($w1, $h, "$askp[1]", $border, 0, "C");
	$pdf->Output($nmFilePDF, 'F'); 
	//if ($isOnline)
		echo "<script>location.href='$nmFilePDF';</script>";
	//else
	//	echo "<script>window.open('$nmFilePDF');</script>";
?>