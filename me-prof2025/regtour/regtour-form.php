<?php
cekVar('id,opr');
$id*=1; 
if ($id!=0){
	$opr="ed";
} else $opr="tb";

extractRecord("select * from regtour where id='$id'");
$neg="en";
$nmform="pkt_".(rand(2345,322333));
?>
<div id='maincontent'>
	<div style='max-width:1000px ;margin:auto'>
		<?php
		echo "<div id=ts$nmform></div>";
		$aform="method='post' 
		enctype='multipart/form-data'  
		name='$nmform' id='$nmform' onsubmit=\"ajaxSubmitAllForm('$nmform','ts$nmform','regtour');return false;\" ";
		
		if (!$isOnline) $aform.=" target=_blank ";
		?>
<br>
<br>
<br>

		<form action='index.php?rep=regtour-opr&contentOnly=1' enctype="multipart/form-data" method=post <?=$aform?>  >
		  
		<?php 

		$t='';
		
			//$t.=rowITB3("<input type=text name=id id=id size=50 value='$id'>~id",35,"~");
			$t.=rowITB3("<input type=text name=nama id=nama size=50 value='$nama'>~First Name",35,"~");
			$t.=rowITB3("<input type=text name=namabelakang id=namabelakang size=50 value='$namabelakang'>~Last Name",35,"~");
			$t.=rowITB3("<input type=text name=email id=email size=50 value='$email'>~Email",35,"~");
			$t.=rowITB3("<input type=text name=telp id=telp size=50 value='$telp'>~Cellular/Mobile Phone",35,"~");
			$t.=rowITB3("<input type=text name=hp id=hp size=50 value='$hp'>~Whatsapp Number",35,"~");
			//$t.=rowITB3("<input type=text name=tglentry id=tglentry size=50 value='$tglentry'>~tglentry",35,"~");
			//$t.=rowITB3("<input type=text name=sbook id=sbook size=50 value='$sbook'>~sbook",35,"~");
		
		echo $t;
		
		
	$aw=hitungSkala([5,20,7,7,7,7]);
	$t= "
	<style>
	.tbtt td {
		padding:5px;
	}
	.qty_1,.qty_2	{ max-width:90px }
	</style>
		 <strong><span style='font-size:12.0pt'>Booking Category</span></strong> <br />
	
	<br>
	<strong>Transportation</strong>
	<table cellspacing='0' width='100%' border=1 class='tbtt'>
		<tbody>
			<tr>
				<td class=tdjudul style='width:$aw[0]%;text-align:center'>No</td>
				<td class=tdjudul style='width:$aw[1]%'>Type of Rent</td>
				<td class=tdjudul style='width:$aw[2]%'>$aMobil[0]</td>
				<td class=tdjudul style='width:$aw[3]%'>$aMobil[1]</td>
				<td class=tdjudul style='width:$aw[4]%'>$aMobil[2]</td>
				<td class=tdjudul style='width:$aw[5]%'>$aMobil[3]</td>
			</tr>
			
			";
			
			$br=1;
			$nopaket=0;
			$nojenis=1;
			$jn="trans";
			$neg="en";
			$cat="";
			
			foreach($arh1 as $ar){
				$t.="<tr>
				<td style='text-align:center'>$br</td>";
				$c=0;
				foreach($ar as $td) {
					$i=1;
					$harga[$i]=$td;
					$noradio=1;
					$sty=($c==0?"":"style=''");
					$nm="trans$br";
					if ($c==0) {
						$t.="<td $sty>$td</td>";
						$tit=$td;
					} else {
						$nopaket++;
						$idp=500+$nopaket;
						$mb=$aMobil[$c-1];
						$t.="<input type=hidden id=aidp[$nopaket] name=aidp[$nopaket] value=$idp>";
						$t.="<span id=stitle[$nopaket] style='display:none'>$tit - $mb</span>";
						
						$funchh="cekRadioPaketTour($rnd,$nopaket,$i); ";
						$idradio="radio".$noradio."[$nopaket]";
						$optPilih="
						<input type=radio id=$idradio 
						name=chtrans xname=ch_$idp value='$nojenis,$harga[$i],$jn,$idp,$cat,$i,$rnd,$neg'  
						onclick=\"$funchh\" >";
						$t.="<td $sty>$optPilih USD $td</td>";
						

					}
					$c++;
				}
				$t.="</tr>";
				$br++;
			}
			$t.="</tbody>
			</table>
	";
	$t.="<br><br>
	Date of transportation: <input type=text class='d' name=tgltrans id=tgl_1 size=12 onchange='tampilkanBasketTour($rnd);'> 
	Quantity: ".um412_isicombo6("1,2,3","qty_1","tampilkanBasketTour($rnd);")."<br />
	";

	$nojenis=2;
	$jlhjenis=1;
	$jn="tour";
	$aw=hitungSkala([5,34,7,7]);
	 
	$t.= "
		 <strong><span style='font-size:12.0pt'>Tour Category</span></strong> <br />
	
	<br>
	<strong>Tour</strong>
	<table cellspacing='0' border=1 width='100%' class='tbtt'>
		<tbody>
			<tr>
				<td class=tdjudul style='width:$aw[0]%;text-align:center'>No</td>
				<td class=tdjudul style='width:$aw[1]%'>Tour Type</td>
				<td class=tdjudul style='width:$aw[2]%'>Prize/Pax</td>
				<td class=tdjudul style='width:$aw[3]%'>Date</td>
			</tr>
			
			";
			
			$br=1;
			$jbr=count($arh2);
			foreach($arh2 as $ar){
				$addtd="";
				if ($br==1) {
					$addtd="
					<td rowspan='$jbr' >
	Date of tour:<br> <input type=text class='d' name=tgltour id=tgl_2 size=12 onchange='tampilkanBasketTour($rnd);'> 
	<br>Quantity:<br>".um412_isicombo6("1,2,3,4,5,6,7,8,9,10","qty_2","tampilkanBasketTour($rnd);")."<br />
						
					</td>";
				}
				$nopaket++;
				$idp=500+$nopaket;
				$t.="<input type=hidden id=aidp[$nopaket] name=aidp[$nopaket] value=$idp>";
				$t.="<span id=stitle[$nopaket] style='display:none'>$ar[0]</span>";
				
				$funchh="cekRadioPaketTour($rnd,$nopaket,$i); ";
				$idradio="radio".$noradio."[$nopaket]";
				$optPilih="
						<input type=radio id=$idradio 
						xname=ch_$idp name=chtour value='$nojenis,$ar[2],$jn,$idp,$cat,$i,$rnd,$neg'  
						onclick=\"$funchh\" >";
						
				
				$t.="<tr>
				<td style='text-align:center'>$br</td>
				<td >$ar[0]<br>Time : $ar[1] WITA</td>
				<td >
				$optPilih
				USD $ar[2]</td>
				$addtd
				</tr>
				
				";
				$br++;
			}
			$t.="</tbody>
			</table>
	
	<br>
	<br>
	";
	$jlhpaket=$nopaket;
	$t.="
	<input type=hidden name=jlhpaket id=jlhpaket value='$jlhpaket'>
	<input type=hidden name=jlhjenis id=jlhjenis value='$jlhjenis'>
	";
	
	$funcIB="showInfoBayarTour";
	$showPmfSubmit=false;
	$page="regtour";
