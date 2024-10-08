<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

</body>

</html>
<?php

session_start();
include 'db_conn.php'; // Include your database connection

// Display success or error messages
if (isset($_SESSION['cancel_success'])) {
    echo "<div class='alert alert-success'>{$_SESSION['cancel_success']}</div>";
    unset($_SESSION['cancel_success']); // Clear message after displaying it
}

if (isset($_SESSION['cancel_error'])) {
    echo "<div class='alert alert-danger'>{$_SESSION['cancel_error']}</div>";
    unset($_SESSION['cancel_error']); // Clear message after displaying it
}

// Fetch orders from the database
$result = $conn->query("SELECT * FROM orders ORDER BY order_date DESC");

// Check for errors in the SQL query
if (!$result) {
    die("Error fetching orders: " . $conn->error);
}

// Display orders
if ($result->num_rows > 0) {
    echo "<h1>Your Orders</h1>";
    echo "<table border='1'>"; // Adding border for better visibility
    echo "<tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Order Date</th>
        <th>Action</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr class='paddingtab'>
        <td>{$row['product_id']}</td>
        <td><a href='detail.php?id={$row['product_id']}'>{$row['product_name']}</a></td>
        <td>{$row['quantity']}</td>
        <td>\${$row['price']}</td>
        <td>{$row['order_date']}</td>
        <td>
            <form action='cancel_order.php' method='post'>
                <input type='hidden' name='order_id' value='{$row['id']}'>
                <button type='submit' class='btn btn-danger'>Cancel Order</button>
            </form>
        </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "<h2>No orders found.</h2>";
}

// Close the database connection
$conn->close();
?>