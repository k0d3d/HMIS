<?php

include('db_config.php');

//Connect to database
mysql_connect($db_host, $db_user, $db_password);
mysql_select_db($db_table);

$doctorcommentsb = mysql_real_escape_string($_POST['doctorcommentsb']);
$id = (int)$_POST['id'];

//save contents to database
mysql_query("UPDATE `patients` SET doctorcommentsb = '$doctorcommentsb' WHERE id = '$id'");


?>