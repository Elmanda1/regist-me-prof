<?php

$vgd="";
$i=$ttfee=0;
$idgroup=$idprofile;
$transid="G".$idgroup.date("mdhi");$transamount=0;$transbasket="";$transket="";
$hqq=mysql_query("select * from registrasi where idgroup='$idgroup'");

$vgd.="<br><br><div style='font-size:15px;font-weight:bold'>PARTICIPANT</div>
		<br><br>
		<table width=650 border=1 cellspacing=0 cellpadding=5 >
		<tr>
		<td class=tdjudul >No</td>
		<td class=tdjudul >Name</td>
		<td class=tdjudul >Address</td>
		<td class=tdjudul >Phone</td>
		<td class=tdjudul >Profession</td>
		<td class=tdjudul >Fee</td>
		</tr>";
		
$jlhfee=0;		
while ($r=mysql_fetch_array($hqq)){
		$gnama=$r['nama'];//$_REQUEST['gnama'][$i];
		$gnamab=$r['gelarbelakang'];//$_REQUEST['gnamab'][$i];
		$galamat=$r['alamat'];//$_REQUEST['galamat'][$i];
		$gkota=$r['kota'];//$_REQUEST['gkota'][$i];
		$gnegara=$r['negara'];//$_REQUEST['gnegara'][$i];
		$gtelp=$r['telp'];//$_REQUEST['gtelp'][$i];
		$ghp=$r['hp'];//$_REQUEST['ghp'][$i];
		$gemail=$r['email'];//$_REQUEST['gemail'][$i];
		$ssqq="select id_master_data as imd,cost  from reservasi_kongres_workshop where id_registran='$r[id]' and jenis='symposium' ";
 
		extractRecord($ssqq);
		$gimd=$imd;//$_REQUEST['gprof'][$i];
		$gharga=$cost;//($_REQUEST['gharga'][$i] )*1;
		$ttfee+=$gharga;
		
		$title=$gprov=cariField("select title from master_data where id='$gimd'");
		$cost=$gharga;
		
		if ($transbasket!="") {	$transbasket.=";";}
		if ($cost==261)
			$costrp=3000000;
		else
			$costrp=round(USDtoIDR($cost),0) ;
		$nff=number_format($costrp,2,".","");
		$transbasket.="$title ($gnama $gnamab),$nff,1,$nff";
		$transamount+=($costrp*1);
	 	
		$vgd.="<tr>
		<td >".($i+1)."</td>
		<td >$gnama $gnamab</td>
		<td >$galamat $gkota $gnegara</td>
		<td > $gtelp $ghp</td>
		<td >$gprov</td>
		<td>USD $gharga</td>
		</tr>";
	$i++;
}
$vgd.="
<tr>
<td colspan=5>Total ( ".($i)." Participants )</td>
<td> USD $ttfee </td>
</tr></table><br />
<br />
<br />
";
$ttpar=$i;

?>
