<?php

function check_login($conn)
{

	if(isset($_SESSION['PharmacistID']))
	{

		$PharmacistID = $_SESSION['PharmacistID'];
		$query = "select * from pharmacists where PharmacistID = '$PharmacistID' limit 1";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	header("Location: PharmacyLogin.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}