<?php
include "../config/db.php";

if(isset($_POST['register'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=hash('sha256',$_POST['password']);
    $role='user';

    mysqli_query($conn,
      "INSERT INTO users(username,email,password,role)
       VALUES('$username','$email','$password','$role')");
    echo "Registered Successfully";
}
?>

<form method="post">
Username: <input name="username"><br>
Email: <input name="email"><br>
Password: <input type="password" name="password"><br>
<button name="register">Register</button>
</form>
