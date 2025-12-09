<?php
$useJS==2;
include_once "conf.php";
//if (isset("targetpage")) {} else { $targetpage="maincontent";}
//$icn="<img src='edit.ico' >";

$icn="";

$cmenu  = array( 
	array('Guideline','*'),  
	array('My Profile','*'),
	array('My Group','*'), 
	array('Add Participant[s]',$toroot.'index.php?page=registrasi&contentOnly=1'), 
	array('Send Invoice','*'),
	array('Payment','*'),
	array('','')
);//Indonesian Cardiovascular Research Forum
//<a href=# onclick=\"bukaAjax('taddpart','group-secure.php?f=addparticipant&akhiri=0&showsubmit=1&ljp=$ljp'); 	return false;\"> 
?>

	 
<style>
 
ul#menuacc, 
ul#menuacc ul {
  list-style:none;
  text-indent:0px;
  margin-left: -38px;
  display: block;
  margin-top:0px;
  font-size:14px;
}


ul#menuacc li a, 
ul#menuacc li ul li a
{
	text-decoration:none;
	color:#FFF;
	display:block;
	width:180px;
	height:31px;
	line-height:31px;
	font:Arial, Helvetica, sans-serif;
}

ul#menuacc li a {
	background:url(img/bgmenu1.gif) #69F;
	margin:5px 0; 
}

ul#menuacc li a:hover{ 
	background:url(img/bgmenu1b.gif)  ;	
}

ul#menuacc li ul li a{
	background:url(img/bgmenusub1.gif);
	margin-left:-2px;
}
ul#menuacc li ul li a:hover{
	background:url(img/bgmenusub1b.gif);
}


ul#menuacc a.last {
	background:url(img/bgmenu1-last.gif);
}

ul#menuacc a.last:hover {
	background:url(img/bgmenu1b-last.gif);
}

 
</style>
        <!--[if lt IE 9]>
       <style type="text/css">
       li a {display:inline-block;}
       li a {display:block;}
ul#menuacc, ul#menuacc ul {
  margin-left: 3px;
  margin-top:0px;
}

       </style>
       <![endif]-->
	<ul id="menuacc">
	  <?php
   for ($ci=0;$ci<=5;$ci++) {
	if ($cmenu[$ci][0]=='') break;
	$mnclass='';
		
	 
	 $tgm='#';$onc="";   
	 
	if ($cmenu[$ci][1]!='#') {
		$tgm="index.php?page=page&nohead=1&pg=".urlencode($cmenu[$ci][0]);
		if ($cmenu[$ci][1]=='*') 
			$onc="index.php?f=".urlencode($cmenu[$ci][0]);
		else
			$onc=$cmenu[$ci][1];
		
		$onc=" onclick=\"bukaAjax('maincontent','$onc');return false; \" ";
	}
	echo "\n<li >";
	echo "\n<a href='#' $onc $mnclass ><span style='padding-left:10px'>$icn  ".($cmenu[$ci][0])."</span></a>";
	echo "\n</li >";
	
}
 
 echo "\n<li >";
	echo "\n<a href='index.php?f=Logout' ><span style='padding-left:10px'>$icn Logout</span></a>";
	echo "\n</li >";
	  ?>
	</ul>
 
 
 
<script>
function initMenu() {
  $('#menuacc ul').hide();
  $('#menuacc ul:first').show();
  $('#menuacc li a').mouseover(
    function() {
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
        return false;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
        $('#menuacc ul:visible').slideUp('normal');
        checkElement.slideDown('normal');
        return false;
        }
      }
    );
  }
$(document).ready(function() {
 initMenu();
});
</script>
 