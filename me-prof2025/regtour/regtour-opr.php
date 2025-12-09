<?php

$realUseDoku=false;
if ($useDoku) {
	$idxam =array_search($pmethod,$akodepm);
	$realUseDoku=($idxam>=0?true:false);
} 

include "regtour-upd.php";	
//include "regtour-inv.php";	
 	 
if (($realUseDoku)  && ($pmethod>1)){
	//mysql_query("update regtour set snotrans='$transid'  where id='$idregtour'");
	$AMOUNT=$totalamount=number_format(round($transamount,0),2,".","");
	//jikajumlah 0 
	if ($AMOUNT>0) {
		$ch="";
		$jenis=$refferal="regtour";
		 
		foreach($amdoku as $am) {
			  if ($pmethod==$am['kodepm']) {
				  $ch=$am;
			  }
		}
		 
		if (is_array($ch)) {
			$spaymethod=$ch['ch'];
			$xalamat='-';
			$negara='id';
			$alamat=$kota='';
			/*
			$dataPHPInput=[
				'invoice_number'=>$transid,
				'transbasket'=>$transbasket,
				'cust_id'=>$idreg,
				'cust_name'=>validasiInpNama($nama),
				'cust_email'=>$email,
				'cust_phone'=>validasiInpTelp($hp),
				'cust_address'=>$xalamat,
				'cust_country'=>$negara,
				'refferal'=>$refferal,
				'spaymethod'=>$spaymethod,
			];
			*/
			
			include_once $doku_path."doku-mulai.php";	
		} else {
			echo "Channel tidak diketahui.....<br>ID Channel:$pmethod";exit;
		}
	}
	else {
		echo "Thank for your free registration.";
	}
}

