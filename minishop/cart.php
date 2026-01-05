<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// to add item
if (isset($_POST['add'])) {
    $product = $_POST['product'];
    if (isset($_SESSION['cart'][$product])) {
        $_SESSION['cart'][$product]++;
    } else {
        $_SESSION['cart'][$product] = 1;
    }
}

// to remove item
if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
}

// to clear cart
if (isset($_GET['clear'])) {
    $_SESSION['cart'] = [];
}
?>

<h2>Your Cart</h2>

<?php
foreach ($_SESSION['cart'] as $item => $qty) {
    echo "$item - $qty 
    <a href='cart.php?remove=$item'>Remove</a><br>";
}
?>

<br>
<a href="cart.php?clear=1">Clear Cart</a>
<br><br>
<a href="products.php">Back to Products</a>
