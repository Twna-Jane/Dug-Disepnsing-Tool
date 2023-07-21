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
			$query = "select * from doctors where Name = '$user_name' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Password'] === $password)
					{

						$_SESSION['DoctorID'] = $user_data['DoctorID'];
						header("Location: DoctorHome.php");
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
	<title>Doctor Login</title>
	<link rel="stylesheet" href="doctorlogin.css">
</head>
<body>		
		<form method="post">
			<center>
			<h2>Doctor Login</h2>

			<input id="text" type="text" placeholder="username" name="user_name"><br><br>
			<input id="text" type="password" placeholder="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="DoctorRegister.php">Register</a><br><br>
			<a href="../login.php">Main Login Page</a>
		</form>
		</center>
</body>
</html>
