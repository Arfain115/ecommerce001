<?php
session_start();
include 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS -->
    <script>
        // Redirect after 1 second
        setTimeout(function() {
            window.location.href = 'cart.php';
        }, 1000);
    </script>
</head>

<body>

    <?php
    // Check if the product ID is set
    if (isset($_GET['product_id'])) {
        $product_id = intval($_GET['product_id']);

        // Fetch product details
        $query = "SELECT * FROM products WHERE id = $product_id";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            // Initialize cart if not already done
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Add product to cart
            $_SESSION['cart'][$product_id] = [
                'name' => $row['name'],
                'price' => $row['price'],
                'image' => $row['product_image'],
                'quantity' => 1 // You can modify this to allow quantity selection
            ];

            echo "<p>Product added to cart!</p>";
        } else {
            echo "<p>Product not found.</p>";
        }
    } else {
        echo "<p>No product ID provided.</p>";
    }
    ?>

</body>

</html>