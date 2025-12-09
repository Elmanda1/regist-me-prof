<?php

function showBox($pes,$cls='box-login') {
	return "
	<center>
	<div class='$cls'>
	$pes
	</div>
	</center>
	";
}

function showBoxWA($cls='box-login',$addPesan='') {
	global $ac,$judul,$idreg;
	if (!isset($idreg)) $idreg=0; 
	
	return showBox($addPesan."Problem with your access key? please
	 <a href='index.php?oplg=wa&ac=$ac&judul=".urlencode($judul)."&idreg=$idreg'>Whatsapp Us</a> 
	",$cls);	
}

function showFrmLogin($cls='box-login' ){
	global $tohost,$xjudul,$iac,$pes,$page,$sub,$oplg,$ac,$judul;
	if (!isset($ac)) $ac='';
	if (!isset($judul)) $judul='';
	$idForm="frmlg".genRnd();
	$ons='';
	//$ons="onSubmit=\"ajaxSubmitAllForm('$idForm','ts"."$idForm','login2')\"";
	
	$addPesan="
	Net yet registered? <a href='$tohost"."registrasi/index.php'>click here</a> to register,<br> or 
	";
	$iac="Access Key";
	$t= "<center>
	<div class='$cls'>
		$xjudul 
		";
		if ($pes!='') $t.="<div class=msg-login>$pes</div>";
		
		$t.="
		<form $ons action='index.php' method=get id=frmlogin >
			<div class=mac>Enter your $iac</div>
			<div class=mac>
			<input type=password name='ac' id=inpac value='$ac'>
			</div>
			<div class=mac>
			<input type=submit  class='btn-submit btn btn-sm btn-primary' value='OK' > 
			</div>
			<input type=hidden name=page value='$page'>
			<input type=hidden name=oplg value='login'>
		</form>
	</div>
	 </center>
<br>	
	".showBoxWA($cls."2",$addPesan)."
	<script>
	setTimeout(function(){
		$('.msg-login').fadeOut(1000);
	},1000);
	</script>
	";
	return $t;
}

function showBoxStyle(){
	return "
<style>
.no-box h2,
.box-login h2 {
	font-size:20px;
	background: #000;
	color: #fff;
	margin-top: 0;
}

.msg-login {
	padding:10px;
	background:#f9f5e8;
}

.mac {
	margin-top:17px;
}

input {
	
}
.btn-submit {
	min-width:80px;
}
#inpac {
	text-align:center;
	margin:0px !important;
}

#box-login,
.box-login2,
.box-login {
	max-width:300px;
	width:100%;
	text-align:center;
	padding: 15px;
	background: #f5f5f5;
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
	margin:50px auto;
}
.box-login2 {
	margin:-40px 0px 0px 0px;
}


form {
	margin:0px !important;
}
</style>
	";
}
