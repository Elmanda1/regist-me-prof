<?php
include_once "conf.php";
cekvar("page,ac,oplg");

$isTest=($isOnline?false:true);
$isTest=false;
$step="sertifikat";
$idPageSympo=1;
$jnsSympo="symposium";
$sty="
<style>
body {
	background:#ccc url(img/bg/bg-1.jpg);
	background-size:cover;
	text-align:center;
	padding:10px;
	height:100%;
	width:100%;
	overflow:hidden;
	border:5px solid #fff;
}
</style>
";
echo showBoxStyle();


$header= "
	<html>
	<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<!--[if lt IE 7]>      <html class='no-js lt-ie9 lt-ie8 lt-ie7'> <![endif]-->
		<!--[if IE 7]>         <html class='no-js lt-ie9 lt-ie8'> <![endif]-->
		<!--[if IE 8]>         <html class='no-js lt-ie9'> <![endif]-->
		<!--[if gt IE 8]><!--> <html class='no-js'> <!--<![endif]-->
		<head>
		<script src='$js_path"."um412-jsreport-v2.1.js?r=10710237152'></script> 
	<link rel='stylesheet' type='text/css' href='$js_path"."jquery/ui/jquery-ui.css' >

	  <link rel='stylesheet' type='text/css' href='$js_path"."/fonts/font-awesome.min.css'>
	  <link rel='stylesheet' type='text/css' href='$js_path"."bootstrap/bootstrap.min.css'>

	</head>
	<body>
	";

$footer="
$sty
	</body>
</html>
";

$xjudul="
<center>
<h2>LOGIN</h2>
</center>
";

if ($oplg=="wa") {
		/*
	return showBox("Apabila Access Key Anda bermasalah, silahkan 
	 <a href='https://api.whatsapp.com/send?phone=+6281282868612&text=Bantu kami,Access Key: $ac,No Registrasi $idreg, acara $judul'>wa kami</a> 
	");
	*/
	
	$tgls=date('Y-m-d H:i:s');
	$msg="Mohon dibantu, Acara:".urldecode($judul).", No. Registrasi:$idreg, Access Key:$ac, Pesan:";
	$xmsg=urlencode($msg);
	 	$sq="INSERT INTO `outbox` 
	(`SendingDateTime`, `Text`, `DestinationNumber`, `SenderID`, `CreatorID`) 
	VALUES('$tgls','$msg','+6281282868612','$idreg','$ip');
";
	mysql_query($sq);

	
	redirection('https://api.whatsapp.com/send?phone=+6281282868612&text='.urlencode($msg));
	
	exit;
	
}


if ($oplg=="logout") {
	unset($_SESSION['ac']);
	unsetvar("ac");
	unsetvar("oplg");
	$pes1="Andar berhasil Logout 
	<br> 
	<div id='txtlogin'>
	Jika diinginkan login kembali, silahkan klik tombol login
	<br>
	<a href='#' onclick=\"toggleShow('txtlogin','tlogin');return false\" class='btn btn-primary btn-sm'>Login</a>
	</div>
	";
	$pes2="<div id=tlogin style='display:none'>"
	.showFrmLogin().
	"</div>";
	echo $header;
	echo showBox($pes1).$pes2;
	echo $footer;
	exit;
	
} 

$t="";


$iac="Access Key ";
$sub='';
$t.=$header;
//cek sudah login atau belum
$ac='';
if (isset($_REQUEST['ac']))  {
	$ac=$_REQUEST['ac'];  
} elseif ($isAdmin &&  (isset($_REQUEST['id'])))  {
	$id=$_REQUEST['id'];
	if ($id!="") {
		$cf=cariField("select id as idreg,access_key from registrasi where  id='".$_REQUEST['id']."'");
		$ac=decod($cf);
	}
} elseif (isset($_SESSION['ac'])) {
	$ac=$_SESSION["ac"];
}




