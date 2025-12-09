<?php
$submenu[$i].=$separator;
$submenu[$i].="$he1 onclick=\"bAjax('$pa"."index.php?rep=registrasi&neg=id&contentOnly=1');return false;\" >Registrasi Local $he2";
$submenu[$i].="$he1 onclick=\"bAjax('$pa"."index.php?rep=registrasi&neg=en&contentOnly=1');return false;\" >Registrasi Foreign $he2";
$submenu[$i].="$he1 onclick=\"bAjax('$pa"."index.php?rep=editreg-daf&contentOnly=1');return false;\" >Perubahan Registrasi $he2";
$submenu[$i].="$he1 onclick=\"bAjax('$pa"."index.php?rep=speaker-daf&contentOnly=1');return false;\" >Speaker $he2";
$submenu[$i].="$he1 onclick=\"bAjax('$pa"."index.php?rep=regtour-daf&rekap=0&contentOnly=1');return false;\" >Lihat Registrasi Tour $he2";
$submenu[$i].="$he1 onclick=\"bAjax('$pa"."index.php?rep=regtour-daf&rekap=1&contentOnly=1');return false;\" >Rekap Registrasi Tour $he2";

$submenu[$i].=$separator;