<?php 
include("../koneksi.php");
if (!$_SESSION['login']){
	header('Location:../login.php');
}
// var_dump($_SESSION['login']);

$selectUser = mysqli_query($db, "SELECT * FROM items");
$title = "add items";

?>



<?php include '../template/head.php'; ?>
<?php include '../template/menu.php'; ?>

		<div class="container">
          <?php if (@$_SESSION['sukses']): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['sukses'] ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php endif ?>

			<form class="row gy-1 gx-2 align-items-center mt-5 ">
			  <div class="col-auto">
			    <label class="visually-hidden" for="autoSizingInput">Item Name</label>
			    <input type="text" class="form-control" id="autoSizingInput" placeholder="Item Name">
			  </div>
			  <div class="col-auto">
			    <label class="visually-hidden" for="autoSizingInputGroup">Item Price</label>
			    <div class="input-group">
			      <div class="input-group-text">Price $</div>
			      <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Price">
			    </div>
			  </div>
			  <div class="col-auto">
			    <label class="visually-hidden" for="autoSizingInputGroup">Item Stock</label>
			    <div class="input-group">
			      <div class="input-group-text">Stock</div>
			      <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Item Stock">
			    </div>
			  </div>

			  <div class="col-auto">
			    <label class="visually-hidden" for="autoSizingSelect">Preference</label>
			    <select class="form-select" id="autoSizingSelect">
			      <option selected>Category</option>
			      <option value="1">One</option>
			      <option value="2">Two</option>
			      <option value="3">Three</option>
			    </select>
			  </div>
			  <div class="col-auto ml-5">
			    <button type="submit" class="btn btn-primary">Submit</button>
			  </div>
			  </div>
			</form>
