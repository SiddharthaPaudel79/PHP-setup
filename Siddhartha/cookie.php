<?php
if (isset($_COOKIE["USERNAME"])) {
    $username = $_COOKIE["USERNAME"];
    echo "Hello, " . htmlspecialchars($username);
} else {
    echo "No username cookie found. Please visit <a href='set_user.php'>set_user.php</a>";
}
?>
