<?php
session_start();
include('../connect.php');
include("functions.php");

$user_data = check_login($conn);
$prescriptiondata = check_login($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="patienthome.css">
</head>
<body>
	<p>Logged in as <?php echo $user_data['Name']; ?></p>
	<a href="../logout.php">Logout</a><br><br>
	<center>
	<h2>Prescription Details</h2>
	<table class = "table">
		<thread>
			<tr>
				<th>PrescriptionID</th>
				<th>DrugID</th>
				<th>DoctorID</th>
				<th>PatientID</th>
				<th>Prescription</th>
			</tr>
		</thread>
		<tbody>
			<?php

			$sql = "SELECT * FROM prescriptions where PatientID='$user_data[PatientID]'";
			$result = $conn->query($sql);

			if(!$result){
				die("Invalid query: " . $conn->error);
			}

			while($row = $result ->fetch_assoc()){
				echo "
				<tr>
					<td>$row[PrescriptionID]</td>
					<td>$row[DrugID]</td>
					<td>$row[DoctorID]</td>
					<td>$row[PatientID]</td>
					<td>$row[Prescription]</td>
				</tr>
				";
			}
			?>
			
		</tbody>
	</table>
	<h2>Dispensed Drugs</h2>
	<table class = "table">
		<thread>
			<tr>	
				<th>TradeID</th>
				<th>PrescriptionID</th>
				<th>DrugID</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>PharmacistID</th>
			</tr>
		</thread>
		<tbody>
			<?php

			$sql = "SELECT * FROM dispenseddrugs where PrescriptionID = '$prescriptiondata[PatientID]';";
			$result = $conn->query($sql);

			if(!$result){
				die("Invalid query: " . $conn->error);
			}

			while($row = $result ->fetch_assoc()){
				echo "
				<tr>
					<td>$row[TradeID]</td>
					<td>$row[PrescriptionID]</td>
					<td>$row[DrugID]</td>
					<td>$row[Price]</td>
					<td>$row[Quantity]</td>
					<td>$row[PharmacistID]</td>
				</tr>
				";
			}
			?>
			
		</tbody>
	</table>
	</center>
</body>
</html>
