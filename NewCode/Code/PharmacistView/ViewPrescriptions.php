<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="viewprescription.css">
</head>
<body>
	<h2>View Prescriptions</h2>
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
			include('../connect.php');
			

			$sql = "SELECT * FROM prescriptions";
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
	<a href="../Pharmacist/PharmacyHome.php">Back to Home</a>
</body>
</html>
