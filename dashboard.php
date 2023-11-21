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
	<h1>SELAMAT DATANG YAY</h1>

	<a href="logut.php">LOGOUT</a>

	<table class="zui-table">
    <thead>
        <tr>
            <th>Number</th>
            <th>Email</th>
            <th>Input At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php foreach ($selectUser as $key => $value){ ?>
    		<tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value["email"] ?></td>
            <td><?php echo $value["input_date"] ?></td>
            <td>-</td>
        	</tr>
    	<?php } ?>
    </tbody>
</table>
</body>
</html>