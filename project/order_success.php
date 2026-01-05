<?php
include "db.php";

$id = $_POST['cake_id'];
$cake = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cakes WHERE id=$id"));
?>
<!DOCTYPE html>
<html>
<head>
<title>Order Success</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Order Placed Successfully 🎉</h1>

<h2>You ordered: <?php echo $cake['name']; ?></h2>

<p><b>Size:</b> <?php echo $_POST['size']; ?></p>
<p><b>Flavor:</b> <?php echo $_POST['flavor']; ?></p>
<p><b>Message:</b> <?php echo $_POST['message']; ?></p>

<p><b>Toppings:</b> 
<?php 
if(!empty($_POST['toppings'])){
    echo implode(", ", $_POST['toppings']);
}else{
    echo "None";
}
?>
</p>

<a href="index.php" class="btn">Go Home</a>

</body>
</html>
