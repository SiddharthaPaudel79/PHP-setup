<?php
include "../config/db.php";
if($_SESSION['role']!='admin') die("Access Denied");

if(isset($_POST['save'])){
    mysqli_query($conn,
    "INSERT INTO products(name,category,price,stock_qty,status)
     VALUES('$_POST[name]','$_POST[category]','$_POST[price]',
     '$_POST[stock_qty]','$_POST[status]')");
    header("Location: index.php");
}
?>

<form method="post">
Name: <input name="name"><br>
Category: <input name="category"><br>
Price: <input name="price"><br>
Stock: <input name="stock_qty"><br>
Status:
<select name="status">
<option>active</option>
<option>inactive</option>
</select><br>
<button name="save">Save</button>
</form>
