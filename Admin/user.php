<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // If not logged in, redirect to login page
  header('Location: ../Admin/login.php');
  exit();
}

include 'connect.php';
include 'ckeditor.php'; // Include CKEditor script

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $type = $_POST['type'];
  $product_image = $_POST['product_image'];
  $camera = $_POST['camera'];
  $processor = $_POST['processor'];
  $display = $_POST['display'];
  $memory = $_POST['memory'];
  $specifications = $_POST['specifications'];
  $description = $_POST['description'];

  // Insert into products table
  $sql = "INSERT INTO products (name, price, type, product_image, camera, processor, display, memory, specifications, description) 
            VALUES ('$name', '$price', '$type', '$product_image', '$camera', '$processor', '$display', '$memory', '$specifications', '$description')";
  $result = mysqli_query($con, $sql);

  if ($result) {
    header('location:display.php');
  } else {
    die(mysqli_error($con));
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> <!-- Include CKEditor -->
  <title>CrudApplication</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
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
      </ul>
    </div>
  </nav>

  <div class="container my-5">
    <h1 class="text-center mb-4">Admin panel</h1>
    <form method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="name" placeholder="Type product name" required>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name="price" placeholder="Type product price" required>
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control" name="type" placeholder="Type of product" required>
      </div>
      <div class="mb-3">
        <label for="product_image" class="form-label">Product Image URL</label>
        <input type="text" class="form-control" name="product_image" placeholder="Image URL" required>
      </div>
      <div class="mb-3">
        <label for="camera" class="form-label">Camera</label>
        <input type="text" class="form-control" name="camera" placeholder="Camera specifications" required>
      </div>
      <div class="mb-3">
        <label for="processor" class="form-label">Processor</label>
        <input type="text" class="form-control" name="processor" placeholder="Processor specifications" required>
      </div>
      <div class="mb-3">
        <label for="display" class="form-label">Display</label>
        <input type="text" class="form-control" name="display" placeholder="Display specifications" required>
      </div>
      <div class="mb-3">
        <label for="memory" class="form-label">Memory</label>
        <input type="text" class="form-control" name="memory" placeholder="Memory specifications" required>
      </div>
      <div class="mb-3">
        <label for="specifications" class="form-label">Specifications</label>
        <textarea class="form-control" name="specifications" placeholder="Other specifications" required></textarea>
        <script>
          CKEDITOR.replace('specifications'); // Initialize CKEditor for specifications
        </script>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" placeholder="Product description" required></textarea>
        <script>
          CKEDITOR.replace('description'); // Initialize CKEditor for description
        </script>
      </div>
      <button type="submit" name="submit" class="btn btn-primary my-4">Add Product</button>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </form>
  </div>
</body>

</html>