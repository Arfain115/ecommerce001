<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    unset($_SESSION['cart'][$product_id]); // Remove the item from the cart
}

header("Location: cart.php"); // Redirect back to the cart
exit();
