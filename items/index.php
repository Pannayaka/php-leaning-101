<?php 
include("../koneksi.php");
if (!$_SESSION['login']){
	header('Location:../login.php');
}
// var_dump($_SESSION['login']);

$selectUser = mysqli_query($db, "SELECT * FROM items");
$title = "dashbaord";

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
          <a href=" <?php echo $URL ?>/items/add.php" class="btn btn-outline-success"> ADD ITEMS </a>
    <table class="zui-table mt-5">
        <thead>
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Category</th>
                <th>Date & Time</th>
                <th>Edit</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($selectUser as $key => $value){ ?>
                <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value["item_name"] ?></td>
                <td><?php echo $value["item_stock"] ?></td>
                <td><?php echo $value["item_price"] ?></td>
                <td><?php echo $value["item_category"] ?></td>
                <td><?php echo $value["item_insert_at"] ?></td>
                <td> 
                  <a href="edit.php?id=<?php echo $value["item_id"] ?>">Edit</a>,
                  <form action="delete.php" method="POST" onsubmit="return confirm('Are You Sure?')">
                    <input type="hidden" name="item_id" value="<?php echo $value["item_id"];  ?>">
                    <button type="submit">Delete</button>

                  </form>
                  

                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>

<?php include '../template/foot.php'; ?>
   

 