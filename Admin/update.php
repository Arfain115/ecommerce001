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
$id = $_GET['updateid'];
$sql = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$price = $row['price'];
$type = $row['type'];
$product_image = $row['product_image'];

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $type = $_POST['type'];
  $product_image = $_POST['product_image'];

  $sql = "UPDATE products SET name='$name', price='$price', type='$type', product_image='$product_image' WHERE id=$id";
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Update Product</title>
</head>

<body>
  <div class="container my-5">

    <h1 class="text-center mb-4">Admin panel</h1>
    <form method="post">
      <div class="mb-3">

        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="<?php echo '$' . $price; ?>" placeholder="Type product price (e.g., $10)" required>
      </div>

      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control" name="type" value="<?php echo $type; ?>" required>
      </div>
      <div class="mb-3">
        <label for="product_image" class="form-label">Product Image URL</label>
        <input type="text" class="form-control" name="product_image" value="<?php echo $product_image; ?>" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary my-4">Update Product</button>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </form>
  </div>
</body>

</html>