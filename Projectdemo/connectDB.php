<?php
mysqli_connect("localhost", "root", "");
?>
<?php
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASSWORD", "");
define("DBNAME", "college");

try {
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME)
        OR die("Couldnot connect to mysql" . mysqli_connect_error());

} catch (Exception $e) {
    echo $e->getMessage();
}