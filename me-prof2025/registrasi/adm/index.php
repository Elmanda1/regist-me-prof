<?php
$aul=0;
if ( isset($_REQUEST['aul']) ) $aul=$_REQUEST['aul'];

include_once  "conf.php"; 

//hapus data
include_once $um_path."res-paket-autodel.php";
include  $um_path."index-adm.php";

?>