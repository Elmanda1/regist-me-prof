<?php
//$sta=getConfig("topikabs");
//if (strlen(trim($stopikabs))<30) $stopikabs="Fetomaternal,Ginekologi Onkologi,Obstetri-Ginekologi Sosial,Uroginekologi,Fertilitas & Endokrinologi,Lain-lain";
//if (strlen(trim($stopikabs))<30) {

if (!isset($sTopicAbstract)) {
	$sTopicAbstract=array (
		array("Original Article","Introduction,Method,Result,Discussion"),
		array("Systematic Review","Introduction,Method,Result,Discussion"),
		array("Case Report","Introduction,Method,Result,Discussion"),
		array("EBCR","Introduction,Method,Result,Discussion")
	);
}
	$i=0;
	$sta=$jstopic="";
	$sbab=array();
	foreach($sTopicAbstract	 as $st) {
		$sta.=($sta==''?'':',').$st[0];
		$bab=$st[1];
		$sbab[]=$bab;
		$i++;
		$jstopic.=" 			
			if (t=='$st[0]') {
				sb='".str_replace(",","\\n\\n","$bab\\n")."';
			}
		";
	}
	
	$atopikabs=explode(",",$sta);
	$addjs="
	function gantiTopikAbs(rnd) {
		t=$('#topic_'+rnd).val();
		sb='';
		$jstopic
		$('#isi_'+rnd).val(sb);
	}	
";
//echo "idabs $id";
	
//"<input type=text name=namaabs id=namaabs_$rnd value='$namaabs'>"
if ($idabs=="") {
	$aau=explode(",","||||||||||||||");	
} else {
	$aau=explode("#",$author."||||");
}
	$jlhau=count($aau);
//tambahan untuk author
$isiSample="
				<div class='form-group'>
					<div class='col-sm-12' valign=top><hr><span style='margin-top:10px;font-weight:bold;font-size:14px'>".translate("Peneliti","Author")." xx</b></div>			
				</div>			
				<div class='form-group'>
					<div class='col-sm-4' valign=top>".translate("Nama","Name")."</div>
					<div class='col-sm-8' valign=top class=tdform2x>
						<span >
						<input type=text name=author[] id=author_$rnd"."[] size=30 value=''>
						</span>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-4' valign=top>".translate("Email Peneliti","Email")." </div>
					<div class='col-sm-8' valign=top class=tdform2x>
						<span >
						 
						<input type=text name=emauthor[] id=emauthor_$rnd"."[] size=60 value=''>
						</span>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-4' valign=top>".translate("Afiliasi 1","Affiliation 1")." </div>
					<div class='col-sm-8' valign=top class=tdform2x>
						<span >
						<input type=text name=af1author[] id=af1author_$rnd"."[] size=80 value=''>
						</span>
					</div>
				</div>
				
				<div class='form-group'>
					<div class='col-sm-4' valign=top>".translate("Afiliasi 2","Affiliation 2")." </div>
					<div class='col-sm-8' valign=top class=tdform2x>
						<span >
						<input type=text name=af2author[] id=af2author_$rnd"."[] size=80 value=''>
						</span>
					</div>
				</div>
				
				<div class='form-group'>
					<div class='col-sm-4' valign=top>".translate("Afiliasi 3","Affiliation 3")." </div>
					<div class='col-sm-8' valign=top class=tdform2x>
						<span >
						<input type=text name=af3author[] id=af3author_$rnd"."[] size=80 value=''>
						</span>
					</div>
				</div>
