<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>Pharmacies</h2>
	<a href = "create.php">Create</a>
	<table class = "table">
		<thread>
			<tr>
				<th>PharmacistID</th>
				<th>PharmacyName</th>
				<th>Name</th>
				<th>Address</th>
				<th>PhoneNumber</th>
				<th>Password</th>
			</tr>
		</thread>
		<tbody>
			<?php
			include('../connect.php');
			

			$sql = "SELECT * FROM pharmacists";
			$result = $conn->query($sql);

			if(!$result){
				die("Invalid query: " . $conn->error);
			}

			while($row = $result ->fetch_assoc()){
				echo "
				<tr>
					<td>$row[PharmacistID]</td>
					<td>$row[PharmacyName]</td>
					<td>$row[Name]</td>
					<td>$row[Address]</td>
					<td>$row[PhoneNumber]</td>
					<td>$row[Password]</td>
					<td>
						<a href='edit.php?PharmacistID=$row[PharmacistID]'>Edit</a>
						<a href='delete.php?PharmacistID=$row[PharmacistID]'>Delete</a>
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