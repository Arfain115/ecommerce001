<?php
include 'db_conn.php';

if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
  $productId = intval($_GET['id']);

  // Fetch product details from the database
  $query = "SELECT * FROM products WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $productId);
  $stmt->execute();
  $result = $stmt->get_result();
  $product = $result->fetch_assoc();

  if (!$product) {
    echo "Product not found";
    exit;
  }
} else {
  echo "Invalid product ID";
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title><?php echo htmlspecialchars($product['name']); ?></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="..\styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container mt-5">
    <div class="row">
      <!-- Image Section -->
      <div class="col-md-5 d-flex flex-column justify-content-start">
        <div class="image-holder">
          <img class="img-fluid" src="<?php echo htmlspecialchars($product['product_image']); ?>" alt="Product Image">
        </div>
        <h1 class="mt-3 mt-md-5 anim-h"><?php echo htmlspecialchars($product['name']); ?></h1>
        <p>Type: <?php echo htmlspecialchars($product['type']); ?></p>
        <p>Price: <?php echo htmlspecialchars($product['price']); ?></p>
      </div>
      <div class="col-md-7 d-flex flex-column justify-content-start">
        <h3 class="anim-p">Specifications:</h3>
        <div class="anim-h"><?php echo $product['specifications']; ?></div> <!-- Removed htmlspecialchars() -->
        <h3 class="anim-p">Description:</h3>
        <div class="anim-h"><?php echo $product['description']; ?></div> <!-- Removed htmlspecialchars() -->
        <a href="orders.php" class="btn btn-primary mt-3 anim-p">Go to Orders</a>
      </div>
      <div class="col-md-12 d-flex flex-column justify-content-start">
        <h3>Additional Info:</h3>
        <p>Camera: <?php echo htmlspecialchars($product['camera']); ?></p>
        <p>Processor: <?php echo htmlspecialchars($product['processor']); ?></p>
        <p>Display: <?php echo htmlspecialchars($product['display']); ?></p>
        <p>Memory: <?php echo htmlspecialchars($product['memory']); ?></p>
      </div>
    </div>
  </div>

</body>

</html>