<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Access Denied!");
}

// Read submitted values
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$gender = $_POST['gender'] ?? "";
$gpa = $_POST['gpa'];
$stream = $_POST['stream'];
$entrance = $_POST['entrance'] ?? "";
$scholarships = $_POST['scholarships'] ?? [];
$activities = $_POST['activities'] ?? [];
$address = htmlspecialchars($_POST['address']);

// Handle photo
$photoName = "";
if (!empty($_FILES['photo']['name'])) {
    $photo = $_FILES['photo'];
    $photoName = "uploads/" . $photo['name'];
    move_uploaded_file($photo['tmp_name'], $photoName);
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Your Submitted Details</h2>

<p><strong>Name:</strong> <?php echo $name; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>
<p><strong>Phone:</strong> <?php echo $phone; ?></p>
<p><strong>Gender:</strong> <?php echo $gender; ?></p>
<p><strong>GPA:</strong> <?php echo $gpa; ?></p>
<p><strong>Stream:</strong> <?php echo $stream; ?></p>
<p><strong>Entrance Type:</strong> <?php echo $entrance; ?></p>

<p><strong>Scholarships:</strong> 
    <?php echo implode(", ", $scholarships); ?>
</p>

<p><strong>Activities:</strong> 
    <?php echo implode(", ", $activities); ?>
</p>

<p><strong>Address:</strong> <?php echo nl2br($address); ?></p>

<?php if ($photoName): ?>
    <p><strong>Uploaded Photo:</strong></p>
    <img src="<?php echo $photoName; ?>" width="150">
<?php endif; ?>

<br><br>
<a href="form.php">Go Back</a>

</body>
</html>
