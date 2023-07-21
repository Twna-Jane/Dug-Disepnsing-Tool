<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pharmacist Registration</title>
	<link rel="stylesheet" href="pharmacyinsert.css">
</head>
<body>
	<center>
	<h2>Pharmacist Registration</h2>
	<form action="PharmacyInsert.php" method="POST">
		<label>Pharmacy Name: </label>
		<input type="text" id="pname" name ="PName"><br><br>

		<label>Name: </label>
		<input type="text" id="name" name ="Name"><br><br>

		<label>Address: </label>
		<input type="text" id="address" name="Address"><br><br>

		<label>PhoneNumber: </label>
		<input type="text" name="PhoneNumber"><br><br>

		<label>Password: </label>
		<input type="text" name="Pass"><br><br>

		<button type="submit" name="submit">Submit</button>

		<a href = "PharmacyLogin.php">Log In</a>
	</form>
	</center>
</body>
</html>
