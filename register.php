<?php 

include("koneksi.php");

if(isset($_SESSION['login'])){
	header('Location:dashboard.php');
}


if (isset($_POST['email']) || isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repeatpassword = $_POST['password2'];
	if ($repeatpassword != $password){
		echo "Password tidak sama";
		exit();
	}
	if (strlen($password) < 8){
		echo "Password Harus 8 Karakter atau Lebih";
		exit();
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	$inputUser = mysqli_query($db, "INSERT INTO users (email, password, input_date) VALUES ('$email','$password', NOW())");
	exit();

}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title> Register</title>
 </head>
 <body>

 	<form action="" method="POST">
	
	 	<label>email</label> <br>
	 	<input type="email" name="email"> <br>
	 	<label>password</label> <br>
	 	<input type="password" name="password"> <br>
	 	<label>repeat password</label> <br>
	 	<input type="password" name="password2"> <br>

	 	<button type="submit">REGISTER</button>
 		
 	</form>

 </body>
 </html>