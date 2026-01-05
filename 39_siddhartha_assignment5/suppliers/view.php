<?php
include "../config/db.php";

$id=$_GET['id'];
$result=mysqli_query($conn,"SELECT * FROM suppliers WHERE supplier_id=$id");
$row=mysqli_fetch_assoc($result);
?>

<h2>Supplier Details</h2>

<p><b>Name:</b> <?= $row['supplier_name'] ?></p>
<p><b>Contact:</b> <?= $row['contact_person'] ?></p>
<p><b>Phone:</b> <?= $row['phone'] ?></p>
<p><b>Email:</b> <?= $row['email'] ?></p>
<p><b>Address:</b> <?= $row['address'] ?></p>
<p><b>Status:</b> <?= $row['status'] ?></p>

<a href="index.php">Back</a>
