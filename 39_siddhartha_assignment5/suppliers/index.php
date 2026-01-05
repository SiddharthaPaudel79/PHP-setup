<?php
include "../config/db.php";
?>

<h2>Suppliers</h2>

<?php if($_SESSION['role']=='admin'){ ?>
<a href="create.php">Add Supplier</a>
<?php } ?>

<table border="1">
<tr>
<th>Name</th><th>Phone</th><th>Status</th><th>Action</th>
</tr>

<?php
$result=mysqli_query($conn,"SELECT * FROM suppliers");
while($row=mysqli_fetch_assoc($result)){
?>
<tr>
<td><?= $row['supplier_name'] ?></td>
<td><?= $row['phone'] ?></td>
<td><?= $row['status'] ?></td>
<td>
<a href="view.php?id=<?= $row['supplier_id'] ?>">View</a>
<?php if($_SESSION['role']=='admin'){ ?>
 | <a href="edit.php?id=<?= $row['supplier_id'] ?>">Edit</a>
 | <a href="delete.php?id=<?= $row['supplier_id'] ?>">Delete</a>
<?php } ?>
</td>
</tr>
<?php } ?>
</table>
