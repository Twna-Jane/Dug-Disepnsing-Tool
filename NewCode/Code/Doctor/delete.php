<?php 

if ( isset($_GET["DoctorID"]) ) {
	$ID = $_GET["DoctorID"];

	include('../connect.php');

	$sql = "DELETE FROM doctors WHERE DoctorID=$ID";
	$conn->query($sql);
}

header("location: DoctorCRUD.php");
exit;
?>


