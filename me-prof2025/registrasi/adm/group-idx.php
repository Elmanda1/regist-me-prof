 <?php
//$useJS=2;
//$idxgroup=1;
//include_once "group-secure.php";
include_once "conf.php";
//include_once "style.php";
//echo "usejs $useJS";
//echo "-->".$isgroupLogin;

//if ($openAjax==2)	{ echo $pes; exit; }
//else
if ($isgroupLogin) {
		echo '
		 <div id=wrapper>
   			<table width=980>
		<tr><td width=200 style="background:#CCC" valign="top" align="center">';
		include "mnu-kiri.php"; 
		echo ' </td><td valign="top">
		<div id=maincontent>'.$pes.' </div> </td>
		</tr><tr>
		<td colspan=2>
		';
		//include "group-footer.php";
		
		echo '</td></tr></table>
		';
		
		
		echo '</div>
		';
} else { 
 	echo "
	<center> <div id=wrapper>
    	<div class=titlepage><center>Welcome to the $nmAcara Group Registration.</center></div>  
		<div id=maincontent>$pes</div>
		";
		
	//include "group-footer.php";
	echo "
	</div></center>";
} 


?>