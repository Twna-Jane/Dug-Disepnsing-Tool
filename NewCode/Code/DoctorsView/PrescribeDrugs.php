<?php
include('../connect.php');
	        $drugid =  "";
            $doctorid = "";
            $patientid = "";
            $prescription= "";

            $Success ="";
            $Error = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

			$drugid =  $_POST['DrugID'];
            $doctorid = $_POST['DoctorID'];
            $patientid = $_POST['PatientID'];
            $prescription= $_POST['Prescription'];


            do {
            	if(empty($drugid) || empty($doctorid) || empty($patientid) || empty($prescription)){
            		$Error = "All Fields Required";
            		break;
            	}

            $sql = "INSERT INTO prescriptions (DrugID,DoctorID,PatientID,Prescription) VALUES ('$drugid','$doctorid','$patientid','$prescription')";
            $result = $conn->query($sql);

            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

	        $drugid =  "";
            $doctorid = "";
            $patientid = "";
            $prescription= "";

            $Success = "Success!";

            header("location: ViewPatients.php");
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
	<link rel="stylesheet" href="prescribeddrug.css">
</head>
<body>
	<center>
	<h2>Prescribe Drug</h2>
<?php 
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
		<label>drugid: </label>
		<select name="DrugID">
			<?php
				include('../connect.php');
				$drugs = mysqli_query($conn,"SELECT * FROM drugs");
				while($dr = mysqli_fetch_array($drugs)) {				
			?>
			<option value="<?php echo $dr['DrugID'] ?>"><?php echo $dr['Name'] ?></option>
			<?php } ?>
		</select><br><br>

		<label>DoctorID: </label>
		<select name="DoctorID">
			<?php
				include("../Doctor/functions.php");
				$doctors = mysqli_query($conn,"SELECT * FROM doctors");
				while($d = mysqli_fetch_array($doctors)) {				
			?>
			<option value="<?php echo $d['DoctorID'] ?>"><?php echo $d['Name'] ?></option>
			<?php } ?>
		</select><br><br>

		<label>PatientID: </label>
		<select name="PatientID">
			<?php
				include('../connect.php');
				$patients = mysqli_query($conn,"SELECT * FROM patients");
				while($p = mysqli_fetch_array($patients)) {				
			?>
			<option value="<?php echo $p['PatientID'] ?>"><?php echo $p['Name'] ?></option>
			<?php } ?>
		</select><br><br>

		<label>Prescription: </label>
		<input type="text" name="Prescription" value="<?php echo $prescription; ?>"><br><br>
<?php
if(!empty($Success)){
	echo $Success;
}  
	?>
		
		<button type="submit" name="submit">Submit</button>

		<a href="ViewPatients.php" role="button">Cancel</a>
	</form>
	</center>
</body>
</html>
