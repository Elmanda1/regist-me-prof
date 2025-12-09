<?php 
$useJS=2;

if ($_REQUEST['useJS']!='') $useJS=2;
include_once "conf.php";
cekVar("f,step,contentOnly");
$urlHome=$toroot."index.php";
$urlGroup=$toroot."index.php?page=group";
//$acara=$nmAcara="APCH 2015";
$alamatWeb="<a href='$urlHome'>$urlHome</a>";
$emailgroup="<a href='mailto:$webmasterMail'>$webmasterMail</a>";


extractRequest(0);
//echo $_SESSION['egroup'].".....................................";
$idForm="glogin_".rand(1231,2317);
	$nfAction=$toroot."index.php?page=group&f=loginopr";
	$asf="onsubmit=\"ajaxSubmitAllForm('$idForm','ts"."$idForm','');return false;\" ";
	$t="";
	$t.="<div id=ts"."$idForm ></div>";
	$t.="<form id='$idForm' action='$nfAction' method=Post $asf class=formInput >";
	
$jflogin="If  you are a returning user, please enter your login and password and then click  on the Continue button to continue.
<div class=frmabs > 
$t <table border='0' cellspacing='8' cellpadding='0' >
    <tr>
      <td><p>Email: </p></td>
      <td><p>
        <INPUT TYPE='text' MAXLENGTH='50' SIZE='20' NAME='email' id=emailg>
      </p></td>
    </tr>
    <tr>
      <td><p>Password:</p></td>
      <td><p>
        <INPUT TYPE='password' MAXLENGTH='50' SIZE='20' NAME='pass' id=passg>
      </p></td>
    </tr>
    <tr>
      <td colspan='2' align=center> 
        <INPUT TYPE='submit'    NAME='submit' class=button value='Continue'>
       </td>
    </tr>
  </table>
  </form>
  </div>
  <span  >Forgot your password? <a href='#' onclick=\"bAjax('$urlGroup&f=forgot');return false;\"  >click here</a> or if you are a new user ,<a href='#' onclick=\"bAjax('$urlGroup&f=newprofile&useJS=2');return false;\"  >Click here</a> to register</span>
<span  ><a href='#' onclick='openDialoggroup(2);return false' ></a>  </span>
 ";

	$fforgot="
Forgot Password<br><br>
Forgot your Account? <br><br />
<div style='display:none'>
	1. If you filled in the 'Hint Question and Answer Section' in your profile and remember your login, fill form here to receive your password. 
<div class=frmabs>
	<form  >
	<INPUT TYPE='text' MAXLENGTH='50' SIZE='20' NAME='email' id=emailf >
	<br> <INPUT TYPE='submit'  NAME='submit'  value='Continue'>
	 </form>  
 </div >

2. If you remember the email address you entered when you created your  system account, fill form here to have your login and password sent to that e-mail address. (e-mail address required) 
</div>
<br> <br>
      Please enter your e-mail address    and then click on the continue button. If the e-mail address is found, your    login and password will be sent instantly to that e-mail address. If you do    not receive an e-mail within thirty minutes, you may wish to contact technical    support for further assistance.<br>

<div class=frmabs>
Enter Your Email :<br> 
<form action='#' method=post enctype='multipart/form-data' onsubmit=\"bAjax('$urlGroup&f=forgotopr&email='+emailff.value);return false;\">
<INPUT TYPE='text' MAXLENGTH='50' SIZE='20' NAME='email' id=emailff>
<br> <INPUT TYPE='submit'    NAME='submit'  value='Continue'>
 </form>  
 </div >
	
	<span  ><a href='#' onclick=\"bAjax('$urlGroup&f=newprofile&useJS=2');return false;\"  >Click here</a>
	if you never register before 
	or <a href='#' onclick=\"bAjax('$urlGroup&f=login&contentOnly=1');return false;\"   >click here</a>
	if you have registered before</span>
	";
  
