<?php
session_start();
include "../db.php";

$id = $_GET['id'];
$cake = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cakes WHERE id=$id"));

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    $img = $cake['image'];

    if(!empty($_FILES['img']['name'])){
        $img = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../uploads/".$img);
    }

    mysqli_query($conn, "UPDATE cakes SET name='$name', price='$price', image='$img', description='$desc' WHERE id=$id");
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Cake</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Edit Cake</h1>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" value="<?php echo $cake['name']; ?>">
    <input type="number" name="price" value="<?php echo $cake['price']; ?>">
    <input type="file" name="img">
    <textarea name="description"><?php echo $cake['description']; ?></textarea>

    <button class="btn" name="update">Update</button>
</form>

</body>
</html>
