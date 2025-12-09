<?php
if ($page=='paygroup'){
	//update harga
	$tt=getTglInput($tgl_transfer);//tglsekarang
	$be=getTglInput($batasEar);
	$bl=getTglInput($batasLat);
	
	
	$idgroup=$idprofile;
	$tgl_transfer=tgltoSQL($tgl_transfer_group);
	$bank=$bank_group;
	$ref=tgltoSQL($ref_group);
	$nfbukti=tgltoSQL('nfbukti');
	$disc=0; 
	$ip='';
	$vinfo="";
	//op=konfirmasi
	if ($op=='konfirmasi') {
		$nf=basename($_FILES['uploaded']['name']);
		$nfbukti=uploadFile("uploaded",$target=$toroot."images",$tipe="gambar",$maxs=0,1,'btransfer_'.$jenis.'_'.$idreg.'_'.$idres."_".$nf);
		if ($pes!='') echo "<font color=red>$pes</font><br>"; 
		$j=0;			
		if (is_array($_REQUEST['vfee'])) {
			foreach ($_REQUEST['vfee'] as $v) {
				if ($_REQUEST['vcb'][$j]=='on') {
					$idres=$_REQUEST['vidres'][$j];
					//$vfee=$_REQUEST['vfee'][$j];
					$id_registran=0;			
					
					//update harga dulu
					
					//extractRecord("select id_registran as idreg,cost,jenis from reservasi_kongres_workshop where id='$idres'");
					$r2=array();
					$sq2=("select id_registran as idreg,reservasi_kongres_workshop.*,master_data.title,master_data.cost as cost_ear,
	master_data.lat as cost_lat,master_data.onsite as cost_onsite 
	from reservasi_kongres_workshop inner join master_data on reservasi_kongres_workshop.id_master_data=master_data.id 
	where reservasi_kongres_workshop.id='$idres'");
					$hq2=mysql_query($sq2);
					$r2=mysql_fetch_array($hq2);
					$curcost=(($tt/100>=$bl/100 )?$r2['cost_onsite']:(($tt/100>=$be/100 )?$r2['cost_lat']:$r2['cost_ear']));
					//echo "cur cost:".$curcost;
					mysql_query("update reservasi_kongres_workshop set cost='$curcost' where id='$idres'");
					$jlh_transfer=$curcost;
					
					$idreg=$r2['idreg'];
					$jenis=$r2['jenis'];
					
					$t1="insert into konfirmasi_transfer 
					( id_reservasi, id_registran,   tgl_transfer,jlh_transfer, disc, bank,  ref, jenis,`stat`,nfbukti,ip)
					values('$idres','$idreg','$tgl_transfer','$jlh_transfer','$disc','$bank','$ref','$jenis',
					'not validated yet','$nfbukti','$ip')  ";
					mysql_query($t1);
					$gidreg=mysql_insert_id();
				
					//echo $t1."<br>";
					$vinfo.="";
				}
				$j++;
			}//for
		}
	echo "confirmation success.....";
		
	} else if ($op=='validasi'){
		//ku();
		$j=0;
		if (is_array($_REQUEST['vfeev'])) {
			foreach ($_REQUEST['vfeev'] as $v) {
				if ($_REQUEST['vcbv'][$j]=='on') {
					$idres=$_REQUEST['vidresv'][$j];
					$idreg=0;	
					extractRecord("select id_registran as idreg,cost,jenis from reservasi_kongres_workshop where id='$idres'");
					$t1="update konfirmasi_transfer set stat='validated' where id_reservasi='$idres' and jenis='$jenis' and id_registran='$idreg'";
					mysql_query($t1);
					//echo $t1."<br>";
					$vinfo.="";
				}
				$j++;
			} //for
		}
		echo "validation success.....";
	}//if

	//echo "opx $op";
	exit;
}

$vgd="";
$i=$ttfee=0;
$idgroup=$idprofile;
if ($transid=='') $transid="G".$idgroup.date("mdhi");$transamount=0;$transbasket="";$transket="";
$ljpawal=(cariField("select count(id) from reservasi_kongres_workshop where ket='$transid' ")*1);

foreach ($_REQUEST['gnama'] as $gnama) {	
	if ($gnama!='') {
		$gnama=$_REQUEST['gnama'][$i];
		$gnamab=$_REQUEST['gnamab'][$i];
		$galamat=$_REQUEST['galamat'][$i];
		$gimd=$_REQUEST['gprof'][$i];
		$gkota=$_REQUEST['gkota'][$i];
		//$gnegara=$_REQUEST['gnegara'][$i];
		$gtelp=$_REQUEST['gtelp'][$i];
		$ghp=$_REQUEST['ghp'][$i];
		$gemail=$_REQUEST['gemail'][$i];
		$gharga=($_REQUEST['gharga'][$i] )*1;
		$ttfee+=$gharga;
		
		$title=cariField("select title from master_data where id='$gimd'");
		$cost=$gharga;
		
		if ($transbasket!="") {	$transbasket.=";";}
		if ($cost==261)
			$costrp=3000000;
		else
			$costrp=round(USDtoIDR($cost),0) ;
		$nff=number_format($costrp,2,".","");
		$transbasket.="$title ($gnama $gnamab),$nff,1,$nff";
		$transamount+=($costrp*1);
	 			
//$st[11]
$st=array('','','','','','','','','','','','','','','','','','','','','','','','','','','','');
		$vgd.= "<br><br><div style='font-size:15px;font-weight:bold'>PARTICIPANT</div>
		<br><br><div class=tdjudul><b>Participant ".($i+1)."</b></div>
		<table $st[11] >
		<tr>	<td  align=left $st[1] >Name</td>	<td  align=left $st[1] >: $gnama $gnamab </td>	</tr>
		<tr>	<td  align=left $st[3] >Address</td><td>: $galamat</td>	</tr>
		<tr>	<td  align=left $st[4] >City </td><td>: $gkota - $gnegara</td>	</tr>
		<tr>	<td  align=left $st[6] >Phone</td><td>: $gtelp Mobile Phone : $ghp</td>	</tr>
		<tr>	<td  align=left $st[8] >Email</td>	<td  align=left $st[8] >: $gemail</td></tr>
		<tr>	<td  align=left $st[8] >Proffesion</td>	<td  align=left $st[8] >: $title</td></tr>
		<tr>	<td  align=left $st[8] >Fee</td>	<td  align=left $st[8] > 
		<p style='border:2px #000 solid;padding:2px 10px ;text-align:center;'>	Fee : <span id=tfee[$i] >$gharga</span></p></td></tr>
		</table>
		"; 
		//$gemail=$_REQUEST['gemail'][$j];
			$noparticipant=($ljpawal+$i+1);
			$t1="insert into registrasi(nama,gelarbelakang,alamat,kota,negara,telp,hp,email,idgroup,ketgroup,cab) values('$gnama','$gnamab','$galamat','$gkota','$gnegara','$gtelp','$ghp','$gemail','$idgroup','$transid','$noparticipant');";
			mysql_query($t1);
			$gidreg=mysql_insert_id();
			//echo $t1."<br>";
			
		
		$t2="insert into reservasi_kongres_workshop(id_registran,id_master_data,cost,jenis,ket,pendamping) values('$gidreg','$gimd','$gharga','symposium','$transid','$noparticipant')";
		mysql_query($t2);
		//echo $t2."<br>";	
		//echo "<br>$gnama $gnamab successfully added....";
	}
	//echo $i." ";
	$i++;
}
$ljp=$_REQUEST['ljp']=cariField("select count(id) from reservasi_kongres_workshop where ket='$transid'");
//echo "<br>total participant $ljp";
$hs=mysql_query("select id,ketgroup,cab from registrasi where ketgroup='$transid' ");
while ($r=mysql_fetch_array($hs)){		
		$sq="update reservasi_kongres_workshop set id_registran=$r[id],pendamping='' where ket='$transid' and pendamping='$r[cab]'";
		//echo $sq."<br>";
		mysql_query($sq);
	}

$ttpar=$i;

?>
