<?php
define('DB_SERVER', $_SERVER['HTTP_HOST']);
define('DB_PORT', $_SERVER['SERVER_PORT']);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'micro');
$link = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD); 
if(!$link){
	echo 'Error connecting to database';
}
$select_db=mysql_select_db(DB_DATABASE,$link);



?>