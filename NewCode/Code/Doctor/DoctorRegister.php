<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor Register</title>
	<link rel="stylesheet" href="doctorregister.css"
</head>
<body>
	<center>
	<h2>Doctor Registration</h2>
	
	<form action="DoctorInsert.php" method="POST">

		<label>DoctorSSN: </label>
		<input type="text" id="doctorssn" name ="DoctorSSN"><br><br>

		<label>Name: </label>
		<input type="text" id="name" name ="Name"><br><br>

		<label>Speciality: </label>
		<input type="text" name="Speciality"><br><br>

		<label>Years Of Experience</label>
		<input type="text" name="YOE"><br><br>

		<label>Password: </label>
		<input type="text" name="Pass"><br><br>

		<button type="submit" name="submit">Submit</button>

		<a href = "DoctorLogin.php">Log In</a>
	</form>
	</center>
</body>
</html>
