<?php
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="drugdispensarydatabase";

$conn = mysqli_connect($host, $user, $password, $dbname, $port, $socket);
	

//$con->close();
?>