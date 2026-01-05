<?php
require_once('ss.php');

/* Create table */
$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
)";

if (!mysqli_query($connection, $sql)) {
    die("Table creation failed: " . mysqli_error($connection));
}

/* Insert data */
$sql = "INSERT INTO students (name, email)
        VALUES ('Ram', 'ram@gmail.com')";

if (mysqli_query($connection, $sql)) {
    echo "Data inserted successfully<br>";
} else {
    echo "Insert failed: " . mysqli_error($connection);
}

/* Fetch data */
$sql = "SELECT * FROM students";
$result = mysqli_query($connection, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['name'] . " " . $row['email'] . "<br>";
    }
} else {
    echo "Query failed: " . mysqli_error($connection);
}
/* Update data */
$sql = " update students
set name = 'Ram Sharma' Where student_id = 2";
if($result){
    echo"Record updated successfully";
}else{
    echo"Query failed" .mysqli_error($connection);
}
/* Delete data */
$sql = " delete from students Where student_id = 2";
if($result){
    echo"Record deleted successfully";
}else{
    echo"Query failed" .mysqli_error($connection);
}
?>
