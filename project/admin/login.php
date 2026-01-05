<?php
session_start();
include "../db.php";

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$u' AND password='$p'");

    if(mysqli_num_rows($query) == 1){
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid login!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Admin Login</h1>

<form method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button class="btn" name="login">Login</button>
</form>

<p style="color:red;"><?php echo $error ?? ""; ?></p>

</body>
</html>