if ($f=='Logout') {
	unset($_SESSION['egroup']);
	redirection('index.php?f=Logoutx');
	exit;
}
else if (($f=='newprofile')|| ($f=='')) {
	$recordbaru=true;
	$negara='Indonesia';
	$negara2='Indonesia';
	$tgl=date($formatTgl);
	$idForm='frmprv'.rand(123541,913541);
	$pes="";
	$nfAction="group-secure.php?";
	$validasi="";
	if ($step=='') {
		$validasi="vgroup";
		$nfAction.="f=newprofile&noJS=1&step=saveprofile&op=reggroup";		
		/*
		<div style='color:#f00;font-size:20px;'>Group registration is not supported with internet explorer browser. <br />
		We recomended to use Chrome, Mozilla Firefox or Opera Browser</div>
		*/
		$pes="
		<span  >
		<a href='#' onclick=\"bAjax('$urlGroup&f=login&useJS=2');return false;\"  >Click here</a>
		if you are already registered  
		or <a href='#' onclick=\"bAjax('$urlGroup&f=forgot');return false;\"   >Click here</a>
		if you are forgot your password</span>";
	}
	elseif ($step=='saveprofile') {
		include "profile-upd.php";
		$nextstepx="savedetgroup";
		$transid="G".$idgroup.date("mdhi");$transamount=0;$transbasket="";$transket="";
		$nfAction.="f=newprofile&noJS=1&step=savedetgroup";		
		
	}
	elseif ($step=='savedetgroup') {
		$nfAction.="f=newprofile&noJS=1&step=$nextstep";		
		$nextstepx="savepayment";		
	}
	
	$tbAddPart="
	<a href=# onclick=\"$('#nextstep"."$idForm').val('savedetgroup');$('#$idForm').submit();\" class=button2>Submit and Add Others Participant[s]</a>
	<a href=# onclick=\"$('#nextstep"."$idForm').val('savepayment');$('#$idForm').submit();\" class=button2>Submit and Choose Payment Method</a>
	";
	
	$aform="method='post' enctype='multipart/form-data'  name='$idForm' id='$idForm' 
	onsubmit=\"ajaxSubmitAllForm('$idForm','ts"."$idForm','$validasi');return false;\" ";
	/*cekVar("transid,idprofile");
	$pes.="
		<div id='ts"."$idForm' ></div>
		<form action='$nfAction' $aform >
		<input type=hidden name=batasGD id=batasGD value=4 >
		<input type=hidden name=transid id=transid value='$transid' >
		<input type=hidden name=idprofile id=idprofile value='$idprofile' >
		";*/
	if ($step=='') {
		$needExit=0;
		$namaform="fgr_".rand(23131,90000);
		$onsu="onsubmit=\"ajaxSubmitAllForm('$namaform','ts"."$namaform','vgroup');return false;\" ";

		$pes.= "<div id='ts".$namaform."' ></div>
				<form id='$namaform' name='$namaform' action='$toroot"."index.php?page=nextgroup&contentOnly=1' method=post  enctype='multipart/form-data' $onsu  >";
				
				include $um_path."/profile-form.php"; 
				$pes.= $vprofile;
					
				$pes.= "
					<center><input type=submit name=submit value='submit'></center>
					</form>";
					 
//		include "../adm/registrasi-cek-batas.php";
	//	if (!$isRegistrationClosed) {
			 /*
			$step=1;
			$pes.="<div id=tstep[1] style='display:inherit' >".$vprofile."
			<div class='tstep'><center >
			<a href=# onclick=\"$('#$idForm').submit();return false\" class=button>Next</a>
			</center></div>
			</div>";	
			*/
		//} 
		//$pes.="<br /><br /><br />$info";
	} elseif ($step=='saveprofile') {	
		include "group-det-form.php"; 
		$step=2;	
		$pes.="<div id=tstep[2]  >".$vgd.$tpc;
		$pes.="
		<input type=hidden id=idprofile name=idprofile value='$idprofile'>
		<input type=hidden id=nextstep"."$idForm name=nextstep value='$nextstepx'>
		<div class='tstep'><center >$tbAddPart</center></div>
			";
	
	} elseif ($step=='savedetgroup') {
		include "group-det-upd.php";			
		if ($nextstep=='savedetgroup') {
			include "group-det-form.php"; 
			$step=2;	
			$pes.="<div id=tstep[2]  >".$vgd.$tpc;
			$pes.="
			<input type=hidden id=idprofile name=idprofile value='$idprofile'>
			<input type=hidden id='nextstep"."$idForm' name=nextstep value='$nextstepx'>
			<div class='tstep'><center >$tbAddPart</center></div>
			</div>";	
			 
		} else {
			$step=3;
			//hitung pembayaran
		$sqs="select registrasi.id,registrasi.nama,registrasi.gelarbelakang,reservasi_kongres_workshop.cost,master_data.title  from (registrasi inner join reservasi_kongres_workshop on registrasi.id=reservasi_kongres_workshop.id_registran) inner join master_data on reservasi_kongres_workshop.id_master_data=master_data.id  where reservasi_kongres_workshop.ket='$transid'";
			$hs=mysql_query($sqs);
			
			$totfee=0;$totalUSD=$totalRP=0;
			while ($r=mysql_fetch_array($hs)) {
				$cost=$r['cost'];
				$totfee+=$cost;
				$totalUSD+=$cost;
				if ($transbasket!="") {	$transbasket.=";";}
				if ($cost>10000)
					$costrp=$cost;
				else
					$costrp=round(USDtoIDR($cost),0) ;
				$totalRP+=$costrp;
				$nff=number_format($costrp,2,".","");
				$transbasket.="$r[title] ($r[nama] $r[gelarbelakang]),$nff,1,$nff";
				$transamount+=($costrp*1);
				$i++;
			}
			
			$ttpar=$i;
			$pes.="<div id=tstep[3] style='display:nonffe' >";
			include $toroot."adm/payment-method-form.php";
			$pes.="$pmf</div>";
		}
	} else {
		
		//hitung pembayaran
		$sqs="select registrasi.idgroup,registrasi.id,registrasi.nama,registrasi.gelarbelakang,reservasi_kongres_workshop.cost,master_data.title  from (registrasi inner join reservasi_kongres_workshop on registrasi.id=reservasi_kongres_workshop.id_registran) inner join master_data on reservasi_kongres_workshop.id_master_data=master_data.id  where reservasi_kongres_workshop.ket='$transid'";
		$hs=mysql_query($sqs);
		
		$totfee=0;$totalUSD=$totalRP=0;
		while ($r=mysql_fetch_array($hs)) {
			if  ($idprofile=='') $idprofile=$r['idprofile'];
			$cost=$r['cost'];
			$totfee+=$cost;
			$totalUSD+=$cost;
			$addt="";
			if ($transbasket!="") {	$transbasket.=";";}
			if ($cost>10000)
				$costrp=$cost;
			else {
				$costrp=round(USDtoIDR($cost),0) ;
				$addt=", USD $cost";
			} 
			$totalRP+=$costrp;
			$nff=number_format($costrp,2,".","");
			$transbasket.="$r[title] ($r[nama] $r[gelarbelakang]"."$addt),$nff,1,$nff";
			$transamount+=($costrp*1);
			$i++;
		}
		
		if ($pmethod>=2) {
			$idreg=$idprofile;
			extractRecord("select id,nama,namabelakang as gelarbelakang,alamat,kota,provinsi,negara,telp,hp,fax,email,kodepos from tbprofile where id='$idprofile'");
			$jenis='group';
			echo $transbasket;
			include $toroot."doku/doku-mulai.php";
			//exit;
		} else  {
			$fx=$f="Send Invoice Proccess";
		}
	}
	
	$pes.="
	</form>
	";
	
	$pes.=" 
	<br>
	<br>
	</div>";
	
	if (($f!='') && !isset($fx) ){
		echo $pes;		
		exit;
	}
}
else if ($f=='Logoutx') {
	$t= "You are logged out from group system now <br>";
	$t.= "<a href='../index.php'>Click here </a> if you wish to go to $acara Main page<br>";
	$t.= "or <a href='index.php'>Click here </a> to go to group Main page";
	tampilDialog($t);
	exit;
	}
	
