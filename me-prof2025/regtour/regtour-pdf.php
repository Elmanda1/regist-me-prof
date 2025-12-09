<?php
 
	$useJS=2;
	include_once($lib_path."pdf/fpdf.php");
	include $um_path."pdf-konfirmasi-head.php";
 

	$pdf->Ln(); 
	$pdf->Ln(); 
	$pdf->gantiFontJudul1();
	$pdf->Cell($w1+$w2, $h, $judulPCL, $border, 0, "C");
	$pdf->Ln(); 
	$pdf->Cell($w1+$w2, $h, "TYPE : TRANSPORTATION/TOUR PAYMENT ", $border, 0, "C");
	$pdf->gantiFontNormal();
	$pdf->Ln();
	//$pdf->Line($left_margin ,$pdf->GetY(), $w1 + $w2, $pdf->GetY());

		$pdf->Ln();
		$pdf->gantiFontJudul2();
		$pdf->Cell($w1+$w2, $h, "CONTACT DETAIL", $border, 0, $align);
		$pdf->Ln();
		$pdf->gantiFontNormal();
		/*
		$pdf->Cell($w1, $h, "Registration Number ", $border, 0, $align);
		$pdf->Cell($w2, $h, ": $rv[id]", $border, 0, $align);		
		$pdf->Ln();
		*/
		$pdf->Cell($w1, $h, "Registration Date", $border, 0, $align);
		$pdf->Cell($w2, $h, ": ".Sqltotgl($rv['tglentry']), $border, 0, $align);		
		
		$nmlengkap=$rv['nama']." ".$rv['namabelakang'];
		
		$pdf->Ln();
		$pdf->Cell($w1, $h, "Name", $border, 0, $align);
		$pdf->Cell($w2, $h, ": $nmlengkap", $border, 0, $align);		
		$pdf->Ln();
		$pdf->Cell($w1, $h, "Celluler Phone", $border, 0, $align);
		$pdf->Cell($w2, $h, ": $rv[telp]", $border, 0, $align);		
		$pdf->Ln(); 
		$pdf->Cell($w1, $h, "Whatsapp Number ", $border, 0, $align);
		$pdf->Cell($w2, $h, ": $rv[hp]  ", $border, 0, $align);		
		$pdf->Ln(); 
		$pdf->Cell($w1, $h, "Email", $border, 0, $align);
		$pdf->Cell($w2, $h, ": $rv[email]", $border, 0, $align);		
		$pdf->Ln(); 
		$pdf->Ln(); 		
	
	$pdf->Ln(); 
	$pdf->Ln(); 
	$pdf->gantiFontJudul2();
	$pdf->Cell($w1+$w2, $h, "PAYMENT INFORMATION", $border, 0, $align);
	$pdf->gantiFontNormal();		

	$pdf->Ln(); 
	$pdf->Cell($w1, $h, "Payment", $border, 0, $align);
	$pdf->Cell($w2, $h, ": TRANSPORTATION/TOUR Payment", $border, 0, $align);		

	$pdf->Ln(); 
	$pdf->Cell($w1, $h, "Total Fee", $border, 0, $align);
	$pdf->Cell($w2, $h, ": ".$costx, $border, 0, $align);		 

	$pdf->Ln();
	$pdf->Cell($w1, $h, "Bank/Via", $border, 0, $align);
	$pdf->Cell($w2, $h, ": Online Payment", $border, 0, $align);		
	$pdf->Ln(); 
	$pdf->Cell($w1, $h, "Total Transfer", $border, 0, $align);
	$pdf->Cell($w2, $h, ": ".$costx, $border, 0, $align);		


	$pdf->Ln(); 
	$pdf->Ln(); 
	$pdf->gantiFontJudul2();
	$pdf->Cell($w1+$w2, $h, "ORDER DETAIL", $border, 0, $align);
	$pdf->Ln();
	$pdf->gantiFontNormal();
	$wd=[10,145,20];
	$no=0;
	$border=1;
	$pdf->Ln(); 
	$pdf->Cell($wd[0], $h, "No", $border, 0, $align);
	$pdf->Cell($wd[1], $h, "Descryption", $border, 0, $align);
	$pdf->Cell($wd[2], $h, "Fee", $border, 0, "R");
	/*
	Specialist-Local Participant  Offline ,5500000.00,1,5500000.00;Accompanieng Person-Local Participant,500000.00,1,500000.00;Bank administration fee,4500.00,1,4500.00
	*/
	
	$ab=explode(";",$basket);
	foreach ($ab as $b) {
		if ($b=="") continue;
		$no++;
		$det=explode(",",$b);
		//echo "<br>$b >";
		//Specialist-Local Participant  Offline ,5500000.00,1,5500000.00
		
		$tit=pecahText($det[0],157);
		$i=0;
		foreach($tit as $tut) {				
			$cap1=($i==0?$no:"");
			$cap2=($i==0?maskRp($det[3]):"");
			$isit=$tut;//($i==0?": ":"  ").$tut;
			$pdf->Ln();
			$pdf->Cell($wd[0], $h, $cap1, $border, 0, $align);
			$pdf->Cell($wd[1], $h, $isit, $border, 0, $align);
			$pdf->Cell($wd[2], $h, $cap2, $border, 0, "R");
			$i++;
		} 
	}

	$pdf->Ln(); 
	$pdf->Cell($wd[0], $h, "", $border, 0, $align);
	$pdf->Cell($wd[1], $h, "Total", $border, 0, $align);
	$pdf->Cell($wd[2], $h, maskrp($totalamount), $border, 0, "R");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$border=0;
	
	//$pdf->Cell($w1+$w2, $h, "$webmasterCity, ".SQLtotgl($tglvalidasi), $border, 0, $align);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	//$pdf->Cell($w1+$w2, $h, "$webmasterName", $border, 0, $align);		
	$pdf->Ln();
	$jpdf="en";
	include  $um_path."pdf-konfirmasi-foot.php";
