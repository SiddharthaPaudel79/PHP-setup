<?php
include "config/db.php";
if(!isset($_SESSION['user_id'])) header("Location: auth/login.php");
?>

<h2>Welcome <?php echo $_SESSION['username']; ?></h2>

<a href="products/index.php">Manage Products</a><br>
<a href="employees/index.php">Manage Employees</a><br>
<a href="suppliers/index.php">Manage Suppliers</a><br>
<a href="auth/logout.php">Logout</a>
