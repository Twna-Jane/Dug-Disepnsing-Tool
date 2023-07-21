<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Register</title>
	<link rel="stylesheet" href="adminregister.css">
</head>
<body>
	<center>
	<h2>Admin Registration</h2>
	<form action="AdminInsert.php" method="POST">

		<label>Username: </label>
		<input type="text" id="username" name ="Username"><br><br>

		<label>Password: </label>
		<input type="text" name="Pass"><br><br>

		<button type="submit" name="submit">Submit</button>

		<a href = "AdminLogin.php">Log In</a>
	</form>
	</center>
</body>
</html>
