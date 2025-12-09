<?php
if ($op=='') $op="showtable";
if (($userid=='Guest') && ($op=='showtable')) {
	include "report-hack.php";
	die();
}

if ($op=='gen') {
	//generate field
	$afd=array();
	$sfd="";
	$i=0;
	$result="";
	$h=mysql_query("select * from $nmTabel where 1=2");
	$nmFld2=$srCek="";
	while ($i < mysql_num_fields($h)) {$meta = mysql_fetch_field($h);
		$nmfield=$meta->name;
		$afd[]=$nmfield;
		$sfd.=($sfd==''?'':',').$nmfield;
		
		if ($i==0) 
			$result.='$i=0;<br>$gGroupInput[$i]=\'nmTabel\';<br>$sAllField="";';
		else
			$result.='$i++;';
		if ($i==1) $nmFld2=$nmfield;//menentukan field2
		$result.='	$sAllField.="'.($i>0?'#':'').$i.' |'.$nmfield.'			|'.strtoupper($nmfield).'			|40|1|1|1		|50|C|4";<br>';	
		
		$srCek.="	if ($".$nmfield."=='') $"."pes.='*. ".strtoupper($nmfield)." tidak boleh kosong'; <br>";

		$i++;
	}
	
	$result.="
	$"."isiComboFilterTabel=\"$nmFld2;$nmTabel.$nmFld2\";<br>
	$"."identitasRec='rc$nmTabel';<br>
	$"."configFrmInput='width:700,height:600';<br>
	$"."folderModul='m"."$det';<br>
	$"."nfReport=\"$"."folderModul/showtable.php\";

	
	
	";
	echo $result;
	
	// |40|1|1|1|50|C|4 : field|caption|lebarinput|showinput|update|showtable|lebartb|rata|cekking
	/*
	//cekking data
	if (strstr('|cek|tb|ed|','|$"."op|')!='') {<br>
		$"."pes='';<br>
		$srCek<br>
		echo $"."pes;<br>
		if (strstr('|cek|','|$op|')!='') exit;<br>
	}<br>
	*/

	exit;
}

$aAllField=explode("#",$sAllField);
$jlhField=count($aAllField);

$aField=$aFieldCaption=$aLebarFieldInput=$aShowFieldInInput=array();
$aFieldSpecial=$aUpdateFieldInInput=$aShowFieldInTable=$aLebarFieldTabel=$aRataFieldTabel=$aCek=array();
$i=0;
$jLebar=0;
foreach($aAllField as $aa){
	$aDetField=explode("|",$aa."||||||||||||||||||");
	array_push($aFieldSpecial,trim($aDetField[0]));
	array_push($aField,trim($aDetField[1]));
	array_push($aFieldCaption,trim($aDetField[2]));
	array_push($aLebarFieldInput,trim($aDetField[3]));
	array_push($aShowFieldInInput,trim($aDetField[4]));
	array_push($aUpdateFieldInInput,trim($aDetField[5])*1);
	array_push($aShowFieldInTable,trim($aDetField[6]));
	array_push($aLebarFieldTabel,trim($aDetField[7])*1);
	array_push($aRataFieldTabel,(trim($aDetField[8])=='C'?"center":(trim($aDetField[8])=='R'?"right":"left")));
	array_push($aCek,trim($aDetField[9]));
	
	
	if ($aShowFieldInTable[$i]==1)$jLebar+=$aLebarFieldTabel[$i];
	$i++;
}

//judul table
$jdlTabel="<tr>";
if ($showNoInTable) $jdlTabel.="<td class=tdjudul style='width:30px' width=30 >No.</td>";

//echo "op $op";exit;
$aLebarFieldTabel=hitungSkala($aLebarFieldTabel,$maxUkuran=900);

//$sFld="";
$jLebar=0;
for	($i=0;$i<$jlhField;$i++) {
	if ($aShowFieldInTable[$i]<>'0'){
		$jLebar+=$aLebarFieldTabel[$i];
		$jdlTabel.="<td class=tdjudul width='".$aLebarFieldTabel[$i]."'>$aFieldCaption[$i]</td>";
	}
}

//echo $sFld;
if ($levelOwner>=2) $jdlTabel.="<td class=tdjudul style='width:70px' width=70>Action</td>";
$jdlTabel.="</tr>";



