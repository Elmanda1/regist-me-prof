<?php
include_once "conf.php";
cekvar("page,ac,oplg,step");

if (isset($_REQUEST['step'])) {
	$step=	$_SESSION['step']=$_REQUEST['step'];
}elseif (isset($_SESSION['step'])) {
	$step=	$_SESSION['step'];
}else {
	//default
	if ($page==1) {
		$step="kulla";
	} elseif ($page==501) { 
		$step="poster";
	} else
		$step="zoom";
		
	
	//$step="sertifikat";
}

if ($step!='sertifikat') {
	if ($page!='') {
		$_SESSION['page']=$page;
	} else {
		if (isset(	$_SESSION['page'])) $page=$_SESSION['page'];

	}

}

$btnLogout2="<a href='index.php?oplg=logout' class='btn btn-danger btn-sm' style='z-index:100;position:fixed;bottom:10;right:25;'>Logout</a>";
//echo "step : ".$step;exit;
//106,107:halaman poster
$aImdAll=[
	['sympo','AOFOG 2022 Congress',[1,2,3,4,5,6,9,10,11,12,13,14,21,22]],
	['poster','Poster Presentation',[501,502]],
	['opencer','Opening Ceremony',[503],'https://us02web.zoom.us/j/84583089307?pwd=NFR6TEt4SE1hZXdhUm1Ic0tYVEVtQT09'],
/*
108	1	Recent Update in Urogynecology Surgery (In Person)
118	11	Recent Update in Urogynecology Surgery-Local Participant (In Person)
138	1	Recent Update in Urogynecology Surgery (Virtual)
148	11	Recent Update in Urogynecology Surgery-Local Participant (Virtual)
*/
	['workshop','Recent Update in Urogynecology Surgery',[108,118,138,148]],
/*
109	2	Video Session in Urogynecology Procedures (In Person)
119	12	Video Session in Urogynecology Procedures-Local Participant (In Person)
139	2	Video Session in Urogynecology Procedures (Virtual)
149	12	Video Session in Urogynecology Procedures-Local Participant (Virtual)
*/	
	['workshop','Video Session in Urogynecology Procedures',[109,119,139,149]],
/*

110	3	Update Management of Cervical Precancer Lesion (In Person)
120	13	Update Management of Cervical Precancer Lesion-Local Participant (In Person)
140	3	Update Management of Cervical Precancer Lesion (Virtual)
150	13	Update Management of Cervical Precancer Lesion-Local Participant (Virtual)
*/
	['workshop','Update Management of Cervical Precancer Lesion',[110,120,140,150]],

/*
111	4	Ultrasound Workshop for Obstetric (In Person)
121	14a	Ultrasound Workshop for Obstetric-Local Participant (In Person)
141	4	Ultrasound Workshop for Obstetric (Virtual)
151	14a	Ultrasound Workshop for Obstetric-Local Participant (Virtual)
*/
	['workshop','Ultrasound Workshop for Obstetric',[111,121,141,151]],

/*
112	5	High Risk Obstetrics and Emergency (In Person)
122	15	High Risk Obstetrics and Emergency-Local Participant (In Person)
142	5	High Risk Obstetrics and Emergency (Virtual)
152	15	High Risk Obstetrics and Emergency-Local Participant (Virtual)
*/
	['workshop','High Risk Obstetrics and Emergency',[112,122,142,152]],
/*

113	6	Pra Conception Management (In Person)
123	16	Pra Conception Management-Local Participant (In Person)
143	6	Pra Conception Management (Virtual)
153	16	Pra Conception Management-Local Participant (Virtual)
*/
	['workshop','Pra Conception Management',[113,123,143,153]],
/*

114	7	Pain Management During Labor (In Person)
124	17	Pain Management During Labor-Local Participant (In Person)
144	7	Pain Management During Labor (Virtual)
154	17	Pain Management During Labor-Local Participant (Virtual)

*/
	['workshop','Pain Management During Labor',[114,124,144,154]],
/*
115	8	The Failing Gonad (In Person)
125	18	The Failing Gonad-Local Participant (In Person)
145	8	The Failing Gonad (Virtual)
155	18	The Failing Gonad-Local Participant (Virtual)
*/
	['workshop','The Failing Gonad',[115,125,145,155]],
/*
116	9	LIVE Surgery and Near Live Surgery in MIS (In Person)
126	19	LIVE Surgery and Near Live Surgery in MIS-Local Participant (In Person)
146	9	LIVE Surgery and Near Live Surgery in MIS (Virtual)
156	19	LIVE Surgery and Near Live Surgery in MIS-Local Participant (Virtual)

*/

	['workshop','LIVE Surgery and Near Live Surgery in MIS',[116,126,146,156]],
/*
117	10	Sexual and Reproductice Violence (In Person)
127	20	Sexual and Reproductice Violence-Local Participant (In Person)
157	20	Sexual and Reproductice Violence-Local Participant (Virtual)
*/
	['workshop','Sexual and Reproductice Violence',[117,127,147,157]],
/*

28	14b	Ultrasound Workshop for Ginekologist-Local Participant (Virtual)
27	14b	Ultrasound Workshop for Ginekologist-Local Participant (In Person)
201	4b	Ultrasound Workshop for Ginekologist (In Person)
202	4b	Ultrasound Workshop for Ginekologist (Virtual)

*/
	['workshop','Ultrasound Workshop for Ginekologist',[27,28,201,202]],
];
/*
1	1	Physician (In Person)
2	2	Physician (Virtual)
3	3	General Physician/Nurse/Midwife/Student/Trainee/Allied Healthcare (In Person)
4	4	General Physician/Nurse/Midwife/Student/Trainee/Allied Healthcare (Virtual)
5	5	Student/Trainee (Virtual)
6	6	Student/Trainee (In Person)
9	9	Physician-Local Participant (In Person)
10	10	Physician-Local Participant (Virtual)
11	11	General Physician/Nurse/Midwife/Student/Trainee/Allied Healthcare-Local Participant (In Person)
12	12	General Physician/Nurse/Midwife/Student/Trainee/Allied Healthcare-Local Participant (Virtual)
13	13	Student/Trainee-Local Participant (Virtual)
14	14	Student/Trainee-Local Participant (In Person)
21	21	Physician-LRC (In Person)
22	22	Physician-LRC (Virtual)

103	103	Unique Payment Verification Codes
*/

