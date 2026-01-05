<?php
require_once('ss.php');

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (name, email)
            VALUES ('$name', '$email')";

    if (mysqli_query($connection, $sql)) {
        echo "Student added successfully";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
