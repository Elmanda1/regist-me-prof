<?php
include_once "conf.php";
include_once "regtour-conf.php";
cekvar("rep");

if ($rep=="regtour-opr") {
	include "regtour-opr.php";
} else {
	include "regtour-form.php";
	
}