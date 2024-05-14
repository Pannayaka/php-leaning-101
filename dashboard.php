<?php 
include("koneksi.php");
if (!$_SESSION['login']){
	header('Location:login.php');
}
// var_dump($_SESSION['login']);

$selectUser = mysqli_query($db, "SELECT * FROM users");


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main DashBy</title>
	<style>
.zui-table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
}
.zui-table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}

	</style>
</head>
<body>
	
</table>
</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div>  
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container">
            <a class="navbar-brand" href=""> 
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Apple_Computer_Logo_rainbow.svg/858px-Apple_Computer_Logo_rainbow.svg.png" width="26rem">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown link
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>  
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <?php  

    unset($_SESSION['failed']);
    unset($_SESSION['sukses']);
    ?>

  </body>
</html>



 