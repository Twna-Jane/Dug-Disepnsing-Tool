<?php
include('../connect.php');

if(isset($_POST['submit'])){

    if(!empty($_POST['DoctorSSN']) && ($_POST['Name']) && ($_POST['Speciality']) && ($_POST['YOE']) && ($_POST['Pass'])){

            $doctorssn = $_POST['DoctorSSN'];
            $name =  $_POST['Name'];
            $speciality =  $_POST['Speciality'];
            $YOE =  $_POST['YOE'];
            $Password = $_POST['Pass'];

        $query = "INSERT INTO doctors (DoctorSSN,Name,Speciality,YOE, Password) VALUES ('$doctorssn','$name','$speciality','$YOE','$Password')";

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
    <title>Doctor Registration</title>
</head>
<body>
    <br><br><a href="DoctorLogin.php">Login</a>
</body>
</html>