//	include "../registrasi/adm/payment-method-form-local.php"; 
	include $um_path."payment-method-form.v3.php"; 
	$t.=$pmf;
	

	$t.=um412_falr("
	Please be mind that this kind of booking is non refundable, thus detailed check is mandatory attempt before payment.<br />
	<br />
	 ".um412_isicombo6("C:I Agree;1","optagree","cekAgree($rnd);")." <br />","warning");
	
	$t.="
	<div style='display:none'>
		<input type=hidden name=matauang id=matauang_$rnd value='USD'>
		<input type=hidden name=transamount id=transamount_$rnd value='0'>
		<textarea type=hidden name=ketbasket1 id=ketbasket1_$rnd value=''></textarea>
		<textarea type=hidden name=ketbasket2 id=ketbasket2_$rnd value=''></textarea>
	</div>";
	
	//	$t.=rowITB3("<input type=submit value=submit name=submit class=buttonform1>|| "); 
	
	$t.="<div id='ttsubmit'><center>
	<input type=button  id='btnsub2' value='Continue'  class='btn btn-inof' onclick=\"alert('Please click Agree to continue');return false;\"><input type=submit  id='btnsub1' value='Continue'  class='btn btn-primary' style='display:none'>
	</center></div>";

	$t.="<br><br>"; 
	//$t.=fbe("awalEdit($rnd);");



			echo $t;
			?>
		
		<input type=hidden name=id value='<?=$id?>'>
		<input type=hidden value='<?=$opr?>' name=op>
		</form>
	</div>
</div>

<script>
//awalEdit(<?=$rnd?>);

<?php

echo $scriptBtsTgl;

?>
jumlahrp=0;
function cekRadioPaketTour(rnd,nopaket,noradio){
	//nopaket,nojenis,harga,noradio,jenis,cat,idp,rnd,neg
	mu=document.getElementById('matauang_'+rnd).value;
	
	useUSD=(mu=="USD"?1:0);
	
	if (nopaket==undefined) {
		jumlah=jumlahrp=0;
		try{
			document.getElementById('ttotalrp').innerHTML=(useUSD==1?"USD ":"IDR ")+jumlahrp;
		} catch(e) {}
		return;
	}
	
	namaradio="radio"+noradio+"["+nopaket+"]";
	vrd=document.getElementById(namaradio).value;
	ard=vrd.split(',');//$nojenis,$harga[$i],$jn,$idp,$cat,$i,$rnd,$neg
	harga=ard[1];
	jenis=ard[2];
	idp=ard[3];
	cat=ard[4];
	tit=document.getElementById("stitle["+nopaket+"]").innerHTML;
				
	//menghilangkan titik jika yang terakhir sama dengan sekarang paketsekarang=namaradio;
	//nilaisekarang=document.getElementById(namaradio).checked;
	
	namasekarang=namaradio;
	//alert(namasekarang+" - "+namaterakhir[nopaket]);
	if (namasekarang==namaterakhir[nopaket]) {
		document.getElementById(namaradio).checked=(!nilaiterakhir[nopaket]);
		//tampilkan sembunyikan tabeldetail family program	
	}	
	
	nilaiterakhir[nopaket]=document.getElementById(namaradio).checked;
	namaterakhir[nopaket]=namaradio;
	//menghilangkan titik jika jenis=symp
	jlhpaket=document.getElementById('jlhpaket').value;
	jlhjenis=document.getElementById('jlhjenis').value;
	for (x=1;x<=jlhpaket;x++) {
		jlhharga=1;//document.getElementById('jlhharga_'+x+'').value;
		for (y=1;y<=jlhharga;y++) { 
			rd="radio"+y+"["+x+"]";
		
			vrd=document.getElementById(rd).value;
			ardi=vrd.split(",");
			vcat=ardi[4];
			vjenis=ardi[2];
			
			//menghapus check jika chedked dan jenis sympo
			if (document.getElementById(rd).checked){
				if ((namaradio!=rd) && (!document.getElementById(rd).disabled)) {
					//alert(vrd+':'+vjenis+'/'+jenis+'/');
					dc=false;
					if ((vcat==cat) && (cat!='') ) 
						dc=true;
					else if ((namaradio!=rd) && (( (vcat.indexOf(cat)>=0)&& (cat!='')) ||((cat.indexOf(vcat)>=0)&& (vcat!='')) )  ) 
						dc=true;
					else if ((vjenis==jenis) && ((vjenis.toLowerCase()=='symposium')||(vjenis.toLowerCase()=='simposium')) ) 
						dc=true;
	
					if (dc) document.getElementById(rd).checked=false;
				}
			}		
		}
	}
	tampilkanBasketTour(rnd,'-',3);			
}

function tampilkanBasketTour(rnd,t,ver,page){
	if (page==undefined) page='reg';
	
	hitungHargaFixTour(rnd,3);
	bpaket=$("#tbasketpaket_"+rnd).html();
		
		
	b='';
	if (bpaket!='') b=b+(b!=''?';':'') +bpaket;
	basket=b;
	
	//alert("b> "+basket);
	
	hitungTambahanBasket(rnd,3);
 	s=konversiBasket(rnd,3);
	//alert(s);
	$("#ketbasket1_"+rnd).val(basket);
	$("#ketbasket2_"+rnd).val(s);
	$("#transamount_"+rnd).val(jumlahrp);
	$("#tcartc_"+rnd).html(s);
	$("#tcartc_"+rnd).css("top",screen.height);
	$("#tttotfeex_"+rnd).html(s);	
}

function hitungHargaFixTour(rnd,ver){
	jlhpaket=document.getElementById('jlhpaket').value;
	jlhjenis=document.getElementById('jlhjenis').value;
	mu=document.getElementById('matauang_'+rnd).value;
	try {
		pmfr=document.getElementById('pmethod1000').checked?1:0;
	} catch(e) { 
		pmfr=0; 
	}
	
	usd=kurs;
	useUSD=(mu=="USD"?1:0);
	b="";
	subtot=new Array(0,0,0,0,0,0);
					
	jumlahrp=0;
	jumlah=0;
	jumlahUSD=0;
	for (x=1;x<=jlhpaket;x++) {
		jlhharga=1;//document.getElementById('jlhharga_'+x+'').value;
		for (y=1;y<=jlhharga;y++) { 
			rd="radio"+y+"["+x+"]";
			vrd=document.getElementById(rd).value;
			//alert(document.getElementById(rd).checked);
			if (document.getElementById(rd).checked) {
				ard=vrd.split(",");
				idp=ard[3];
				nojenis=ard[0];
				jen=ard[2];
				
				//q=$("#q_"+idp+"_"+rnd).val()*1;
				q=$("#qty_"+nojenis+"_"+rnd).val()*1;
				console.log("#qty_"+nojenis+"_"+rnd+" : "+q);
				hrg=ard[1];
				
				subtot[nojenis]+=(hrg*q);	
				//if (hrg<1000) {
				tit=document.getElementById("stitle["+x+"]").innerHTML;
				tit=tit.replaceAll(",","#koma#");//title
				hrgawal=hrg;
				if (useUSD=='1') {
					//useUSD=true;
					//alert(hrg);
					hrg*=usd;
					jumlahUSD+=hrg*1*q;
					xq=q+" "+(nojenis==1?"unit":"pax");
					tgl=$("#tgl_"+nojenis).val();
					tit+=" - "+tgl;
					
					tit+=" ("+xq+" @USD "+hrgawal+")";
				
				}
				
				cc=hrg*q;//*(useUSD=='1'?usd:1);
				
				jumlah+=cc;				
				if (b!='') b+=";";
				//title,hrg,qty,subtot,hrgusd,idpaket
				b+=tit +","+hrg+","+q+","+cc+","+idp+","+hrgawal+","+jen;
			}
		}
	}
	//}	
	
	jumlahrp+=jumlah;//*usd;	//menggunkan coinmill.com
	 jx="";
	 jx+="Rp. "+jumlahrp;
	 jx+=(useUSD=='1'?' (USD '+jumlahUSD+')':'') ;
	 //b=b.replaceAll("#koma#",",");
	$("#tbasketpaket_"+rnd).html(b+' ');
 	return;
	
}

function showInfoBayarTour(no,rnd,page){
	//alert(no);
	$(".tinfobayar").css('display','none');
	$("#tinfobayar"+no).css('display','block');
	$("#pmethod"+no).attr('checked','checked');
	os=$('#reg_'+rnd).attr("onsubmit");
	if ((no==1)||(no==1321)||(no==1532)) {
		$('#tsubmit').val('Submit');
		os=os.replace("cekSubmitReg","ajaxSubmitAllForm");
	} else	{
		$('#tsubmit').val((lang=='id'?'Lanjut ke Halaman Pembayaran':'Continue'));
		//os=os.replace("ajaxSubmitAllForm","cekSubmitReg");
	}
	$('#reg_'+rnd).attr("onsubmit",os);
	tampilkanBasketTour(rnd,"",3);
	
	return false;

	
}

function cekAgree(rnd) {
	ag=$("#optagree_"+rnd).val();
	 
	if (ag==1) {
		$("#btnsub2").hide();
		$("#btnsub1").show();
	} else {
		$("#btnsub1").hide();
		$("#btnsub2").show();
		
	}
}
</script>