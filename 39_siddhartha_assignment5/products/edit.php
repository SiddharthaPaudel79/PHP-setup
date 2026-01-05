<?php
include "../config/db.php";

if(!isset($_SESSION['user_id']) || $_SESSION['role']!='admin'){
    die("Access Denied");
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE product_id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock_qty'];
    $status = $_POST['status'];

    mysqli_query($conn,
        "UPDATE products SET
        name='$name',
        category='$category',
        price='$price',
        stock_qty='$stock',
        status='$status'
        WHERE product_id=$id"
    );

    header("Location: index.php");
}
?>

<h2>Edit Product</h2>

<form method="post">
Name: <input name="name" value="<?= $row['name'] ?>"><br>
Category: <input name="category" value="<?= $row['category'] ?>"><br>
Price: <input name="price" value="<?= $row['price'] ?>"><br>
Stock: <input name="stock_qty" value="<?= $row['stock_qty'] ?>"><br>

Status:
<select name="status">
    <option <?= $row['status']=='active'?'selected':'' ?>>active</option>
    <option <?= $row['status']=='inactive'?'selected':'' ?>>inactive</option>
</select><br>

<button name="update">Update</button>
</form>
