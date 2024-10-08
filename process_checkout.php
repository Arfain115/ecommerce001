<?php
session_start();

// Check if cart is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Capture user info
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Here, you can handle payment processing and order storage in your database
    // For example, saving the order details to a database...

    // Clear the cart
    unset($_SESSION['cart']);

    // Redirect to a thank you page or display a success message
    echo "<h1>Thank You, $name!</h1>";
    echo "<p>Your order has been placed successfully.</p>";
    echo "<p>We will send a confirmation email to $email.</p>";
} else {
    echo "<p>Your cart is empty.</p>";
}
?>
