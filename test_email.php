<?php
$test_to = "chethanp430@gmail.com"; // Change to your email
$test_subject = "Test Email";
$test_message = "This is a test email.";
$test_headers = "From: chethanp430@gmail.com\r\n" .
                "MIME-Version: 1.0\r\n" .
                "Content-Type: text/plain; charset=UTF-8";

if (mail($test_to, $test_subject, $test_message, $test_headers)) {
    echo "Test email sent successfully.";
} else {
    echo "Failed to send test email.";
}
?>
