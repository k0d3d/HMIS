<?php
define('INCLUDE_CHECK',1);
include 'coreengine.php';

$rs_all = mysql_query("select timer from `waiting` WHERE `patientid` = '{$_GET["seek"]}'") or die(mysql_error());
$all = mysql_fetch_array($rs_all);
$timer = relativeTime($all['timer']);

echo "$timer";


	
	
?>