//mencari jenis, apakah sympo,poster, atau workshop
$ketemu=false;
if ($page*1>0) {
	$k=0;
	foreach ($aImdAll as $ximd) {
		if ($ketemu) continue;
		$kt=is_int(array_search($page,$ximd[2]))?true:false;
		if ($kt) {
			$ketemu=true;
			$simd=implode(",",$ximd[2]);
			$jenis=$ximd[0];
			$judul=$ximd[1];
			$urlzoom2=(isset($ximd[3])?$ximd[3]:'');
			//echo "ketemu $simd";
		}
		$k++;
	}
}

$aimdSympo=$aImdAll[0][2];
$aimdPoster=$aImdAll[1][2];
$simdSympo=implode(",",$aimdSympo);//"1,2";
//mencari di sympo

$isSympo=is_int(array_search($page,$aimdSympo))?true:false;
$isPoster=is_int(array_search($page,$aimdPoster))?true:false;
$simdPageSympo=$simdSympo;


$bg="bg-1.jpg";
//$bg="bg-$xpage.jpg";
$addSty='';
if (!$isSympo) {
	$addSty='.box-login1 {
		margin-top:150px;
	}';
	
} else {
	$pin=($page==1?2:1);
	$linkPindah="<a  href='index.php?page=$pin' class='btn btn-warning linkpindah' id=linkpin$pin >PINDAH KE<br>BALLROOM $pin </a>";
}

