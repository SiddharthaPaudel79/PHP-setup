<?php
include "../config/db.php";
if($_SESSION['role']!='admin') die("Access Denied");

if(isset($_POST['save'])){
    mysqli_query($conn,
    "INSERT INTO employees(full_name,email,phone,department,salary,joining_date)
     VALUES(
     '$_POST[full_name]',
     '$_POST[email]',
     '$_POST[phone]',
     '$_POST[department]',
     '$_POST[salary]',
     '$_POST[joining_date]'
     )");
    header("Location: index.php");
}
?>

<h2>Add Employee</h2>

<form method="post">
Full Name: <input name="full_name"><br>
Email: <input name="email"><br>
Phone: <input name="phone"><br>
Department: <input name="department"><br>
Salary: <input name="salary"><br>
Joining Date: <input type="date" name="joining_date"><br>
<button name="save">Save</button>
</form>
