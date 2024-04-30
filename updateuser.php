<?php 

include('koneksi.php');

$email = $_POST['email'];
$name = $_POST['name'];

$update = mysqli_query($db , "UPDATE users SET name = '".$name."' WHERE email ='".$email."'");
if ($update) {

	$_SESSION['sukses'] = "Update Confirmed.";
	header('Location:dashboard.php');
	exit();
}

$_SESSION['failed'] = "Update Failed.";
header('Location:dashboard.php');
exit();

 ?>