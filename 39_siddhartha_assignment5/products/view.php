<?php
include "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE product_id=$id");
$row = mysqli_fetch_assoc($result);
?>

<h2>Product Details</h2>

<p><b>Name:</b> <?= $row['name'] ?></p>
<p><b>Category:</b> <?= $row['category'] ?></p>
<p><b>Price:</b> <?= $row['price'] ?></p>
<p><b>Stock:</b> <?= $row['stock_qty'] ?></p>
<p><b>Status:</b> <?= $row['status'] ?></p>

<a href="index.php">Back</a>
