<?php

$useJS=2;

include_once "conf.php";

$aw=array(0,160,120,170,105,120,0);

$j=0;

for ($x=1;$x<=5;$x++) {

	$st[$x]=" class=tdcontent style='width:$aw[$x]"."px' width=$aw[$x] ";// 

	$j+=$aw[$x];

}

$st[6]=" width=$j style='width:$j"."px' border=0 cellpadding=0 cellspacing=0";



if (($_REQUEST['awali']*1)!=0) {

	$awali=$_REQUEST['awali']*1;

	$akhiri=$awali;

	

}else {

	$awali=0;

	$akhiri=4;

}



if ($awali==0) {

	$vgd="<div id=tdetgroup >

	<div class=subtitleform2 style='text-align:left;margin-bottom:-5px'>Participants</div>

	<table $st[6] >

	<tr>

	<td class=tdjudul $st[1] >FIRST NAME</td>

	<td class=tdjudul $st[2] >LAST NAME</td>

	<td class=tdjudul $st[3] >ADDRESS</td>

	<td class=tdjudul $st[4] >CITY</td>

	<td class=tdjudul $st[5] >COUNTRY</td>

	<td class=tdjudul $st[6] >PHONE</td>

	<td class=tdjudul $st[7] >MOBILE PHONE</td>

	<td class=tdjudul $st[8] >EMAIL</td>

	<td class=tdjudul $st[9] >PROFESSION</td>

	<td class=tdjudul $st[10] ><div id=tF>FEE<div></td></tr>

	</table>

	";

}



for ($i=$awali;$i<=$akhiri;$i++) {

		$iprof= um412_isicombo5("select id,title from master_data where (jenis='symposium' or jenis='workshop')","gprof[$i]","id","title","","","hitungHrgGroup($i)");

		$ineg=um412_isicombo5('select * from master_negara order by id','gnegara[$i]',"negara","negara","- Select One -",$negara,"");



	$vgd.= "

<input type=hidden name=gharga[$i] id=gharga[$i] value=0>

		<table $st[6] >

		<tr>

		<td $st[1] ><input type=text name=gnama[$i] id=gnama[$i] size=20 onchange='hitungHrgGroup($i)' ></td>

		<td $st[2] ><input type=text name=gnamab[$i] id=gnamab[$i] size=20 onchange='hitungHrgGroup($i)' ></td>

		<td $st[3] ><input type=text name=galamat[$i] id=galamat[$i] size=20 onchange='hitungHrgGroup($i)' ></td>

		<td $st[4] ><input type=text name=gkota[$i] id=gkota[$i] size=15 ></td>

		<td $st[5] >$ineg</td>

		<td $st[6] ><input type=text name=gtelp[$i] id=gtelp[$i] size=13 ></td>

		<td $st[7] ><input type=text name=ghp[$i] id=ghp[$i] size=13 ></td>

		<td $st[8] ><input type=text name=gemail[$i] id=gemail[$i] size=17></td>

		<td $st[9] >$iprof</td>

		<td $st[10] ><div id=tfee[$i] >0</div></td>

		</tr>

	</table>

	";

}

if ($awali==0) { 

	$vgd.="</div>";//tdetgroup

	if ($showsubmit==1) {

	

		$idForm="gdetgroup_".rand(1231,2317);

		$nfAction="index.php?f=newparticipants";

		$asf="onsubmit=\"ajaxSubmitAllForm('$idForm','ts"."$idForm','');return false;\" ";

		$t="";

		$t.="<div id=ts"."$idForm ></div>";

		$t.="<form id='$idForm' action='$nfAction' method=Post $asf class=formInput >";

		echo "$t $vgd <input type=submit value='Add Participant(s)'></form>";	 

	}

}

else {

	echo $vgd;

	}

?>

