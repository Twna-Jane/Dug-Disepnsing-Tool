<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pharmaceutical Company Register</title>
	<link rel="stylesheet" href="pcregister.css">
</head>
<body>
	<center>
	<h2>Pharmaceutical Company Register</h2>
	<form action="PCInsert.php" method="POST">
		<label>Name: </label>
		<input type="text" id="name" name ="Name"><br><br>

		<label>PhoneNumber: </label>
		<input type="text" id="phonenumber" name="PhoneNumber"><br><br>

		<label>Password: </label>
		<input type="text" name="Pass"><br><br>

		<button type="submit" name="submit">Submit</button>

		<a href = "PCLogin.php">Log In</a>
	</form>
	</center>
</body>
</html>
