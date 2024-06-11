<?php  
include("koneksi.php");
if (!$_SESSION['login']){
	header('Location:login.php');
}
// var_dump($_SESSION['login']);

$id = $_GET['id'];


$selectUser = mysqli_query($db, "SELECT * FROM users WHERE email='".$id."'");
$title = "edit user";
$data = mysqli_fetch_array($selectUser);

//var_dump($data)



?>

<?php include 'template/head.php'; ?>
<?php include 'template/menu.php'; ?>

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
    	
<?php include 'template/foot.php'; ?>