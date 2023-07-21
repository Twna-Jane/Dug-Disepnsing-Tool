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
			$query = "select * from admin where username = '$user_name' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['AdminID'] = $user_data['AdminID'];
						header("Location: AdminHome.php");
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
	<title>Admin Login</title>
	<link rel="stylesheet" href="adminlogin.css">
</head>
<body>		
		<form method="post">
			<center>
			<h2>Admin Login</h2>

			<input id="text" type="text" placeholder="username" name="user_name"><br><br>
			<input id="text" type="password" placeholder="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="AdminRegister.php">Register</a><br><br>
			<a href="../login.php">Main Login Page</a>
			</center>
		</form>
</body>
</html>
