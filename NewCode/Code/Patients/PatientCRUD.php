<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>Patients</h2>
	<a href = "create.php">Create</a>
	<table class = "table">
		<thread>
			<tr>
				<th>PatientID</th>
				<th>PatientSSN</th>
				<th>Name</th>
				<th>Address</th>
				<th>Age</th>
				<th>PrimaryPhysician</th>
				<th>Password</th>
			</tr>
		</thread>
		<tbody>
			<?php
			include('../connect.php');
			

			$sql = "SELECT * FROM patients";
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
					<td>$row[Password]</td>
					<td>
						<a href='edit.php?PatientID=$row[PatientID]'>Edit</a>
						<a href='delete.php?PatientID=$row[PatientID]'>Delete</a>
					</td>
				</tr>
				";
			}
			?>
			
		</tbody>
	</table>
	<a href="../Admin/AdminHome.php">Back to Home</a><br><br>
</body>
</html>