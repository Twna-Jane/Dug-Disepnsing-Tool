<?php

include('../connect.php');

// Get the selected category from the URL
$category = isset($_GET['category']) ? urldecode($_GET['category']) : '';

// Debugging: Output the selected category to check if it's correct
echo "Selected Category: " . $category;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="menu">
        
    </div>
    <div class="content">
        <h2><?php echo $category; ?> Category</h2>
        <?php
        // Query to fetch drugs in the selected category
        $categoryDrugsQuery = mysqli_query($conn, "SELECT * FROM drugs WHERE Category = '$category'");
        while ($drug = mysqli_fetch_array($categoryDrugsQuery)) {
            echo '<div class="drug">
                    <img src="../Pictures/' . $drug['DrugImage'] . '" alt="' . $drug['Name'] . '">
                    <p>Category: ' . $drug['Category'] . '</p>
                    <a href="view_drug.php?DrugID=' . $drug['DrugID'] . '">View Details</a>
                  </div>';
        }
        ?>
    </div>
</body>
</html>

   


