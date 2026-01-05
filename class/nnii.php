<?php
$fullname = "";
$email = "";
$phone = "";
$employment = "";
$jobtype = "";
$location = "";
$experience = "";

$err = [];
$success = false;   // for showing output section
$photo_path = "";   // to store uploaded photo path

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(empty($_POST["fullname"])){
        $err["fullname"] = "Full name required.";
    } else {
        $fullname = filter_var($_POST["fullname"], FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(empty($_POST["email"])){
        $err["email"] = "Email required.";
    } else {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    }

    if(empty($_POST["phone"])){
        $err["phone"] = "Phone required.";
    } else {
        $phone = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
    }

    if(empty($_POST["employment"])){
        $err["employment"] = "Select one.";
    } else {
        $employment = $_POST["employment"];
    }

    if(empty($_POST["jobtype"])){
        $err["jobtype"] = "Select job type.";
    } else {
        $jobtype = $_POST["jobtype"];
    }

    if(empty($_POST["location"])){
        $err["location"] = "Select location.";
    } else {
        $location = $_POST["location"];
    }

    if(empty($_POST["experience"])){
        $err["experience"] = "Enter experience.";
    } else {
        $experience = filter_var($_POST["experience"], FILTER_SANITIZE_SPECIAL_CHARS);
    }

    // CV Upload
    if(!empty($_FILES["cv"]["name"])){
        $cv_type = $_FILES["cv"]["type"];
        if($cv_type != "application/pdf" &&
           $cv_type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
            $err["cv"] = "PDF or DOCX only.";
        }
    } else {
        $err["cv"] = "Upload your CV.";
    }

    // Photo Upload
    if(!empty($_FILES["photo"]["name"])){
        $photo_type = $_FILES["photo"]["type"];
        if($photo_type != "image/jpeg" && $photo_type != "image/png"){
            $err["photo"] = "JPG or PNG only.";
        } else {
            // create uploads folder if not exist
            if(!is_dir("uploads")){
                mkdir("uploads", 0777, true);
            }
            $photo_path = "uploads/" . $_FILES["photo"]["name"];
            move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_path);
        }
    } else {
        $err["photo"] = "Upload your photo.";
    }

    if(empty($err)){
        $success = true; // now show output section
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<?php if($success == false){ ?>

<h2>Job Application</h2>

<form method="POST" enctype="multipart/form-data">

Full Name:<br>
<input type="text" name="fullname" value="<?php echo $fullname; ?>">
<br><span style="color:red;"><?php echo $err["fullname"] ?? ""; ?></span><br>

Email:<br>
<input type="text" name="email" value="<?php echo $email; ?>">
<br><span style="color:red;"><?php echo $err["email"] ?? ""; ?></span><br>

Phone:<br>
<input type="text" name="phone" value="<?php echo $phone; ?>">
<br><span style="color:red;"><?php echo $err["phone"] ?? ""; ?></span><br>

Employment Status:<br>
<input type="radio" name="employment" value="Employed"> Employed
<input type="radio" name="employment" value="Unemployed"> Unemployed
<input type="radio" name="employment" value="Student"> Student
<br><span style="color:red;"><?php echo $err["employment"] ?? ""; ?></span><br>

Job Type:<br>
<input type="radio" name="jobtype" value="Full-Time"> Full-Time
<input type="radio" name="jobtype" value="Part-Time"> Part-Time
<input type="radio" name="jobtype" value="Internship"> Internship
<br><span style="color:red;"><?php echo $err["jobtype"] ?? ""; ?></span><br>

Preferred Location:<br>
<select name="location">
    <option value="">--Select--</option>
    <option value="Kathmandu">Kathmandu</option>
    <option value="Lalitpur">Lalitpur</option>
    <option value="Bhaktapur">Bhaktapur</option>
</select>
<br><span style="color:red;"><?php echo $err["location"] ?? ""; ?></span><br>

Experience:<br>
<textarea name="experience"><?php echo $experience; ?></textarea>
<br><span style="color:red;"><?php echo $err["experience"] ?? ""; ?></span><br>

Upload CV (PDF/DOCX):<br>
<input type="file" name="cv">
<br><span style="color:red;"><?php echo $err["cv"] ?? ""; ?></span><br>

Upload Photo (JPG/PNG):<br>
<input type="file" name="photo">
<br><span style="color:red;"><?php echo $err["photo"] ?? ""; ?></span><br>

<input type="checkbox" name="agree"> I agree to share my profile.<br>
<span style="color:red;"><?php echo $err["agree"] ?? ""; ?></span><br>

<input type="checkbox" name="confirm"> I confirm information is true.<br>
<span style="color:red;"><?php echo $err["confirm"] ?? ""; ?></span><br>

<input type="submit" value="Submit">
</form>

<?php } else { ?>

<h2>Submitted Details</h2>

<p><strong>Full Name:</strong> <?php echo $fullname; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>
<p><strong>Phone:</strong> <?php echo $phone; ?></p>
<p><strong>Employment Status:</strong> <?php echo $employment; ?></p>
<p><strong>Job Type:</strong> <?php echo $jobtype; ?></p>
<p><strong>Preferred Location:</strong> <?php echo $location; ?></p>
<p><strong>Experience:</strong> <?php echo $experience; ?></p>

<p><strong>Uploaded Photo:</strong></p>
<img src="<?php echo $photo_path; ?>" width="200" style="border:1px solid #000;"><br><br>

<p><strong>CV File:</strong> <?php echo $_FILES["cv"]["name"]; ?></p>

<?php } ?>

</body>
</html>
