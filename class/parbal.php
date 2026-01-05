<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($email === false || $email === null) {
    echo "Invalid email<br>";
}

$safe = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$cleanEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$str = "<h1> HELLO WORLD!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING);

echo $newstr;

$age = 25;
echo filter_var($age,FILTER_VALIDATE_INT);
$age = "twentyfive <br>";
$age = filter_var($age, FILTER_VALIDATE_INT);
echo $age."<br>";
$input = "<b>Hello</b><script>evil()</script>";
echo $input."<br>";
$clean = filter_var($input, FILTER_SANITIZE_SPECIAL_CHARS);
echo $clean."<br>";
?>
