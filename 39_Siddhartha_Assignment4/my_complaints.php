<?php
session_start();
require_once("db.php");
$user_id = $_SESSION['user_id'];
$result = mysqli_query($connection,
    "SELECT * FROM complaints WHERE user_id=$user_id");
?>
<table border="1">
<tr>
    <th>Subject</th>
    <th>Description</th>
    <th>Status</th>
    <th>Date</th>
</tr>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['subject'] ?></td>
    <td><?= $row['description'] ?></td>
    <td><?= $row['status'] ?></td>
    <td><?= $row['created_at'] ?></td>
</tr>
<?php } ?>
</table>
