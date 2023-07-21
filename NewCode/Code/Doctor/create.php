<?php
include('../connect.php');
			$doctorssn = "";
            $name =  "";
            $speciality =  "";
            $YOE =  "";
            $Password = "";

            $Success ="";
            $Error = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

			$doctorssn =  $_POST['DoctorSSN'];
	        $name =  $_POST['Name'];
            $speciality =  $_POST['Speciality'];
            $YOE =  $_POST['YOE'];
            $Password = $_POST['Pass'];

            do {
            	if(empty($doctorssn) ||  empty($name) || empty($speciality) || empty($YOE) || empty($Password)){
            		$Error = "All Fields Required";
            		break;
            	}

            $sql = "INSERT INTO doctors (DoctorSSN,Name,Speciality,YOE,Password) VALUES ('$doctorssn','$name','$speciality','$YOE','$Password')";
            $result = $conn->query($sql);

            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

          	$name =  "";
            $speciality =  "";
            $YOE =  "";
            $Password = "";

            $Success = "Success!";

            header("location: DoctorCRUD.php");
            exit;
            }
            while(false);

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h2>New Doctor</h2>
<?php 
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
		<label>DoctorSSN: </label>
		<input type="text" id="doctorssn" name ="DoctorSSN" value="<?php echo $doctorssn; ?>">

		<label>Name: </label>
		<input type="text" id="name" name ="Name" value="<?php echo $first_name; ?>">

		<label>Speciality: </label>
		<input type="text" name="Speciality" value="<?php echo $speciality; ?>">

		<label>Years Of Experience</label>
		<input type="text" name="YOE" value="<?php echo $YOE; ?>">

		<label>Password: </label>
		<input type="text" name="Pass" value="<?php echo $Password; ?>">
<?php
if(!empty($Success)){
	echo $Success;
}  
	?>
		
		<button type="submit" name="submit">Submit</button>

		<a href="DoctorCRUD.php" role="button">Cancel</a>
	</form>
</body>
</html>