else if ($f=='forgot') {
	echo $fforgot;
	exit;
	}	
else if ($f=='loginopr'){
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$idprofile="";
	extractRecord("select email,id as idprofile from tbprofile where email='$email' and pass='".encod($pass)."'");
	if ($idprofile=='') { 
		$pes= "Email or password is incorrect, please try again";
		$pes.=$jflogin;
	} else {
		$prof=$_SESSION['egroup']=$email;
		include  "profile-view.php";
		$showResult=0;
		include "group-det-daf.php"; 
		

		$pes.=$vprofile;
		$pes.=$vgd;
		$pes.="<br> Please Click <a href=# onclick=\"bukaAjax('maincontent','index.php?f=My+Group');return false; \">My Group</a> for Confirm Your Payment or check Validation Status ";
		
		$isgroupLogin=true;
		include  "group-idx.php";
		//$f="My Group";
		exit;
	}
} else if ($f=='login') {
	$pes=$jflogin;
	if ($contentOnly==1) {
		echo $jflogin;
		exit;
	}
	}
else if ($f=='reggroup'){
 	include "profile-upd.php";
	include "group-det-upd.php";
	
	if ($pmethod==2) {
		include $toroot."doku/doku-mulai.php";
		exit;
	} else  {
		$f="Send Invoice Proccess";
	}
	//exit;
} else if ($f=='forgotopr'){
	$email=$_REQUEST['email'];
	$hc=mysql_query("select * from tbprofile where email='$email'  ");
	$rc=mysql_fetch_array($hc);
	if (!$rc) { 
		$pes= "Email is not registeed, please try again";
		echo $pes;
		echo $fforgot;
		exit;
	}
	else {
		$pass=decod($rc['pass']);
		$lnk=$urlGroup;
		$bodyMail =" 
		<br>Thank you $rc[nama]. 
		<br><br>
		<br>Your account has been created as: 
			<br>Login: $rc[email]
			<br>Password:  <b>$pass</b><br><br>
		<div style='display:none'><br>If you lose this information, you can also retrieve your password from the 
		System by using the appropriate answer to the hint question you provided. You will need your login to use this feature. 
		<br>
		<br>Your hint question and answer are: 
			<br>Question: $rc[pertanyaan]
			<br>Answer:    $rc[jawaban]
		</div>
		<br><br>Contact us if you have any questions.
		
		<br><br>Use the link below to go back to the group submission site.<a href='$lnk'>$lnk</a>";
		
	$fromName=$webmasterName;
	$fromMail=$webmasterMail;
	$msci=cariField("select email_sci from tbconfig");
	$mailTo=$rc['email'];
	
	$subjectMail="group Password Remainder (".$rc['nama'].") "; 
	include $um_path."kirim-email.php";
	 
	echo "<br><br><div class=comment1><center >Your Password Sent to $email....</center></div><br><br>";
	echo $jflogin;
	exit;
	}
} 

