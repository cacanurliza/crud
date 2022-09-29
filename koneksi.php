<?php 

$server = "localhost";
$username = "root";
$password = "";
$dbname = "tes";
$kon = new mysqli($server, $username, $password, $dbname);
 
if($kon->connect_error) {
	die("Tidak Conect : " . $kon->connect_error);
}