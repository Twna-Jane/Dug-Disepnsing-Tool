<?php
include('../connect.php');

if(isset($_POST['submit'])){

    if(!empty($_POST['Username']) && ($_POST['Pass'])){

            $username = $_POST['Username'];
            $Password = $_POST['Pass'];

        $query = "INSERT INTO admin (username, password) VALUES ('$username','$Password')";

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
    <title>Admin Registration</title>
    <link rel="stylesheet" href="admininsert.css">
</head>
<body>
    <br><br><a href="AdminLogin.php">Login</a>
</body>
</html>
