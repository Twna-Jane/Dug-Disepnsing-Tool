<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Register</title>
	<link rel="stylesheet" href="patientregister.css">
</head>
<body>
	<center>
	<h2>Patient Registration</h2>
	<form action="PatientInsert.php" method="POST">

		<label>PatientSSN: </label>
		<input type="text" id="patientssn" placeholder="PatientSSN" name ="PatientSSN"><br><br>

		<label>Name: </label>
		<input type="text" id="name" placeholder="Name" name ="Name"><br><br>

		<label>Address: </label>
		<input type="text" placeholder="Address" name="Address"><br><br>

		<label>Age</label>
		<input type="text" placeholder="Age" name="Age"><br><br>

		<label>Primary Physician: </label>
		<select name="DoctorID">
			<?php
				include('../connect.php');
				$doctors = mysqli_query($conn,"SELECT * FROM doctors");
				while($d = mysqli_fetch_array($doctors)) {				
			?>
			<option value="<?php echo $d['DoctorID'] ?>"><?php echo $d['Name'] ?></option>
			<?php } ?>
		</select><br><br>

		<label>Password: </label>
		<input type="text" placeholder="Password" name="Pass"><br><br>

		<button type="submit" name="submit">Submit</button>

		<a href = "PatientLogin.php">Log In</a>
	</form>
</center>
</body>
</html>