<?php  
include("koneksi.php");
if (!$_SESSION['login']){
	header('Location:login.php');
}
// var_dump($_SESSION['login']);

$id = $_GET['id'];


$selectUser = mysqli_query($db, "SELECT * FROM users WHERE email='".$id."'");

$data = mysqli_fetch_array($selectUser);

//var_dump($data)



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="row justify-content-center mt-5">
    	<div class="col-md-3 mt-5">
    		<div class="card">
	  		<div class="card-body">
	    		<h5 class="card-title">Edit User Data</h5>
	    		<?php if (@$_SESSION['failed']): ?>
	    			<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						<?php echo $_SESSION['failed'] ?>
  						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
	    		<?php endif ?>
		    		<form action="updateuser.php" method="POST">
					<div class="mb-3">
		  				<label for="formGroupExampleInput" class="form-label">Email</label>
		  				<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email" value="<?=$data['email'] ?>" name="email">
					</div>
					<div class="mb-3">
		  				<label for="formGroupExampleInput" class="form-label">Name</label>
		  				<input type="text" class="form-control" id="formGroupExampleInput" placeholder="name" value="<?=$data['name'] ?>" name="name">
					</div>
					<button type="submit" class="btn btn-outline-primary">Save</button>
				</form>
	  		</div>
		</div>
	</div>
    	</div>

    	<?php  

    	unset($_SESSION['failed']);

    	?>
    	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>