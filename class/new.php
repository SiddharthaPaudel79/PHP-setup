<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
</head>
<body>
<?php if (isset($_SESSION['user'])): ?>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?> 🎉</h2>
    <p>You have successfully logged in.</p>

    <h3>Dashboard</h3>
    <ul>
        <li><a href="#">View Profile</a></li>
        <li><a href="#">Edit Settings</a></li>
        <li><a href="login.php?logout=true">Logout</a></li>
    </ul>
<?php else: ?>
    <h2>Login</h2>
    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="login.php">
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Login</button>
    </form>
<?php endif; ?>
</body>
</html>