if (strstr("|cek|tb|ed|","|$op|")!='') {
	$pes="";$i=0;
	foreach ($aField as $jFld) {
			$xCek=explode(",",$aCek[$i].",0,0,0,0");
			
			if (isset($_REQUEST[$jFld])) 
				$vv=$_REQUEST[$jFld];
			else
				eval("$"."vv=$"."$jFld;");
				
			if ($xCek[0]=='0') {
				//g perlu validasi
			///} else if ($xCek[0]=='I') {//numeric
			//	if (!is_integer($vv)) $pes.="*. $aFieldCaption[$i] harus angka bulat";
			//} else if ($xCek[0]=='N') {//numeric
			//	if (!is_real($vv)) $pes.="*. $aFieldCaption[$i] harus angka";
			} else if ($xCek[0]=='E') {//email
				if (!validasiEmail($vv)) $pes.="*. Format $aFieldCaption[$i] Salah";
			} else if ($xCek[0]=='F') {//file
				if ($id*1==0) {
					if ($_REQUEST["x".$jFld]=='') {
						if ($xCek[1]==1) $pes.="*. ".$aFieldCaption[$i]." tidak boleh kosong";
					} else {
						$batasukuran=$xCek[2];
						//$pes.="<br> batas $batasukuran";
						if ($batasukuran!=0) { //batas ukuran
							$aketfile=explode(",",$_REQUEST["x".$jFld]);
							$ukuran=$aketfile[0]*1/1024; //dalam kb
							//$pes.=" - ukuran $ukuran <br>";
							if ($ukuran>$batasukuran) {
								$tinfo="info".rand(12341,542411);
								$pes.="*. Ukuran ".str_replace("Upload ","",$aFieldCaption[$i])." > $batasukuran kb.  
							<span id='$tinfo' style='display:none'></span>Info Resize: 
							<a href=# onclick=\"bukaAjaxD('$tinfo','index2.php?det=page&nohead=1&idpage=79&contentOnly=1&showlatest=2','width:900');return false\">klik di sini</a> ";
							}
						}
						elseif (($jFld=="sertifikat_nf") && ($_REQUEST["x".$jFld]=='') &&($sabuk!='Putih')) {
							$pes.="*. ".$aFieldCaption[$i]." tidak boleh kosong";
						}
					}	
				}
			} else {
			
				if (strlen($vv)==0){
					$pes.="*. ".$aFieldCaption[$i]." tidak boleh kosong";
				} 
			}
		$i++;
	}
	if ($addCek) $pes.=$addCek;
	$pes=str_replace("*. ","<br><span class=important>&nbsp;</span>",$pes);
	
	if (strstr("|cek|","|$op|")!='') {
			echo $pes;
			exit;  //jika bukan operasi cek
	}
} 
if ($op=='tb') {
	//echo "gimana .....";
	//khusus mp, kode autoincremen
	cekVar("jenis");
	$jns=$jenis;
	$sfld=$sfldu="";
	$br=0;
	foreach ($aField as $nmField) {
		if ($aUpdateFieldInInput[$br]==1){
			if (isset($_REQUEST[$nmField])) 
				$vv=$_REQUEST[$nmField];
			else
				eval("$"."vv=$"."$nmField;");
				
			if ($sfld!='') {
				$sfld.=",";		
				$sfldu.=",";		
			}
			if ((strpos(" ".$nmField,"tgl")>0)||(strpos(" ".$nmField,"tanggal")>0))  {
				$vv=$_REQUEST[$nmField]=tgltoSQL($_REQUEST[$nmField]);
				//echo "<br>tgl :".$_REQUEST[$nmField];
				
				}			
			$sfldu.="$aField[$br]";	
			$sfld.="'".$vv."'";	
		}
		$br++;
	}

	$sfldu.=$addSave1;
	$sfld.=$addSave2;

	$sqinsert="insert into $nmTabel($sfldu) values ($sfld)";
	//echo $sqinsert."<br>";
	$h=mysql_query($sqinsert);
	$idRecord=$id=mysql_insert_id();
	if ($h) {
		if ($komentarTb=='') $komentarTb="<div class=titlepage>Penambahan $nmCaptionTabel Berhasil...$sqinsert</div>";
		echo "$komentarTb $linkBack";
		//echo "<br>$sqinsert";
	}
	else echo " error : $sqinsert";
	//.$sqinsert;
	
} elseif ($op=='ed') {
	$sfld="";
	$br=0;
	foreach ($aField as $nmField) {
		if ($aUpdateFieldInInput[$br]==1){
			if (isset($_REQUEST[$nmField])) 
				$vv=$_REQUEST[$nmField];
			else
				eval("$"."vv=$"."$nmField;");
				
			if ($sfld!='') $sfld.=",";
			if ((strpos(" ".$nmField,"tgl")>0)||(strpos(" ".$nmField,"tanggal")>0))  { $vv=tgltoSQL($vv); }
			$sfld.="$nmField='".$vv."'";	
		}
		$br++;
	}
	$sfld.=$addSave3;
	
	if ($sfld!='') {
		$sq="update $nmTabel set $sfld where $nmTabel.$nmFieldID='$id' ";// and $sySecureShowTable
		$idRecord=$id;
		$h=mysql_query($sq);
		//echo "<br>".$sq;
		if ($komentarEd=='') {
			$komentarEd="Update data $nmCaptionTabel Berhasil...";
			echo "<div class=titlepage>$komentarEd</div>";//$linkBack	
		}
	}
	//echo $sq;
	//$op=$_REQUEST['op']='showtable';
} elseif ($op=='del') {
	
	$sq="delete from $nmTabel where $nmTabel.$nmFieldID='$id'";
	$h=mysql_query($sq);
	if ($nmTabelDet!='') {
		$sq="delete from $nmTabelDet where $nmTabel.$nmFieldIDDet='$id'";
		//$h=mysql_query($sq);
	}	//echo $sq;
	if ($komentarHp=='') {
		$komentarHp="<div style='display:none'>-ok-</div>Penghapusan data $nmCaptionTabel Berhasil...";
	}
	echo "<div id=idt"."$rnd style='display:none'>$"."('#$idt').hide();</div>";
	echo "<div class=titlepage id='tfae"."$rnd'>$komentarHp</div>";
	
}
elseif ($op=='itb') {
	$newop=($id*1==0?'tb':'ed');
	if (!isset($judulInput))	$judulInput= "Input Data $nmCaptionTabel";
	$sq="Select * from $nmTabel ";
	if ($id!='') {
		$sq.=" where $nmFieldID='$id' ";
	} else 
		$sq.=" where 1=2 ";
	$r=array();
	
	extractRecord($sq);
	//jika form dibuka menggunakan dialog, maka setelah sukses dialog ditutup
	cekVar('addfae');
	$funcAfterEdit=$addfae;
	cekVar("tdialog");
	if ($tdialog!='') {
		//$funcAfterEdit.="$('#$tdialog').dialog('close');";
		$funcAfterEdit.="$('.ui-dialog-content').dialog('close');";
	}
	if ($isAdmin) $funcAfterEdit.="$('#frmc').submit();"; 
	
	$asf="onsubmit=\"ajaxSubmitAllForm('$idForm','ts"."$idForm','$det','selesaiEdit($rnd)');return false;\" ";
	$t="";
	
	$t.="
	<div id=ts"."$idForm ></div>";
	$t.="<div name='tfuncAfterEdit' id='tfae"."$rnd' style='display:none' >$funcAfterEdit</div>";
	$t.="<form id='$idForm' action='$nfAction' method='Post' $asf style='border:2px solid #000;padding:15px;margin:0 0 5px 0;min-width:600px' >";
	$t.="<h2>Input $nmCaptionTabel</h2>$infoInput1<br>";
	$t.="<input type=hidden name=op id=op value='$newop'> ";
	$t.="<input type=hidden name='id' id='id' value='$id' >";
	$t.="<input type=hidden name='rndinput' id='rndinput' value='$rnd' >";
	$t.="<div class=titlepage>$judulInput</div>";
	$t.=($addInput0==""?"":$addInput0); 
	for ($i=0;$i<$jlhField;$i++) {
		$addrec=$addasteric="";;
		$nmField=$aField[$i];
		$nmFieldInput=$nmField.$rnd;
		eval('$vv=$'.$nmField.';');
		//echo "vv : $vv - $nmField ";
		$sty="";
		if ($aShowFieldInInput[$i]==0) $sty="style='display:none'";
		$cap=$aFieldCaption[$i];
		$special=$aFieldSpecial[$i];
		$xLebar=explode(",",$aLebarFieldInput[$i]);
		$xCek=explode(",",$aCek[$i].",0,0,0,0,0,0,0,0");
		
		if (substr($cap,0,1)=='-') {
			$t.="<tr class=troddform2><td colspan=2><hr style='width:770px'></td></tr>";
			$cap=substr($cap,1,100);
		}			
		if (($xCek[0]=='F') && ($xCek[1]!='0')){ 
			$addrec="require";
			//$addasteric="<span class=asteric>*</span>";
		} elseif ($xCek[0]!='0'){
			$addrec="require";
			//$addasteric="<span class=asteric>*</span>";	
		} else {
			$addrec=$addasteric="";;
		}			
		//echo "xc:$xCek[0] > ";
		eval("$"."vv=$".strtolower($nmField).";");
		if ($gFieldInput[$i]!='') {
			$gFieldInput[$i]=str_replace("-{","$"."r[",$gFieldInput[$i]);
			$gFieldInput[$i]=str_replace("}-","]",$gFieldInput[$i]);
			if (substr($gFieldInput[$i],0,4)=="$"."inp") 
				eval($gFieldInput[$i]);
			else 
				$inp=$gFieldInput[$i];
		}
		elseif ($xCek[0]=='T') {//textarea
			$inp="<textarea name=$nmField id=$nmFieldInput cols=80 rows=8 style='width:100%' >".$vv."</textarea> ";		
			if ($xCek[1]=='0') {
				//if (strstr($addf,"cleditor()")=="") $addf.="$.cleditor.defaultOptions.width = '100%';";
				//$addf.="$('#$nmFieldInput').cleditor();";
				$gFieldInputCap[$i]="-";
				$inp=$cap."<br>".$inp;
				$addf.="CKEDITOR.replace('$nmFieldInput', {
		'filebrowserImageUploadUrl': 'imgupload-config.php'
	});";
				//		'filebrowserImageUploadUrl': '$js_path"."ckeditor/plugins/imgupload.php'

			}
			
		} elseif ($xCek[0]=='F') {
			$inpf="";
			if ($xCek[2]=='I') $inpf.=" data-type='image' ";
			if ($xCek[3]!='0') $inpf.=" data-max-size='$xCek[3]' ";
			$inp="<input type=file name=$nmField id=$nmFieldInput  onblur=cekUpload('$nmFieldInput') 
			$inpf class='$addrec' ><input type=hidden name=x"."$nmField id=x"."$nmFieldInput >";
			
			if ($newop=='ed') {
				$rnd2=rand(128831,138381);
				$inp="<a href='#' onclick=\"t".$rnd2."$nmFieldInput.style.display='inline';
				l".$rnd2."$nmFieldInput.style.display='none';return false;\" id=l".$rnd2."$nmFieldInput >Edit?</a>
				<span id=t".$rnd2."$nmFieldInput style='display:none'>$inp</span>";
			}
		} 
		elseif ((strpos(" ".strtolower($nmField),"tgl")>0)||(strpos(" ".strtolower($nmField),"tanggal")>0))  {
			$vv=SQLtotgl($vv);
			$inp="<input type=text name=$nmField id='$nmFieldInput' value='".$vv."' size='10' class='$addrec' > dd/mm/yyyy ";
			$addf.="$('#$nmFieldInput').datepicker();";
		} else {	
			//$vv=$r[strtolower($nmField)];
			if (($vv=='') && ($isTest)) $vv="t$nmField";
			$inp="<input type=text name=$nmField id=$nmFieldInput value='".$vv."' size='$aLebarFieldInput[$i]' class='$addrec' > ";
		}
		
		//$t.="<tr class=troddform2 $sty id='tritb[".$i."]'> <td class=tdcaption style='width:120px' valign=top>$cap</td> <td $addrec>$inp $addasteric</td></tr>";
		//$t.="<dl id='tritb[".$i."]' ><dt $addrec >$cap</dt> <dd $addrec>$inp $addasteric</dd></dl>";
		if ($gGroupInput[$i]!='') $t.="<div id=gri[$i] class=groupinput>$gGroupInput[$i]</div>";
		
		$addstylecap="";
		if (strstr($special,"cap")!='') {
			$scap=strstr($special,"cap");
			$scl=strpos($scap,",")-2;
			$addstylecap="style='".substr($scap,3,$scl-1)."'";
		} //id='tritb[".$i."]' 
		
		if ($inp!='-') {
			$t.="<div  id='tr"."$nmField'  class='dl' $sty >";
			
			$t.=($gFieldInputCap[$i]=='-'?'':"<div class='dt' $addstylecap>$cap </div>");
			$t.="<div class='dd' >$inp $addasteric</div>";
			$t.="</div>";
		}
	}
	
	$t.="<br>$addInput<br><br>";
	$t.="<p style='text-align:right'><input type=submit value='Submit' class=button ></p>";
	
//	if ( ($isAdmin) && ($id==0) ) $t.="<br><br><a CLASS=button href=# onclick=\"bukaAjax('maincontent','$hal".$addParamAdd."');return false;\">KEMBALI</a>";
	$t.="</form>";
	
	//$addf.="$('.hasDatepicker').datepicker();";
	$t.="<div id=tfbe"."$rnd name='function before edit' style='display:none'>
		$addf
		</div>";

	$t="
	<table border='0' width='100%'>
	<tr><td valign=top >$t</td></tr>
	</table>
		";

	echo $t;
	//exit;
}

if ($op=='showtable') {
	$nfr="showtable-default.php";	
	if ($nfReport!="") {
		if (file_exists($nfReport)) $nfr=$nfReport;	
	}
	include $nfr;
}

?>