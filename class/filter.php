<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email === false || $email === null) {
}
$safe = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$cleanEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$str = "<h1>Hello World</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING);
echo $newstr;


$age = 25;
var_dump(filter_var($age, FILTER_VALIDATE_INT));
$age = "twentyfive";
var_dump(filter_var($age, FILTER_VALIDATE_INT));
echo $age . "<br>";
$input = "<b>Hello</b><script>evil()</script>";
echo $input;
$clean = filter_var($input, FILTER_SANITIZE_SPECIAL_CHARS);
echo $clean;
?>