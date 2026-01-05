<?php
require_once("db.php");
$id = $_GET['id'];
if (isset($_POST['update'])) {
    $status = $_POST['status'];
    mysqli_query($connection,
        "UPDATE complaints SET status='$status' WHERE id=$id");
    header("Location: admin_dashboard.php");
}
?>
<form method="post">
    Status:
    <select name="status">
        <option>Pending</option>
        <option>Resolved</option>
    </select>
    <button name="update">Update</button>
</form>
