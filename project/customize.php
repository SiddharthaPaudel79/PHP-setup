<?php include "db.php";

$id = $_GET['id'];
$cake = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cakes WHERE id=$id"));
?>
<!DOCTYPE html>
<html>
<head>
<title>Customize Cake</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Customize Your Cake</h1>

<div class="cake-details">
    <img src="uploads/<?php echo $cake['image']; ?>">
    <h3><?php echo $cake['name']; ?></h3>
    <p><?php echo $cake['description']; ?></p>
</div>

<form action="order_success.php" method="POST">
    <input type="hidden" name="cake_id" value="<?php echo $id; ?>">

    <label>Size:</label>
    <select name="size">
        <option value="1 Pound">1 Pound</option>
        <option value="2 Pound">2 Pound</option>
        <option value="3 Pound">3 Pound</option>
    </select>

    <label>Flavor:</label>
    <select name="flavor">
        <option>Chocolate</option>
        <option>Vanilla</option>
        <option>Red Velvet</option>
        <option>Strawberry</option>
    </select>

    <label>Message on Cake:</label>
    <input type="text" name="message">

    <label>Extra Toppings:</label><br>
    <input type="checkbox" name="toppings[]" value="Choco Chips"> Choco Chips  
    <input type="checkbox" name="toppings[]" value="Fruits"> Fruits  
    <input type="checkbox" name="toppings[]" value="Nuts"> Nuts  

    <button type="submit" class="btn">Place Order</button>
</form>

</body>
</html>
