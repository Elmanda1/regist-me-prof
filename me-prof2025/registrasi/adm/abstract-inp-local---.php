<?php
$useJS=2;
if (!isset($nextpage)) $nextpage="";
include_once  "conf.php";
include $um_path."abstract-close-cek.php"; 
$frmAbs="";
if (!$isAbstractClose) {	
	cekVar("idabs");	
	$idabs*=1;
	extractRecord(" select * from tbabstract where id='$idabs'");
	if (!isset($showLK)) $showLK=true;
	if ($showLK) {
		$tbkonfirm="<a href=# onclick=\"bukaAjaxD('tkabs_$rnd','index.php?page=abstract&op=login&contentOnly=1&newrnd=$rnd' ); return false\" >".translate("klik di sini","click here")."</a>";
		$linkKonfirm="	
			<div class='form-group' style='font-size:16px;margin-top:20px' ><br>".($lang=='id'?"Sudah Mengirim abstrak sebelumnya?":"Already submit abstract? ")." 
				<span>$tbkonfirm </span>".($lang=='id'?" untuk login":"to login ")." 
			 <div  id='tkabs_$rnd' style='display:none' ></div>
			 </div>";
			
	} else $linkKonfirm="";
	$frmAbs="";

	$idForm="fab".rand(1231,2317);
	//$nfAction=$um_path.'abstract-opr.php';
	$nfAction=$toroot.'index.php?page=submitabstract&contentOnly=1';
	$asf="onsubmit=\"ajaxSubmitAllForm('$idForm','ts"."$idForm','abstract',false);return false;\" ";
	$t="";
	$t.="
	<div class='form-group'>
			<div class='col-sm-12' valign=top class=tdform2x>
				<!--h2>".translate("REGISTRASI ABSTRAK KARYA ILMIAH","ABSTRACT SUBMISSION")."</h2-->
			</div>
		</div>
	$linkKonfirm	
	<hr>  
	
	";
	$t.="<div id=ts"."$idForm ></div>";
	$t.="<form id='$idForm' action='$nfAction' method=Post $asf class=formInput enctype='multipart/form-data'>		<input type=hidden name=nextpage value='$nextpage'>	";

	$showFrmAbs=false;
	
	include $um_path."abstract-form.php"; 
	
	$t.=$frmAbs;
	echo "
 
		<div style='margin:auto;max-width:1000px;width:100%;padding:5px;'>
		$t
	<br>	
	<br>	
	<div class='form-group'>
	<div class='col-sm-4' valign=top>&nbsp;</div>
	<div class='col-sm-8' valign=top class=tdform2x>
		<span >						 
			 <input type=submit name=submit value='submit' class='btn btn-primary btn-sm'> 
		</span>
	</div>
</div>


		</form>
		<br>
		<br>
		</div>
		";
}
