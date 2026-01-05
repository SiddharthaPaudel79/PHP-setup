<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Bakery Cakes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Our Cakes</h1>

<div class="cake-container">
<?php
$result = mysqli_query($conn, "SELECT * FROM cakes");
while($row = mysqli_fetch_assoc($result)){
?>
    <div class="cake-card">
        <img src="uploads/<?php echo $row['image']; ?>">
        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['description']; ?></p>
        <p><b>Price: Rs. <?php echo $row['price']; ?></b></p>
        <a class="btn" href="customize.php?id=<?php echo $row['id']; ?>">Customize</a>
    </div>
<?php } ?>
</div>

</body>
</html>
