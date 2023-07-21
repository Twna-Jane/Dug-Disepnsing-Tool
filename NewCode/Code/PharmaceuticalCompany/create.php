<?php
include('../connect.php');
			$Name = "";
	        $PhoneNo =  "";
            $Password = "";

            $Success ="";
            $Error = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

			$Name = $_POST['Name'];
            $PhoneNo =  $_POST['PhoneNumber'];
            $Password = $_POST['Pass'];

            do {
            	if(empty($Name) || empty($PhoneNo) || empty($Password)){
            		$Error = "All Fields Required";
            		break;
            	}

            $sql = "INSERT INTO pharmaceuticalcompanies (Name,PhoneNumber,Password) VALUES ('$Name','$PhoneNo','$Password')";
            $result = $conn->query($sql);

            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

			$Name = "";
	        $PhoneNo =  "";
            $Password = "";

            $Success = "Success!";

            header("location: PCCRUD.php");
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
	<h2>New Pharmaceutical Company</h2>
<?php 
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
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