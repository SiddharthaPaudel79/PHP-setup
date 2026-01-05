<?php
echo "Dashboard.php<br>";
if (!isset($_COOKIE['user_id'])) {
    header("Location: login.php");
    exit;
}
if (isset($_COOKIE['firstname'])) {
    echo "Welcome, " . htmlspecialchars($_COOKIE['firstname']);
} else {
    echo "Welcome, Guest";
}
?>
<br>
<a href="logout.php">Logout</a>
