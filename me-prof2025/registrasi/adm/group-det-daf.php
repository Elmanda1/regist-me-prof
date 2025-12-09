<?php

$useJS=2;
include_once "conf.php";
cekVar('tgl_transfer,changefee,lnkAddParticipant');
if ($idprofile*1==0) {
	$prof=$_SESSION['egroup'];
    $idprofile=cariField("select id from tbprofile where email='$prof'");
	if ($idprofile=='') exit;
	}
$aw=array(30,150,140,130,105,70,50,40,80);
hitungSkala($aw,700);
$jkol=9;
//if ($isAdmin) $jkol++;
$j=0;
for ($x=1;$x<$jkol;$x++) {
	$y=$aw[$x-1];
	$st[$x]=" class=tdcontent style='width:$y"."px;overflow:scroll' width=$y ";// 
	$j+=$y;
}
$st[$jkol]=" width=700 style='width:700"."px' cellpadding=3 cellspacing=0 border=1";

$vgd="";

$tgldaftar=SQLtotgl(cariField("select tgl from tbprofile where id='$idprofile'"));
//if ($tgl_transfer=='') $tgl_transfer=$tgldaftar; //jika tanggal transfer kosong, ganti dengan tanggal daftar
if ($tgl_transfer=='') $tgl_transfer=date($formatTgl); //jika tanggal transfer kosong, ganti dengan tanggal sekararang

//echo "TGL $tgl_transfer";

$tt=getTglInput($tgl_transfer);//tglsekarang
$be=getTglInput($batasEar);
$bl=getTglInput($batasLat);
//$vgd.="Transfer Date: ".$tgl_transfer." Limit for Early Payment: ".$batasEar."  Limit for Regular Payment: ".$batasLat." $tt $be $bl";




$vgd.="

	<div class=subtitleform2 style='text-align:left;margin-bottom:-5px'>Participants</div>
	<table $st[$jkol] >
	<tr>
	<td class=tdjudul $st[1] >N0</td>
	<td class=tdjudul $st[1] >NAME</td>
	<td class=tdjudul $st[2] >PROFESSION</td>
	<td class=tdjudul $st[3] >CITY</td>
	<td class=tdjudul $st[4] >MOBILE PHONE</td>
	<td class=tdjudul $st[5] >FEE (WHEN REGISTERED)</td>  ";
	if ($tgl_transfer!='') $vgd.= "<td class=tdjudul $st[6] >FEE (ON $tgl_transfer)</td>";
	  
	$vgd.= "<td class=tdjudul $st[7] >STATUS</td>
	<td class=tdjudul $st[8] >CONFIRM</td>
	</tr>
	";
	
if ($idprofile*1==0) die("idprofile is empty.....");
$sq="select * from registrasi where idgroup='$idprofile'";

$hq=mysql_query($sq);
$br=$jcek=$jvalid=0;
while ($r=mysql_fetch_array($hq)) {
	$sq2="select reservasi_kongres_workshop.*,master_data.title,master_data.cost as cost_ear,
	master_data.lat as cost_lat,master_data.onsite as cost_onsite 
	from reservasi_kongres_workshop inner join master_data on reservasi_kongres_workshop.id_master_data=master_data.id 
	where id_registran='$r[id]'";
	$idt="idt".$br;
	
	$hq2=mysql_query($sq2);
	$r2=mysql_fetch_array($hq2);
	$harga=$costregister=$r2['cost'];
	//	<table $st[8] >
	$stat1=$stat2='';
	//extractRecord("select stat as stat1 from konfirmasi_transfer where id_reservasi='$r2[id]' and jenis='$r2[jenis]' ");
	//echo $sqc;
	//ganti harga
	//$hq2=mysql_query($sq2);
	//while ($r2=mysql_fetch_array($hq2)){
		$stat1="";
		if ($r2['id']!='') {
			$sqs="select stat as stat1,id as idtransfer,jenis from konfirmasi_transfer where id_reservasi='$r2[id]' and jenis='$r2[jenis]' ";
			extractRecord($sqs);
			
		}
		if ($stat1=='') {
			$harga=$curcost=(($tt/100>=$bl/100 )?$r2['cost_onsite']:(($tt/100>=$be/100 )?$r2['cost_lat']:$r2['cost_ear']));
			if (($changefee==1) && ($cost!=$curcost)) {
				$sq="update reservasi_kongres_workshop set cost='$curcost' where id='$r2[id]'";
				mysql_query($sq);
				echo $sq."<br>";
				$costregister=$curcost;
			}
		} else $curcost=$harga;
	//}
	
	//end ganti harga
	
	 
	
	if ($stat1=='') { //sudah dikonfirmasi
		$stat2="
			<span ><input type=checkbox name=vcb[$jcek] id=vcb[$jcek] onclick=hitungBiayaGroup($jcek)></span>
			<input type=hidden name=vfee[$jcek] id=vfee[$jcek] value='$harga' >
			<input type=hidden name=vidres[$jcek] id=vidres[$jcek] value='$r2[id]' >
			<input type=hidden name=vimd[$jcek] id=vimd[$jcek] value='$r2[id]' >
			";
		$jcek++;
	} else {
		$vopr='';
		if ($isAdmin) { 
			if ($stat1!='validated') {
					$stat1.="
						<span ><input type=checkbox name=vcbv[$jvalid] id=vcbv[$jvalid] onclick=hitungBiayaGroup($jvalid)></span>
						<input type=hidden name=vfeev[$jvalid] id=vfeev[$jvalid] value='$r2[cost]' >
						<input type=hidden name=vidresv[$jvalid] id=vidresv[$jvalid] value='$r2[id]' >
					";
				$jvalid++;
			} else { //if validated
			$tid="ttr".rand(1231,9871);	
			$addstat="
		  <br><div id=$tid>
		  <a href=# onclick=\"bukaAjax('$idt','$um_path"."transfer-opr.php?op=validasi&kirimemail=1&id=$idtransfer&jenis=".urlencode($jenis)."&tid=$tid');return false;\" >send mail</a> 
		  </div>
		  ";
				$stat1.=$addstat;			
			}
		}
	}
	$vgd.= "
	
		<tr>
		<td $st[1] >".($br+1)."</td>
		<td $st[2] >$r[nama] $r[gelarbelakang]</td>
		<td $st[3] >".$r2['title']."</td>
		<td $st[4] >$r[kota]</td>
		<td $st[5] >$r[hp]</td>
		<td $st[6] >$costregister</td> ";
	if ($tgl_transfer!='') $vgd.= "<td $st[6] ><font color=red>$curcost</font></td> ";
		$vgd.= "
		<td $st[7] >$stat1&nbsp;</td>
		<td $st[8] >$stat2</td>";
		$vgd.="</tr>";
		$vgd.="<tr><td colspan=9><div id='$idt' ></div></td></tr>";
		
	$br++;
}

//<td Colspan=5>Total</td>		<td valign=right ></td>		<td valign=right ><div id=vtotfee value='0' ></td>		

$vgd.="	</table>";
$vgd.=$lnkAddParticipant."";

if (isset($showResult)) {
	if ($showResult==1) echo $vgd;
} else echo $vgd;


?>
