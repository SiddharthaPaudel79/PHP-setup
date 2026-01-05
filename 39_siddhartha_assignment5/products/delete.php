<?php
include "../config/db.php";

if(!isset($_SESSION['user_id']) || $_SESSION['role']!='admin'){
    die("Access Denied");
}

$id = $_GET['id'];

if(isset($_POST['confirm'])){
    mysqli_query($conn, "DELETE FROM products WHERE product_id=$id");
    header("Location: index.php");
}
?>

<h2>Delete Product</h2>
<p>Are you sure you want to delete this product?</p>

<form method="post">
    <button name="confirm">Yes, Delete</button>
    <a href="index.php">Cancel</a>
</form>
