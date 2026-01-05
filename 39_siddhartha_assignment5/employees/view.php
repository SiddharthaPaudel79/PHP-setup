<?php
include "../config/db.php";

$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM employees WHERE emp_id=$id");
$row = mysqli_fetch_assoc($result);
?>

<h2>Employee Details</h2>

<p><b>Name:</b> <?= $row['full_name'] ?></p>
<p><b>Email:</b> <?= $row['email'] ?></p>
<p><b>Phone:</b> <?= $row['phone'] ?></p>
<p><b>Department:</b> <?= $row['department'] ?></p>
<p><b>Salary:</b> <?= $row['salary'] ?></p>
<p><b>Joining Date:</b> <?= $row['joining_date'] ?></p>

<a href="index.php">Back</a>
