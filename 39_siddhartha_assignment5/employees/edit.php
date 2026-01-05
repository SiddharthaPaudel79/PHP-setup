<?php
include "../config/db.php";
if($_SESSION['role']!='admin') die("Access Denied");

$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM employees WHERE emp_id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    mysqli_query($conn,
    "UPDATE employees SET
     full_name='$_POST[full_name]',
     email='$_POST[email]',
     phone='$_POST[phone]',
     department='$_POST[department]',
     salary='$_POST[salary]',
     joining_date='$_POST[joining_date]'
     WHERE emp_id=$id");
    header("Location: index.php");
}
?>

<h2>Edit Employee</h2>

<form method="post">
Full Name: <input name="full_name" value="<?= $row['full_name'] ?>"><br>
Email: <input name="email" value="<?= $row['email'] ?>"><br>
Phone: <input name="phone" value="<?= $row['phone'] ?>"><br>
Department: <input name="department" value="<?= $row['department'] ?>"><br>
Salary: <input name="salary" value="<?= $row['salary'] ?>"><br>
Joining Date: <input type="date" name="joining_date" value="<?= $row['joining_date'] ?>"><br>
<button name="update">Update</button>
</form>
