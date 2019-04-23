<?php
define('DB_SERVER','localhost');
//define('DB_SERVER','192.168.0.218');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'bdvitrine');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die('localhost connection problem'.mysql_error());
//mysqli_select_db(DB_NAME, $conn);
	



	
	
?>