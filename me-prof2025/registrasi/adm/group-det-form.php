<?php
$useJS=2;
include_once "conf.php";

cekvar('awali,akhiri,negara');
//$aw=array(0,160,120,170,105,120,0);
$aw=array(0,130,130,130,130,130,130,130,130,130,130,0);
$j=0;
for ($x=1;$x<=10;$x++) {
//	$st[$x]=" class=tdcontent style='width:$aw[$x]"."px' width=$aw[$x] ";// 
	$st[$x]=" class=tdcontent style='width:100px;text-align:left' width=100 ";// 
	$j+=$aw[$x];
}
$st[11]=" width=700 style='width:700px' border=0 cellpadding=0 cellspacing=0";

//if ((($_REQUEST['awali']*1)!=0) ||(isset($_REQUEST['akhiri']))) {
if ((($awali*1!='0') ||($akhiri*1!='0'))) {
	
	/*
	if (isset($_REQUEST['akhiri'])) 
		$akhiri=$_REQUEST['akhiri']*1;
	else
		$akhiri=$_REQUEST['awali']*1;
	*/
	$awali=$akhiri;
}else {
	$awali=0;
	$akhiri=4;
}

if ($awali==0) {
	$vgd="<div id=tdetgroup >
	<div class=subtitleform2 style='text-align:left;margin-bottom:-5px'>Participants</div>
	<table $st[11] >
	</table>
	";
}
cekVar('ljp,showsubmit');
$ljp*=1;
//if (isset($_REQUEST['ljp'])) $ljp=$_REQUEST['ljp']*1;
for ($i=$awali;$i<=$akhiri;$i++) {
	//$addsq="and (tipereg like '%$profesi%' or tipereg='all' or tipereg='' ) ";
	//$addsq.="and status<>2 ";
	$iprof= um412_isicombo5("select id,title from master_data where jenis='symposium' and status<>2 order by kode ","gprof[$i]","id","title","","","hitungHrgGroup($i)");
	$ineg=um412_isicombo5('select * from master_negara order by id','gnegara[$i]',"negara","negara","- Select One -",$negara,"");
	
	$vgd.= "
	<br><div class=tdjudul>Participant ".($i+1+$ljp)."</div>
	<table $st[11] >
	<tr>	<td  align=left $st[1] >First Name</td>	<td  align=left $st[1] ><input type=text name=gnama[$i] id=gnama[$i] size=20 onchange='hitungHrgGroup($i)' > <td $st[8] >Last Name</td><td $st[8] > <input type=text name=gnamab[$i] id=gnamab[$i] size=20 onchange='hitungHrgGroup($i)' ></td>	</tr>
	<tr>	<td  align=left $st[3] >Address</td>	<td  align=left $st[3] colspan=3 ><input type=text name=galamat[$i] id=galamat[$i] size=80 onchange='hitungHrgGroup($i)' ></td>	</tr>
	<tr>	<td  align=left $st[4] >City </td>	<td  align=left $st[4] ><input type=text name=gkota[$i] id=gkota[$i] size=15 > </td><td $st[8] >Country </td><td $st[8] >$ineg </td>	</tr>
	<tr>	<td  align=left $st[6] >Phone</td>	<td  align=left $st[6] ><input type=text name=gtelp[$i] id=gtelp[$i] size=13 ></td><td $st[8] >Mobile Phone </td><td $st[8] ><input type=text name=ghp[$i] id=ghp[$i] size=13 ></td>	</tr>
	<tr>	<td  align=left $st[8] >Email</td>	<td  align=left $st[8] ><input type=text name=gemail[$i] id=gemail[$i] size=17></td>	<td  align=left $st[9] >Profession</td>	<td  align=left $st[9] >$iprof</td></tr>
	<tr><td colspan=3 $st[8] >&nbsp;</td>
	<td $st[8]  align=right>
	<p style='border:2px #000 solid;padding:2px 10px ;text-align:center;'>	Fee : <span id=tfee[$i] >0</span>	<input type=hidden name=gharga[$i] id=gharga[$i] value=0></p>
	</td></tr>
	</table>
	";
}


$tpc="
	<center><br><div class=comment1 style='width:690px;margin:0px;padding:10px 0px'><b><center>
	Total Participant : <span id=ttparticipant>0 </span > Participant[s]  &nbsp;&nbsp;&nbsp;Total Fee : <span id=ttfee>0</span > 
	</center></b></div></center><br><br>";

if (($awali==0) ||($_REQUEST['showsubmit']==1)) { 
	$vgd.="</div>";//tdetgroup
	if ($showsubmit==1) {
		
		$idForm="gdetgroup_".rand(1231,2317);
		$nfAction="group-secure.php?f=addparticipantopr";
		$asf="onsubmit=\"ajaxSubmitAllForm('$idForm','ts"."$idForm','');return false;\" ";
		$t="";
		$t.="<div id=ts"."$idForm ></div>";
		$t.="<form id='$idForm' action='$nfAction' method=Post $asf class=formInput >
		<input type=hidden name=batasGD id=batasGD value=0 >
		<input type=hidden name=ljp id=ljp value='$ljp'>
		";
		echo "$t $vgd $tpc<center><input type=submit value='Add Participant(s)'></add> </form>";	 
	}
}
else {
	echo $vgd;
	}
?>