$addsty1="
body {
	background-image:url(img/bg/$bg); 
	background-size:cover;
	text-align:center;
	padding:10px;
	height:100%;
	width:100%;
	overflow:hidden;
	/*
	background:#ccc url(img/bg/$bg) no-repeat top center fixed !important; 
	border:5px solid #fff;
	*/
}

$addSty
";

$sty="<style>$addsty1</style>";

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



if ($oplg=="logout") {
	unset($_SESSION['ac']);
	unsetvar("ac");
	unsetvar("oplg");
	$pes1="Andar berhasil Logout";
	/*
	<br> 
	<div id='txtlogin'>
	Jika diinginkan login kembali, silahkan klik tombol login
	<br>
	<a href='#' onclick=\"toggleShow('txtlogin','tlogin');return false\" class='btn btn-primary btn-sm'>Login</a>
	</div>
	
	*/
	$pes=$pes1;
	echo $header;
	//echo showBox($pes1,'msg-login');
	
	
	$pes2="<div id=tlogin style='display:nonex'>"
	.showFrmLogin().
	"</div>";
	echo $pes2;
	echo $footer;
	exit;
	
} 

if ($step=="zoom") {
	if (isset($_REQUEST['page']))
		$_SESSION['page']=$_REQUEST['page']=$page;
	else if (isset($_SESSION['page'])) {
		$page=$_SESSION['page'];
	} else {
		$page=$aimdSympo[0];
		//jika zoom, page diisi dengan default, jika sertifikat , page g perlu diisi default
	}
	$page=str_replace("ws","",$page);
}


if ($isPoster) {
	$xpage=100;//ruang bromo
	$simd=$simdSympo;
} else {
	if ($page==503) {
		$simd=implode(",",
		[1,2,3,4,5,6,9,10,11,12,13,14,21,22,108,118,138,148,109,139,149,159,110,120,140,150,111,121,141,151,112,132,142,152,113,123,143,153114,124,144,154,115,125,145,155,116,126,146,156,117,127,147,157,27,28,201,202]);
		//$simdSympo;
	}
	
	$xpage=$page;
}

if ($step=='sertifikat') {
	include_once "index-sertifikat.php";
	exit;
}

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
$idreg=0;
$judul=$pes="";
if ($isPoster) {
	//poster
	$judul="Presentasi Poster/Oral";
	$urlzoom="https://us02web.zoom.us/j/87915373422?pwd=STBPanZqVU9YZHNKTnRmazlOTWk4UT09";
	$urlyoutube="";
	
} else {
	$sq="select id as idmd,title as judul,jenis,skp as urlzoom,linkmateri as urlyoutube from master_data where id='$page'";
	extractRecord($sq);
} 

	
if ($isSympo) {
	//echo "simposium lhoo...........";
	$simd=$simdSympo;	
} else {
	if (!isset($simd))	$simd=$idmd;
}



$t="";

