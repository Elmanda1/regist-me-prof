<?php
$aMobil=explode(",","Toyota Avanza,Toyota Innova,Toyota Hiace,Toyota Alphard");
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
	
];

$btsTgl1="2022-5-20";
$btsTgl2="2022-5-27";
$aHari=explode(",","20,21,22,23,24,25,26,27");
$jlhHari=count($aHari);

$batasCekin=strtotime($btsTgl1);
$batasCekout=strtotime($btsTgl2);
$jlhmaxhari=floor(($batasCekout-$batasCekin)/24/60/60)+1;

$ajudulhari=explode(",",$judulhari);
$tjudulhari1=$tjudulhari2="";

$scriptBtsTgl="

	$( '#tgl_1,#tgl_2' ).datepicker(
		{ 
		minDate: new Date(2022, 5 - 1, 20),
		maxDate: new Date(2022, 5 - 1, 27),
		dateFormat:'mm/dd/yy'
		}
	);

";

function updateAllBasketTour(){
	$aidreg=getstring("select id from regtour where cek=0","array");
	foreach($aidreg as $idreg) {
		updateBasketTour($idreg);
	}
}
function updateBasketTour($idreg){
	//Full Day Tour - Toyta Alphard  - 05/25/2022 (1 unit @USD 175),2625000,1,2625000,512,175,trans;
	//Nusa Peninda Combination East and West 1 day Trip   - 05/24/2022 (7 pax @USD 100),1500000,7,10500000,515,100,trans 
	
	$ssq="";
	//querysql("delete from regtourd where idreg='$idreg';");
	$ketbasket1=carifield("select ketbasket1 from regtour where id='$idreg' ");
	querysql( "delete from regtourd where  id='$idreg' ");
	$arr=basketToArray($ketbasket1);
	//echo showTA($arr);
	foreach($arr as $b) {
		$des=strtolower($b['des']);
		$jns=(((strstr($des,'half day')!='')||(strstr($des,'full day')!=''))?"trans":((strstr($des,'fee')!='')?"addfee":"tour"));
		$rdes=explode("-",$b['des']);
		$jmobil=$tgl="";
		if ($jns=='trans') {
			$jmobil=trim($rdes[1]);
			$tgl=trim(substr($rdes[2],0,10));			
		} elseif($jns=='tour') {
			$tgl=trim(substr($rdes[1],0,10));			
		}
		$c=carifield("select id from regtourd where idreg='$idreg' and deskripsi='$b[des]'");
		if ($c=='') {
			$ssq.="insert into regtourd(idreg,deskripsi,qty,hrg,imd,jtrans)
				values('$idreg','$b[des]','$b[qty]','$b[hrg]','$b[imd]','$jns');";
		}    
	}
	$ssq.="update regtour set cek=1 where id='$idreg';";
	//echo $ssq;
	querysql($ssq);
	
}