<?php 

if ( isset($_GET["PCID"]) ) {
	$ID = $_GET["PCID"];

	include('../connect.php');
	$sql = "DELETE FROM pharmaceuticalcompanies WHERE PCID=$ID";
	$conn->query($sql);
}

header("location: PCCRUD.php");
exit;
?>


