<?php
include "../config/db.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id']=$row['id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['role']=$row['role'];
        header("Location: ../dashboard.php");
    } else {
        echo "Invalid Login";
    }
}
?>

<form method="post">
Username: <input name="username"><br>
Password: <input type="password" name="password"><br>
<button name="login">Login</button>
</form>
