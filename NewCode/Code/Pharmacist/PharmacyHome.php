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
	<link rel="stylesheet" href="pharmacisthome.css">
</head>
<body>
	<p>Logged in as <?php echo $user_data['Name']; ?></p>
	<a href="../logout.php">Logout</a><br><br>
	<center>
	<a href="../PharmacistView/ViewPrescriptions.php">View Prescriptions</a><br><br>
	<a href="../PharmacistView/SearchPrescriptions.php">Search Prescriptions</a><br><br>
	<a href="../PharmacistView/DispenseDrugs.php">Dispense Drugs</a><br><br>
	<a href="../PharmacistView/DispensedDrugsCRUD.php">Dispensed Drugs</a>
	</center>
</body>
</html>
