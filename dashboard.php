<?php 
include("koneksi.php");
if (!$_SESSION['login']){
	header('Location:login.php');
}
// var_dump($_SESSION['login']);

$selectUser = mysqli_query($db, "SELECT * FROM users");
$title = "dashbaord";

?>



<?php include 'template/head.php'; ?>
<?php include 'template/menu.php'; ?>
    
    <div class="container">
    <a href="logut.php">LOGOUT</a>
          <?php if (@$_SESSION['sukses']): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['sukses'] ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php endif ?>
    <table class="zui-table">
        <thead>
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Input At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($selectUser as $key => $value){ ?>
                <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value["name"] ?></td>
                <td><?php echo $value["email"] ?></td>
                <td><?php echo $value["input_date"] ?></td>
                <td> 
                  <a href="edituser.php?id=<?php echo $value["email"] ?>">Edit</a>,
                  <form action="deleteuser.php" method="POST" onsubmit="return confirm('Are You Sure?')">
                    <input type="hidden" name="id" value="<?php echo $value["id_user"];  ?>">
                    <button type="submit">Delete</button>

                  </form>
                  

                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>

<?php include 'template/foot.php'; ?>
   

 