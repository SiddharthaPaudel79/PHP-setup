<?php include "../config/db.php"; ?>

<h2>Products</h2>
<?php if($_SESSION['role']=='admin'){ ?>
<a href="create.php">Add Product</a>
<?php } ?>

<table border="1">
<tr>
<th>Name</th><th>Category</th><th>Price</th><th>Action</th>
</tr>

<?php
$result=mysqli_query($conn,"SELECT * FROM products");
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['category'] ?></td>
<td><?= $row['price'] ?></td>
<td>
<a href="view.php?id=<?= $row['product_id'] ?>">View</a>
<?php if($_SESSION['role']=='admin'){ ?>
| <a href="edit.php?id=<?= $row['product_id'] ?>">Edit</a>
| <a href="delete.php?id=<?= $row['product_id'] ?>">Delete</a>
<?php } ?>
</td>
</tr>
<?php } ?>
</table>
