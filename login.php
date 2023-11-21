<?php 
include("koneksi.php");

if(isset($_SESSION['login'])){
	header('Location:dashboard.php');
}


if (isset($_POST['email']) || isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$selectUser = mysqli_query($db, "SELECT * FROM users WHERE email='$email'");
	$dataUser = mysqli_fetch_array($selectUser);

	if ($dataUser == TRUE){
		$passBenar = $dataUser['password'];
		// var_dump($passBenar);
		// die;

		if (password_verify($password, $passBenar)){

			// echo "Berhasil Login";
 
			$_SESSION['login'] = $dataUser;

			header('Location:dashboard.php');

		}else {
			echo "Data Salah2";
		}
	}else {
		echo "Data Salah";
	}


	exit();									
}
	



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
</head>
<body>
	<div>
		<form action="" method="POST">
			<input type="text" name="email">
			<input type="password" name="password">
			<button type="submit"> LOGIN </button>
		</form>
	</div>
</body>
</html>