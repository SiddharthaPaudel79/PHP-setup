<?php
$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);

echo "Name: " . $name . "<br>";
echo "Email: " . $email;
?>
