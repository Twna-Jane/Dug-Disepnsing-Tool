<!DOCTYPE html>
<html>
<head>
	<title>Search Prescriptions for:</title>
	<link rel="stylesheet" href="searchprescriptions.css">
</head>
<body>
<a href="../Pharmacist/PharmacyHome.php">Back to Home</a>
<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">
	
</form>
		<br><br><br>
		<table>
			<thread>
				<tr>
					<th>PrescriptionID</th>
					<th>DrugID</th>
					<th>DoctorID</th>
					<th>PatientID</th>
					<th>Name</th>
					<th>Prescription</th>
				</tr>
			</thread>
			<tbody>
<?php
	include('../connect.php');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sql = "SELECT PrescriptionID,DrugID,DoctorID,prescriptions.PatientID,Name,Prescription
    FROM `prescriptions`, `patients` WHERE Name = '$str'";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc())
	{
		?>

			<?php
			echo"
			<tr>
				<td>$row[PrescriptionID]</td>
				<td>$row[DrugID]</td>
				<td>$row[DoctorID]</td>
				<td>$row[PatientID]</td>
				<td>$row[Name]</td>
				<td>$row[Prescription]</td>
			</tr>
			";
}
}
?>
		</tbody>
	</table>
</body>
</html>
	
