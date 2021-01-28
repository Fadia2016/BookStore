
<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'project';


$conn = new MySQLi($host, $user, $pass, $db_name);

if ($conn->connect_error){
	die('Database connrction error: ' . $conn->connect_error);
}






