<?php
session_start();
include 'db_conn.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO orders (product_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");

        // Check if statement preparation was successful
        if (!$stmt) {
            die("Preparation failed: " . $conn->error);
        }

        // Loop through each item in the cart and insert it into the orders table
        foreach ($_SESSION['cart'] as $product_id => $item) {
            // Bind parameters
            $stmt->bind_param("isid", $product_id, $item['name'], $item['quantity'], $item['price']);
            if (!$stmt->execute()) {
                die("Execute failed: " . $stmt->error);
            }
        }

        // Clear the cart after successful insertion
        unset($_SESSION['cart']);
        echo "Your order has been placed successfully!";
    } else {
        echo "Your cart is empty.";
    }
} else {
    echo "Invalid request method.";
}

// Redirect to the cart page or a confirmation page
header("Location: cart.php"); // Redirect to the cart or order confirmation page
exit();
