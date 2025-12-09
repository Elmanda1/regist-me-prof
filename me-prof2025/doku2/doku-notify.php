<?php
$useJS=2;
$notificationHeader = getallheaders();
$notificationBody = file_get_contents('php://input');

include_once "conf.php";
include $doku_path."doku-notify.php";
?>