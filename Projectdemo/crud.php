<?php
require_once("connectDB.php");
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $insert_sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($connection, $insert_sql)) {
        echo "Record added successfully.<br>";
    } else {
        echo "Insert failed: " . mysqli_error($connection) . "<br>";
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_sql = "DELETE FROM students WHERE student_id = $id";
    if (mysqli_query($connection, $delete_sql)) {
        echo "Record deleted successfully.<br>";
    } else {
        echo "Delete failed: " . mysqli_error($connection) . "<br>";
    }
}
$list_res = mysqli_query($connection, "SELECT * FROM students ORDER BY student_id DESC");

if (isset($_POST['update'])) {
    $id = (int) $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $update_sql = "UPDATE students SET name='$name', email='$email' WHERE student_id=$id";
    if (mysqli_query($connection, $update_sql)) {
        echo "Record updated successfully.<br>";
    } else {
        echo "Update failed: " . mysqli_error($connection) . "<br>";
    }
}

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $delete_sql = "DELETE FROM students WHERE student_id=$id";
    if (mysqli_query($connection, $delete_sql)) {
        echo "Record deleted successfully.<br>";
    } else {
        echo "Delete failed: " . mysqli_error($connection) . "<br>";
    }
}
?>
<?php
$edit_id = "";
$edit_name = "";
$edit_email = "";
$msg = "";
if (isset($_GET['edit'])) {
    $edit_id = (int) $_GET['edit'];
    $sql = "SELECT * FROM students WHERE student_id = $edit_id";
    $res = mysqli_query($connection, $sql);
    if ($res && mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $edit_name = $row['name'];
        $edit_email = $row['email'];
    } else {
        $msg = "Record not found";
    }
}
?>

<h2>Add Student</h2>
<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    <input type="submit" value="Save">
</form>

<h3>Student List</h3>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Action</th>
    </tr>

    <?php if ($list_res && mysqli_num_rows($list_res) > 0) {
        while ($row = mysqli_fetch_assoc($list_res)) { ?>
            <tr>
                <td><?= $row['student_id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td>
                    <a href="crud.php?edit=<?= $row['student_id']; ?>">Edit</a> |
                    <a href="?delete=<?= $row['student_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php }
    } else { ?>
        <tr><td colspan="4">No records found.</td></tr>
    <?php } ?>
</table>
<h3>Edit Student</h3>
<form method = "POST" action = "">
 <input type="hidden" name = "id" value = "<?php echo $edit_id ?>">  
 Name: 
<input type="text" name = "name" value = "<?php echo $edit_name ?>">
<br> <br>
Email:
<input type="email" name = "email" value = "<?php echo $edit_email ?>">
<br><br>
<input type="submit" name = "update" value = "Update student">
<a href="crud.php"> Cancel</a>
</form>