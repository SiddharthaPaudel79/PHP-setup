<?php
include "../config/db.php";
if($_SESSION['role']!='admin') die("Access Denied");

$id=$_GET['id'];

if(isset($_POST['confirm'])){
    mysqli_query($conn,"DELETE FROM suppliers WHERE supplier_id=$id");
    header("Location: index.php");
}
?>

<h2>Delete Supplier</h2>
<p>Confirm delete?</p>

<form method="post">
<button name="confirm">Yes</button>
<a href="index.php">Cancel</a>
</form>
