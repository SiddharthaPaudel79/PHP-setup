
<?php
if (!is_dir('uploads')) {
    mkdir('uploads', 0777, true);
}
echo "<h2>File Upload Results</h2>";
if (!isset($_FILES['file'])) {
    die("No file was sent");
}
$name = $_FILES['file']['name'];
$type = $_FILES['file']['type'];
$size = $_FILES['file']['size'];
$tmp_name = $_FILES['file']['tmp_name'];
$error = $_FILES['file']['error'];
echo "<h2>DETAILS RECEIVED IN \$_FILES</h2>";
echo "<table border='1' cellpadding='10'>
        <tr>
            <th>Property</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Name</td>
            <td>$name</td>
        </tr>
        <tr>
            <td>Type</td>
            <td>$type</td>
        </tr>
        <tr>
            <td>Size (bytes)</td>
            <td>$size</td>
        </tr>
        <tr>
            <td>Temporary Name</td>
            <td>$tmp_name</td>
        </tr>
        <tr>
            <td>Error</td>
            <td>$error</td>
        </tr>
      </table>";
if ($error !== UPLOAD_ERR_OK) {
    echo "<p style='color:red'>File failed to upload (code $error)</p>";
    exit;
}
if ($size > 2 * 1024 * 1024) {
    echo "<p style='color:red'>File is too large.</p>";
    exit;
}
$allowed = ['image/jpeg', 'image/png', 'image/gif'];
if (!in_array($type, $allowed)) {
    echo "<p style='color:red'>Invalid file type. Only JPG, PNG, and GIF allowed.</p>";
    exit;
}
$destination = "uploads/" . basename($name);
if (move_uploaded_file($tmp_name, $destination)) {
    echo "<p style='color:green'>File uploaded successfully!</p>";
    echo "<p>Saved as: <b>$destination</b></p>";
    echo "<p><img src='$destination' width='200'></p>";
} else {
    echo "<p style='color:red'>Failed to move uploaded file.</p>";
}
echo "<form action='fileee.php' method='get'>
        <button type='submit'>Upload Another File</button>
      </form>
      ";
?>
