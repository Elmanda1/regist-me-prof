<?php


cekVar('id,nama,namabelakang,email,telp,hp,sbook');

$opr=$_REQUEST["op"]; 
$opr=$op;


if (($opr=="tb") || ($opr=="ed")) {
	//kill_unauthorized_user();
	 $ketbasket2=str_replace("'",'"',$ketbasket2);
    if ($opr=='tb') {
		$transid=$kdEvent."TR".date("his");
		
		//mysql_query("update $tbRegistrasi set access_key='$ack' where id='$id' ");
		$sql="insert into regtour(nama,namabelakang,email,telp,hp, ketbasket1,ketbasket2,transid,transamount,pmethod) 
		values ('$nama','$namabelakang','$email','$telp','$hp', '$ketbasket1','$ketbasket2','$transid','$transamount','$pmethod')";
		$transbasket=$basket=$ketbasket1;
		//echo $transamount;
		
		// "$xtitle,$nff,1,$nff";
		//$transamount+=($costrp*1);
	}
	else 	{
		$sql="update regtour set id='$id',nama='$nama',namabelakang='$namabelakang',email='$email',
		telp='$telp',hp='$hp',tglentry='$tglentry',
		ketbasket1='$ketbasket1',
		ketbasket2='$ketbasket2' ,transammount='$transamount' where id='$id' ";
	
	
	}
	
	
} else if ($opr=="hp"){
		//kill_unauthorized_user();

	$sql= "delete from regtour where id='$id'";
} else  {
		//kill_unauthorized_user();

}
$berhasil=false;
if (($opr=='hp') || ($opr=='ed') || ($opr=='tb')){
	$hasil=mysql_query($sql);
	if (!$hasil) {
		echo	um412_falr("Registration Unsuccessfully,  $sql ");
		exit;
	} else {
		//echo "Operasi berhasil dilakukan";
		//redirection($toroot."index.php?rep=daf_regtour",1);
		if (op("tb")) {
			//kirim email
			$idreg=$idregtour=mysql_insert_id();
			$berhasil=true;
			
			//update ke detail
			//updateDetRegtour($idreg);
			//$ketbasket1
			//Private Rental Full Day - Toyota Innova  - 05/25/2022 (2 unit @USD 75),1125000,2,2250000,502,75,trans ;Credit card fee,67500,1,67500
			//basketToArray
			updateBasketTour($idreg);
			
		}
 	}
	
	//proses memasukkan basket
}
?>
  