if ($f=='Send Invoice') {
 
	$idForm="ginv_".rand(1231,2317);
	$nfAction="index.php?f=Send+Invoice+Proccess";
	$asf="onsubmit=\"ajaxSubmitAllForm('$idForm','ts"."$idForm','');return false;\" ";
	$t="";
	$t.="<div id=ts"."$idForm ></div>";
	$t.="<form id='$idForm' action='$nfAction' method=Post $asf class=formInput >";
	
	$jfinvoice="
	<div class=frmabs > $t
	<center>
	Send Invoice to :<br> 
	<INPUT TYPE='text' MAXLENGTH='50' SIZE='20' NAME='defemail' id=defemail value='".$_SESSION['egroup']."'>
	<br><input type=submit value='Send Invoice'>
	</center>
	  </form>
	  </div>
	   
	 ";
	 $pes= $jfinvoice;
	 echo $jfinvoice;
	 exit;
}
if ($f=='Send Invoice Proccess') {
	
	$fromName=$webmasterName;
	$fromMail=$webmasterMail;
	$mreg=cariField("select email_reg from tbconfig");
	if ($defemail=='') {
		$email=$_SESSION['egroup'];
		$mailTo=$email.",".$mreg;
	} else {
		$email=$defemail;
		$mailTo=$email;
	}
	//$email="um412@yahoo.com";
	//$mailTo="um412@yahoo.com";
	include "profile-view.php";
	include "group-det-view.php";
	$subjectMail="Group Registration Invoice onbehalf of ".$namagroup." "; 
	
	
	//include "profile-view.php";
	$bodyMail="<div style='font-size:16px;font-weight:bold'>$subjectMail</div><hr> <br> <br><br>";
	$bodyMail.="Thank you for your participation in $acara group registration. <br><br>";
	$bodyMail.=$vprofile.$vgd;
	$bodyMail.="
	<div style='background:#bbf;border:#000 2px solid; padding:20px;text-align:left'><b><center>
	Total Participant : <span id=ttparticipant>$ttpar </span >Participant[s]  &nbsp;&nbsp;&nbsp;Total Fee (Invoice) : USD <span id=ttfee>$ttfee</span > 
	</center></b></div>
	";
	
	include_once $um_path."info-bayar.php"; 
	$bodyMail.="<br><br>$infobayar<br><br><a href='$urlGroup'>Click here</a> to login to your group page<br><br>
	<br><br>$signature2";
	include $um_path."kirim-email.php";
	
	echo $bodyMail."<br><br>Email Sent to $email";
	exit;
}
$isgroupLogin=false;
 //cek login