//$t.= "page : $page ";

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
	//  echo $s;
	$hasil=mysql_query($s);
	$rv=mysql_fetch_array($hasil);

	if(empty($rv)) {
		$pes="Access Key tidak valid";
		//$t.=showFrmLogin($pes);
		unset($_SESSION["ac"]);
		 
	} else {
		$idreg=$rv['id'];
		$nama=$NamaLengkap=$rv['nama'];
		$pas=strtoupper($rv['tipereg']);
		$namasert=$rv['namasert'];
		$_SESSION["ac"]=$ac;
		$isLogin2=true;
		$jpeserta=strtolower($rv['tipereg']);
		$_SESSION['vidusr']=$idreg;
		
		//khusus poster
		if ($isPoster) {
			$tgls=date("Y-m-d");
			$tgls=$page==106?"2022-01-30":"2022-01-31";
			$c=carifield("select idregabs from tbabstract where idregabs='$idreg' and pres_tgl='$tgls'");
			if ($c!=0) {
				$jpeserta="pembicara";
			}
			
		}
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
	//$t.="Anda berhasil login<br>";
	$msgValidation="";
	//cek apakah boleh akses
	$NmAcara=($isSympo?"Symposium $page":$judul); 
	$NmRuang=$page;
	$TglMasuk=date('Y-m-d H:i:s');
	$JamMasuk=date('Y-m-d H:i:s');
	$kode_acara=$page;
	$flag="1";
	$keterangan="";
	$JumlJam="";
	$Flag=1;
	//echo $simd;
	//fullvalidated
	if (isValidated($idreg,explode(",",$simd),"or",$isFull=true)) {
		$kode_ruangan='ok';
		if ($step=="kulla") {
			include "virtualtour.php";
			echo $btnLogout2;
		}else if (($step=="zoom")||($step=="poster")) {
			$sql="insert into t_absen(H_noreg,NamaLengkap,NmAcara,NmRuang,
			TglMasuk,JamMasuk,
			kode_acara,kode_ruangan,Flag,keterangan,JumlJam) 
			values ('$idreg','$NamaLengkap','$NmAcara','$NmRuang','$TglMasuk',
			'$JamMasuk','$kode_acara','$kode_ruangan','$Flag','$keterangan','$JumlJam')";
			mysql_query($sql);
			
			if ($step=='poster') {
				//wpoarwe
				echo "
				<iframe src='../eposter/index.php' style='position:fixed; top:0; left:0; bottom:0; right:0; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden;'>
					Your browser doesn't support iframes
				</iframe>
				$btnLogout2				";
				exit;
			} else {
				if ($urlzoom!='') {
					if ((!$isSympo)||(strstr('pembicara,moderator',$jpeserta)!='')) {
					//if (strstr('pembicara,moderator',$jpeserta)!='') {
						$url=$urlzoom;//"https://www.youtube.com/watch?v=DuSPB2qMkzs";
						echo "[$page] $jpeserta redirect to $url";
						redirection($url);
						exit;
					} else {
						echo $header;
						$url=$urlyoutube;
						include_once "sympo.php";
						//echo $footer;
						exit;
					}
					//$pes="[$page]Redirection to zoom...";
					//redirection($urlzoom,100);
					//include_once "sympo.php";
				} else {
					if ($urlzoom2!='') {
						$url=$urlzoom2;//"https://www.youtube.com/watch?v=DuSPB2qMkzs";
						echo "[$page] $jpeserta redirect to $url";
						redirection($url);
						exit;
						
					} else {
						$pes= "Link Youtube/Zoom belum dimasukkan ...";
						echo $pes;
					}
				}
			}
		}
		$t.="<div class=box-login>
			$pes
			</div>
			";
	} else {
		//echo "belum valid";
		if ($isSympo) $judul="Symposium $page"; 
	
		//masukkan di absen trial
		$kode_ruangan='try';
		
		$sql="insert into t_absen(H_noreg,NamaLengkap,NmAcara,NmRuang,
		TglMasuk,JamMasuk,
		kode_acara,kode_ruangan,Flag,keterangan,JumlJam) 
		values ('$idreg','$NamaLengkap','$NmAcara','$NmRuang','$TglMasuk',
		'$JamMasuk','$kode_acara','$kode_ruangan','$Flag','$keterangan','$JumlJam')";
		mysql_query($sql);
		
		$judul=str_replace(" (In Person)","",$judul);
		echo "step....$step";
		if ($step=="zoom")
			$pes="Access denied to enter  $judul.";
		elseif ($step=='kulla')
			$pes="Access denied to enter to enter virtual congress of  <b>$judul</b>.";
		else
			$pes="Access denied to download certificate <b>$judul</b>.";
		
		$pes.="<br>Pesan : $msgValidation";
		//$pes.="<br>penyebab lain:mempunyai 2 akses key, solusi:gunakan akses yg lain";
		
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
