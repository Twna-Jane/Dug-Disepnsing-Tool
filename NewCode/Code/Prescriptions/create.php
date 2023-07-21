<?php
include('../connect.php');
	        $tradeid =  "";
            $doctorid = "";
            $patientid = "";
            $prescription= "";

            $Success ="";
            $Error = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

			$tradeid =  $_POST['TradeID'];
            $doctorid = $_POST['DoctorID'];
            $patientid = $_POST['PatientID'];
            $prescription= $_POST['Prescription'];


            do {
            	if(empty($tradeid) || empty($doctorid) || empty($patientid) || empty($prescription)){
            		$Error = "All Fields Required";
            		break;
            	}

            $sql = "INSERT INTO prescriptions (TradeID,DoctorID,PatientID,Prescription) VALUES ('$tradeid','$doctorid','$patientid','$prescription')";
            $result = $conn->query($sql);

            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

	        $tradeid =  "";
            $doctorid = "";
            $patientid = "";
            $prescription= "";

            $Success = "Success!";

            header("location: PrescriptionsCRUD.php");
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
	<h2>New Prescription</h2>
<?php 
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
		<label>TradeID: </label>
		<select name="TradeID">
			<?php
				include('../connect.php');
				$drugs = mysqli_query($conn,"SELECT * FROM drugs");
				while($dr = mysqli_fetch_array($drugs)) {				
			?>
			<option value="<?php echo $dr['TradeID'] ?>"><?php echo $dr['Name'] ?></option>
			<?php } ?>
		</select>

		<label>DoctorID: </label>
		<select name="DoctorID">
			<?php
				include('../connect.php');
				$doctors = mysqli_query($conn,"SELECT * FROM doctors");
				while($d = mysqli_fetch_array($doctors)) {				
			?>
			<option value="<?php echo $d['DoctorID'] ?>"><?php echo $d['FirstName'] ?></option>
			<?php } ?>
		</select>

		<label>PatientID: </label>
		<select name="PatientID">
			<?php
				include('../connect.php');
				$patients = mysqli_query($conn,"SELECT * FROM patients");
				while($p = mysqli_fetch_array($patients)) {				
			?>
			<option value="<?php echo $p['PatientID'] ?>"><?php echo $p['FirstName'] ?></option>
			<?php } ?>
		</select>

		<label>Prescription: </label>
		<input type="text" name="Prescription" value="<?php echo $prescription; ?>">
<?php
if(!empty($Success)){
	echo $Success;
}  
	?>
		
		<button type="submit" name="submit">Submit</button>

		<a href="PrescriptionsCRUD.php" role="button">Cancel</a>
	</form>
</body>
</html>