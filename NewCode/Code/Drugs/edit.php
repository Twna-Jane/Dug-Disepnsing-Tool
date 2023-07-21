<?php
include('../connect.php');
			$ID = "";
			$name = "";
            $formula =  "";
            $pcid = "";

            $Success ="";
            $Error = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){

	if(!isset($_GET["DrugID"])){
		header("Drugs.php");
		exit;
	}

	$ID = $_GET["DrugID"];

	$sql = "SELECT * FROM drugs WHERE DrugID=$ID";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if(!$row){
		header("DrugCRUD.php");
		exit;
	}

	$name =  $row["Name"];
	$formula =  $row["Formula"];
    $pcid = $row["PCID"];

}
else {
			$ID = $_POST['DrugID'];
			$name =  $_POST['Name'];
	        $formula =  $_POST['Formula'];
            $pcid = $_POST['PCID'];

    do {
    	if(empty($name) || empty($formula) || empty($pcid)){
    	$Error = "All Fields Required";
    	break;
    	}
            	$sql = "UPDATE drugs ". "SET name = 
            	'$name', Formula = '$formula', PCID = '$pcid'"."WHERE DrugID = '$ID'";

            	$result = $conn->query($sql);
            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

            $Success = "Success!";
            header("location: Drugs.php");
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
	<link rel="stylesheet" href="edit.css">
</head>
<body>
	<h2>Edit Drugs</h2>
<?php
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
		<input type="hidden" name="DrugID" value="<?php echo $ID; ?>">
		
		<label>Name: </label>
		<input type="text" id="name" name ="Name" value="<?php echo $name; ?>">

		<label>Formula: </label>
		<input type="text" id="formula" name ="Formula" value="<?php echo $formula; ?>">

		<label>Pharmaceutical Company: </label>
		<select name="PCID">
			<?php
				include('../connect.php');
				$pcs = mysqli_query($conn,"SELECT * FROM pharmaceuticalcompanies");
				while($pc = mysqli_fetch_array($pcs)) {				
			?>
			<option value="<?php echo $pc['PCID'] ?>"><?php echo $pc['Name'] ?></option>
			<?php } ?>
		</select>
<?php
if(!empty($Success)){
	echo $Success;
} 
	?>
		
		<button type="submit" name="submit">Submit</button>

		<a href="Drugs.php" role="button">Cancel</a>
	</form>
</body>
</html>
