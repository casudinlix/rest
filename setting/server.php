<?php
$conn =new mysqli("localhost","cas","bintang","TA");
if (mysql_errno()) {
	die("ERROR!!".connect_error);
}

$url ="http://127.0.0.1/TA";
define( 'MAIN', dirname(__FILE__) );
?>