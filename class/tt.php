<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($email === false || $email === null) {
    echo "Invalid email<br>";
}

$safe = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cleanEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// FILTER_SANITIZE_STRING is deprecated → use strip_tags or htmlspecialchars
$str = "<h1> HELLO WORLD!</h1>";
$newstr = strip_tags($str);
echo $newstr . "<br>";

$age = 25;
$age = "twentyfive";
$age = filter_var($age, FILTER_VALIDATE_INT); // will return false
echo $age === false ? "Invalid age<br>" : $age . "<br>";

// missing semicolon fixed
$input = "<b>Hello</b><script>evil()</script>";
$clean = filter_var($input, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
echo $clean;
?>
