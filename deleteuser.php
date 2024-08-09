<?php 

include('koneksi.php');

$id = $_POST['id'];


$query = "DELETE FROM users WHERE id_user = ".$id.""
$delete = mysqli_query($db ,$query);

if ($delete) {

	$_SESSION['sukses'] = "Delete Succsessful.";
	header('Location:dashboard.php');
	exit();
}

$_SESSION['failed'] = "System Error.";
header('Location:dashboard.php');
exit();



 ?>