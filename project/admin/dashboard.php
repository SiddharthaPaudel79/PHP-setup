<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: login.php"); }
include "../db.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Admin Dashboard</h1>
<a class="btn" href="add_cake.php">Add New Cake</a>

<table border="1" width="80%">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Image</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php
$cakes = mysqli_query($conn, "SELECT * FROM cakes");
while($c = mysqli_fetch_assoc($cakes)){
?>
<tr>
    <td><?php echo $c['id']; ?></td>
    <td><?php echo $c['name']; ?></td>
    <td><img src="../uploads/<?php echo $c['image']; ?>" width="80"></td>
    <td><?php echo $c['price']; ?></td>
    <td>
        <a class="btn" href="edit_cake.php?id=<?php echo $c['id']; ?>">Edit</a>
        <a class="btn" href="delete_cake.php?id=<?php echo $c['id']; ?>">Delete</a>
    </td>
</tr>
<?php } ?>
</table>

</body>
</html>