if (isset($_SESSION['egroup'])) {
	$prof=$_SESSION['egroup'];
    $idprofile=cariField("select id from tbprofile where email='$prof'");
    if ($idprofile==""){
		$isgroupLogin=false;
		unset($_SESSION['egroup']);
		//redirection('index.php');
		exit;
	}
	$isgroupLogin=true;
}

if ($isgroupLogin) {
	extractRecord("select nama as namaGroup from tbprofile where id='$idprofile'");
	$pes="Welcome $namaGroup <br>";
    $ja=$ljp=cariField("select count(id) from registrasi where idgroup ='$idprofile'");
	$lnkAddParticipant="<span id=taddpart>
	<a href=# onclick=\"bukaAjax('taddpart','$urlGroup&f=addparticipant&akhiri=0&showsubmit=1&ljp=$ljp'); 
	return false;\">click here </a> to add participant[s]
	</span>";

	if ($ja>0)
		$pes.="You are already submit $ja participant[s].
				<a href=# onclick=\"bAjax('$urlGroup&f=My%20Group');return false;\">Click here </a> to show.
				<br>$lnkAddParticipant"; 

				
	else
		$pes.="<br>$lnkAddParticipant";
		
	if ($f=='Profile') {
		include  "profile-view.php";
		echo $vprofile;
		exit;
	}
	elseif ($f=='My Group') {
		
		$idForm="gpay_".rand(1231,2317);
		$nfAction="index.php?f=paygroup&page=paygroup";
		$asf="onsubmit=\"ajaxSubmitAllForm('$idForm','ts"."$idForm','groupdet');return false;\" ";

		echo "<div id=ts"."$idForm ></div>";
		echo "<form id='$idForm' action='$nfAction' method=Post $asf class=formInput >";
		echo "<input type=hidden name=op id=op value='konfirmasi'>";

		echo "<div id=tdetgroup >";
		include "group-det-daf.php"; 
		echo "</div>";
		$vgd="	<center><br>";
			if ($isAdmin){
				$vgd.="	
				<input type=checkbox name=vcheckallv id=vcheckallv onclick=\"hitungBiayaGroup('check allv');\" >Validate All &nbsp;&nbsp;
				<input type=hidden name=totv  id=totv  value='$jvalid' >
				";	
			}
			$vgd.="
				<input type=checkbox name=vcheckall id=vcheckall onclick=\"hitungBiayaGroup('check all');\" >Confirm Payment All<br>
				<input type=hidden name=totorang id=totorang value='$jcek' >
			";
		
		$vgd.="	</center>";
		
	
		if ($isAdmin) {
			$vgd.="<br><br><div id=tvalid class=comment1 style='width:640px'>";
			$vgd.="<center>
			<div class=tcost >Total fee will be validated : <span id=totvalid2>0</span>
			<input type=hidden name=totvalid id=totvalid value=0></div>
			
			<br><br><input type=submit value='Validate Now' onclick=\"$('#op').val('validasi');\"></center>";
			$vgd.="<a href=# onclick='cekHargaGroupSekarang(1);return false'>Change Fee as Transfer Date</a>";

			$vgd.="</div>";
		}
		
		
		$vgd.="<br><br><div id=tbayar class=comment1 style='width:640px'>";
		include "pay-form.php";
		$vgd.="<center><input type=submit value='Confirm Payment'></center>";
		$vgd.="</form>";
		echo $vgd;

		echo "<form><div id=tgd>$info</div></form>";
		exit;
	}
	elseif ($f=='Guideline') {
		$nohead=1;
		$pg="Group";
		include $um_path."page-det.php";
		exit;
	} elseif (($f=='addparticipant')||($f=='Add Participant[s]') ){
		//echo "<div class=subtitleform2>add participant...</div>";	
		include  "group-det-form.php";
		exit;
	}
	elseif ($f=='paygroup') {
		//UPDATE HARGA
		include  "group-det-upd.php";
		echo "payment confirmation success ....";
		
	 
		exit;
	}
	else if ($f=='addparticipantopr'){
		//echo "idprofile: $idprofile";
		include "group-det-upd.php";
		$bodyMail="Participant[s] Successfully added. <br><br>";
		include "group-det-view.php";
		echo $bodyMail." ".$vgd;
		exit;
		
	}
	include 'group-idx.php';
	exit;
}  else    {

		include 'group-idx.php';
    	exit;
}  
 
?>