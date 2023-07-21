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
	<link rel="stylesheet" href="adminhome.css">
</head>
<body>
	<p>Logged in as <?php echo $user_data['username']; ?></p>
	<a href="../logout.php">Logout</a><br><br>
	<center>
	<a href="../Drugs/Drugs.php">Drugs</a><br><br>
	<a href="../Patients/PatientCRUD.php">Patients</a><br><br>
	<a href="../Prescriptions/PrescriptionsCRUD.php">Prescriptions</a><br><br>
	<a href="../Doctor/DoctorCRUD.php">Doctors</a><br><br>
	<a href="../PharmaceuticalCompany/PCCRUD.php">Pharmaceutical Companies</a><br><br>
	<a href="../Pharmacist/PharmacyCRUD.php">Pharmacy</a>
	</center>
</body>
</html>