//cek
$isLogin2=false;
if ($ac!="") {
	$ac=strtoupper(trim($ac));
	$s="select * from `registrasi` where `access_key` ='".encod($ac)."'";//edited by um
	
	$hasil=mysql_query($s);
	$rv=mysql_fetch_array($hasil);

	if(empty($rv)) {
		$pes="Access Key tidak valid";
		//$t.=showFrmLogin($pes);
		unset($_SESSION["ac"]);
		 
	} else {
		$idreg=$rv['id'];
		$nama=$namaLengkap=$rv['namasert'];
		$pas=strtoupper($rv['tipereg']);
		$namasert=$rv['namasert'];
		$_SESSION["ac"]=$ac;
		$isLogin2=true;
	}	  
}


if (!$isLogin2) {		
	
	$t.=showFrmLogin();
	$t.=showBoxStyle();
	
	
	if (!$isOnline) {
		$aa="";
		$aack=getArray("select access_key from registrasi order by id desc limit 0,5 ");
		foreach($aack as $xack) {
			$aa.=" ".decod($xack);
		}
		$t.=$aa;
	}
	
} else {
	cekvar("page");
	if ($page=="") {
		$pes1="
		Selamat Datang <b>$nama</b>,
		<br>
		";
		$sq="select rk.id,md.title,md.linkmateri2,rk.jenis,md.id as imd 
		from reservasi_kongres_workshop rk inner join master_data md on rk.id_master_data=md.id 
		where id_registran='$idreg' and (rk.jenis='workshop' or rk.jenis='$jnsSympo') ";
		
		/*
		if (strstr($folderHost,'perinasia')!='') {
			//khusus perinasia
			$sq="select rk.id,md.title,md.linkmateri2,rk.jenis,md.id as imd from reservasi_kongres_workshop rk inner join master_data md on rk.id_master_data=md.id 
			where id_registran='$idreg' and (rk.id_master_data='5' or rk.jenis='$jnsSympo') ";
		}
		*/
		if ($isTest) {
			$sq="select md.title,md.linkmateri2,md.jenis,md.id as imd from master_data md 
			where  (md.jenis='workshop' or md.jenis='$jnsSympo') order by md.jenis,md.id ";
			
		}
		$hs=mysql_query($sq);
		$pes2="<br>";
		//$pes2.=$sq;
		$lastBg="";
		while ($r=mysql_fetch_array($hs)) {
			
			if ($r['jenis']==$jnsSympo) {
				$pg=$idPageSympo;
				$linkmateri2=carifield("select linkmateri2 from master_data where id='$pg'");
			} else {
				$pg=$r['imd'];
				$linkmateri2=$r['linkmateri2'];
			}
			
			//mencari bg 
			$ketemu=false;
			$k=0;
			foreach ($aImdAll as $ximd) {
				if ($ketemu) continue;
				//echo "<br> mencari $pg di ".implode(",",$ximd[2]);
				$kt=is_int(array_search($pg,$ximd[2]))?true:false;
				if ($kt) {
					$ketemu=true;
					$zimd=$ximd[2];
					$curBg=$zimd[0];
					$simd=implode(",",$ximd[2]);
					$jenis=$ximd[0];
					$judul=$ximd[1];
					$urlzoom2=(isset($ximd[3])?$ximd[3]:'');
					
					//echo "ketemu $simd";
				}
				$k++;
			}
			//echo "<br>pg $pg > bg $curBg";
			
			
			if ($lastBg==$curBg) continue;
			$lastBg=$curBg;
			
			
			$url="main/index.php?page=$curBg&useJS=2&contentOnly=1";			
			
			if ($linkmateri2=="") {
				$linkDownload2="";
			}else { 
				$urlXMateri="bukaJendela('$tohost"."$url&op=materi');";
				$linkDownload2="<a href='#' onclick=\"$urlXMateri;return false;\" class='btn-download btn btn-success btn-xs'>Materi</a>";
			}
			
			$linkDownload1="<a href='#' onclick=\"bukaJendela('$tohost"."$url');return false;\" class='btn-download btn btn-primary btn-xs'>Certificate".($isOnline?"":"[".$curBg."]")."</a>";
			
			$jud1=$r["title"];
			$jud1=str_replace(" (In Person)","",$jud1);
			
			
			$pes2.="
			<div class=row>
			<div class='pull-left'>".strtoupper($r['jenis']).": $jud1 </div>
			<div class='pull-right'>
				$linkDownload1
				$linkDownload2
			</div>
			</div>
			";
		}
		$pes2.="
		<div class='row' >
		<a href='index.php?oplg=logout' class='pull-right btn-logout btn btn-danger btn-sm'>Logout</a>
		</div>
		";
		echo $header;
		echo showBox($pes1.$pes2);
		echo $footer;
		echo "
		<style>
		.row {
			margin-top:10px;
			margin-left:0px;
		}
		.btn-logout,
		.btn-download {
			height:20px;
			min-width:65px;
		}
		.box-login {
			width:90%;
			max-width:700px;
			text-align:left;
		}
		</style>";
		exit;
		
	}



	//if ($page==1000) $page=$idPageSympo;
	$judul=$pes="";
	if (!$isSympo) {
		extractRecord("select id as imd,title as judul,skp as urlzoom,linkmateri2 from master_data where id='$page'");
		//$simd=$imd;
	}

	if ($judul=="") {
		$page=$aimdSympo[0];
		extractRecord("select id as idmd,title as judul,skp as urlzoom ,linkmateri2 from master_data where id='$page'");
		$judul=$jnsSympo;
		$simd=$simdSympo;
	}	
	//$t.="Anda berhasil login<br>";
	$msgValidation="";
	//cek apakah boleh akses
	$NmAcara=$judul; 
	$NmRuang=$page; 
	$TglMasuk=date('Y-m-d H:i:s');
	$JamMasuk=date('Y-m-d H:i:s');
	$kode_acara=$page;
	$kode_ruangan='ok';
	$flag="1";
	$keterangan="";
	$JumlJam="";
	$Flag=1;
	
	//fullvalidated
	$isV=isValidated($idreg,explode(",",$simd),"or",$isFull=true);
		
	if ($isTest) $isV=true;
	
	if ($isV) {
		if ($step=="zoom") {
			$sql="insert into t_absen(H_noreg,NamaLengkap,NmAcara,NmRuang,
			TglMasuk,JamMasuk,
			kode_acara,kode_ruangan,Flag,keterangan,JumlJam) 
			values ('$idreg','$namaLengkap','$NmAcara','$NmRuang','$TglMasuk',
			'$JamMasuk','$kode_acara','$kode_ruangan','$Flag','$keterangan','$JumlJam')";
			mysql_query($sql);
			if ($urlzoom!='') {
				$pes="[$page]Redirection to zoom...";
				redirection($urlzoom,100);
			} else {
				$pes= "Link Zoom belum dimasukkan ...";
			}
			
		} elseif ($step=="sertifikat") {
			cekvar("op");
			if (op("materi")) {
				$acara="Download Materi - $NmAcara";
			} else {
				$acara="Sertifikat - $NmAcara";
			}
			
			$sql="insert into t_absen(H_noreg,NamaLengkap,NmAcara,NmRuang,
			TglMasuk,JamMasuk,
			kode_acara,kode_ruangan,Flag,keterangan,JumlJam) 
			values ('$idreg','$namaLengkap','$acara','$NmRuang','$TglMasuk',
			'$JamMasuk','$kode_acara','$kode_ruangan','$Flag','$keterangan','$JumlJam')";
			mysql_query($sql);			

			if (op("materi")) {
				if ($linkmateri2=="") {
					echo "Link materi tidak tersedia atau belum dimasukkan";exit;
				}
				echo "
				Redirect to $linkmateri2
				<script>
					location.href='$linkmateri2';
				</script>
				";
				exit;
				/*
				echo "
				$linkmateri
					<iframe id='if1' width='100%' height='100%' 
				style='width: 100%; height: 100%; border: none; max-width: 100%;'   
				allowfullscreen 
				mozallowfullscreen='true'
				allow='webvr;webxr;vr; xr;xr-spatial-tracking; gyroscope;magnetometer; accelerometer;camera;microphone' scrolling='no' 
				src='$linkmateri'
				allowvr='yes'
				webkitallowfullscreen='true'
				frameborder='0'
				> isi frame</iframe>
				<script src='$js_path"."jquery/jquery.js'></script>
				<script>
					$(document).ready(function(){
						h=$(window).height();
						$('#if1').height(h);
					});
				</script>
				<style>body { margin:0 }</style>

			";
				*/
				
			} else {
				$pes="Klik di sini untuk download sertifikat";
				
				/*if ($page==1) {
					$pes="Sertifikat Workshop IN-ALARM tidak tersedia untuk didownload.";
				} else
				*/
				$left_margin=169;
				$addLeftMargin=5;
				$marginTopNama=15;
				$marginTopAs=45;
				$fontSizeAs=26;
				$styAs='';	
				if ($isSympo) {
					$nfg=$tohost."main/img/sympo.jpg";
				} else {
					$nfg=$tohost."main/img/ws-$page.jpg";
					$left_margin=47;
					$addLeftMargin=5;
					$marginTopNama=54;
					$marginTopAs=-16;
					$fontSizeAs=20;
					$styAs='B';

				}	
				
				if (!file_exists($nfg)) {
					$pes="File Pendukung tidak tersedia ($nfg)";
					echo $pes;
					exit;
				}
				
					
				if ($page==3)
					$marginTopAs=23.5;					
				elseif ($page==4) {
					$marginTopAs=23.5;					
				} elseif ($page==5)
					$marginTopAs=23.5;					
				elseif ($page==104)
					$marginTopAs=23.5;					
				
			
				include_once $tohost."main/pdf-sertifikat.php";
				
			}			//sertifikat atau materi

			
		}
		$t.="<div class=box-login>
			$pes
			</div>
			";
	} else {
		//masukkan di absen trial
		
		
		if ($step=="zoom") {
			$pes=translate("Mohon maaf anda tidak diizinkan untuk masuk acara ","Access denied to enter ")." $judul.";
		
		
			$sql="insert into t_absen(H_noreg,NamaLengkap,NmAcara,NmRuang,
			TglMasuk,JamMasuk,
			kode_acara,kode_ruangan,Flag,keterangan,JumlJam) 
			values ('$idreg','$namaLengkap','$NmAcara','$NmRuang','$TglMasuk',
			'$JamMasuk','$kode_acara','$kode_ruangan','$Flag','$keterangan','$JumlJam')";
			mysql_query($sql);
			
		} else {
			$pes=translate("Mohon maaf anda tidak diizinkan untuk download sertifikat","Access denied to download certificate ")." $judul.";
		}
		$pes.="<br>Message : $msgValidation";
		
		echo $header;
		echo "<div class='box-login'>
		$pes
		<br>
		<br>
		<!--a href='#' onclick='tutupTab();return false;' 
		class='btn btn-primary btn-sm'>Kembali</a-->
		<a href='index.php?oplg=logout' class='btn btn-danger btn-sm'>Logout</a>
		</div>
		
		<script>
		function tutupTab() {
			setTimeout(function(){
				
				//window.open('','_parent','');
				//window.close();
			},1);
		}
		</script>
		
		";
		echo $footer;
		exit;
	}
	
}

//$j=json_encode($_SESSION);

/*
$j=sqltoHtmlTable("select id,title,jenis,waktu from master_data");
$t.="
<pre>
$j
</pre>
";
*/
$t.=$footer;
echo $t;
