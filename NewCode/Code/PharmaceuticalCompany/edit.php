<?php
include('../connect.php');
			$ID = "";
			$Name = "";
	        $PhoneNo =  "";
            $Password = "";

            $Success ="";
            $Error = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){

	if(!isset($_GET["PCID"])){
		header("PCCRUD.php");
		exit;
	}

	$ID = $_GET["PCID"];

	$sql = "SELECT * FROM pharmaceuticalcompanies WHERE PCID=$ID";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if(!$row){
		header("PCCRUD.php");
		exit;
	}

	$Name =  $row["Name"];"";
    $PhoneNo = $row["PhoneNumber"];
    $Password = $row["Password"];
}
else {
			$ID = $_POST['PCID'];
			$Name = $_POST['Name'];
            $PhoneNo =  $_POST['PhoneNumber'];
            $Password = $_POST['Pass'];

    do {
    	if(empty($ID) || empty($Name) || empty($PhoneNo) || empty($Password)){
    	$Error = "All Fields Required";
    	break;
    	}
            	$sql = "UPDATE pharmaceuticalcompanies ". "SET Name = 
            	'$Name', PhoneNumber = '$PhoneNo', Password = '$Password'"."WHERE PCID = '$ID'";

            	$result = $conn->query($sql);
            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

            $Success = "Success!";
            header("location: PCCRUD.php");
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
	<h2>Edit Pharmaceutical Companies</h2>
<?php
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
		<input type="hidden" name="PCID" value="<?php echo $ID; ?>">
		
		<label>Name: </label>
		<input type="text" id="name" name ="Name" value="<?php echo $Name; ?>">

		<label>Phone Number: </label>
		<input type="text" id="phonenumber" name="PhoneNumber" value="<?php echo $PhoneNo; ?>">

		<label>Password: </label>
		<input type="text" name="Pass" value="<?php echo $Password; ?>">
<?php
if(!empty($Success)){
	echo $Success;
} 
	?>
		
		<button type="submit" name="submit">Submit</button>

		<a href="PCCRUD.php" role="button">Cancel</a>
	</form>
</body>
</html>