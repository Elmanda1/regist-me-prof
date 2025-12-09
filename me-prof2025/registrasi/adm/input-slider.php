<?php
$useJS=2;
include_once "conf.php";
 
	//default
$det="slider";
$thisFile=$nfrep="index.php?rep=$det&det=$det&useJS=2&contentOnly=1";//&valid=1
$nmTabel='tbslider';
$nmFieldID='id';
$nmCaptionTabel="Slider";
$tbsql= '';
if ($op=='gen') {
	include "input-std.php";
	exit;
}

include "input-std0.php";

$i=0;
$gGroupInput[$i]='nmTabel';
$sAllField=""; 
$sAllField.="1 |judul1 |JUDUL1 |40|1|1|1 |50|C|4";
$i++; $sAllField.="#2 |judul2 |JUDUL2 |40|1|1|1 |30|C|4";
$i++; $sAllField.="#3 |judul3 |JUDUL3 |40|1|1|0|30|C|0";
$i++;$sAllField.="#15|nfgambar1	|Gambar 1				|F|1|0|1|20|C|F,0,500";
$i++;$sAllField.="#15|nfgambar2	|Gambar 2				|F|1|0|1|20|C|F,0,500";
$i++; $sAllField.="#6 |inactive |INACTIVE |1|1|1|1 |3|C|0";
$i++; $sAllField.="#7 |isi |ISI |40|1|1|1 |80|C|T";
$gFieldView[$i]="potong(removetags({isi}),100)";

$isiComboFilterTabel="judul1;tbslider.judul1";
$identitasRec='rctbslider';
$configFrmInput='width:700,height:600';
$folderModul='mslider';
$nfReport="$folderModul/showtable.php"; 
$pathUpload="../images/slider/";

include "input-std.php";

if (($op=='ed')|| ($op=='tb' )){ 
	$c1=uploadFile('nfgambar1',$pathUpload,$tipe="all",$maxfs=0,$nfonly=1);		
	$c2=uploadFile('nfgambar2',$pathUpload,$tipe="all",$maxfs=0,$nfonly=1);
	$ss='';
	if ($c1!='') $ss="nfgambar1='$c1'";
	if ($c2!='') $ss.=($ss==''?'':',')."nfgambar2='$c2'"; 
	if ($ss!='') {
		$sq="update tbslider set $ss where id=$id";
		echo ";;.....................$sq";
		mysql_query($sq);
	}
}
//pencetakan

?>
  