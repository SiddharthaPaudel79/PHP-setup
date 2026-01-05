<?php
include "../config/db.php";
if($_SESSION['role']!='admin') die("Access Denied");

$id = $_GET['id'];

if(isset($_POST['confirm'])){
    mysqli_query($conn,"DELETE FROM employees WHERE emp_id=$id");
    header("Location: index.php");
}
?>

<h2>Delete Employee</h2>
<p>Are you sure?</p>

<form method="post">
<button name="confirm">Yes, Delete</button>
<a href="index.php">Cancel</a>
</form>
