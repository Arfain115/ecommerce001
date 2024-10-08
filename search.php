<?php
session_start();
include 'db_conn.php';

// Retrieve the search query and selected type
$search_query = $_POST['search'] ?? '';
$type = $_POST['type'] ?? 'mobile'; // Default to mobile if not set

// Sanitize the search query
$search_query = mysqli_real_escape_string($conn, $search_query);

// Construct the search query based on the selected type
$query = "SELECT * FROM products WHERE LOWER(type) = '$type' AND LOWER(name) LIKE LOWER('%$search_query%')";

// Execute the search query
$result = mysqli_query($conn, $query);

// Get the number of search results
$num_results = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- <link rel="stylesheet" href="styles.css"> Ensure this path is correct -->
    <link rel="stylesheet" href="search.css">
</head>

<body class="light-mode">

    <?php
    if ($num_results > 0) {
        echo "<h1 class='main-heading'>Search Results</h1>";
        echo "<h2 class='muted-heading'>Results Found: $num_results</h2>";
        echo "<div class='search-results'>"; // For styling purposes
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
        <div class='product-card'>
            <div class='product-image'>
                <img src='" . $row['product_image'] . "' alt='" . $row['name'] . "'>
            </div>
            <div class='product-info'>
                <h3>" . $row['name'] . "</h3>
                <p>Price: $" . $row['price'] . "</p>
            </div>
            <form method='POST' action='add_to_cart.php' class='add-to-cart-form'>
                <input type='hidden' name='product_id' value='" . $row['id'] . "'>
                <button type='submit' class='btn'>Add to Cart</button>
            </form>
        </div>
        ";
        }
        echo "</div>";
    } else {
        echo "<h1>No results found.</h1>";
    }
    ?>


</body>

</html>