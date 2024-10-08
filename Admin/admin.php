<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login page
    header('Location: ../Admin/login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>

    <div class="container my-5">
        <h1 class="text-center mb-4">Admin panel</h1>

        <!-- Button Group -->
        <div class="d-grid gap-3 col-6 mx-auto">
            <a href="logout.php" class="btn btn-danger">Logout</a>
            <a href="display.php" class="btn btn-primary">Display all items</a>
            <a href="view_orders.php" class="btn btn-success">View Orders</a>
            <a href="user.php" class="btn btn-warning">Add an item</a>
        </div>
    </div>
</body>

</html>