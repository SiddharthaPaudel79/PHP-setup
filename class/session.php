<?php
session_start();
$_SESSION['username'] = 'Ram';
$_SESSION['userID'] = '2';
echo "SESSION ID: " . session_id() . "<br>";
echo "SESSION Name: " . session_name() . "<br>";
echo "Username: " . $_SESSION['username'] . "<br>";
echo "User ID: " . $_SESSION['userID'] . "<br>";
print_r($_SESSION);
echo "<br>";
unset($_SESSION['userID']);
print_r($_SESSION);
// $_SESSION = array();
// session_destroy();
// echo "<br>After clearing:<br>";
// print_r($_SESSION);
?>
