<?php
//$useJS=2;
//include_once "conf-libdoku.php";
if (!isset($ketSQL)) $ketSQL="";
if (!isset($nmBank)) $nmBank="Online Payment";
if (!isset($judulPCL)) $judulPCL="PAYMENT CONFIRMATION LETTER";
if (!isset($validatedby)) $validatedby="auto";
if (!isset($showOnly)) $showOnly="0";
if (!isset($outputPDF)) $outputPDF="F";
	//	echo "output $outputPDF >>>";


	$hAwal=substr($transid,0,1);
	$sqlc=array();
	$sqt="select *,transamount as cost,tglentry as tgl,concat(nama,' ',namabelakang) as namasert,'$nmBank' as bank from regtour where transid='$transid'";
	$ht1=mysql_query($sqt);		
	while ($rt1=mysql_fetch_array($ht1)){		 
		$ada=true;
		$idres=$id_reservasi= $idreg=$id_registran=$rt1['id'];
		$tglvalidasi=$rt1['tglentry'];
		$jenis="regtour";
		$ketSQL.="id reg:$idreg jenis=$jenis transid: $transid <br>"; 
		if ($validatedby=='auto') {
			//jika oleh doku
			$sqt="select id from konfirmasi_transfer where id_reservasi='$idres' and jenis='$jenis'";
			$cc=cariField($sqt);
			if ($cc!='') {
				mysql_query("delete from konfirmasi_transfer where id_reservasi='$idres' and jenis='$jenis' ");
			}
			
			$sqt="insert into konfirmasi_transfer ( id_reservasi, id_registran,   tgl_transfer,    
			jlh_transfer,  bank,  ref, jenis,`stat`,ip,tgl_validasi)
	values('$idres','$idreg','$rt1[tgl]','$rt1[cost]','$nmBank','$transid','$jenis','Validated','$ip','$rt1[tgl]')";
			mysql_query($sqt);
		}
		$sqt="select id from konfirmasi_transfer where id_reservasi='$idres' and jenis='$jenis'";
		$idkonf=cariField($sqt);
		$rv=$rt1;
		
		$jenispy=strtoupper($jenis); 
		$costx="IDR ".$rv['transamount'];
		$basket=$rv['ketbasket1'];
		$totalamount=$rv['transamount'];
		$ketpaid="P A I D";
		$namasert=$rv['nama'];
		$rv1=$rv2=$rv;
		$bank="Online Payment";
		
		
		$nmf=str_replace(" ","-",$rv['nama']);
		$nmf=str_replace("'","",$nmf);
		
		
		$nmFileAttachment=$temp_path."payment_confirmation_".$nmf."_(".$id_registran."-"."$jenis)_nores_"."$id_reservasi.pdf";
		$sus=("update regtour set stat='paid' where id='$idres'");
		mysql_query($sus);	
		
		
	 
		include "regtour-pdf.php";
		//include "doku-transfer-opr.php";
		if (!isset($sNmFileAttachment)) $sNmFileAttachment="";
		if ($nmFileAttachment!=="") {
			if ($outputPDF!='D') echo "<a href='$nmFileAttachment'> Download $nmFileAttachment</a>";
			$sNmFileAttachment.=($sNmFileAttachment==""?"":",").$nmFileAttachment;
		}

	} //akhir while

	if ($outputPDF!='D') {
		if ($ada) {
			$judulPCL="Tour/Transport Payment Confirmation Letter ";
			include $um_path."transfer-email-validasi.php";  
			if (!$isOnline) {
				echo "<br>Akan dikirim ke $mailTo ";
				echo $bodyMail;
				echo $komentar_email;
			}
		}
	}
	//proses konfirmtransf

?>