<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>Doctors</h2>
	<a href = "create.php">Create</a>
	<table class = "table">
		<thread>
			<tr>
				<th>DoctorID</th>
				<th>DoctorSSN</th>
				<th>Name</th>
				<th>Speciality</th>
				<th>YOE</th>
				<th>Password</th>
			</tr>
		</thread>
		<tbody>
			<?php
			include('../connect.php');
			

			$sql = "SELECT * FROM doctors";
			$result = $conn->query($sql);

			if(!$result){
				die("Invalid query: " . $conn->error);
			}

			while($row = $result ->fetch_assoc()){
				echo "
				<tr>
					<td>$row[DoctorID]</td>
					<td>$row[DoctorSSN]</td>
					<td>$row[Name]</td>
					<td>$row[Speciality]</td>
					<td>$row[YOE]</td>
					<td>$row[Password]</td>
					<td>
						<a href='edit.php?DoctorID=$row[DoctorID]'>Edit</a>
						<a href='delete.php?DoctorID=$row[DoctorID]'>Delete</a>
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