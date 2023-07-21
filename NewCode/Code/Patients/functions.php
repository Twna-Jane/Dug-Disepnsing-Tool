<?php

function check_login($conn)
{

	if(isset($_SESSION['PatientID']))
	{

		$PatientID = $_SESSION['PatientID'];
		$query1 = "select * from patients where PatientID = '$PatientID' limit 1";

		$result1 = mysqli_query($conn,$query1);
			if($result1 && mysqli_num_rows($result1) > 0)
			{

				$user_data = mysqli_fetch_assoc($result1);
				return $user_data;
			}

		$query2 = "select * FROM prescriptions where PatientID = '$PatientID' limit 1";
		
		$result2 = mysqli_query($conn,$query2);
		

			if($result2 && mysqli_num_rows($result2) > 0)
			{
				$prescriptiondata = mysqli_fetch_assoc($result2);
				return $prescriptiondata;
			}

	}
		header("Location: PatientLogin.php");
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


