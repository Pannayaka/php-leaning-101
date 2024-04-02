<?php  
include("koneksi.php");
if (!$_SESSION['login']){
	header('Location:login.php');
}
// var_dump($_SESSION['login']);

var_dump($_GET['id']);

$selectUser = mysqli_query($db, "SELECT * FROM users");



?>