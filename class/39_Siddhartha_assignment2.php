<?php
$errors = [];
$submitted = false;

$name = $email = $phone = $gender = $gpa = $stream = $entrance = $address = "";
$scholarships = $activities = [];
$confirm = $agree = "";

function clean($x) {
    return htmlspecialchars(trim($x));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $phone = clean($_POST['phone']);
    $gender = $_POST['gender'] ?? "";
    $gpa = $_POST['gpa'];
    $stream = clean($_POST['stream']);
    $entrance = $_POST['entrance'] ?? "";
    $scholarships = $_POST['scholarships'] ?? [];
    $activities = $_POST['activities'] ?? [];
    $address = clean($_POST['address']);
    $confirm = $_POST['confirm'] ?? "";
    $agree = $_POST['agree'] ?? "";

    if (!$name) $errors[] = "Name is required";
    if (!$email) $errors[] = "Email is required";
    if (!$phone || strlen($phone) != 10) $errors[] = "Phone must be 10 digits";
    if (!$gender) $errors[] = "Gender is required";
    if ($gpa === "" || $gpa < 0 || $gpa > 4) $errors[] = "GPA must be between 0.0 and 4.0";
    if (!$stream) $errors[] = "Stream is required";
    if (!$entrance) $errors[] = "Entrance type required";
    if (!$address) $errors[] = "Address is required";
    if (!$confirm) $errors[] = "Please confirm your information";
    if (!$agree) $errors[] = "You must agree to rules";

    $photoName = "";
    if (!empty($_FILES["photo"]["name"])) {

        $photo = $_FILES["photo"];
        $ext = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, ["jpg", "png"])) $errors[] = "Photo must be JPG or PNG";
        if ($photo["size"] > 2 * 1024 * 1024) $errors[] = "Photo must be under 2MB";

        if (!$errors) {
            if (!is_dir("uploads")) mkdir("uploads");
            $photoName = "uploads/" . $photo['name'];
            move_uploaded_file($photo["tmp_name"], $photoName);
        }

    } else {
        $errors[] = "Please upload a photo";
    }

    if (!$errors) $submitted = true;
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>College Admission Form</h2>

<?php if (!$submitted): ?>

<?php if ($errors): ?>
    <ul style="color:red;">
        <?php foreach ($errors as $e) echo "<li>$e</li>"; ?>
    </ul>
<?php endif; ?>

<form method="post">

Student Name:<br>
<input type="text" name="name" value="<?= $name ?>"><br><br>

Email:<br>
<input type="email" name="email" value="<?= $email ?>"><br><br>

Phone (10 digits):<br>
<input type="text" name="phone" value="<?= $phone ?>"><br><br>

Gender:<br>
<input type="radio" name="gender" value="Male"   <?= $gender=="Male"?"checked":"" ?>>Male
<input type="radio" name="gender" value="Female" <?= $gender=="Female"?"checked":"" ?>>Female
<input type="radio" name="gender" value="Other"  <?= $gender=="Other"?"checked":"" ?>>Other
<br><br>

GPA (0–4):<br>
<input type="number" step="0.1" name="gpa" value="<?= $gpa ?>"><br><br>

Stream:<br>
<select name="stream">
    <option value="">Select Stream</option>
    <option value="Science"     <?= $stream=="Science"?"selected":"" ?>>Science</option>
    <option value="Management"  <?= $stream=="Management"?"selected":"" ?>>Management</option>
    <option value="Humanities"  <?= $stream=="Humanities"?"selected":"" ?>>Humanities</option>
</select>
<br><br>

Entrance Type:<br>
<input type="radio" name="entrance" value="Regular"          <?= $entrance=="Regular"?"checked":"" ?>>Regular
<input type="radio" name="entrance" value="Direct Admission" <?= $entrance=="Direct Admission"?"checked":"" ?>>Direct Admission
<br><br>

Scholarships:<br>
<input type="checkbox" name="scholarships[]" value="Need-based">Need-based
<input type="checkbox" name="scholarships[]" value="Merit-based">Merit-based
<br><br>

Activities:<br>
<input type="checkbox" name="activities[]" value="Sports" >Sports
<input type="checkbox" name="activities[]" value="Games" >Games
<input type="checkbox" name="activities[]" value="Music">Music
<input type="checkbox" name="activities[]" value="Dance">Dance
<br><br>

Address:<br>
<textarea name="address"><?= $address ?></textarea><br><br>

Photo:<br>
<input type="file" name="photo"><br><br>

<input type="checkbox" name="confirm" value="yes" <?= $confirm?"checked":"" ?>>  
I confirm the information is correct.<br><br>

<input type="checkbox" name="agree" value="yes" <?= $agree?"checked":"" ?>>  
I agree to follow the rules.<br><br>

<button type="submit">Submit</button>

</form>

<?php else: ?>


<h2>Your Submitted Details</h2>

<p><strong>Name:</strong> <?= $name ?></p>
<p><strong>Email:</strong> <?= $email ?></p>
<p><strong>Phone:</strong> <?= $phone ?></p>
<p><strong>Gender:</strong> <?= $gender ?></p>
<p><strong>GPA:</strong> <?= $gpa ?></p>
<p><strong>Stream:</strong> <?= $stream ?></p>
<p><strong>Entrance:</strong> <?= $entrance ?></p>
<p><strong>Scholarships:</strong> <?= implode(", ", $scholarships) ?></p>
<p><strong>Activities:</strong> <?= implode(", ", $activities) ?></p>
<p><strong>Address:</strong><br><?= ($address) ?></p>

<p><strong>Photo:</strong></p>
<img src="<?= $photoName ?>" width="150">

<br>

<?php endif; ?>

</body>
</html>
