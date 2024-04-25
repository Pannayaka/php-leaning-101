<?php  
include("koneksi.php");
if (!$_SESSION['login']){
	header('Location:login.php');
}
// var_dump($_SESSION['login']);

$id = $_GET['id'];


$selectUser = mysqli_query($db, "SELECT * FROM users WHERE email='".$id."'");

$data = mysqli_fetch_array($selectUser);

var_dump($data)



?>