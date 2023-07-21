<?php
session_start();
include('../connect.php');
include("functions.php");
$user_data = check_login($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="PChome.css">
</head>
<body>
	<p>Logged in as <?php echo $user_data['Name']; ?></p>
	<a href="../logout.php">Logout</a>
	<center><br><br>
	<a href="../Drugs/create.php">Add Drugs</a><br><br>
	</center>
</body>
</html>

