<?php
include('../connect.php');
			$ID = "";
			$PName = "";
			$Name = "";
	        $Address =  "";
            $PhoneNumber = "";
            $Password = "";

            $Success ="";
            $Error = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){

	if(!isset($_GET["PharmacistID"])){
		header("PharmacyCRUD.php");
		exit;
	}

	$ID = $_GET["PharmacistID"];

	$sql = "SELECT * FROM pharmacists WHERE PharmacistID=$ID";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if(!$row){
		header("PharmacyCRUD.php");
		exit;
	}

	$PName = $row["PharmacyName"];
	$Name = $row["Name"];
	$Address =  $row["Address"];
    $PhoneNumber = $row["PhoneNumber"];
    $Password = $row["Password"];
}
else {
			$ID = $_POST['PharmacistID'];
			$PName= $_POST['PharmacyName'];
			$Name= $_POST['Name'];
			$Address =  $_POST['Address'];
            $PhoneNumber = $_POST['PhoneNumber'];
            $Password = $_POST['Pass'];

    do {
    	if(empty($ID) || empty($PName) || empty($Name) || empty($Address) || empty($PhoneNumber) || empty($Password)){
    	$Error = "All Fields Required";
    	break;
    	}
            	$sql = "UPDATE pharmacists ". "SET PharmacyName = '$PName',Name = '$Name', 
            		Address = '$Address',PhoneNumber = '$PhoneNumber',Password = '$Password'"."WHERE PharmacistID = '$ID'";

            	$result = $conn->query($sql);
            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

            $Success = "Success!";
            header("location: PharmacyCRUD.php");
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
	<h2>Edit Pharmacy</h2>
<?php
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
		<input type="hidden" name="PharmacistID" value="<?php echo $ID; ?>">

		<label>Pharmacy Name: </label>
		<input type="text" id="name" name ="PharmacyName" value="<?php echo $PName; ?>">

		<label>Name: </label>
		<input type="text" id="name" name ="Name" value="<?php echo $Name; ?>">

		<label>Address: </label>
		<input type="text" id="address" name ="Address" value="<?php echo $Address; ?>">

		<label>PhoneNumber: </label>
		<input type="text" id="phonenumber" name="PhoneNumber" value="<?php echo $PhoneNumber; ?>">

		<label>Password: </label>
		<input type="text" name="Pass" value="<?php echo $Password; ?>">
<?php
if(!empty($Success)){
	echo $Success;
} 
	?>
		
		<button type="submit" name="submit">Submit</button>

		<a href="PharmacyCRUD.php" role="button">Cancel</a>
	</form>
</body>
</html>