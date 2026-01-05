<?php
include "../config/db.php";
if($_SESSION['role']!='admin') die("Access Denied");

$id=$_GET['id'];
$result=mysqli_query($conn,"SELECT * FROM suppliers WHERE supplier_id=$id");
$row=mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    mysqli_query($conn,
    "UPDATE suppliers SET
     supplier_name='$_POST[supplier_name]',
     contact_person='$_POST[contact_person]',
     phone='$_POST[phone]',
     email='$_POST[email]',
     address='$_POST[address]',
     status='$_POST[status]'
     WHERE supplier_id=$id");
    header("Location: index.php");
}
?>

<h2>Edit Supplier</h2>

<form method="post">
Name: <input name="supplier_name" value="<?= $row['supplier_name'] ?>"><br>
Contact Person: <input name="contact_person" value="<?= $row['contact_person'] ?>"><br>
Phone: <input name="phone" value="<?= $row['phone'] ?>"><br>
Email: <input name="email" value="<?= $row['email'] ?>"><br>
Address: <textarea name="address"><?= $row['address'] ?></textarea><br>

<select name="status">
<option <?= $row['status']=='active'?'selected':'' ?>>active</option>
<option <?= $row['status']=='inactive'?'selected':'' ?>>inactive</option>
</select><br>

<button name="update">Update</button>
</form>
