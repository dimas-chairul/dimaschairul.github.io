<?php
$host = 'localhost';
$username = 'root'; 
$password = '';     
$db = 'db_tp_modul2'; 
$port = '3306';    

$conn = mysqli_connect($host, $username, $password, $db, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>