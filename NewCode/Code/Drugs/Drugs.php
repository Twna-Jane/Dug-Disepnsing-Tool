<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="drugs.css">
</head>
<body>
	<h2>Drugs</h2>
	<a href = "create.php">Create</a>
	<table class = "table">
		<thread>
			<tr>
				<th>DrugID</th>
				<th>Name</th>
				<th>Formula</th>
				<th>PCID</th>
			</tr>
		</thread>
		<tbody>
			<?php
			include('../connect.php');
			

			$sql = "SELECT * FROM drugs";
			$result = $conn->query($sql);

			if(!$result){
				die("Invalid query: " . $conn->error);
			}

			while($row = $result ->fetch_assoc()){
				echo "
				<tr>
					<td>$row[DrugID]</td>
					<td>$row[Name]</td>
					<td>$row[Formula]</td>
					<td>$row[PCID]</td>
					<td>
						<a href='edit.php?DrugID=$row[DrugID]'>Edit</a>
						<a href='delete.php?DrugID=$row[DrugID]'>Delete</a>
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
