<?php
$conn = mysqli_connect("localhost","root","","assignment5");
session_start();

if(!$conn){
    die("Database connection failed");
}
?>
