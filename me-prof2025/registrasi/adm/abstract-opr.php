<?phpinclude "abstract-upd.php";
//echo "t";
//redirection($toroot."adm/index.php?rep=daf_abs",1);
//if ($result==1) {	

//cekVar("nextpage");	
//if ($nextpage=="adbyid") {	
	//include "abstract-daf-byid.php";		exit;			} else {		//include "abstract-daf-det.php";		//echo 	$infoAbstract;	}		
	$absditerima=carifield("select isi from tbpage where pg='abstrakditerima'");
	if ($absditerima!="") {
		echo $absditerima;
	}else {
		if ($lang=="en") {
		echo "
		<div class=subtitleform2>Abstract Submit</div>
		<br>Abstract successfully submited
		<br><a href='$folderHost'>click here</a> to return to home page.
		";
		} else {
		echo "
		<div class=subtitleform2>Abstrak berhasil dikirim</div>
		<br>Abstrask berhasil dikirim. 
		<br>Silahkan <a href='$folderHost'>klik di sini</a> untuk kembali ke halaman homepage.
		";	
		}
	}
//}
?>
  