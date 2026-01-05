<?php
require_once("db.php");
$id = $_GET['id'];
mysqli_query($connection, "DELETE FROM complaints WHERE id=$id");
header("Location: admin_dashboard.php");
