<?php 
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_belajar";

$db = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysql_connect_error();
 exit();
}


$URL = 'http://localhost/php-leaning-101/';


// $seclectuser = mysqli_query($db, "SELECT * FROM users");
// $getuser = mysqli_fetch_array($seclectuser);
//var_dump($getuser);


// header('Content-Type: application/json; charset=utf-8');
// echo json_encode($getuser);

 ?>