<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login page
    header('Location: ../Admin/login.php');
    exit();
}

include 'connect.php'; // Include your database connection

// Fetch orders from the database
$result = $con->query("SELECT * FROM orders ORDER BY order_date DESC");

// Check for errors in the SQL query
if (!$result) {
    die("Error fetching orders: " . $con->error);
}

// Start the HTML document
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            </button>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="admin.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="display.php">Display all items</a>
                </li>
                <li>
                    <a class="nav-link" aria-current="page" href="user.php">Add an item</a>
                </li>
                <li>
                    <a class="nav-link" aria-current="page" href="view_orders.php">View orders</a>
                </li>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-4">Admin panel</h1>
        <h1>Your Orders</h1>

        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Order Date</th>
                        <th>Details</th> <!-- New column for Details -->
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['product_id']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo '$' . $row['price']; ?></td>
                            <td><?php echo $row['order_date']; ?></td>
                            <td>
                                <a href="detail_admin.php?id=<?php echo $row['product_id']; ?>" class="btn btn-info">View Details</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h2>No orders found.</h2>
        <?php endif; ?>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Close the database connection
$con->close();
?>