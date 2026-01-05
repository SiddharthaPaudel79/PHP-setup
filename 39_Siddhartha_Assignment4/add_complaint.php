<?php
session_start();
require_once("db.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];
    mysqli_query($connection,
        "INSERT INTO complaints (user_id, subject, description)
         VALUES ($user_id, '$subject', '$description')");
}
?>
<form method="post">
    Subject: <input type="text" name="subject"><br>
    Description: <textarea name="description"></textarea><br>
    <button name="submit">Submit Complaint</button>
</form>
