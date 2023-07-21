<!DOCTYPE html>
<html>
<head>
	<title>Search Patients</title>
	<link rel="stylesheet" href="searchpatients.css">
</head>
<body>
<a href="../Doctor/DoctorHome.php">Back to Home</a>
<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">
	
</form>

</body>
</html>

<?php
	include('../connect.php');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sql = "SELECT PatientID,PatientSSN,Name,Address,Age,PrimaryPhysician FROM `patients` WHERE Name = '$str'";
	$result = $conn->query($sql);

	if($row = $result->fetch_assoc())
	{
		?>
		<br><br><br>
		<table>
			<tr>
					<th>PatientID</th>
					<th>PatientSSN</th>
					<th>Name</th>
					<th>Address</th>
					<th>Age</th>
					<th>PrimaryPhysician</th>
			</tr>
			<tr>
			<?php
			echo"
				<td>$row[PatientID]</td>
				<td>$row[PatientSSN]</td>
				<td>$row[Name]</td>
				<td>$row[Address]</td>
				<td>$row[Age]</td>
				<td>$row[PrimaryPhysician]</td>
				
			</tr>

		</table>
			";
?>
<?php 
	}else{
			echo "Patient does not exist";
		}
}

?>
	
