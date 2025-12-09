<?php

include $toroot."../regtour/regtour-conf.php";
updateAllBasketTour();

/*
$aMobil=explode(",","Toyota Avanza,Toyota Innova,Toyota Hiace,Toyta Alphard");
$arrTransport=$arh1=[
	["Private Rental Full Day",55,75,95,175],
	["Half Day Tour",45,60,70,90],
	["Full Day Tour",55,75,95,175],	
];

//tour
$arrTour=$arh2=[
	["Nusa Peninda West Trip 1 day","06:30 AM",95],
	["Nusa Peninda East Trip 1 day","06:30 AM",95],
	["Nusa Peninda Combination East and West 1 day Trip ","06:30 AM",100],
	["Nusa Peninda Snorkling & West 1 day trip","06:30 AM",120],
	["Sunset Tour","03:30 PM",65],
	["Wet and Culture Tour","07:00 AM",76],
	["Family and Volcano Tour","08:00 AM",110],
	
];*/


//cari skala
$aw=[3,13];
foreach($aHari as $hr) {
	$aw[]=5;
}
$aw=hitungSkala($aw);

//buat judul

$tdhari=$tdfhari="";
$i=2;
$k=0;
foreach($aHari as $hr) {
	$tdhari.="<td class=tdjudul style='width:$aw[$i]%'>$hr</td>";
	$tdfhari.="<td class=tdjudul align=center>#$k#</td>";
	$i++;
	$k++;
}

$tjudul="<tr>
<td class=tdjudul  style='width:$aw[0]%' >No</td>
<td class=tdjudul  style='width:$aw[1]%' >Mobil</td>
$tdhari
</tr>";

$tfoot="<tr>
<td class=tdjudul colspan=2 >Jumlah </td>
$tdfhari
</tr>";

$t="";
$t.="<br><br><br><h3>Rekap Transport</h3>";
$arrT2=$arrTransport;
array_push($arrT2,['Overall']);
$ajlh=[0,0,0,0,0,0,0,0];
foreach($arrT2 as $art) {
	$jnsTrans=$art[0];
	$t.="<h4>$jnsTrans</h4>";
	$t.="<table border=1 width=100%>";
	$t.=$tjudul;
	$br=1;
	foreach ($aMobil as $mb) {
		$t.="<tr>";
		$t.="<td align=center>$br</td>";
		$t.="<td  align=center>$mb</td>";
		$k=0;
		foreach($aHari as $hr) {
			//Private Rental Full Day - Toyota Innova - 05/25/2022 (2 unit @USD 75)
			$tgl="2022-05-".$hr;
			if ($jnsTrans=='Overall') {
				$str="$mb - 05/$hr/2022";
				$str2="$mb  - 05/$hr/2022";
			} else { 
				$str="$jnsTrans - $mb - 05/$hr/2022";
				$str2="$jnsTrans - $mb  - 05/$hr/2022";
				
			}
			$sqq="select sum(qty) from regtourd where (deskripsi like '%$str%' or deskripsi like '%$str2%' )";
			$jum=carifield($sqq) ;
			$t.="<td align=center >$jum</td>";
			$ajlh[$k]+=($jum*1);
			$k++;
		}
		
		$t.="</tr>";
		$br++;
	}
	
	$tfoot1=$tfoot;
	$k=0;
	foreach($aHari as $hr) {
		$tfoot1=str_replace("#$k#",$ajlh[$k],$tfoot1);
		$k++;
	}
	$t.=$tfoot1;
	
	$t.="</table>";
}


$t.="<br><br><br><h3>Rekap Tour</h3>";

//$t.="<h4>$jnsTrans</h4>";
$tjudul="<tr>
<td class=tdjudul  style='width:$aw[0]%' >No</td>
<td class=tdjudul  style='width:$aw[1]%' >Tour</td>
$tdhari
</tr>";




$t.="<table border=1 width=100%>";
$t.=$tjudul;

$arrT2=$arrTour;
$br=1;
foreach($arrT2 as $art) {
	$tit=$art[0];
	$t.="<tr>";
	$t.="<td align=center>$br</td>";
	$t.="<td  align=center>$tit</td>";
	foreach($aHari as $hr) {
		$tgl="2022-05-".$hr;
		$str="$tit - 05/$hr/2022";
		$str2="$tit  - 05/$hr/2022";
		 $sqq="select sum(qty) from regtourd where (deskripsi like '%$str%' or deskripsi like '%$str2%' )";
		$jum=carifield($sqq) ;
		$t.="<td align=center >$jum</td>";
	}
	
	$t.="</tr>";
	$br++;
}

$tfoot1=$tfoot;
$k=0;
foreach($aHari as $hr) {
	$tfoot1=str_replace("#$k#",$ajlh[$k],$tfoot1);
	$k++;
}
$t.=$tfoot1;

$t.="</table>";

$t.="<br><br>Tgl Laporan :".tglIndo2(date("Y-m-d"),"d x Y H:i");

echo $t;
