<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login page
    header('Location: ../Admin/login.php');
    exit();
}


?>

<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrudApplication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <button class="btn btn-primary my-4"><a class="text-white text-decoration-none" href="user.php">Add Product</a></button>
        <table class="table">
            <a href="logout.php" class="btn btn-danger">Logout</a>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Type</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM products";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $price = $row['price'];
                        $type = $row['type'];
                        $product_image = $row['product_image'];
                        echo '<tr>
                                <th scope="row">' . $id . '</th>
                                <td>' . $name . '</td>
                                <td>' . $price . '</td>
                                <td>' . $type . '</td>
                                <td><img src="' . $product_image . '" alt="' . $name . '" width="50"></td>
                                <td>
                                    <button class="btn btn-primary"><a class="text-white text-decoration-none" href="update.php?updateid=' . $id . '">Update</a></button>
                                    <button class="btn btn-danger"><a class="text-white text-decoration-none" href="delete.php?deleteid=' . $id . '">Delete</a></button>
                                </td>
                            </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>