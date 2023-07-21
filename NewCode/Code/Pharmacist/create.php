<?php
include('../connect.php');
			$PName = "";
			$Name = "";
	        $Address =  "";
            $PhoneNumber = "";
            $Password = "";

            $Success ="";
            $Error = "";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

			$PName= $_POST['PName'];
			$Name= $_POST['Name'];
			$Address =  $_POST['Address'];
            $PhoneNumber = $_POST['PhoneNumber'];
            $Password = $_POST['Pass'];

            do {
            	if(empty($PName) || empty($Name) || empty($Address) || empty($PhoneNumber) || empty($Password)){
            		$Error = "All Fields Required";
            		break;
            	}

            $sql = "INSERT INTO pharmacists (PharmacyName,Name,Address,PhoneNumber,Password) VALUES ('$PName','$Name','$Address','$PhoneNumber','$Password')";
            $result = $conn->query($sql);

            if(!$result){
            	$Error = "Invalid Query: ". $conn->error;
            	break;
            }

            $PName = "";
			$Name = "";
	        $Address =  "";
            $PhoneNumber = "";
            $Password = "";

            $Success = "Success!";

            header("location: PharmacyCRUD.php");
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
	<h2>New Pharmacy</h2>
<?php 
if(!empty($Error)){
	echo $Error;
}
 ?>
	<form method="POST">
		<label>Pharmacy Name: </label>
		<input type="text" id="pname" name ="PName" value="<?php echo $PName; ?>">

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