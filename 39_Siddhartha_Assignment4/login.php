<?php
session_start();
require_once("db.php");
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: dashboard.php");
    } else { echo "Invalid login";}
}
?>
<form method="post">
Email: <input type="email" name="email"><br>
Password: <input type="password" name="password"><br>
<button name="login">Login</button>
</form>
