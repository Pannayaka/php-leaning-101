<?php 
include("../koneksi.php");
if (!$_SESSION['login']){
	header('Location:../login.php');
}

$itemid = $_GET['id'];

$title = "add items";
if (isset($_POST['item_name'])) {
	$name = htmlspecialchars($_POST['item_name']);
	$price = htmlspecialchars($_POST['item_price']);
	$stock = htmlspecialchars($_POST['item_stock']);
	$category = htmlspecialchars($_POST['item_category']);
	$userid = $_SESSION['login']['id_user'];
	$date = date("Y-m-d H:i:s");
	$inputproduct = mysqli_query($db, "UPDATE items SET item_name = '$name', item_price = '$price', item_stock = '$stock', item_category = '$category', item_insert_at ='$date', item_user_id = '$userid' WHERE item_id = '$itemid'");
	if ($inputproduct == true) {
		header('Location:index.php');
	exit();
}

}


$dataa = mysqli_query($db, "SELECT * FROM items WHERE item_id = '$itemid'");
$row = mysqli_fetch_array($dataa);



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

			<form  method="POST" action="" class="row gy-1 gx-2 align-items-center mt-5 ">
			  <div class="col-auto">
			    <label class="visually-hidden" for="autoSizingInput">Item Name</label>
			    <input type="text" class="form-control" id="autoSizingInput" placeholder="Item Name" value="<?php echo $row['item_name']?>" name="item_name">
			  </div>
			  <div class="col-auto">
			    <label class="visually-hidden" for="autoSizingInputGroup">Item Price</label>
			    <div class="input-group">
			      <div class="input-group-text">Price $</div>
			      <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Price" name="item_price" value="<?php echo $row['item_price']?>" >
			    </div>
			  </div>
			  <div class="col-auto">
			    <label class="visually-hidden" for="autoSizingInputGroup">Item Stock</label>
			    <div class="input-group">
			      <div class="input-group-text">Stock</div>
			      <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Item Stock" name="item_stock" value="<?php echo $row['item_stock']?>" >
			    </div>
			  </div>

			  <div class="col-auto">
			    <label class="visually-hidden" for="autoSizingSelect">Preference</label>
			    <select class="form-select" id="autoSizingSelect" name="item_category" >
			      <option  value="">Select</option>
			      <option <?php echo ($row["item_category"] == "Phone")? "selected" : "" ?> value="Phone">Phone</option>
			      <option <?php echo ($row["item_category"] == "Laptop")? "selected" : "" ?>value="Laptop">Laptop</option>
			      <option <?php echo ($row["item_category"] == "Accessories")? "selected" : "" ?>value="Accessories">Accessories</option>
			    </select>
			  </div>
			  <div class="col-auto ml-5">
			    <button type="submit" class="btn btn-primary">Submit</button>
			  </div>
			  </div>
			</form>
