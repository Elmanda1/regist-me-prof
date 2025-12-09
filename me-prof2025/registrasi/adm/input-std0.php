<?php
$useJS=2;
include_once "conf.php";
cekVar("id,nmTabelOwner,cari,aksi,ktg,inputcari,valid,cr,idunit,unit,idpengda,pengda,idpengcab");
cekVar("pengcab,pelaksana,judulInput,isTest,namaPelaksana,op");
cekVar("newrnd,media,tkn");
$sfd=getArrayFieldName("select * from $nmTabel where 1=2");
cekVar($sfd);

cekVar("owner,tkn");
if ($tkn!='') { evalToken($tkn);}

//if ($tkn!='') evalToken($tkn);
if ($op=='') $op="showtable";

if (!isset($sqTabel)) $sqTabel="select * from $nmTabel ";

$hal=$nfAction=$thisFile;
$linkBack=($isAdmin?"<br ><a href=# onclick=\"bukaAjax('content','$thisFile&op=showtable');\">klik di sini</a> untuk kembali...":"");
if ($newrnd=='')
	$rnd=rand(123451,923451);
else
	$rnd=$newrnd;
	
//echo "hal $hal";
if (!isset($showNoInTable)) $showNoInTable=false;
$test=($isOnline?0:1);
if ($det=='') $det=$_SESSION['det']; else  $_SESSION['det']=$det; 
$gFieldInput=$gFieldInputCap=$gFieldView=$gFieldTabel=$gGroupInput=explode(",",",,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,");
$sHFilterTabel="";
$sqFilterTabel="";
$komentarHp=$komentarTb=$komentarEd="";
$sqOrderTabel="order by $nmTabel.$nmFieldID desc";
$targetWin="maincontent";
$addf="";//add function
$infoInput1=$infoInput2="";
$identitasRec="trcdef";//default tempat edit
$configFrmInput="width:800,height:600,title: \'Input Data\'";

$showLinkTambah=true;

$jperpage=$record_per_page=100;
$jpperpage=15;
if (!isset($nfReport)) $nfReport="";//namafile report

$folderModul="";//nama folder modul
$addParamAdd="";//tambahan parameter untuk tombol add
$addCek=$addView=$addInput0=$addInput=$addFuncAdd=$addFuncEdit="";
$idForm="form_".$rnd;
$idRecord=$id;
$isowner=false;
$addSave1=$addSave2=$addSave3="";
$aCek=array();
$nmTabelDet="";
$nmFieldID="id";

if ($op=='') $op='showtable';
//pengamanan tampilan dan update

$sySecureShowTable="";
//echo "user $userType";
if ($nmTabelOwner=='') $nmTabelOwner=$nmTabel;

if ($userType=="user") {
//	$sySecureShowTable="$nmTabelOwner.id='$anggota_id'";
	$sySecureShowTable="$nmTabelOwner.id='$anggota_id'";
}elseif ($userType=="unit"){
//	$sySecureShowTable="$nmTabelOwner.idunit='$idowner'";
	$sySecureShowTable="tbunit.id='$idowner'";
}elseif ($userType=="pengcab"){
//	$sySecureShowTable="$nmTabelOwner.idpengcab='$pengcab_id'";
	$sySecureShowTable="tbpengcab.id='$pengcab_id'";
}elseif ($userType=="pengda"){
//	$sySecureShowTable="$nmTabelOwner.idpengda='$pengda_id'";
	$sySecureShowTable="tbpengda.id='$pengda_id'";
}elseif (($userType=='pelatih')||($userType=="unit")){
//	$sySecureShowTable="$nmTabelOwner.idunit='$unit_id'";
	$sySecureShowTable="tbunit.id='$unit_id'";
}elseif ($userType=="admin"){
	$sySecureShowTable="1=1";
}elseif ($userType=="pb"){
	$sySecureShowTable="1=1";
}elseif ($userType=="produksi"){
	$sySecureShowTable="1=1";
}else{
	$sySecureShowTable="1=2";
}
if (!isset($needFilter)) $sqFilterTabel.=($sqFilterTabel==''?" where ":" and ").$sySecureShowTable;

if (($op=='itb') &&($id!=0)||($op=='view') ){
	$sqe="select * from $nmTabel where $nmTabelOwner.$nmFieldID='$id' ";
	if (isset($sqTabel)) 	$sqe=$sqTabel." where $nmTabelOwner.$nmFieldID='$id'  ";
	extractRecord($sqe);
}


$now=date("Y-m-d h:i:s");
$nfrep= $thisFile."&aksi=$aksi&cari=cari&ktg=$ktg&inputcari=$inputcari&newrnd=$rnd";

?>