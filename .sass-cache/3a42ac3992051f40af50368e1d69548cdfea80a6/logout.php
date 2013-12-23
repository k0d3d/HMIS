<?php
define('INCLUDE_CHECK',1);
include 'coreengine.php';
session_start(); 
mysql_query("UPDATE user SET
			`lastvist` = '".date("U")."'
			 WHERE id='$_SESSION[user_id]'
			") or die(mysql_error());
unset($_SESSION['staff_id']);
setcookie("icookie", '', time()-60*60*24*60, "/");
header("Location: index.php");

?>
