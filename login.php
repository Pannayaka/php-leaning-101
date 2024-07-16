


<?php 
include("koneksi.php");

if(isset($_SESSION['login'] )){
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
	
$title = "login";


?>



<?php include 'template/head.php'; ?>
    <div class="row justify-content-center mt-5">
    	<div class="col-md-3 mt-5">
    		<div class="card">
	  		<div class="card-body">
	    		<h5 class="card-title">Login Account</h5>
		    		<form action="" method="POST">
					<div class="mb-3">
		  				<label for="formGroupExampleInput" class="form-label">Email</label>
		  				<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email" name="email">
					</div>
					<div class="mb-3">
		  				<label for="formGroupExampleInput2" class="form-label">Password</label>
		  				<input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Password"name="password">
					</div>
					<button type="submit" class="btn btn-outline-primary">Login</button>
				</form>
	  		</div>
	  		<div class="card-footer">
	  			<a href="register.php" class="btn btn-outline-success">Register</a>
			</div>
		</div>
	</div>
    	</div>
    	
<?php include 'template/foot.php'; ?>