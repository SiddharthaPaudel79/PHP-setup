<?php
require_once 'users.php';
require_once 'auth.php';
$error = '';
if (isLoggedIn()) {
    header('Location: protected.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $user = validLogin($username, $password);
    if ($user) {
        loginUser($user['username'], $user['role']);
        header('Location: protected.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
if (!$error && isset($_GET['error']) && $_GET['error'] === 'login_required') {
    $error = 'Please log in to continue.';
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post">
    Username:
    <input type="text" name="username"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    <input type="submit" value="Login">
</form>
</body>
</html>
