<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="viewpatients.css">
</head>
<body>
	<h2>Patients</h2>
	<table class = "table">
		<thread>
			<tr>
				<th>PatientID</th>
				<th>PatientSSN</th>
				<th>Name</th>
				<th>Address</th>
				<th>Age</th>
				<th>PrimaryPhysician</th>
			</tr>
		</thread>
		<tbody>
			<?php
			include('../connect.php');
			

			$sql = "SELECT 
			PatientID,
			PatientSSN,
			Name,
			Address,
			Age,
			PrimaryPhysician FROM patients";
			$result = $conn->query($sql);

			if(!$result){
				die("Invalid query: " . $conn->error);
			}

			while($row = $result ->fetch_assoc()){
				echo "
				<tr>
					<td>$row[PatientID]</td>
					<td>$row[PatientSSN]</td>
					<td>$row[Name]</td>
					<td>$row[Address]</td>
					<td>$row[Age]</td>
					<td>$row[PrimaryPhysician]</td>
					<td>
						<a href='PrescribeDrugs.php?PatientID=$row[PatientID]'>Prescribe Drugs</a>
					</td>
				</tr>
				";
			}
			?>
			
		</tbody>
	</table>
	<a href="../Doctor/DoctorHome.php">Back to Home</a>
</body>
</html>
