<?php
session_start();
include "../db.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM cakes WHERE id=$id");

header("Location: dashboard.php");
?>
