<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "admin" && $password == "admin123") {
    $_SESSION['user'] = $username;
    $_SESSION['role'] = "admin";
    header("Location: products.php");
}
elseif ($username == "user" && $password == "user123") {
    $_SESSION['user'] = $username;
    $_SESSION['role'] = "user";
    header("Location: products.php");
}
else {
    echo "Invalid login!";
}
?>
