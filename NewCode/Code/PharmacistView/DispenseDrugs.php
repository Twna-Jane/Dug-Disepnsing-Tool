<?php
include('../connect.php');
			$prescriptionid = "";
			$drugid = "";
            $price =  "";
            $quantity = "";
            $pharmacistid = "";

            $Success ="";
            $Error = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

			$prescriptionid = $_POST['PrescriptionID'];
			$drugid=  $_POST['DrugID'];
	        $price =  $_POST['Price'];
	        $quantity =  $_POST['Quantity'];
            $pharmacistid = $_POST['PharmacistID'];

            do {
            	if(empty($prescriptionid) || empty($drugid) || empty($price) || empty($quantity) || empty($pharmacistid)){
            		$Error = "All Fields Required";
            		break;
            	}

            $sql = "INSERT INTO dispenseddrugs (PrescriptionID,DrugID,Price,Quantity,PharmacistID) VALUES ('$prescriptionid','$drugid','$price','$quantity','$pharmacistid')";
            $result = $conn->query($sql);

            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

            $prescriptionid = "";
			$drugid = "";
            $price =  "";
            $quantity = "";
            $pharmacistid = "";

            $Success = "Success!";

            header("location: DispensedDrugsCRUD.php");
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
	<link rel="stylesheet" href="dispensedrugs.css">
</head>
<body>
	<center>
	<h2>Dispense Drugs</h2>
<?php 
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
		<label>Prescription: </label>
		<select name="PrescriptionID">
			<?php
				$prescriptions = mysqli_query($conn,"SELECT * FROM prescriptions");
				while($p = mysqli_fetch_array($prescriptions)) {				
			?>
			<option value="<?php echo $p['PrescriptionID'] ?>"><?php echo $p['PrescriptionID'] ?></option>
			<?php } ?>
		</select><br><br>

		<label>Drug: </label>
		<select name="DrugID">
			<?php
				$drugs = mysqli_query($conn,"SELECT * FROM drugs");
				while($dr = mysqli_fetch_array($drugs)) {				
			?>
			<option value="<?php echo $dr['DrugID'] ?>"><?php echo $dr['Name'] ?></option>
			<?php } ?>
		</select><br><br>


		<label>Price: </label>
		<input type="text" id="price" name ="Price" value="<?php echo $price; ?>"><br><br>

		<label>Quantity: </label>
		<input type="text" id="quantity" name ="Quantity" value="<?php echo $quantity; ?>"><br><br>

		<label>Pharmacist: </label>
		<select name="PharmacistID">
			<?php
				$pharmacists = mysqli_query($conn,"SELECT * FROM pharmacists");
				while($ph = mysqli_fetch_array($pharmacists)) {				
			?>
			<option value="<?php echo $ph['PharmacistID'] ?>"><?php echo $ph['Name'] ?></option>
			<?php } ?>
		</select><br><br>
		
<?php
if(!empty($Success)){
	echo $Success;
}  
	?>
		
		<button type="submit" name="submit">Submit</button>
	</form>
	<a href="../Pharmacist/PharmacyHome.php">Back to Home</a>
	</center>
</body>
</html>