";
$tambahan="
			<input type=hidden name=jlhauthor id=jlhauthor_$rnd value=$jlhau >
			<div style='display:none' id=tsampleauthor_$rnd >
				$isiSample
				
			</div>
			<div id=taddauthor_$rnd> </div>
			<div class='form-group'>
				<div class='col-sm-4' valign=top>&nbsp;</div>
				<div class='col-sm-8' valign=top class=tdform2x>
					<span ><input type=button class='btn btn-sm btn-primary' value='".translate("Tambah peneliti","Add Author")."' onclick=\"
					h=$('#tsampleauthor_$rnd').html();
					jlh=$('#jlhauthor_$rnd').val()*1+1;
					$('#jlhauthor_$rnd').val(jlh);
					h=h.replaceAll('xx',jlh);
					$('#taddauthor_$rnd').append(h);
					\"></span>
				</div>
			</div>
			
<div class='form-group'>
	<div class='col-sm-12' valign=top class=tdform2x>
		<div class='subtitleform2'>PRESENTING AUTHOR</div>
	</div>
</div>
			";
			
$och0="hitungKata('title_$rnd','tjtitle_$rnd',$rnd)";
$och="hitungKata('isi_$rnd','tjlhkata_$rnd',$rnd)";
$afld=array();

$i=1;
foreach($aau as $au) {
	$dau=explode("|",$au);
	$capNama=translate("Nama","Name");//.($i==1?translate(" (Presenter) "," (Presenter)"):"");
	$afld[]=array( "author[]",$capNama."",array("text",30,1,$dau[0]),"");
	$afld[]=array( "emauthor[]",translate("Email","Email")." ",array("text",50,1,$dau[1]),"");
	$afld[]=array( "af1author[]",translate("Afiliasi 1","Affiliation 1")." ",array("text",60,1,$dau[2]),"");
	$afld[]=array( "af2author[]",translate("Afiliasi 2","Affiliation 2")." ",array("text",60,0,$dau[3]),"");
	$afld[]=array( "af3author[]",translate("Afiliasi 3","Affiliation 3")." ",array("text",60,0,$dau[4]),"");
	$i++;
}
$tempatTbAdd=$i;

	$afld[]=array( "namaabs",translate("Nama","Name"),array("text",50,1));
	$afld[]=array( "emailabs",translate("Email","Email"),array("text",50,1));
	$afld[]=array( "institusi",translate("Institusi","Institution"),array("text",45,1));
	$afld[]=array( "hpabs",translate("telp"),array("text",30,1));

    // New radio button group for "Topik Makalah Bebas"
    $makalah_bebas_topics = [
        "Obstetri dan Ginekologi Sosial",
        "Kedokteran Fetomaternal",
        "Onkologi Ginekologi",
        "Uroginekologi dan Rekonstruksi",
        "Fertilitas dan Endokrinologi Reproduksi"
    ];

    $radio_buttons_html = "";
    // The form uses the 'topic' field, so we check for the value in the '$topic' variable.
    $current_topic = isset($topic) ? $topic : ''; 

    foreach ($makalah_bebas_topics as $topic_option) {
        $radio_buttons_html .= "
            <div class='radio'>
                <label>
                    <input type='radio' name='topic' value=\"$topic_option\" " . ($current_topic == $topic_option ? "checked" : "") . " required>
                    $topic_option
                </label>
            </div>";
    }

    $afld[]=array( "topic",translate("Topik Makalah Bebas","Free Paper Topic")."<span class='harusisi'>*</span>", $radio_buttons_html );

	//$afld[]=array( "topic",translate("Jenis Artikel","Category"), um412_isiCombo6($sta,"topic","gantiTopikAbs($rnd)"));
	$afld[]=array( "title",translate("Judul Abstrak","Title"),"<input type=text size=75 value='$title' name=title id=title_$rnd onchange=$och0 onkeyup=\"return $och0;\" >
							<br>".translate("Jumlah Kata","Words count")." :<span id=tjtitle_$rnd></span> &nbsp;&nbsp;".translate("Maksimal 20 Kata","Max 20 words"));
	$afld[]=array( "isi",translate("Abstrak","Abstract"),"<textarea cols=100 rows=10 name=isi id=isi_$rnd onchange=$och onkeyup=\"return $och;\" >$isi</textarea>
	<br>".translate("Jumlah Kata","Words count")." : <span id=tjlhkata_$rnd style='font-weight:bold'>0 </span> &nbsp;&nbsp;".translate("300-600 Kata","300-600 words"));
	$afld[]=array( "keywords",translate("Kata Kunci","Keywords"),array("text",40,1),"".translate("(maksimal 3 kata kunci, dipisahkan dengan koma)","(max 3 keywords, separated by coma)")); 
if ($isAdmin) 	$afld[]=array( "idregabs",translate("Nomor Registrasi","Registration Number"),array("text",5,0),translate("(Isikan No. Registrasi jika sudah mendaftar sebagai peserta simposium)","(Please enter your registration number if you are already registered)"));
//	$afld[]=array( "jenis",translate("Kategori presentasi yang diinginkan","Prefered Presentation Category"),um412_isicombo5("R:Oral Presentation;0,Poster Presentation;1","jenis","","","-Choose One-",$jenis,"pilihJAbstract()"));


$frmAbs.="
 <div id=tstatus></div> 

 <div class='form-group'>
	<div class='col-sm-12' valign=top class=tdform2x>
		<div class='subtitleform2'>AUTHORS</div>
	</div>
</div>
<div class='form-group'>
	<div class='col-sm-12' valign=top><span style='margin-top:10px;font-weight:bold;font-size:14px'>".translate("Peneliti","Author")." 1</b></div>			
</div>	
";

$i=0;
foreach($afld as $fld) {	
	$isi="";
	if (is_array($fld[2])) {
		$aisi=$fld[2];
		if (!isset($aisi[3])) {
			$ev="$"."def=$"."$fld[0];";
		} else {
			$ev="$"."def=\"$aisi[3]\";";
		}
		eval($ev);
		if ($def=="$") $def="";
		//echo "<br>$fld[0] $ev hasil $def $namaabs>";
		$idfld=$fld[0]."_$rnd";
		if (strstr($fld[0],'[]')!="") {
			$idfld=substr($fld[0],0,strlen($fld[0])-2)."_$rnd"."[]";
		}
			
		$xisi="<input type=$aisi[0] name=$fld[0] id=$idfld size=$aisi[1] value='$def'>";
		if ($aisi[2]==1) $xisi.="<span class='harusisi'>*</span>";
			
		
	} else $xisi=$fld[2];
	if (isset($fld[3])) $xisi.=" ".$fld[3];
	
	$xid=str_replace("[]","",$fld[0]);
	$frmAbs.="
		<div class='form-group' id='fg$xid"."_$rnd' style='display:inline-block'>
			<div class='col-sm-4' valign=top>$fld[1]</div>
			<div class='col-sm-8' valign=top class=tdform2x>
				<span id=t$fld[0]>$xisi</span>
			</div>
		</div>
		";
	//tambahan khusus
	if ($i==($jlhau)*5-1) $frmAbs.=$tambahan;
	if ($i==($jlhau)*5+3) $frmAbs.=	" 
	<div class='form-group'>
		<div class='col-sm-12' valign=top class=tdform2x>
			<div class='subtitleform2'>ABSTRACT</div>
		</div>
	</div>
	";
	$i++;
}	
$inptkn.="&idabs=$idabs&rev=$rev";
$tkn=makeToken($inptkn);
$frmAbs.="
<input type=hidden name=ket>
<input type=hidden name=tkn value='$tkn'>
";
   
$frmAbs.="
<script>
	$('#keywords_$rnd').tagsInput({width:'auto',height:32});
	
	$addjs
</script>
<style>
.form-group {
	display:inline-block;
}
div.tagsinput {
	padding:1px 5px;
}
div.tagsinput span.tag {
	padding:0px 5px;
}
div.tagsinput input {
    margin: -5 5px 5px 0;
}

</style>

";
if (!isset($showFrmAbs)) $showFrmAbs=true;
if ($showFrmAbs) echo $frmAbs; 

?>