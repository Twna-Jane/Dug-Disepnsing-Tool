<?php
include('../connect.php');
			$name = "";
            $formula =  "";
            $pcid = "";

            $Success ="";
            $Error = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

			$name =  $_POST['Name'];
	        $formula =  $_POST['Formula'];
            $pcid = $_POST['PCID'];

            do {
            	if(empty($name) || empty($formula) || empty($pcid)){
            		$Error = "All Fields Required";
            		break;
            	}

            $sql = "INSERT INTO drugs (Name,Formula,PCID) VALUES ('$name','$formula','$pcid')";
            $result = $conn->query($sql);

            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

			$name = "";
            $formula =  "";
            $pcid = "";

            $Success = "Success!";

            header("location: Drugs.php");
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
	<link rel="stylesheet" href="create.css">

</head>
<body>
	<center>
	<h2>New Drugs</h2>
<?php 
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
		<label>Name: </label>
		<input type="text" id="name" name ="Name" value="<?php echo $name; ?>"><br><br>

		<label>Formula: </label>
		<input type="text" id="formula" name ="Formula" value="<?php echo $formula; ?>"><br><br>

		<label>Pharmaceutical Company: </label>
		<select name="PCID">
			<?php
				include('../connect.php');
				$pcs = mysqli_query($conn,"SELECT * FROM pharmaceuticalcompanies");
				while($pc = mysqli_fetch_array($pcs)) {				
			?>
			<option value="<?php echo $pc['PCID'] ?>"><?php echo $pc['Name'] ?></option>
			<?php } ?>
		</select><br><br>
		
<?php
if(!empty($Success)){
	echo $Success;
}  
	?>
		
		<button type="submit" name="submit">Submit</button>

		<a href="../PharmaceuticalCompany/PCHome.php">Back to Home</a>
	</form>
	</center>
</body>
</html>
