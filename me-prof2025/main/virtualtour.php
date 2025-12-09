<?php
cekvar("trialv");
$urlKulla="https://kuula.co/share/collection/7qrkz?logo=1&info=0&logosize=180&fs=0&vr=1&zoom=0&sd=1&autorotate=0.02&gyro=1&thumbs=-1&inst=0&keys=0";


	$jlhon=carifield("select count(id) from tbregistrasi where statuser=1")*1;	
	$isi='<iframe 
	id=if1 
	width="100%" height="775" 
	style="width: 100%; height: 775px; border: none; max-width: 100%;" 
	frameborder="0" 
	allowfullscreen 
	mozallowfullscreen="true"
	allowvr="yes"
	webkitallowfullscreen="true"
	allow="webvr;webxr;vr; xr;xr-spatial-tracking; gyroscope;magnetometer; accelerometer;camera;microphone" 
	scrolling="no" 
	src="'.$urlKulla.'"	
	></iframe>
	';
	//."<div class='pull-right'>Jumlah peserta Online: $jlhon Peserta</div>";

	//panduan
	 
	 
	echo $isi;
	echo "
	<style>
	#if1 {
		position:fixed;
		left:0;
		top:0;
	
	}
	</style>
	";	
$addScriptJS.="	
  
  ";
?>
<script>
 $(document).ready(function(){
	 w=$(window).innerWidth();
	 h=$(window).innerHeight()-20;
	 
	 $('#if1').css({
		 'width':w+"px",
		 'height':h+"px",
	 });
 });
</script>