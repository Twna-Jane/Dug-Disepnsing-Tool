<?php
include('../connect.php');
			$ID = "";
			$doctorssn = "";
	        $name =  "";
            $speciality =  "";
            $YOE =  "";
            $Password = "";

            $Success ="";
            $Error = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){

	if(!isset($_GET["DoctorID"])){
		header("DoctorCRUD.php");
		exit;
	}

	$ID = $_GET["DoctorID"];

	$sql = "SELECT * FROM doctors WHERE DoctorID=$ID";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if(!$row){
		header("DoctorCRUD.php");
		exit;
	}

	$doctorssn =  $row["DoctorSSN"];
	$name =  $row["Name"];
    $speciality = $row["Speciality"];
    $YOE = $row["YOE"];
    $Password = $row["Password"];
}
else {
			$ID = $_POST['DoctorID'];
			$doctorssn = $_POST['DoctorSSN'];
			$name =  $_POST['Name'];
            $speciality =  $_POST['Speciality'];
            $YOE =  $_POST['YOE'];
            $Password = $_POST['Pass'];

    do {
    	if(empty($ID) || empty($doctorssn) || empty($name) || empty($speciality) || empty($YOE) || empty($Password)){
    	$Error = "All Fields Required";
    	break;
    	}
            	$sql = "UPDATE doctors ". "SET DoctorSSN = 
            	'$doctorssn', Name = '$name', Speciality = '$speciality', YOE = '$YOE', Password = '$Password'"."WHERE DoctorID = '$ID'";

            	$result = $conn->query($sql);
            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

            $Success = "Success!";
            header("location: DoctorCRUD.php");
            exit;


} while(false);
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
	<h2>Edit Doctor</h2>
<?php
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
		<input type="hidden" name="DoctorID" value="<?php echo $ID; ?>">
		
		<label>DoctorSSN: </label>
		<input type="text" id="doctorssn" name ="DoctorSSN" value="<?php echo $doctorssn; ?>">

		<label>Name: </label>
		<input type="text" id="name" name ="Name" value="<?php echo $name; ?>">

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