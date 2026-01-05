<?php
include "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
}
?>

<h2>Employees List</h2>

<?php if($_SESSION['role']=='admin'){ ?>
<a href="create.php">Add Employee</a>
<?php } ?>

<table border="1">
<tr>
<th>Name</th><th>Email</th><th>Department</th><th>Action</th>
</tr>

<?php
$result = mysqli_query($conn,"SELECT * FROM employees");
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?= $row['full_name'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['department'] ?></td>
<td>
<a href="view.php?id=<?= $row['emp_id'] ?>">View</a>
<?php if($_SESSION['role']=='admin'){ ?>
 | <a href="edit.php?id=<?= $row['emp_id'] ?>">Edit</a>
 | <a href="delete.php?id=<?= $row['emp_id'] ?>">Delete</a>
<?php } ?>
</td>
</tr>
<?php } ?>
</table>
