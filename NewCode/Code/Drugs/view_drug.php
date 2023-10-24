<?php
include('../header.php');
include('../connect.php');

// Get the drug ID from the URL
$drugId = isset($_GET['DrugID']) ? intval( $_GET['DrugID']) : 0;

// Query to fetch drug details by ID
$drugDetailsQuery = mysqli_query($conn, "SELECT * FROM drugs WHERE DrugID = $drugId");
$drug = mysqli_fetch_array($drugDetailsQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drug Details</title>
    <link rel="stylesheet" href="view_drug.css">
</head>
<body>
    <div class="details">
        <h2>Drug Details</h2>
        <p>
        <img src="../Pictures/<?php echo $drug['DrugImage']; ?>" alt="<?php echo $drug['Name']; ?>">
    
        <p>Name: <?php echo $drug['Name']; ?></p>
        <p>Category: <?php echo $drug['Category']; ?></p>
        <p>Quantity: <?php echo $drug['Quantity']; ?></p>
        <p>Manufacturing Date: <?php echo $drug['ManufacturingDate']; ?></p>
        <p>Expiring Date: <?php echo $drug['ExpiringDate']; ?></p>
    <a href="dashboard.php">Back</a>
    </div>
</body>
</html>

