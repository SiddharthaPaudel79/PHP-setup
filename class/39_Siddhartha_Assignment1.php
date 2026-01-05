<?php
$name=""; $email=""; $pass=""; $info="";
$nameErr=""; $emailErr=""; $passErr=""; $infoErr="";
$done="";

if(isset($_POST["submit"])){
    if($_POST["name"]==""){
        $nameErr="Name is required";

    } else {
        $name=$_POST["name"];

    }
    if($_POST["email"]==""){
        $emailErr="Email is Required";
        
    } else {
        if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            $emailErr="Email Isnt right";
        } else {
            $email=$_POST["email"];
        }
    }
    if($_POST["password"]==""){
        $passErr="Password is required";

    } else {
        $pass=$_POST["password"];
    }

    if($_POST["about"]==""){
        $infoErr="Tell something ab yourself";
    } else {
        $info=$_POST["about"];

    }
    if($nameErr=="" && $emailErr=="" && $passErr=="" && $infoErr==""){
        $done="Submitted Successfully !!";
    }
}
?>
<h2>Register</h2>

<?php echo $done; ?><br><br>

<form method="post">

Name:<br>
<input type="text" name="name" value="<?php echo $name; ?>"><br>
<?php echo $nameErr; ?><br><br>

Email:<br>
<input type="text" name="email" value="<?php echo $email; ?>"><br>
<?php echo $emailErr; ?><br><br>

Password:<br>
<input type="password" name="password" value="<?php echo $pass; ?>"><br>
<?php echo $passErr; ?><br><br>

About:<br>
<textarea name="about"><?php echo $info; ?></textarea><br>
<?php echo $infoErr; ?><br><br>

<input type="submit" name="submit" value="Register">
</form>
