<?php 

include("koneksi.php");

if(isset($_SESSION['login'])){
	header('Location:dashboard.php');
}


if (isset($_POST['email']) || isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repeatpassword = $_POST['passwordrepeat'];
	if ($repeatpassword != $password){
		echo "Password tidak sama";
		exit();
	}
	if (strlen($password) < 8){
		echo "Password Harus 8 Karakter atau Lebih";
		exit();
	}
	$selectUser = mysqli_query($db, "SELECT count(*) AS 'jumlah' FROM users WHERE email='$email'");
	$getUser = mysqli_fetch_array($selectUser);
	if ($getUser['jumlah'] > 0) {
		$_SESSION['verif'] = "Email Sudah Terdaftar";
		header('Location:register.php');
		exit();
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	$inputUser = mysqli_query($db, "INSERT INTO users (email, password, input_date) VALUES ('$email','$password', NOW())");
	if ($inputUser == true) {
		header('Location:register.php');
		exit();
	}

}
 ?>

 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="row justify-content-center mt-5">
    	<div class="col-md-3 mt-5">
    		<div class="card">
	  		<div class="card-body">
	    		<h5 class="card-title">Register Account</h5>
	    		<?php if (@$_SESSION['verif']): ?>
	    			<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						<?php echo $_SESSION['verif'] ?>
  						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
	    		<?php endif ?>
		    		<form action="" method="POST">
					<div class="mb-3">
		  				<label for="formGroupExampleInput" class="form-label">Email</label>
		  				<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email" name="email">
					</div>
					<div class="mb-3">
		  				<label for="formGroupExampleInput2" class="form-label">Password</label>
		  				<input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Password"name="password">
					</div>
					<div class="mb-3">
		  				<label for="formGroupExampleInput2" class="form-label">Repeat Password</label>
		  				<input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Password"name="passwordrepeat">
					</div>
					<button type="submit" class="btn btn-outline-primary">Register</button>
				</form>
	  		</div>
	  		<div class="card-footer">
	  			<h7>
	  				Already Have An Account?
	  			</h4>
	  			<a href="login.php">
			   Login Here.
				</a>
			</div>
		</div>
	</div>
    	</div>

    	<?php  

    	unset($_SESSION['verif']);

    	?>
    	
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>