<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {
    echo "Access denied!";
    exit();
}
?>

<h2>Admin Dashboard</h2>
<p>Only admin can see this.</p>
