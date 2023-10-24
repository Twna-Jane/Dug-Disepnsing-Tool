<?php
include('../header.php');
include('../connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Drug Dashboard</title>
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>
    <div class="menu">
        <ul>
            
            <?php
            // Query to fetch distinct drug categories from the database
            $categoryQuery = mysqli_query($conn, "SELECT DISTINCT Category FROM drugs");
            while ($category = mysqli_fetch_array($categoryQuery)) {
                $encodedCategory = urlencode($category['Category']);
                echo '<a href="#" class="category-link" data-category="' . $encodedCategory . '">' . $category['Category'] . '</a>';
            }
            ?>
        </ul>
    </div>
    <div class="content" id="drug-content">
    
        <p>Select a category to view drugs.</p>
        <img src="../Pictures/drugs.png">
         <a class="back" href="../PharmaceuticalCompany/PCHome.php">Back</a>

    </div>

    <script>
        // JavaScript to handle category link clicks
        document.addEventListener('DOMContentLoaded', function () {
            const categoryLinks = document.querySelectorAll('.category-link');
            const drugContent = document.getElementById('drug-content');

            categoryLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const selectedCategory = link.getAttribute('data-category');
                    loadCategoryDrugs(selectedCategory);
                });
            });

            function loadCategoryDrugs(category) {
                console.log("Selected Category (JavaScript): " + category);
                // Use AJAX to fetch and display drugs for the selected category
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        drugContent.innerHTML = xhr.responseText;
                    }
                };
                xhr.open('GET', 'category.php?category=' + category, true);
                xhr.send();
            }
        });
    </script>
</body>
</html>
<?php 
include("../footer.php");
?>
