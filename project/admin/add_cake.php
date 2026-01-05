<?php
session_start();
include "../db.php";

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    $img = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], "../uploads/".$img);

    mysqli_query($conn, "INSERT INTO cakes(name,price,image,description)
    VALUES('$name','$price','$img','$desc')");

    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Cake</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Add New Cake</h1>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Cake Name">
    <input type="number" name="price" placeholder="Price">
    <input type="file" name="img">
    <textarea name="description" placeholder="Description"></textarea>
    <button class="btn" name="add">Add Cake</button>
</form>

</body>
</html>
