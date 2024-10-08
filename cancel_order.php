<?php
session_start();
include 'db_conn.php'; // Include your database connection

if (isset($_POST['order_id'])) {
    $orderId = intval($_POST['order_id']); // Sanitize the order ID

    // SQL query to delete the order
    $deleteQuery = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $orderId);

    if ($stmt->execute()) {
        // Set success message and redirect to orders.php
        $_SESSION['cancel_success'] = "Order ID $orderId has been canceled successfully.";
        header("Location: orders.php");
        exit();
    } else {
        // Set error message and redirect to orders.php
        $_SESSION['cancel_error'] = "Error canceling order: " . $conn->error;
        header("Location: orders.php");
        exit();
    }
} else {
    // If order_id is not set, redirect back with error
    $_SESSION['cancel_error'] = "Invalid order cancellation request.";
    header("Location: orders.php");
    exit();
}
