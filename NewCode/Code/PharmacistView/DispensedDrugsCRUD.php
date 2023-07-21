<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="dispensedrugscrud.css">
</head>
<body>
	<h2>Dispensed Drugs</h2>
	<a href = "DispenseDrugs.php">Create</a>
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
			include('../connect.php');
			

			$sql = "SELECT * FROM dispenseddrugs";
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
					<td>
						<a href='edit.php?DrugID=$row[TradeID]'>Edit</a>
						<a href='delete.php?DrugID=$row[TradeID]'>Delete</a>
					</td>
				</tr>
				";
			}
			?>
			
		</tbody>
	</table>
	<a href="../Pharmacist/PharmacyHome.php">Back to Home</a>
</body>
</html>
