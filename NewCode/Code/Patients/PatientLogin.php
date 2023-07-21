<?php 

session_start();

	include('../connect.php');
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			$query = "select * from patients where Name = '$user_name' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Password'] === $password)
					{

						$_SESSION['PatientID'] = $user_data['PatientID'];
						header("Location: PatientHome.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Patient Login</title>
	<link rel="stylesheet" href="patientlogin.css">
</head>
<body>		
	<center>
		<form method="post">
			<h2>Patient Login</h2>

			<input id="text" placeholder="username" type="text" name="user_name"><br><br>
			<input id="text" placeholder="password" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="PatientRegister.php">Register</a><br><br>
			<a href="../login.php">Main Login Page</a>
		</form>
	</center>
</body>
</html>