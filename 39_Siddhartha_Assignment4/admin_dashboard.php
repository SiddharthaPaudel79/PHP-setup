<?php
session_start();
require_once("db.php");
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
}
$result = mysqli_query($connection,
    "SELECT complaints.*, users.username
     FROM complaints
     JOIN users ON complaints.user_id = users.id");
?>
<table border="1">
<tr>
    <th>User</th>
    <th>Subject</th>
    <th>Description</th>
    <th>Status</th>
    <th>Action</th>
</tr>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['username'] ?></td>
    <td><?= $row['subject'] ?></td>
    <td><?= $row['description'] ?></td>
    <td><?= $row['status'] ?></td>
    <td>
        <a href="update.php?id=<?= $row['id'] ?>">Update</a> |
        <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php } ?>
</table>
