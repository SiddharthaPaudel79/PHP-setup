<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_gmail@gmail.com';
    $mail->Password   = 'your_app_password'; // use App Password, not Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('your_gmail@gmail.com', 'Localhost Test');
    $mail->addAddress('someone@gmail.com');

    $mail->Subject = 'Test Email from Localhost';
    $mail->Body    = "This is a test message.\nSent from PHP on localhost";

    $mail->send();
    echo 'Email was sent successfully!!';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
