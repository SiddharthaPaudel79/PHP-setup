<?php
$to = "someone@gmail.com";
$subject = "Test Email from Localhost";
$body = "This is a test message.\nSent from PHP on localhost";
$body = wordwrap($body, 70);

$headers = "From: test@example.com\r\n";

if(mail($to, $subject, $body, $headers)){
    echo "Email was sent successfully!!";
} else {
    echo "Email sending failed on the server.";
}
?>
