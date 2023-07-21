<?php
include('../connect.php');

if(isset($_POST['submit'])){

    if(!empty($_POST['Name']) && ($_POST['PhoneNumber']) && ($_POST['Pass'])){

            $Name =  $_POST['Name'];
            $PhoneNumber = $_POST['PhoneNumber'];
            $Password = $_POST['Pass'];

        $query = "INSERT INTO pharmaceuticalcompanies (Name,PhoneNumber, Password) VALUES ('$Name','$PhoneNumber','$Password')";

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
    <title>PC Registration</title>
</head>
<body>
    <br><br><a href="PCLogin.php">Login</a>
</body>
</html>