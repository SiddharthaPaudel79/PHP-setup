<?php
echo"Login page";
$loginSuccessful = TRUE; $user_id=1; $first_name="ram";
if($loginSuccessful){
    setcookie("firstname", $first_name, time() + 3600,"/");
    setcookie("user_id", $user_id, time() + 3600,"/");
    header("Location: dashboard.php");
}
?>