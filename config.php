<?php

//Database config
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'rt');
define('DB_NAME', 'sae23');

$conn = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conn) {
	die("ERROR : Could not connect to database" .mysql_connect_error());
}
?>
