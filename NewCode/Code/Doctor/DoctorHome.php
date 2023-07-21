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
	<link rel="stylesheet" href="doctorhome.css">
</head>
<body>
	<p>Logged in as <?php echo $user_data['Name']; ?></p><a href="../logout.php">Logout</a><br><br>
	<center>
	<a href="../DoctorsView/ViewPatients.php">View Patients</a><br><br>
	<a href="../DoctorsView/SearchPatients.php">Search Patients</a><br><br>
	</center>
</body>
</html>
