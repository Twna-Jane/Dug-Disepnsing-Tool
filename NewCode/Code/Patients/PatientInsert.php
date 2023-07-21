<?php
include('../connect.php');

if(isset($_POST['submit'])){

    if(!empty($_POST['PatientSSN']) && ($_POST['Name']) && ($_POST['Address']) && ($_POST['Age']) && ($_POST['DoctorID']) && ($_POST['Pass'])){

            $patientssn = $_POST['PatientSSN'];
            $name =  $_POST['Name'];
            $address =  $_POST['Address'];
            $age =  $_POST['Age'];
            $doctorid = $_POST['DoctorID'];
            $Password = $_POST['Pass'];

        $query = "INSERT INTO patients (PatientSSN,Name,Address,Age,PrimaryPhysician,Password) VALUES ('$patientssn','$name','$address','$age','$doctorid','$Password')";

        $run = mysqli_query($conn,$query) or die(mysqli_error($conn));

        if($run){
            echo "Data successfully inserted";
        }
        else{
            echo "Data insertion failed";
        }
 
    }
    else{
        echo "Please Input all Fields";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Registration</title>
</head>
<body>
    <br><br><a href="PatientLogin.php">Login</a>
</body>
</html>