<?php

@session_start();
$systemOnly=true;//only registration

include $tohost."content/default-var.php";
 


	
$lib_path=$pt."lib/";
$um_path=$pt."lib/um412/um412reg/";
$nfl=$um_path."config-reg-v2.3.php";
if (file_exists( $nfl)) {
	include $nfl;
} else {
	die("cannot find config file ($nfl) ..., <br>please check your <font color='#f00'>".($isOnline?"online":"offline")."</font> configuration file.");
}
