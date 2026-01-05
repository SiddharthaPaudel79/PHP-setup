<?php
setcookie("user_id", "", time() - 3600, "/");
setcookie("firstname", "", time() - 3600, "/");
header("Location: index.php");
?>