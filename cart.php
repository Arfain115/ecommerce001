<?php
session_start();
include 'db_conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>

<body>

    <a href="index.php" class="go-home">Go to Home Page</a>

    <h1>Your Shopping Cart</h1>

    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <h3>You got <?php echo count($_SESSION['cart']); ?> item(s) in your cart.</h3>

        <div class="cart-container">
            <?php foreach ($_SESSION['cart'] as $product_id => $item): ?>
                <div class="cart-item">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                    <div class="cart-item-info">
                        <h2><?php echo $item['name']; ?></h2>
                        <p>Price: $<?php echo $item['price']; ?></p>
                        <p>Quantity: <?php echo $item['quantity']; ?></p>
                        <form method="POST" action="remove_from_cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <button type="submit" class="btn">Remove</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Wrap checkout button in a form -->
        <form method="POST" action="checkout.php">
            <button type="submit" class="btn">Proceed to Checkout</button>
        </form>

    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>

</body>

</html>